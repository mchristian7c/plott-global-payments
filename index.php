<?php

require_once(__DIR__.'/bootstrap.php');
require_once(__DIR__.'/includes/dispatch.php');
require_once(__DIR__.'/includes/response.php');

if(isset($_POST) && !empty($_POST) && $_POST['hppResponse']) {
    $response = processResponse();

    require_once(__DIR__.'/includes/complete.php');
    
} else if (validate()) {
    try {
        $json = dispatch();
    } catch (Exception $e) {
        var_dump($e);
        exit;
    }

    require_once(__DIR__.'/includes/iframe.php');
} else {
    require_once(__DIR__.'/includes/form.php');
}
