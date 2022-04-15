<?php
session_start();
require 'vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\BlogController;
use App\Controller\HomeController;
use App\Controller\LogInController;

//on recupere les parametre de notre url
$components = parse_url($_SERVER['REQUEST_URI']);
if (isset($components['query'])) {
    parse_str($components['query'], $results);
    isset($results["id"]) ? $id = (int)$results["id"] : $id = 0;
}

//switch en fonction de l'uri, on donne la page demandée
switch ($_SERVER['QUERY_STRING']) {
    case ArticleController::BASE_URL :
        (new ArticleController())->showArticle($id);
        break;
    case "/blog":
        (new BlogController())->showBlog();
        break;
    case "/login":
        (new LogInController())->showLoginPage();
        break;
    case "/register":
        (new LogInController())->showRegisterPage();
        break;
    default:
        (new HomeController())->showHome();
}