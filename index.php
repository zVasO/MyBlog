<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\BlogController;
use App\Model\Article;
use App\Services\TwigService;
use App\Controller\HomeController;



if (str_ends_with($_SERVER['PHP_SELF'], "index.php")) {
    $homeController = new homeController();
    $homeController->showHome();
} elseif (str_ends_with($_SERVER['PHP_SELF'], "/blog")) {
    $blogController = new BlogController();
    $blogController->showBlog();
} elseif (str_ends_with($_SERVER['PHP_SELF'], "/article")) {
    $articleController = new ArticleController();
    $articleController->showArticle((int)$_GET['id']);
}
