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

    public function logIn(string $email, string $password)
    {
        //on filter notre email
        $email = htmlentities($email);
        //on recupére les infos liées a cet email dans la bdd si il existe sinon un affecte notre erreur
        $result = $this->user->getUserByEmail($email);
        if ($result !== false) {
            //on verifie si nos mot de passe correspondent
            if (password_verify($password, $result->password)) {
                $this->error["status"] = "success";
                $this->error["message"] = "Connexion réussie !";
            } else {
                $this->error["status"] = "danger";
                $this->error["message"] = "Mauvais mot de passe !";
                echo "aie";
            }
        } else {
            $this->error["status"] = "danger";
            $this->error["message"] = "Aucun compte ne correspond à cette addresse email !";
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
            $this->error["status"] = "danger";
            $this->error["message"] = "Un compte est déja lié a cet email !!";
        }
    }
}