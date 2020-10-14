<?php 
	/**
	 * 
	 */
	class Controller
	{
		
		function __construct()
		{
			
		}

		public function model($model){

			require_once "./mvc/Model/".$model.".php";

			return new $model ;

		}

		public function view($view,$data=[]){

			require_once "./mvc/View/".$view.".php";
			
		}

		public function validateTime($date){

		    return date('F j, Y, g:i a', strtotime($date));

		 }

		 public function validatetext($text, $limit = 400){

		    $text = $text. " ";
		    $text = substr($text, 0, $limit);
		    $text = substr($text, 0, strrpos($text, ' '));
		    $text = $text.".....";

		    return $text;
		 }

		 public function validatedata($data){

		    $data = trim($data);
		    $data = stripcslashes($data);
		    $data = htmlspecialchars($data);

		    return $data;
		 }
		 
		public function setsession($session){

			$_SESSION['useracount'] = $session ;
		}

		public function getsession(){

			$result = false ;
			if (isset($_SESSION['useracount'])) {
				$result = true ;
			}

			return $result ;
		}
		public function unsession(){
			unset($_SESSION['useracount']);
		}
	}


 ?>