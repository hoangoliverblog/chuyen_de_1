<?php

    class Add_map extends Controller
    {
        protected $Mapmodel;

        public function __construct()
        {
            $this->Mapmodel = $this->model('MapModel');
        }

        public function New()
        {
            if($_SESSION['id_user'])
                {
                    $id_user = $_SESSION['id_user'];
                }else{
                    $id_user = '';
                }

            $data = $this->Mapmodel->getdata($id_user);
            
            $this->view('add_address_View',$data=[
                'data'=> $data 
            ]);

        }      
        
        public function add_address()
        {
          if ($_SERVER['REQUEST_METHOD']==="POST") {

            if(isset($_POST['btn_add_address']))
            {

                $name_map = $this->validatedata($_POST['name_map']);
                $address_map = $this->validatedata($_POST['address_map']);
                $lat_map = $this->validatedata($_POST['lat_map']);
                $lng_map = $this->validatedata($_POST['lng_map']);
                $type_map = $this->validatedata($_POST['type_map']);
                //$img_map = $this->validatedata($_POST['img_map']);
                if($_SESSION['id_user'])
                {
                    $id_user = $_SESSION['id_user'];
                }else{
                    $id_user = '';
                }
                

                
				$fomat = array('jpg','jpeg','png','gif');
				$file_name = $_FILES['img_map']['name'];
				$file_size = $_FILES['img_map']['size'];
				$file_temp = $_FILES['img_map']['tmp_name'];

				$div = explode('.',$file_name);
				$file_text = strtolower(end($div));
				//$uni_image = substr(password_hash($file_text,PASSWORD_DEFAULT),0,15).'.'.$file_text;
				$uni_image = substr(md5(time()),0,10).'.'.$file_text;
				$upload = "./public/lib/image/".$uni_image;

				// kiểm tra file_exits != $uni_image ==>, else erro
				move_uploaded_file($file_temp,$upload);
                
                $res = json_decode($this->Mapmodel->add_maps($id_user,$name_map,$address_map,$lat_map,$lng_map,$type_map,$uni_image),true);
                
                if($res === true)
                {
                    header('Location:http://localhost/chuyen_de_1/');
                }
                else
                {
                    header('Location:http://localhost/chuyen_de_1/Add_map');
                }
            }
        }
        }

        
    }

?>