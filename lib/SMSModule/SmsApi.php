<?php

class SmsApi
{
	public function sendSMS( $smsObj )
	{
		$json = $smsObj->getJsonData( $smsObj );
		return file_get_contents( Config::API_URL . $json );
	}
}