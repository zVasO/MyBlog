<?php
session_start();
require 'vendor/autoload.php';

use App\Services\RouterService;
use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();
$dotenv->load(__DIR__. DIRECTORY_SEPARATOR .'.env');
try {
    RouterService::navigate();
} catch (Exception $e) {
    echo $e;
}





