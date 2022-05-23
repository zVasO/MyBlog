<?php

declare(strict_types=1);

namespace App\Services;

use App\Model\CommentModel;

class CommentService
{


    private CommentModel $comment;
    private array $error;

    public function __construct()
    {
        $this->comment = new CommentModel();
        $this->error = [];
    }

    /**
     * Va verifier si le formulaire a été executé, si oui on appelle une fonction de Comment pour en ajouter un nouveau à la bdd
     * @param int $articleId
     * @return string|null
     */
    public function addComment(int $articleId): ?string
    {
        if (isset($_POST['btn-comment'])) {
            //on regarde si l'utilisateur est connecté
            if (isset($_SESSION['status']) && $_SESSION['status'] == true) {
                //on regarde si le commentaire est non null
                if (!empty($_POST['comment'])) {
                    $comment = strip_tags($_POST['comment']);
                    $status = 1;
                    $this->comment->addComment($articleId, $comment, $status, $_SESSION['user_id']);

                    return MessageService::getMessage(MessageService::ALERT_SUCCESS,
                        "Félicitation, votre message a été pris en compte et est en cours de vérification !!");
                } else {
                    return MessageService::getMessage(MessageService::ALERT_DANGER,
                        "Veuillez remplir le champs commentaire !");
                }
            } else {
                return MessageService::getMessage(MessageService::ALERT_DANGER,
                    "Veuillez vous connectez pour poster un commentaire !");
            }
        }
        return null;
    }
}
