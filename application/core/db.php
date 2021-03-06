<?php

class Db {
    private $servername = 'localhost';
    private $db_name = 'smartleads';
    private $username = 'root';
    private $pwd = '';

    function connectDB(){
        $conection = new PDO("mysql:host=$this->servername;dbname=$this->db_name",$this->username,$this->pwd);

        $sql = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR (100) NOT NULL,
        email VARCHAR (100) NOT NULL,
        text VARCHAR (500) NOT NULL);";
        
        $conection->exec($sql);
        
        return $conection;
    }

    function addSQL($params, $sql) {
        $connect = $this->connectDB();
        $statment = $connect->prepare($sql);
        return $statment->execute($params);
    }

    function getSQL($param=NULL, $sql, $all=false) {
        $connect = $this->connectDB();
        if(isset($param)){
            $statment = $connect->prepare($sql);
            $statment->execute($param);
            return $all ? $statment->fetchAll(PDO::FETCH_ASSOC) : $statment->fetch(PDO::FETCH_ASSOC);
        } else {
            $statment = $connect->query($sql);
            return $statment->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}