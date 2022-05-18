<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Model\UserModel;
use App\Services\TwigService;

class AdminController
{

    public const BASE_URL = "/admin";
    public const COMMENTS_URL = self::BASE_URL . "/comments";
    public const VALIDATE_COMMENTS_URL = self::COMMENTS_URL . "/edit";
    public const DELETE_COMMENTS_URL = self::COMMENTS_URL . "/delete";
    public const ARTICLES_URL = self::BASE_URL . "/articles";
    public const EDIT_ARTICLE_URL = self::ARTICLES_URL . "/edit";
    public const DELETE_ARTICLE_URL = self::ARTICLES_URL . "/delete";
    public const ADD_ARTICLE_URL = self::ARTICLES_URL . "/add";
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
        echo $this->twig->getTwig()->render("admin/article.html.twig", [
            "session" => $_SESSION,
            "articles" => $this->articles->getAllArticles(),
            "users" => $this->users

        ]);
    }

    public function showCommentsManagementPage(): void
    {
        echo $this->twig->getTwig()->render("admin/comment.html.twig", [
            "session" => $_SESSION,
            "comments" => $this->comments->getAllCommentOrderedByStatus()
        ]);
    }

    public function deleteComment(int $commentId): void
    {
        //on supprime
        $this->comments->deleteComment($commentId);
        //on recharge la page
        header("Location:" . self::COMMENTS_URL);

    }

    public function validateComment(int $commentId, int $status): void
    {
        //on valide
        $this->comments->changeStatus($commentId, $status);
        //on recharge la page
        header("Location:" . self::COMMENTS_URL);
    }

    public function showEditArticlePage(int $id): void
    {
        echo $this->twig->getTwig()->render("admin/edit-article.html.twig", [
            "session" => $_SESSION,
            "article" => $this->articles->getArticleById($id)
        ]);
    }

    public function editArticle(int $id): void
    {
        $this->articles->updateArticleById($id, strip_tags(self::replaceAccent($_POST['title'])), strip_tags(self::replaceAccent($_POST['header'])), strip_tags(self::replaceAccent($_POST['content'])), strip_tags(self::replaceAccent($_POST['status'])));
        echo $this->twig->getTwig()->render("admin/edit-article.html.twig", [
            "session" => $_SESSION,
            "article" => $this->articles->getArticleById($id),
        ]);
    }

    private function replaceAccent(string $word): string
    {
        return str_replace("'", "\'", $word);
    }

    public function deleteArticle(int $id): void
    {
        $this->articles->deleteArticleById($id);
        header("Location:" . self::ARTICLES_URL);
    }

    public function showAddArticlePage(): void
    {
        echo $this->twig->getTwig()->render("admin/add-article.html.twig", [
        ]);
    }

    public function addArticle(): void
    {
        $this->articles->createArticle(strip_tags(self::replaceAccent($_POST['title'])), strip_tags(self::replaceAccent($_POST['header'])), strip_tags(self::replaceAccent($_POST['content'])), strip_tags(self::replaceAccent($_POST['status'])), $_SESSION['user_id']);
        header("Location:" . self::ARTICLES_URL);
    }
}
