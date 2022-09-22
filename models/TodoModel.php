<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function ajouterTodo($texte){
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $stmt->execute([$texte]);
    }

    function marquerCommeSupprimer($id){
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function create(mixed $nom, mixed $prenom, mixed $mail, mixed $password)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO USER VALUES(null, ?, ?, 0, ?, ?)");
            $result = $stmt->execute([$nom, $prenom, $mail, password_hash($password, PASSWORD_BCRYPT)]);

            if ($result) {
                return $this->getOne($this->pdo->lastInsertId());
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }

    
}