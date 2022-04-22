<?php
session_start();
require 'vendor/autoload.php';

use App\Services\RouterService;

try {
    RouterService::navigate();
} catch (Exception $e) {
    echo $e;
}




