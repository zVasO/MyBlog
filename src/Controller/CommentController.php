<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Model\UserModel;
use App\Services\CommentService;
use App\Services\TwigService;

class CommentController
{
    const ADD_COMMENT_URL = "/add-comment";

    private TwigService $twig;
    private ArticleModel $articles;
    private CommentModel $comments;
    private CommentService $commentForm;
    private UserModel $user;


    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comments = new CommentModel();
        $this->commentForm = new CommentService();
        $this->user = new UserModel();

    }

    /**
     * @param int $articleId
     * @return void
     */
    public function addComment(int $articleId):void
    {
        //on appelle notre fonction qui ajoute ou non le commentaire
        $message = $this->commentForm->addComment($articleId);
        //on actualise la page
        echo $this->twig->getTwig()->render("article.html.twig", [
            "article" => $this->articles->getArticleById($articleId),
            "comments" => $this->comments->getAllPublishedCommentByArticleId($articleId),
            "user" => $this->user,
            "session" => $_SESSION,
            "message" => $message
        ]);
    }
}
