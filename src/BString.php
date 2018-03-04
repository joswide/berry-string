<?php
	
declare(strict_types=1);

namespace BerryString;

class BString{
	public $value;
	
	public function __construct($value){
		$this->value = $value;
	}
	
	
	public function __toString(){
		return $this->value;
	}
	
	public function lower() {
		$this->value = mb_strtolower($this->value);
		
		return $this;
	}
	
	public function upper() {
		$this->value = mb_strtoupper($this->value);
		
		return $this;
	}
	
	
	public function append($toAppend){
		$this->value = $this->value . (string) $toAppend;
	}
	
	public function prepend($toPrepend){
		$this->value = (string) $toPrepend . $this->value;
	}
	
	
	public function length() {
		return mb_strlen($this->value);
	}
	
	public function substr(int $start, int $length = null) {
		$this->value = mb_substr($this->value, $start, $length);
		
		return $this;
	}
	
	public function replaceChar($original, $replacement) {
		$this->value = mb_ereg_replace("[".$original."]", $replacement, $this->value);
		
		
		return $this;
	}
	
	
	public function getClone() {
		return clone $this;
	}
	
	public function slug() {
		$slug = new \BerrySlug\Slug();
		
		$this->value = $slug->slug($this->value);
		
		return $this;
	}
	
	
	public function isSameLength($compare) {
		if ($compare instanceof self){
			return ( $this->length() === $compare->length() );
		}
		
		if (is_string($compare)){
			return ($this->length() == mb_strlen($compare));
		}
		
		return false;
	}
	
	
	
	
}