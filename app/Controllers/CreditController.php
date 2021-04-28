<?php

class CreditController{
    public function refresh(){
        $pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('SELECT * FROM person');
        $statement->execute();
        $credits = $statement->fetchAll();

        require 'app/Views/viewCredit.view.php';
    }

    public function create(){
        $title = '';
        $pdo = connectDatabase();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];

            $raten = $_POST['raten'];
            $creditPackage = $_POST['creditPackage'];

            $statement = $pdo->prepare("INSERT INTO `person` (name, email, telefon) VALUES (:name, :email, :telefon)");
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':telefon', $telefon, PDO::PARAM_STR);
            $statement->execute();

            $id = $pdo->prepare("SELECT PersonID FROM person WHERE Name = $name");

            $statement = $pdo->prepare("INSERT INTO `verleih` (AnzahlRaten, fk_PersonID, fk_KreditPaketID) VALUES (:AnzahlRaten, :fk_PersonID, :fk_KreditPaketID)");
            $statement->bindParam(':AnzahlRaten', $raten, PDO::PARAM_STR);
            $statement->bindParam(':fk_PersonID', $id , PDO::PARAM_STR);
            $statement->bindParam(':fk_KreditPaketID', $creditPackage, PDO::PARAM_STR);
            $statement->execute();

            header('Location: http://localhost/uek_projektarbeit/credit/create'); // Besser: header('Location: http://localhost/deinProjekt/task);
        }

        require 'app/Views/createCredit.view.php';
    }

    public function update(){
        $title = '';
        $pdo = connectDatabase();

        $statement = $this->db->prepare('UPDATE `person` SET name = :name, email = :email, telefon = :telefon WHERE id = :id');
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':telefon', $telefon);
        $statement->execute();

        require 'app/Views/editCredit.view.php';
    }
}