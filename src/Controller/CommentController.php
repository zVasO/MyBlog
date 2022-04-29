<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Services\CommentService;
use App\Services\TwigService;

class CommentController
{
    const ADD_COMMENT_URL = "/add-comment";

    private TwigService $twig;
    private ArticleModel $articles;
    private CommentModel $comments;


    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comments = new CommentModel();
        $this->commentForm = new CommentService();
    }

    /**
     * @param int $articleId
     * @return void
     */
    public function addComment(int $articleId):void
    {
        //on appelle notre fonction qui ajoute ou non le commentaire
        $this->commentForm->addComment($articleId);
        //on actualise la page
        $this->twig->getTwig()->render("article.html.twig", [
            "article" => $this->articles->getArticleById($idArticle),
            "comments" => $this->comment->getAllPublishedCommentByArticleId($idArticle),
            "user" => $this->user,
            "session" => $_SESSION
        ]);
    }
}
