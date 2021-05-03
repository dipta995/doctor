<?php 

	class Slangword extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
		public function update($query){
		$update_row = $this->con->query($query) or die($this->con->error.__LINE__);	
		if($update_row){
			return $update_row;
		}else{
			return false;
		}
	}
		public function sch($data,$id){
  		 
			$word = array("slang", "sexy", "sex");
			$length = count($word);
			for ($i=0; $i < $length; $i++) { 
		 $getnew = strpos($data,$word[$i]);	}
			
			if($getnew !== false){
				echo "<span>You are warned <a href='#'>Log in</a></span>";
				return self::blockupdate($data,$id);
			}else{

				  return $data;
}
	
		}



		public function blockupdate($data,$id){

		 $selectquery = "SELECT * FROM customer_table WHERE customer_id=$id";
		  $getData = self::update($selectquery);
	

        while ($row = $getData->fetch_assoc()) { 
             $slangint = $row['block'];
            $slang = ($slangint);
            $slang = $slang+1;
			if ($row['block']==3) {
				 echo "<script> window.location = 'login.php';</script>";
			}else{
					$sqlquery = "UPDATE customer_table
					 SET 
					 block = '$slang'
					 WHERE customer_id = '$id'";
			$insert_row = self::update($sqlquery);
			}
        }
   
		
		}  
 
	}

 ?>