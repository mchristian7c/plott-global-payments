<?php

require_once('vendor/autoload.php');

use GlobalPayments\Api\ServiceConfigs\Gateways\GpEcomConfig;
use GlobalPayments\Api\Services\HostedService;
use GlobalPayments\Api\Entities\Exceptions\ApiException;

// configure client settings

function processResponse () {
    if (!isset($_POST['hppResponse'])) {
        return false;
    }



	$config = new GpEcomConfig();
	$config->merchantId =env('GP_MERCHANT_ID');
	// $config->accountId = "internet";
	$config->sharedSecret = env('GP_SECRET');
	$config->serviceUrl = env('GP_PAYMENT_URL');

	$service = new HostedService($config);

	$responseJson = $_POST['hppResponse'];
	try {
		// create the response object from the response JSON
		$parsedResponse = $service->parseResponse($responseJson, true);
	} catch (ApiException $e) {
		// TODO: add your error handling here
		// For example if the SHA1HASH doesn't match what is expected
		$parsedResponse = $e;
	}

	return $parsedResponse;
}