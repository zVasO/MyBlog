<?php
require 'vendor/autoload.php';

use App\Model\Article;
use App\Services\TwigService;
use App\Controller\HomeController;

$homeController = new homeController();
$article = new Article();
var_dump($article->getAllArticles());
die;
$homeController->showHome($article->getAllArticles());