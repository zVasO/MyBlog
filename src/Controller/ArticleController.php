<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ArticleController
{
    private TwigService $twig;
    private Article $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new Article();
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
        echo $this->twig->getTwig()->render("article.html.twig", [
            "article" => $this->articles->getArticleById($idArticle)
        ]);
    }
}