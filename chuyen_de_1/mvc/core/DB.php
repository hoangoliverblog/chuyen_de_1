<?php 

/**
 * 
 */
 class DB
{
	public $con ;

	protected $servername = "localhost" ;

	protected $username = "root" ;

	protected $pass = "";

	protected $dbname = "chuyen_de_1";

	public function __construct(){

		$this->con = mysqli_connect($this->servername,$this->username,$this->pass) ;

		mysqli_select_db($this->con,$this->dbname);
		
		mysqli_query($this->con,"SET NAMES 'utf8'");	
	}

	
}

 ?>