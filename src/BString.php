<?php
	
declare(strict_types=1);

namespace BerryString;

class BString{
	public $value;
	
	public function __construct($value){
		$this-value = $value;
	}
	
	
	public function __toString(){
		return $this->value;
	}
	
	public function toLower()
	{
		$this->value = mb_strtolower($this->value);
		
		return $this;
	}
	
	public function toUpper()
	{
		$this->value = mb_strtoupper($this->value);
		
		return $this;
	}
	
	
	public function length(){
		return mb_strlen($this->value);
	}
	
	public function slug($string){
		
	}
}