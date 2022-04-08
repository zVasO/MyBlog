<?php
session_start();
require 'vendor/autoload.php';

use App\Model\Article;
use App\Services\TwigService;
use App\Controller\HomeController;


var_dump($_SERVER);
if (str_ends_with($_SERVER['PHP_SELF'], "index.php")) {
    $homeController = new homeController();
    $homeController->showHome();
}


