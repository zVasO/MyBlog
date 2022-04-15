<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{
    private TwigService $twig;
    private const HOME_ARTICLES_NUMBER = 6;
    private ArticleModel $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comments = new CommentModel();

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
            "articles" => $this->articles->getArticlesByNumber(self::HOME_ARTICLES_NUMBER),
            "comments" => $this->comments
        ]);
    }
}
