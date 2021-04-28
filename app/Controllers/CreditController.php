<?php

class CreditController{
    public function refresh(){
        $pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('SELECT * FROM credits');
        $statement->execute();
        $tasks = $statement->fetchAll();

        var_dump($tasks);

        require 'app/Views/viewCredit.view.php';
    }

    public function create(){
        $title = '';
        $pdo = connectDatabase();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];

            $statement = $pdo->prepare("INSERT INTO `tasks` (title) VALUES (:title)");
            $statement->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
            $statement->execute();

            header('Location: ../tasks'); // Besser: header('Location: http://localhost/deinProjekt/task);
        }

        require 'app/Views/createCredit.view.php';
    }

    public function update(){
        require 'app/Views/editCredit.view.php';
    }
}