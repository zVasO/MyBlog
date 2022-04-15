<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ArticleController
{
    private TwigService $twig;
    private ArticleModel $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comment = new CommentModel();
        $this->blog =  new BlogController();
    }

    /**
     * @param int $idArticle
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showArticle(int $idArticle)
    {
        if ($this->articles->getArticleById($idArticle) !== false) {
            echo $this->twig->getTwig()->render("article.html.twig", [
                "article" => $this->articles->getArticleById($idArticle),
                "comments" => $this->comment->getAllPublishedCommentByArticleId($idArticle)
            ]);
        } else {
            $this->blog->showBlog();
        }

    }
}