<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\TwigService;
use App\Services\UserService;

class LogInController
{

    private UserService $userService;
    private TwigService $twig;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->twig = TwigService::getInstance();
    }

    public function showLoginPage()
    {
        echo $this->twig->getTwig()->render("login.html.twig", [
            "user" =>  $this->userService,
            "session" => $_SESSION
        ]);
    }

    public function showRegisterPage()
    {
        $this->userService->register("test@admin.com", "motdepasse", "ADMIN", "ADMIN");
    }

}
