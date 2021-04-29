<?php

class CreditController{
    public function refresh(){
        $pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('SELECT * FROM verleihe WHERE verleih_status=0');
        $statement->execute();
        $credits = $statement->fetchAll();

        require 'app/Views/viewCredit.view.php';
    }

    public function create(){
        $verleih = new Verleih();
        $title = '';
        $pdo = connectDatabase();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];

            $raten = $_POST['raten'];
            $creditPackage = $_POST['creditPackage'];

            $isValid=$verleih->create($name, $email, $telefon, $raten, $creditPackage);
            if($isValid==true){
                header('Location: http://localhost/uek_projektarbeit/credit/view'); // Besser: header('Location: http://localhost/deinProjekt/task);
            }else{
                //header('Location: http://localhost/uek_projektarbeit/credit/create');
                echo "<script>alert('Fehlerhafte Daten beim Erstellen des Verleihes')</script>";
            }
        }

        require 'app/Views/createCredit.view.php';
    }

    public function update(){
        $verleih = new Verleih();
        $id = $_GET['id'];

        $title = '';
        $pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $kredit_packet = $_POST['kredit_packet'];
            $verleih_status = $_POST['verleih_status'];

            $verleih->update($name, $email, $telefon, $kredit_packet, $verleih_status, $id);

            header('Location: http://localhost/uek_projektarbeit/credit/view');
        }else{
            $statement = $pdo->prepare('SELECT * FROM verleihe WHERE verleihID = :id');
            $statement->bindParam(':id', $id);
            $statement->execute();
            $credit = $statement->fetchAll();
        }
        require 'app/Views/editCredit.view.php';
    }

    public function sync(){
        $verleih = new Verleih();
        $id = $_GET['id'];

        $title = '';
        $pdo = connectDatabase();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare('UPDATE `verleihe` SET verleih_status=1 WHERE verleihID = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        // var_dump($statement);
        // var_dump($_POST);
        header('Location: http://localhost/uek_projektarbeit/credit/view');

        $statement = $pdo->prepare('SELECT * FROM verleihe WHERE verleihID = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $credit = $statement->fetchAll();

        require 'app/Views/editCredit.view.php';
    }
}