<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;

class ArticleController
{
    private TwigService $twig;
    private Article $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new Article();
    }
    public function showArticle(int $idArticle)
    {
        echo $this->twig->getTwig()->render("article.html.twig", [
            "article" => $this->articles->getArticleById($idArticle)
        ]);
    }
}