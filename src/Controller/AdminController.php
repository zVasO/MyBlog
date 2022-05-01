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
    public const BASE_URL = "/admin";
    public const COMMENTS_URL = "/admin/comments";
    public const ARTICLES_URL = "/admin/articles";


    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->users = new UserModel();
        $this->comments = new CommentModel();
    }

    public function showDashboard(): void
    {
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION,
            "totalUsers" => $this->users->countTotalUsers(),
            "totalArticles" => $this->articles->countTotalArticles(),
            "totalPendingArticles" => $this->articles->countTotalPendingArticles(),
            "totalComments" => $this->comments->countTotalComments(),
            "totalPendingComments" => $this->comments->countTotalPendingComments()
        ]);
    }

    public function showArticlesManagementPage(): void
    {
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION
        ]);
    }

    public function showCommentsManagementPage(): void
    {
        echo $this->twig->getTwig()->render("admin/comment.html.twig", [
            "session" => $_SESSION,
            "comments" => $this->comments->getAllCommentOrderedByStatus()
        ]);
    }
}
