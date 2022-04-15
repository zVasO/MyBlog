<?php

declare(strict_types=1);
namespace App\Controller;

use App\Services\UserService;

class LogInController
{


    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function showLoginPage()
    {
        $this->userService->logIn("dev.dyger@gmail.com", "motdepasse");
    }

}