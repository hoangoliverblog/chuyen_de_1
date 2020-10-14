<?php

    class Ajax extends Controller
    {
        protected $Mapmodel;

        public function __construct()
        {
            $this->Mapmodel = $this->model('MapModel');
        }
        
        public function check_user(){

            $user_ac = $_POST['user_ac'];

            $kq = json_decode($this->Mapmodel->ajax_check_user($user_ac),true);

            if($kq === true)
            {
                echo "<p style='color:red'>Tài khoản đã tồn tại</p>" ;
            }else{
                echo "<p style='color:green'>Tài khoản hợp lệ</p>" ;
            }
            

        }
    }

?>