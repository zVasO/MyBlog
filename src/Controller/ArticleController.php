<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Model\UserModel;
use App\Services\CommentService;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ArticleController
{
    const BASE_URL = "/article";
    private TwigService $twig;
    private ArticleModel $articles;
    private CommentModel $comment;
    private BlogController $blog;
    private CommentService $form;
    private UserModel $user;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comment = new CommentModel();
        $this->form = new CommentService();
        $this->user = new UserModel();
    }

    /**
     * @param int $idArticle
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showArticle(int $idArticle): void
    {
        if ($this->articles->getArticleById($idArticle) !== false) {
            echo $this->twig->getTwig()->render("article.html.twig", [
                "article" => $this->articles->getArticleById($idArticle),
                "comments" => $this->comment->getAllPublishedCommentByArticleId($idArticle),
                "user" => $this->user,
                "session" => $_SESSION
            ]);
        } else {
            header("Location: ./blog");
        }

    }

}
