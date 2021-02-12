<?php

require_once(__DIR__.'/bootstrap.php');
require_once(__DIR__.'/includes/dispatch.php');

if (validate()) {
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
