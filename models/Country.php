<?php

namespace Models;

require_once('core.php');
customFileLoad('/interfaces/IFlattenable.php');

use Interfaces\IFlattenable;

class Country implements IFlattenable {

	protected $id;
	protected $name;
	protected $iso;
	
	function __construct($id = null, $name = null, $iso = null){
		$this->id = $id;
		$this->name = $name;
		$this->iso = $iso;
	}

	public function flatten(){
		return array(
			'id' => $this->id,
			'name' => $this->name,
			'iso' => $this->iso,
		);
	}
	
	public function setId($id){
		$this->id = $id;
		return $this;
	}
	
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	public function setIso($iso){
		$this->iso = $iso;
		return $this;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getIso(){
		return $this->iso;
	}
}