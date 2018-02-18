<?php
namespace Helpers;

require_once('core.php');

use SoapClient as Soap;

class SoapHelper {

	protected $client;
	
	public static function getClient() {
		$opts = array('trace' => 1, 'exceptions' => 1, 'cache_wsdl' => WSDL_CACHE_NONE);
		return new Soap(SOAP_SERVICE_URL, $opts);
	}
}