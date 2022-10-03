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

        if (password_verify($password, $result['password'])) {
            return $result;
        } else {
            return null;
        }

    }

}