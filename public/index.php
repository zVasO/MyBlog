<?php
require '../vendor/autoload.php';
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


    $loader = new FilesystemLoader('../View/');
    $twig = new Environment($loader, [
        'cache' => '../cache',
    ]);
        echo $twig->render("temp.twig", [
        "herbalism" => "obsequious"
    ]);