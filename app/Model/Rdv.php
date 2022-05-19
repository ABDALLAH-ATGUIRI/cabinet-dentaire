<?php

require __DIR__ . '/../Database/DB.php';


class rdv
{

    private $conn;
    private $table = 'reservation';

    public $sujet;
    public $date;
    public $id_user;
    public $id_rvd;
    public $time;



    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->connect();
    }


    public function get_crenu()
    {
        $query = "SELECT `date` , `time` FROM $this->table WHERE `date` >= DATE(NOW()) ";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    public function ajouter_rdv()
    {

        $query = "INSERT INTO $this->table(sujet, id_user, date, time) VALUES (:sujet, :id_user, :date, :time)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':sujet', $this->sujet);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':time', $this->time);

        if ($stmt->execute()) {
            return true;
        }
    }



    public function get_rdv($id)
    {

        $query = "SELECT * FROM  $this->table WHERE `id_user` = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);


        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    public function delet_rdv($id)
    {

        $query = "DELETE  FROM  $this->table WHERE `Id_rdv` = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);


        if ($stmt->execute()) {
            return true;
        }
    }


    public function modifier_rdv($data)
    {
       var_dump($data);
        $query = "UPDATE $this->table SET  `sujet` = :message WHERE `Id_rdv` = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $data->id);
        $stmt->bindParam(':message', $data->sujet);
        if ($stmt->execute()) {
            return true;
        }
    }

}
