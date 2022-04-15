<?php

declare(strict_types=1);
namespace App\Services;

use App\Model\ArticleModel;
use App\Model\CommentModel;
use DateTime;

class CommentService
{


    private CommentModel $comment;
    private array $error;

    public function __construct()
    {
        $this->comment = new CommentModel();
        $this->error = [];
        $_SESSION['status'] = true;
        $_SESSION['user_id'] = 1;
    }

    /**
     * Va verifier si le formulaire a été executé, si oui on appelle une fonction de Comment pour en ajouter un nouveau à la bdd
     * @return void
     */
    public function addComment(int $articleId)
    {
        if(isset($_POST['btn-comment'])) {
            //on regarde si l'utilisateur est connecté
            if ($_SESSION['status'] == true) {
                //on regarde si le commentaire est non null
                if (!empty($_POST['comment'])) {
                    $comment = htmlentities($_POST['comment']);
                    $status = 1;
                    $this->comment->addComment($articleId, $comment, $status, $_SESSION['user_id']);
                    $this->error["message"] = "Félicitation, votre message a été pris en compte et est en cours de vérification !!";
                    $this->error["status"] = "success";
                } else{
                    $this->error["message"] = "Veuillez remplir le champs commentaire !";
                    $this->error["status"] = "danger";
                }
            } else {
                $this->error["message"] = "Veuillez vous connectez pour poster un commentaire !";
                $this->error["status"] = "danger";
            }
        }
    }
    public function getMessage()
    {
        if(!empty($this->error)) {
            return "<div class=\"alert alert-" . $this->error['status'] . "\"role=\"alert\">" . $this->error["message"] . "</div>";
        } else {
            return  '';
        }
    }
}