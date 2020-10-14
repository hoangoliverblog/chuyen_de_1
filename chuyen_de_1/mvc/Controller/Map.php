<?php

    class Map extends Controller
    {
        protected $Mapmodel;

        public function __construct()
        {
            $this->Mapmodel = $this->model('MapModel');

            if(!$_SESSION['useracount'])
            {
                header('Location:http://localhost/chuyen_de_1/');
            }
        }

        public function New()
        {
            if(isset($_SESSION['id_user']))
            {
                $id_user = $_SESSION['id_user'] ;
            }

            $data = $this->Mapmodel->getdata($id_user);

            $map_arr = json_decode($this->Mapmodel->getdata($id_user));
            
            $this->view('MapView',$data=[
                'data'=> $data ,
                'map_data'=> $map_arr
            ]);

        }      
        

        
    }

?>