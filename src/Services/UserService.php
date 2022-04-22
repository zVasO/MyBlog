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

    /**
     * @return void
     */
    public function logIn(): void
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
                    //on affecte nos variables de session
                    $_SESSION['status'] = true;
                    $_SESSION['user_id'] = $result->id;
                    $_SESSION['email'] = $result->email;
                    $_SESSION['role'] = $result->Role_id;
                    $_SESSION['lastname'] = $result->lastname;
                    $_SESSION['firstname'] = $result->firstname;
                    //on redirige sur la page d'accueil
                    header("Location: ./home");
                } else {
                    echo MessageService::getMessage(MessageService::ALERT_DANGER,
                        "Mauvais mot de passe !");
                }
            } else {
                echo MessageService::getMessage(MessageService::ALERT_DANGER,
                    "Aucun compte ne correspond à cette addresse email !");
            }
        }
    }

    /**
     * @return void
     */
    private function ensureIsNotConnected(): void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] === true) {
            header("Location:./home");
        }
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->ensureIsNotConnected();
        //on regarde si le formulaire a été  validé
        if (isset($_POST['button-signup'])) {
            //on verifie si aucun user existe pour ce mail
            $email = htmlentities($_POST['email']);
            if ($this->user->ensureUserExist($email) === false) {
                if ($_POST['password'] === $_POST['confirmedPassword']) {
                    //on filtre nos données et crypte le mdp
                    $lastname = htmlentities($_POST['lastname']);
                    $firstname = htmlentities($_POST['firstname']);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    //on appelle la fonction qui ajoute l'utilisateur à la bdd
                    $this->user->insertUser($email, $password, $lastname, $firstname);

                    //on recupere l'id pour cet utilisateur
                    $id = $this->user->getIdByEmail($email);

                    //on affecte no variable de session
                    $_SESSION['status'] = true;
                    $_SESSION['user_id'] = $id;
                    $_SESSION['email'] = $email;
                    //le role lors de la création d'un compte est 1 soit user
                    $_SESSION['role'] = 1;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['firstname'] = $firstname;


                    //on redirige a la page d'accueil
                    header("Location: ./home");
                } else {
                    echo MessageService::getMessage(MessageService::ALERT_DANGER,
                        "Les mots de passe ne correspondent pas !");
                }
            } else {
                echo MessageService::getMessage(MessageService::ALERT_DANGER,
                    "Un compte est déja lié a cet email !!");
            }
        }
    }

    /**
     * @return void
     */
    public function signOut(): void
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['status']);
        unset($_SESSION['role']);
        unset($_SESSION['lastname']);
        unset($_SESSION['firstname']);
    }

}
