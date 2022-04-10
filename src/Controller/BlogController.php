<?php

namespace App\Controller;

use App\Model\Article;
use App\Services\TwigService;

class BlogController
{

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