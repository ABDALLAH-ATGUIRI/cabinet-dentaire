<?php
require_once __DIR__ . '/../Model/Connexion.php';

class userController
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');
        header("Access-Control-Allow-Headers: *");
    }



    public function create()
    {
        header('Access-Control-Allow-Methods: POST');

        $post = new Connexion();
        $data = json_decode(file_get_contents("php://input"));
        $post->nome = $data->nome;
        $post->prenom = $data->prenom;
        $post->phone = $data->phone;
        $post->naissance = $data->naissance;
        $post->email = $data->email;
        if (
            ($post->nome) &&
            ($post->prenom) &&
            ($post->phone) &&
            ($post->naissance) &&
            ($post->email)
        ) {
            if ($id = $post->create()) {
                echo json_encode(
                    array('id' => $id)
                );
            } else {
                echo json_encode(
                    array('message' => 'Post Not Created')
                );
            }
        }
    }

    public function read()
    {


        $post = new Connexion();

        $result = $post->read();

        $num = $result->rowCount();

        if ($num > 0) {

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                extract($row);

                $post_item = array(
                    'nome' => $nome,
                    'prenom' => $prenom,
                    'email' => $email,
                    'phone' => $phone,
                    'naissance' => $naissance,
                    'id' => $id
                );
            }
  
            echo json_encode($post_item);
        } else {
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    }

    public function read_single()
    {

        $post = new Connexion();
        $post->id = isset($_POST['id']) ? $_POST['id'] = md5($_POST['id']) : die();

        $post->read_single();

        $post_arr = array(
            'Id_user' => $post->id,
            'nome' => $post->nome,
            'prenom' => $post->prenom,
            'email' => $post->email,
            'phone' => $post->phone,
            'naissance' => $post->naissance,
        );


        echo json_encode($post_arr);
    }

    // public function rdv()
    // {
    //     $post = new Connexion();
    //     $data = json_decode(file_get_contents("php://input"));
    //     $post->date = $data->date;
    //     $post->sujet = $data->sujet;
    //     $post->id     = $data->id;
    //     $post->time = $data->time;
    //     if (
    //         ($post->date) &&
    //         ($post->sujet) &&
    //         ($post->id) &&
    //         ($post->time)

    //     ) {
    //         if ($id = $post->create()) {
    //             echo json_encode(
    //                 array('id' => $id)
    //             );
    //         } else {
    //             echo json_encode(
    //                 array('message' => 'Post Not Created')
    //             );
    //         }
    //     }
    // }
}
