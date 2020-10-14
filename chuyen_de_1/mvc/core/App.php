<?php 

	/**
	 * 
	 */
	class APP
	{
		protected $controller = "Home" ;

		protected $acction = "New" ;
		
		protected $param = [] ;

		function __construct()
		{
			//Home/New/1/2

			$arr = $this->getUrl();

			//xu ly controller

			if (file_exists('./mvc/Controller/'.$arr[0].'.php')) {

				$this->controller = $arr[0];

				unset($arr[0]) ;

			}

			require_once "./mvc/Controller/".$this->controller.".php";

			$this->controller = new $this->controller ;

			//xu ly acction 

			if (isset($arr[1])) {
				
				if (method_exists($this->controller , $arr[1])) {
					
					$this->acction = $arr[1];
				}
				unset($arr[1]);
			}

			//xu ly param

			if (isset($arr)) {

				$this->param = array_values($arr);

			}else{

				$this->param = [] ;
			}
			
			call_user_func_array([$this->controller,$this->acction],$this->param);
		}

		function getUrl(){

			if (isset($_GET['url'])) {
				
				$url = explode('/', filter_var(trim($_GET['url'])));

			}
			else
			{
				$url = explode('/', filter_var(trim($this->controller)));
			}
			return $url;
		}

	}

 ?>