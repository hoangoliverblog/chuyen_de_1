<?php

class HomeModel extends DB{

    public function __construct()
    {
        parent::__construct();
    }

    public function checklogin($acount,$pass)
    {

        $sql = "SELECT * FROM users where acount_user = '$acount' and pass_user = '$pass' and status_user = 'active'";

        $query = mysqli_query($this->con,$sql);

        $row = mysqli_num_rows($query);

        $result = false;

        if($row > 0)
        {
            $result = true ;
        }

        return json_encode($result);
    }

    public function createuser($name_user,$acount_user,$new_pass,$email_user,$address_user){

		$sql = "INSERT INTO `users`(`id_user`, `loai_acount_user`, `name_user`, `acount_user`, `pass_user`, `email_user`, `phone_user`, `address_user`, `gioi_tinh_user`, `age_user`,`id_map`, `otp_user`, `status_user`) 
        VALUES (null,'My website','$name_user','$acount_user','$new_pass','$email_user','','$address_user','','','','','active')";

		$query = mysqli_query($this->con,$sql);

		$result = false ;

		if ($query) {
			
			$result = true ;
		}

		return json_encode($result);

    }
    

    public function getuser($username,$userpass){

		$result = false ;

		$sql = "SELECT * FROM `users` WHERE acount_user = '$username'";

		$query = mysqli_query($this->con,$sql);

		$num = mysqli_num_rows($query);

		if ($query) {

			while($row = mysqli_fetch_assoc($query)){

			$hash = $row['pass_user'];	

		};
	
		}

		if (isset($hash)) {
			
			if (password_verify($userpass, $hash)) {
		    $result = true ;
			}	
		}
		

		return json_encode($result) ;


	}

	public function get_id_user($username){

		$sql ="SELECT users.id_user FROM users where acount_user = '$username'";

		$query = mysqli_query($this->con,$sql);

		$mang = [];

		while($row = mysqli_fetch_assoc($query))
		{
			$mang = $row['id_user'] ;
		}

		return json_encode($mang);


	}

	public function all_maps($id){
		
		$sql = "SELECT * FROM maps WHERE id_user = '$id'";

		$query = mysqli_query($this->con,$sql);

		$mang = [];

		while($row = mysqli_fetch_assoc($query))
		{
			$mang[] = $row ;
		}

		return json_encode($mang);
	}
}


?>