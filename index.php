<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\BlogController;
use App\Model\Article;
use App\Services\TwigService;
use App\Controller\HomeController;


if (str_ends_with($_SERVER['PHP_SELF'], "/home")) {
    $homeController = new homeController();
    $homeController->showHome();
} elseif (str_ends_with($_SERVER['PHP_SELF'], "/blog")) {
    $blogController = new BlogController();
    $blogController->showBlog();
}
