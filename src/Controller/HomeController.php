<?php

declare(strict_types=1);
namespace App\Controller;

use App\Service\TwigService;

class HomeController
{
    private TwigService $twig;
    public function __construct()
    {
        $this->twig = TwigService::getInstance();
    }
    public function showHome()
    {
        echo $this->twig->getTwig()->render("home.html.twig");
    }
}
