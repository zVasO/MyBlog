<?php

declare(strict_types=1);
namespace App\Controller;

use App\Services\TwigService;

class HomeController
{
    private TwigService $twig;
    public function __construct()
    {
        $this->twig = TwigService::getInstance();
    }
    public function showHome(array $articles)
    {
        echo $this->twig->getTwig()->render("home.html.twig", [
            "articles" => $articles
        ]);
    }
    public function showBlog(array $articles)
    {
        echo $this->twig->getTwig()->render("blog.html.twig", [
            "articles" => $articles
        ]);
    }
}
