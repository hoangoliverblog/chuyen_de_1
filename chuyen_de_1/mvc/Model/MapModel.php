<?php
    class MapModel extends DB
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function getdata($id)
        {
            $mang = [];

            $sql = "SELECT * FROM `maps` WHERE id_user = '$id'";

            $query = mysqli_query($this->con,$sql); 

            $row = mysqli_num_rows($query);

            while($row = mysqli_fetch_assoc($query))
            {
                $mang[] = $row ;
            }
            
            return json_encode($mang);// cho thêm thằng true vào 

        }

        public function add_maps($id_user,$name_map,$address_map,$lat_map,$lng_map,$type_map,$uni_image)
        {
            $sql = "INSERT INTO `maps`(`id_map`, `id_user`, `name_map`, `address_map`, `lat`, `lng`, `type_map`, `img_map`) 
            VALUES (null,'$id_user','$name_map','$address_map','$lat_map','$lng_map','$type_map','$uni_image')";

            $query = mysqli_query($this->con,$sql);

            $result = false ;

            if ($query) {

                $result = true;
            }

            return json_encode($result);
        }

        // LẤY sản phẩm theo id để update
	public function get_map_id($id)
	{
		$sql = "SELECT * FROM maps WHERE id_map = '$id'";

		$query = mysqli_query($this->con,$sql);

		$mang = [];

		while($row = mysqli_fetch_assoc($query))
		{
			$mang[] = $row ;
		}

		return json_encode($mang);
		
    }
    

    public function delete_map($value)
    {
        $sql = "DELETE FROM `maps` WHERE id_map = '$value'";

        $query = mysqli_query($this->con,$sql);

        $res = false ;

        if($query)
        {
            $res = true ;
        }

        return json_encode($res);
    }

    public function update_map($name_map,$address_map,$lat,$lng,$type_map,$img_map,$id)
    {
        $sql = "UPDATE `maps` SET `id_map`=null,`id_user`=null,`name_map`='$name_map',`address_map`='$address_map',`lat`=$lat,`lng`='$lng',`type_map`='$type_map',`img_map`='$img_map' WHERE id_user = '$id'";

        $query = mysqli_query($this->con,$sql);

        $res = false ;

        if($query)
        {
            $res = true ;
        }

        return json_encode($res);
    }


    public function ajax_check_user($un)
    {
        $sql = "SELECT * FROM users where acount_user = '$un'";

        $query = mysqli_query($this->con,$sql);

        $row = mysqli_num_rows($query);
        
        $res = false ;

        if($row>0)
        {
            $res = true ;
        }

        return json_encode($res);
    }
    }
?>