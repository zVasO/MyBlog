<?php
session_start();
require 'vendor/autoload.php';

use App\Services\RouterService;

RouterService::navigate();




