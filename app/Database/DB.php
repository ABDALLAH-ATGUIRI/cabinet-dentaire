<?php

class DB
{
    private $host = 'localhost';
    private $db_name = 'cabinet_dentaire';
    private $username = 'root';
    private $password = '';
    private $conn;


    public function  connect()
    {

        $this->conn = null;
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

        try {

            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name , $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }


}
