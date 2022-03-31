<?php
require 'vendor/autoload.php';

use App\Service\TwigService;
use App\Controller\HomeController;

$twigService = new TwigService();
$homeController = new homeController($twigService);
$homeController->showHome();