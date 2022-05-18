<?php

declare(strict_types=1);
namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Services\TwigService;

class BlogController
{

    private TwigService $twig;
    private ArticleModel $articles;
    const BASE_URL = "/blog";

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comments = new CommentModel();
    }

    public function showBlog(): void
    {
        echo $this->twig->getTwig()->render("blog.html.twig", [
            "articles" => $this->articles->getAllArticles(),
            "comments" => $this->comments,
            "session" => $_SESSION

        ]);
    }
}
