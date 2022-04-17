<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\TwigService;

class AdminController
{

    private TwigService $twig;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
    }

    public function showDashboard()
    {
        echo $this->twig->getTwig()->render("admin/dashboard.html.twig", [
            "session" => $_SESSION
        ]);
    }
}
