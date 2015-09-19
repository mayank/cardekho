<?php

class SmsModel
{
	private $name;
	private $mobile;
	private $message;
	
	public function setName( $name ){
		$this->name = $name;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setMobile( $mobile ){
		$this->mobile = $mobile;
	}
	
	public function getMobile( $mobile ){
		return $this->mobile;
	}
	
	public function getMessage(){
		return $this->message;
	}
	
	public function setMessage( $message ){
		$this->message = $message;
	}

	public function getJsonData()
	{
		return json_encode(
			array(
				'source' => $this->name."-".$this->mobile,
				'mobile' => $this->mobile,
				'message' => $this->message
		),true);
	}
}
