<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Model\UserModel;
use App\Services\TwigService;

class AdminController
{

    private TwigService $twig;
    private ArticleModel $articles;
    private UserModel $users;
    private CommentModel $comments;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->users = new UserModel();
        $this->comments = new CommentModel();
    }

    public function showDashboard()
    {
        //todo donner les nombres d'inscrit, d'articles, de commentaires et de commentaire en attente
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION,
            "totalUsers" => $this->users->countTotalUsers()
        ]);
    }

    public function showArticlesManagementPage()
    {
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION
        ]);
    }

    public function showCommentsManagementPage()
    {
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION
        ]);
    }
}
