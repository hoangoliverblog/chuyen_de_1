<?php

    class Update extends Controller
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
            $this->view('Update_View',$data=[
            ]);

        }      

        public function edit_map($id)
        {
            $data = json_decode($this->Mapmodel->get_map_id($id));

            $this->view('Update_View',$data=[
                'data'=> $data ,
              'id'=>$id
            ]);
        }
        
        public function update_map($id)
        {

                $name_map = $this->validatedata($_POST['name_map']);
                $address_map = $this->validatedata($_POST['address_map']);
                $lat = $this->validatedata($_POST['lat_map']);
                $lng = $this->validatedata($_POST['lng_map']);
                $type_map = $this->validatedata($_POST['type_map']);
                $img_map = $this->validatedata($_POST['img_map']);

                $kq = json_decode($this->Mapmodel->update_map($name_map,$address_map,$lat,$lng,$type_map,$img_map,$id),true);

                if($kq === true)
                {
                    header('Location:http://localhost/chuyen_de_1/');
                }
                else
                {
                    header('Location:http://localhost/chuyen_de_1/Update');
                }

        }
        
    }

?>