<?php
namespace Repositories;

require_once('core.php');
customFileLoad('/helpers/SoapHelper.php');
customFileLoad('/helpers/ConnectionHelper.php');
customFileLoad('/models/Operator.php');
customFileLoad('/models/Country.php');

use Helpers\SoapHelper;
use Helpers\ConnectionHelper;
use Models\Country;
use Models\Operator;

class OperatorsRepository {
	
	protected $soapClient = null;
	protected $DbConnection = null;
	
	public function __construct(){
		$this->soapClient = SoapHelper::getClient();
		$this->DbConnection = ConnectionHelper::getConnection();
	}
	
	public function findOperators() {
		$requestParams = array(	"Username" => SOAP_USERNAME_HEADER,	"Checksum" => '');		
		try {
			$resultOperators = $this->soapClient->__soapCall("getAllOperators", $requestParams);
			$listOperators = array();
			$chuncks = array_chunk($resultOperators, 10);
			foreach($resultOperators[0] as $theItem){
				$listOperators[] = $this->buildEntity($theItem);
			}
			return $listOperators;
		} catch (SoapFault $err) {
			print_r($err);
			die('Error while calling service!');
		}
	}
	
	public function buildEntity($theItem){
		// create country object
		$theCountry = new Country(
			null,
			$theItem->country_name,
			$theItem->country_iso_code3				
		);			
		// create operator object
		$theOperator = new Operator(
			null, 
			$theItem->OperatorName,
			$theItem->OperatorID,
			$theCountry
		);	

		return $theOperator;
	}

	public function save(Operator $theOperator){
		// save country
		// @todo maybe add some validation to sanitize values 
		// before inserting into database???
		$insertCountryQuery = "INSERT INTO countries (name, iso_code) 
			VALUES (
				'{$theOperator->getCountry()->getName()}', 
				'{$theOperator->getCountry()->getIso()}'
			)";
		
		// save country
		$countryId = null;
		if($this->DbConnection->query($insertCountryQuery) === false) {
			return false; // maybe a more relevant message???
		}
		$countryId = mysqli_insert_id($this->DbConnection);

		if(is_null($countryId) || $countryId <= 0) {
			return false;
		}		
		
		// save operator
		$insertOperatorQuery = "INSERT INTO operators (name, external_id, country_id) 
			VALUES (
				'{$theOperator->getName()}', 
				'{$theOperator->getExternalId()}', 
				'{$countryId}'
			)";

		if($this->DbConnection->query($insertOperatorQuery) === false) {
			return false; // maybe a more relevant message???
		}

		// close connection and return
		$this->DbConnection->close();
		
		return true;
	}
}