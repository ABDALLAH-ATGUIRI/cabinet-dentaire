<?php

require __DIR__ . '/../Database/DB.php';

class Connexion
{

    private $conn;
    private $table = 'user';


    public $nome;
    public $prenom;
    public $phone;
    public $email;
    public $naissance;
    public $id;
    private $code ;

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function read()
    {

        $query = 'SELECT *  FROM ' . $this->table . '';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }


    public function read_single()
    {

        $query = "SELECT *  FROM $this->table  WHERE id = ? LIMIT 0,1 ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1,$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        $this->nome = $row['nome'];
        $this->prenom = $row['prenom'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
        $this->naissance = $row['naissance'];
        $this->id = $row['id'];


        return true;
    }

    public function create()
    {
        // $query = 'INSERT INTO user SET nome = :nome, prenom = :prenom, phone = :phone , naissance = :naissance , id = :id';
        $query = "INSERT INTO $this->table(nome, prenom, email, phone, naissance, id) VALUES (:nome , :prenom , :email , :phone , :naissance , :id )";
        $stmt = $this->conn->prepare($query);


        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->prenom = htmlspecialchars(strip_tags($this->prenom));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->naissance = htmlspecialchars(strip_tags($this->naissance));
        $this->id = strtoupper($this->nome) . '-' . rand(10000, 99999);
        $this->code = md5($this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':naissance', $this->naissance);
        $stmt->bindParam(':id',  $this->code);

        if ($stmt->execute()) {
            return  $this->id ;;
        }else{
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
       
    }
}
