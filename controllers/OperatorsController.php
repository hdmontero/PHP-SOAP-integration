<?php
namespace Controllers;

require_once('core.php');
customFileLoad('/models/Operator.php');
customFileLoad('/models/Country.php');

use Models\Operator;
use Models\Country;

class OperatorsController {
	
	protected $model;
	
	public function __construct(){
		$this->model = new Operator();
	}
	
	public function getOperators() {
		$result = $this->model->getOperators();
		$jsonResponse = $this->prepareJsonResponse($result);		
		// json response
		echo json_encode($jsonResponse);
		die;
	}

	protected function prepareJsonResponse($theData){
		$listJsonArray = array();
		foreach ($theData as $theItem) {
			$listJsonArray[] = $theItem->flatten();
		}		
		return $listJsonArray;
	}

	public function addOperator(){
		$data = $_POST;
		// @todo maybe add some validation 
		// for data before saving??? it'd be nice :P
		$theCountry = new Country(
			null,
			$data['country_name'],
			$data['country_iso']
		);

		$this->model->setName($data['operator_name'])
			->setExternalId($data['operator_external_id'])
			->setCountry($theCountry);
		// save data
		$success = $this->model->save();
		$response = json_encode(array('error' => !$success));
		// send response
		echo $response;
		die();
	}
}