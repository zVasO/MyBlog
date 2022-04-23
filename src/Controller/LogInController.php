<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\TwigService;
use App\Services\UserService;

class LogInController
{

    private UserService $userService;
    private TwigService $twig;
    const LOGIN_URL = "/login";
    const REGISTER_URL = "/register";
    const SIGNOUT_URL = "/signout";

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
        echo $this->twig->getTwig()->render("register.html.twig", [
            "user" =>  $this->userService,
            "session" => $_SESSION
        ]);
    }

    public function signOut()
    {
        //on vide nos variables de session liées a la connexion
        $this->userService->signOut();
        //on renvoie a la page d'accueil
        header("Location: ./home");
    }

}
