<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;

class HomeController
{
    private TwigService $twig;
    private const HOME_ARTICLES_NUMBER = 6;
    private Article $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new Article();

    }
    public function showHome()
    {

        echo $this->twig->getTwig()->render("home.html.twig", [
            "articles" => $this->articles->getArticlesByNumber(self::HOME_ARTICLES_NUMBER)
        ]);
    }
}
