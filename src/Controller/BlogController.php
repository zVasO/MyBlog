<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;

class BlogController
{

    private TwigService $twig;
    private Article $articles;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new Article();
    }

    public function showBlog()
    {
        echo $this->twig->getTwig()->render("blog.html.twig", [
            "articles" => $this->articles->getAllArticles()
        ]);
    }
}