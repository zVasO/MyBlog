<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\BlogController;
use App\Model\Article;
use App\Services\TwigService;
use App\Controller\HomeController;

//on recupere les parametre de notre url
$components = parse_url($_SERVER['REQUEST_URI']);
parse_str($components['query'], $results);


//switch en fonction de l'uri, on donne la page demandée
switch($_SERVER['QUERY_STRING']) {
    case "/article":
        (new ArticleController())->showArticle((int)$results["id"]);
        break;
    case "/blog":
        (new BlogController())->showBlog();
        break;
    default:
        (new HomeController())->showHome();
        break;
}