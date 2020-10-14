<?php

class Home extends Controller{

    protected $Homemodel ;

    public function __construct()
    {
        $this->Homemodel = $this->model('HomeModel');

        $this->Mapmodel = $this->model('MapModel');
    }

    public function New()
    {   
        $session_user = '';
        //$id = $_SESSION['id_user'] ;

        if(isset($_SESSION['useracount']))
        {
            $session_user = $_SESSION['useracount'];
        }

        if(isset($_SESSION['id_user']))
        {
            $session_id = $_SESSION['id_user'];

        }
        else{
            $session_id = '';
        }

        $all_maps = json_decode($this->Homemodel->all_maps($session_id));

        $this->view('HomeView',$data=[

            'session'=> $session_user,
            //'id_user'=> $_SESSION['id_user'],
            'all_map'=>$all_maps,
            'session_id' => $session_id

        ]);
    }

    public function Checklogin()
    {
        $this->view('login',$data=[

        ]);
    }

    public function delete_map($id)
    {

        $res = json_decode($this->Mapmodel->delete_map($id),true);            

        var_dump($res);

        if($res === true)
        {
            header('Location:http://localhost/chuyen_de_1/');
        }

    }
    
}

?>