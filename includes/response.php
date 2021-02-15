<?php

require_once('vendor/autoload.php');

use GlobalPayments\Api\ServiceConfigs\Gateways\GpEcomConfig;
use GlobalPayments\Api\Services\HostedService;
use GlobalPayments\Api\Entities\Exceptions\ApiException;

function processResponse () {
    if (!isset($_POST['hppResponse'])) {
        return false;
    }

	$config = new GpEcomConfig();
	$config->merchantId = env('GP_MERCHANT_ID');
	$config->sharedSecret = env('GP_SECRET');
	$config->serviceUrl = env('GP_PAYMENT_URL');

	$service = new HostedService($config);

	$responseJson = $_POST['hppResponse'];

	try {
		$parsedResponse = $service->parseResponse($responseJson, true);
	} catch (ApiException $e) {
		$parsedResponse = $e;
	}

	return $parsedResponse;
}