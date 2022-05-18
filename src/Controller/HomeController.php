<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use App\Services\MessageService;
use App\Services\TwigService;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{
    private const HOME_ARTICLES_NUMBER = 6;
    public const BASE_CONTACT_FORM_URL = "/contact";
    private TwigService $twig;
    private ArticleModel $articles;
    private MessageService $message;
    private CommentModel $comments;

    public function __construct()
    {
        $this->twig = TwigService::getInstance();
        $this->articles = new ArticleModel();
        $this->comments = new CommentModel();

    }

    /**
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function showHome(): void
    {

        echo $this->twig->getTwig()->render("home.html.twig", [
            "articles" => $this->articles->getArticlesByNumber(self::HOME_ARTICLES_NUMBER),
            "comments" => $this->comments,
            "session" => $_SESSION
        ]);
    }

    /**
     * @return void
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function sendMail():void
    {
        // function mail(string $to, string $subject, string $message, array|string $additional_headers, string $additional_params): bool {}
        $headers = array(
            'From' => $_POST['email'],
            'Reply-To' => $_POST['email'],
            'X-Mailer' => 'PHP/' . phpversion()
        );
        $mail = mail($_ENV["EMAIL_RECEIPTER"], $_POST["subject"], $_POST["message"] . "\n téléphone : ". $_POST["phone"], $headers);
        if ($mail === true) {
            $message = "Votre message a bien été envoyé !";
            $code = MessageService::ALERT_SUCCESS;
        } else {
            $message = "Une erreur est survenue, veuillez réessayer";
            $code = MessageService::ALERT_DANGER;
        }
        echo $this->twig->getTwig()->render("home.html.twig", [
            "articles" => $this->articles->getArticlesByNumber(self::HOME_ARTICLES_NUMBER),
            "comments" => $this->comments,
            "session" => $_SESSION,
            "message" => MessageService::getMessage($code, $message)
        ]);
    }
}
