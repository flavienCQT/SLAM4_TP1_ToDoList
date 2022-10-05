<?php
namespace models;

use PDO;
use models\base\SQL;


class Log extends SQL
{
    public function __construct()
    {
        parent::__construct('user', 'username');
    }

    public function authh(string $username, string $password)
    {
        strip_tags($username);
        strip_tags($password);
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($password == $result['password']) {
            return $result;
        } else {
            return null;
        }
    }

    function VerifLogin(mixed $username)
    {
        strip_tags($username);
        $stmt = $this->pdo->prepare("SELECT `username` FROM user WHERE `username` = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result){ 
            return true;
        }else return false;
    }

    function createA(mixed $username, mixed $password, mixed $mail)
    {
        strip_tags($username);
        strip_tags($password);
        $stmt = $this->pdo->prepare("INSERT INTO utilisateur VALUES(null, ?, ?, ?)");
        $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT),$mail]);;      
    }

}