<?php
namespace models;

use models\base\SQL;


class log extends SQL
{
    public function __construct()
    {
        parent::__construct('SLAM4_ToDoList', 'username');
    }

    /*public function login(string $login, string $password): mixed
    {
        $stmt = $this->pdo->prepare('SELECT * FROM USER WHERE username = ? LIMIT 1');
        $stmt->execute([$login]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            return $user;
        } else {
            return null;
        }
    }
    */
    //Création fonction pour intéragir avec la BDD

    /**
     * Authentifie une équipe en fonction de son login et mot de passe.
     * @param string $login
     * @param string $password
     * @return mixed|null
     */
    public function auth(string $username, string $password): mixed
    {
        $stmt = $this->pdo->prepare('SELECT * FROM USER WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $username = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $username['password'])) {
            return $username;
        } else {
            return null;
        }

    }

}