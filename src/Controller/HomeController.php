<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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

    /**
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showHome()
    {

        echo $this->twig->getTwig()->render("home.html.twig", [
            "articles" => $this->articles->getArticlesByNumber(self::HOME_ARTICLES_NUMBER)
        ]);
    }
}
