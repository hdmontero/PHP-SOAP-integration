<?php
namespace Models;

require_once('core.php');
customFileLoad('/repositories/OperatorsRepo.php');
customFileLoad('/interfaces/IFlattenable.php');

use Repositories\OperatorsRepository;
use Interfaces\IFlattenable;

class Operator implements IFlattenable {

	protected $id;
	protected $name;
	protected $externalId;
	protected $repo;
	protected $country;

	function __construct($id = null, $name = null, $externalId = null, Country $country = null){
		$this->id = $id;
		$this->name = $name;
		$this->externalId = $externalId;
		$this->country = $country;
		$this->repo = new OperatorsRepository();
	}
	
	public function getOperators() {
		$listOperators = $this->repo->findOperators();
		return $listOperators;;
	}

	public function flatten(){
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'external_id' => $this->externalId,
			'country' => $this->country->flatten()
		);
	}

	public function save(){
		return $this->repo->save($this);
	}
	
	public function set($id){
		$this->id = $id;
		return $this;
	}
	
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	public function setExternalId($externalId){
		$this->externalId = $externalId;
		return $this;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getExternalId(){
		return $this->externalId;
	}
	
	public function setCountry(Country $country){
		$this->country = $country;
		return $this;
	}
	
	public function getCountry(){
		return $this->country;
	}
}