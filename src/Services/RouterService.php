<?php

namespace App\Services;

use App\Controller\AdminController;
use App\Controller\ArticleController;
use App\Controller\BlogController;
use App\Controller\HomeController;
use App\Controller\LogInController;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class RouterService
{


    public function __construct()
    {
    }

    /**
     * @return int|null
     */
    public static function getUrlIdParameter(): ?int
    {
        //on recupere les parametre de notre url
        $components = parse_url($_SERVER['REQUEST_URI']);
        if (isset($components['query'])) {
            parse_str($components['query'], $results);
            if (isset($results["id"])) {
                return (int)$results["id"];
            }
        }
        return 0;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public static function navigate()
    {
        $id = self::getUrlIdParameter();
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
            case "/signout":
                (new LogInController())->signOut();
                break;
            case "/admin":
                (new AdminController())->showDashboard();
                break;
            case "/admin/articles":
                (new AdminController())->showArticlesManagementPage();
                break;
            case "/admin/comments":
                (new AdminController())->showCommentsManagementPage();
                break;
            case "comment/":
                if ($_SERVER['REQUEST_METHOD'] === "POST") {
                    //TODO faire un commentcontroller et appeler la bonne action (suppirmer, ajouter)
                }
            default:
                (new HomeController())->showHome();
        }
    }
}
