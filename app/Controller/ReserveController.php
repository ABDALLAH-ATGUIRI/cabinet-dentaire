<?php
require_once __DIR__ . '/../Model/Rdv.php';

class reserveController
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }

    public function crenus()
    {

        $post = new RDV();

        $result = $post->get_crenu();

        echo json_encode($result);
    }

    public function ajouter()
    {
        header('Access-Control-Allow-Methods: POST');

        $post = new rdv();
        $data = json_decode(file_get_contents("php://input"));

        var_dump($data);
        $data->date = strtotime($data->date);
        $post->sujet = $data->sujet;
        $post->id_user = $data->id_user;
        $post->date = date('y-m-d', $data->date);
        $post->time = date('H:i', $data->date);


        if (
            ($post->sujet) &&
            ($post->id_user) &&
            ($post->date)
        ) {
            if ($post->ajouter_rdv() === true) {
                echo json_encode(
                    array('message' => 'Post Created')
                );
            } else {
                echo json_encode(
                    array('message' => 'Post Not Created')
                );
            }
        } else {
            echo json_encode(
                array('message' => 'Post Not Created')
            );
        }
    }


    public function getAll()
    {
        header('Access-Control-Allow-Methods: GET');

        $post = new RDV();

        $data = json_decode(file_get_contents("php://input"));
        // var_dump($data);
        $result = $post->get_rdv($data->id);

        echo json_encode($result);
        // echo json_encode($data);
    }


    public function DELETE()
    {
        header('Access-Control-Allow-Methods: DELETE');

        $post = new RDV();

        $data = json_decode(file_get_contents("php://input"));
        // var_dump($data);
        $result = $post->delet_rdv($data->id);
        
        echo json_encode($result);
        // echo json_encode($data);
    }

    public function EDIT()
    { 
        header('Access-Control-Allow-Methods: POST');

        $post = new RDV();

        $data = json_decode(file_get_contents("php://input"));
       
        $result = $post->modifier_rdv($data);
        echo json_encode($result);
    }
}
