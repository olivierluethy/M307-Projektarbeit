<?php
class Verleih{
    public $db;

    public function __construct(){
        $this->db=connectDatabase();
    }

    public function create($name, $email, $telefon, $raten, $creditPackage){
        $statement = $this->db->prepare("INSERT INTO `verleihe` (name, email, telefon, anzahl_raten, fk_kreditpaketID, created_at) VALUES 
        (:name, :email, :telefon, :anzahl_raten, :fk_kreditpaketID, :created_at)");
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':telefon', $telefon, PDO::PARAM_STR);
        $statement->bindParam(':anzahl_raten', $raten, PDO::PARAM_STR);
        $statement->bindParam(':fk_kreditpaketID', $creditPackage, PDO::PARAM_STR);
        $statement->bindParam(':created_at', date("Y/m/d"), PDO::PARAM_STR);
        $statement->execute();
    }

    public function update($name, $email, $telefon, $kredit_packet, $verleih_status, $id){
        $statement = $this->db->prepare('UPDATE `verleihe` SET name = :name, email = :email, telefon = :telefon, fk_kreditpaketID = :fk_kreditpaketID, verleih_status = :verleih_status
        WHERE verleihID = :id');
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefon', $telefon);
        $statement->bindParam(':fk_kreditpaketID', $kredit_packet);
        $statement->bindParam(':verleih_status', $verleih_status);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public function sync($id){
        $statement = $this->db->prepare('UPDATE `verleihe` SET verleih_status=1 WHERE verleihID = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
}