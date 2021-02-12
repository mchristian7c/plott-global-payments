<?php

use GlobalPayments\Api\Entities\Address;
use GlobalPayments\Api\Entities\Enums\AddressType;
use GlobalPayments\Api\ServiceConfigs\Gateways\GpEcomConfig;
use GlobalPayments\Api\HostedPaymentConfig;
use GlobalPayments\Api\Entities\HostedPaymentData;
use GlobalPayments\Api\Entities\Enums\HppVersion;
use GlobalPayments\Api\Entities\Exceptions\ApiException;
use GlobalPayments\Api\Services\HostedService;

class GlobalPaymentsService {

    private $config;
    private $service;

    private const CURRENCY = 'GBP';

    public function __construct(string $merchantId, string $accountId, string $secret, string $serviceUrl)
    {
        $this->config = new GpEcomConfig();
        $this->config->merchantId = $merchantId;
        $this->config->accountId = $accountId;
        $this->config->sharedSecret = $secret;
        $this->config->serviceUrl = $serviceUrl;

        $this->config->hostedPaymentConfig = new HostedPaymentConfig();
        $this->config->hostedPaymentConfig->version = HppVersion::VERSION_2;
        $this->service = new HostedService($this->config);
    }

    public function generateToken(array $data)
    {
        $hostedPaymentData = $this->generateHostedPaymentData($data);
        $billingAddress = $this->generateAddressData($data['billing_copy'] ? $data['shippingAddress'] : $data['billingAddress']);
        $shippingAddress = $this->generateAddressData($data['shippingAddress']);

        try {
            return $this->service
                        ->charge($data['invoice_amount'])
                        ->withCurrency(self::CURRENCY)
                        ->withHostedPaymentData($hostedPaymentData)
                        ->withAddress($billingAddress, AddressType::BILLING)
                        ->withAddress($shippingAddress, AddressType::SHIPPING)
                        ->serialize();      
        } catch (ApiException $e) {
            return json_encode([
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function generateHostedPaymentData(array $data): HostedPaymentData
    {
        $hostedPaymentData = new HostedPaymentData();
        $hostedPaymentData->customerEmail = $data['customer_email'];
        $hostedPaymentData->customerPhoneMobile = $data['customer_phone'];
        $hostedPaymentData->addressesMatch = false;

        return $hostedPaymentData;
    }

    private function generateAddressData(array $addressArray): Address
    {
        $address = new Address();
        $address->streetAddress1 = $addressArray['address_line_1'];
        $address->streetAddress2 = $addressArray['address_line_2'] ?? '';
        $address->streetAddress3 = $addressArray['address_line_3'] ?? '';
        $address->city = $addressArray['town'];
        $address->postalCode = $addressArray['postcode'];
        $address->country = "826";

        return $address;
    }

}
