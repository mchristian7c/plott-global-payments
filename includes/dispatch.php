<?php

use Rakit\Validation\Validator;

require_once(__DIR__.'/../classes/GlobalPaymentsService.php');

function validate () {
    if (!isset($_POST['submitted'])) {
        return false;
    }

    $validator = new Validator;

    $validation = $validator->validate($_POST, [
        'customer_name'         => 'required',
        'customer_email'        => 'required|email',
        'customer_phone'        => 'required',
        'business_name'         => 'required',
        'invoice_number'        => 'required',
        'invoice_amount'        => 'required|numeric',
        'shippingAddress.address_line_1' => 'required',
        'shippingAddress.town'  => 'required',
        'shippingAddress.postcode' => 'required|max:8|min:5',
        'billingAddress.address_line_1'    => 'required_unless:billing_copy,1',
        'billingAddress.town'   => 'required_unless:billing_copy,1',
        'billingAddress.postcode' => 'required_unless:billing_copy,1|max:8|min:5',
    ]);

    if ($validation->fails()) {
        $errors = $validation->errors();
        return false;
    }

    return true;
}

function dispatch () {
    $GlobalPaymentsService = new GlobalPaymentsService(
        env('GP_MERCHANT_ID'),
        env('GP_ACCOUNT_ID'),
        env('GP_SECRET'),
        env('GP_PAYMENT_URL')
    );

    return $GlobalPaymentsService->generateToken($_POST);
}