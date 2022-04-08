<?php
require 'vendor/autoload.php';

use App\Model\Article;
use App\Service\TwigService;
use App\Controller\HomeController;

$twigService = new TwigService();
$homeController = new homeController($twigService);
$article = new Article();

$homeController->showHome($article->getAllArticles());