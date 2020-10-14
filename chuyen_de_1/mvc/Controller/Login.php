<?php

class Login extends Controller{

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
        $this->view('LoginView',$data=[]);
    }

    public function checklogin()
    {
        if ($_SERVER['REQUEST_METHOD']==='POST') {

			if (isset($_POST['btnlogin'])) {
				
				$username = $this->validatedata($_POST['acount']);

				$userpass = $this->validatedata($_POST['password']);

				//$userpass = password_hash($userpassold,PASSWORD_DEFAULT);
                //$get_id_user = json_decode($this->Homemodel->get_user_id($username),true);

                $res = $this->Homemodel->getuser($username,$userpass);

                $kq = json_decode($res,true);
                
                $get_id_user = json_decode($this->Homemodel->get_id_user($username),true);

				if ( $kq === false) {

                    header("Location: http://localhost/chuyen_de_1/Login");
                    
					die();

					}
					else
					{

                        $_SESSION['useracount'] = $username;
                        
                        $_SESSION['id_user'] = $get_id_user;

						header("Location: http://localhost/chuyen_de_1/");
						die();	
					}
				}
			}
// ------------------------------------------
        
        
    }

    public function exitacount()
    {
        unset($_SESSION['useracount']);
        unset($_SESSION['id_user']);

			header('Location: http://localhost/chuyen_de_1/Login');

			die();
    }
}

?>