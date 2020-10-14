<?php 

class Resgister extends Controller{

    protected $Homemodel ;

    public function __construct()
    {
        $this->Homemodel = $this->model('HomeModel');
        if(isset($_SESSION['useracount'])){
            header('Location: http://localhost/chuyen_de_1/');
        }
    }

    public function New()
    {
        $this->view('ResgisterView',$data=[]);
    }

    public function adduser()
    {
        if(isset($_POST['btndangki'])){
            $name_user = $this->validatedata($_POST['name_user']);
            $acount_user = $this->validatedata($_POST['acount_user']);
            //prosess password
            $pass_user = $this->validatedata($_POST['pass_user']);
            $old_pass_user = $this->validatedata($_POST['old_pass_user']);

            if($pass_user === $old_pass_user){
                $new_pass = password_hash($old_pass_user,PASSWORD_DEFAULT);
            }


            $email_user = $this->validatedata($_POST['email_user']);
            $address_user = $this->validatedata($_POST['address_user']);

            
            $result = $this->Homemodel->createuser($name_user,$acount_user,$new_pass,$email_user,$address_user);

            $kq = json_decode($result,true);

            if($kq === true)
            {
                header('Location:http://localhost/chuyen_de_1/Login');
                die();
            }
            else
            {
                header('Location:http://localhost/chuyen_de_1/Resgister');
            }
        }
    }
}

?>