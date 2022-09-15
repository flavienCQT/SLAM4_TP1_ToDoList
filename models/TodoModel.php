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

    function supprimer($id = '1'){
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $stmt->execute([$texte]);
    }
}