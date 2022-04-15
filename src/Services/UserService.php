<?php

declare(strict_types=1);

namespace App\Services;

use App\Model\UserModel;

class UserService
{

    private UserModel $user;
    private array $error;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->error = [];
    }

    public function logIn()
    {
        $this->ensureIsNotConnected();
        if (isset($_POST['button-login'])) {
            //on filter notre email
            $email = htmlentities($_POST['email']);
            //on recupére les infos liées a cet email dans la bdd si il existe sinon un affecte notre erreur
            $result = $this->user->getUserByEmail($email);
            if ($result !== false) {
                //on verifie si nos mot de passe correspondent
                if (password_verify($_POST['password'], $result->password)) {
                    //on affecte notre message
                    echo MessageService::getMessage(MessageService::ALERT_SUCCESS,
                        "Connexion réussie !");
                    //on affecte nos variables de session
                    $_SESSION['status'] = true;
                    $_SESSION['user_id'] = $result->id;
                    $_SESSION['email'] = $result->email;

                } else {
                    echo MessageService::getMessage(MessageService::ALERT_DANGER,
                        "Mauvais mot de passe !");
                }
            } else {
                echo MessageService::getMessage(MessageService::ALERT_DANGER,
                    "Aucun compte ne correspond à cette addresse email !");
            }
        } else {
            echo MessageService::getMessage(MessageService::ALERT_DANGER,
                "Veuillez remplir le formulaire correctement");
        }
    }

    public function register(string $email, string $password, string $lastname, string $firstname)
    {
        //on verifie si aucun user existe pour ce mail
        if ($this->user->ensureUserExist($email) === false) {
            //on filtre nos données et crypte le mdp
            $email = htmlentities($email);
            $lastname = htmlentities($lastname);
            $firstname = htmlentities($firstname);
            $password = password_hash($password, PASSWORD_BCRYPT);
            $this->user->insertUser($email, $password, $lastname, $firstname);
            //on appelle la fonction qui ajoute l'utilisateur à la bdd

        } else {
            echo MessageService::getMessage(MessageService::ALERT_DANGER,
                "Un compte est déja lié a cet email !!");
        }
    }

    public function signOut()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['status']);
    }

    private function ensureIsNotConnected()
    {
        if ($_SESSION['status'] === true) {
            header("Location:./home");
        }
    }

}
