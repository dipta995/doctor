<?php 
include_once 'db.php';

class Updateclass extends DBconnection{

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
	public function blockupdate($id){

		 $selectquery = "SELECT * FROM customer_table WHERE customer_id=$id";
		  $getData = self::update($selectquery);
	

        while ($row = $getData->fetch_assoc()) { 
             $slangint = $row['block'];
            $slang = ($slangint);
            $slang = $slang+1;
			if ($row['block']==2) {
				 echo "<script> window.location = 'login.php';</script>";
			}
        }
   
			
			$sqlquery = "UPDATE customer_table
					 SET 
					 block = '$slang'
					 WHERE customer_id = '$id'";
			$insert_row = self::update($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Successfully send</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>Something wrong try again</span>";
					return $message;
				}
		}     

		public function aboutinsert($data,$id){
			$about_details = mysqli_real_escape_string($this->con, $data['about_details']);
			
			$sqlquery = "UPDATE about_table
					 SET 
					 about_details = '$about_details'
					 WHERE about_id = '$id'";
			$insert_row = self::update($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Successfully send</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>Something wrong try again</span>";
					return $message;
				}
		}

		
		public function clUpdate($data,$id){
			$clinic_name = mysqli_real_escape_string($this->con, $data['clinic_name']);
			
			$sqlquery = "UPDATE clinic_table
					 SET 
					 clinic_name = '$clinic_name'
					 WHERE clinic_id = '$id'";
			$insert_row = self::update($sqlquery);
			if ($insert_row) {
					$message = "<div class='alert alert-success' role='alert'>Successfully Updated</div>";
					return $message;
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}
		}

		public function deptUpdate($data,$id){
			$clinic_name = mysqli_real_escape_string($this->con, $data['dept_name']);
			
			$sqlquery = "UPDATE dept_table
					 SET 
					 dept_name = '$clinic_name'
					 WHERE dept_id = '$id'";
			$insert_row = self::update($sqlquery);
			if ($insert_row) {
					$message = "<div class='alert alert-success' role='alert'>Successfully Updated</div>";
					return $message;
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}
		}
			public function updatecontactformmsg($id){
						 
						
						$sqlquery = "UPDATE contact_table
								 SET 
								 seen = 1
								 WHERE c_id = '$id'";
						$insert_row = self::update($sqlquery);
						if ($insert_row) {
								echo "<script> window.location = 'patient_msg.php';</script>";
							}else{
								echo "<script> window.location = 'patient_msg.php';</script>";
							}
					}
					public function updatecontactformmsgun($id){
											 
											
											$sqlquery = "UPDATE contact_table
													 SET 
													 seen = 0
													 WHERE c_id = '$id'";
											$insert_row = self::update($sqlquery);
											if ($insert_row) {
													 echo "<script> window.location = 'patient_msg.php';</script>";
												}else{
													 echo "<script> window.location = 'patient_msg.php';</script>";
												}
										}

			public function catUpdate($data,$id){
						$cat_name = mysqli_real_escape_string($this->con, $data['cat_name']);
						
						$sqlquery = "UPDATE blogcat_table
								 SET 
								 cat_name = '$cat_name'
								 WHERE cat_id = '$id'";
						$insert_row = self::update($sqlquery);
						if ($insert_row) {
								$message = "<div class='alert alert-success' role='alert'>Successfully Updated</div>";
								return $message;
							}else{
								$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
								return $message;
							}
					}


			public function updateprofile($data,$file,$id){
									$customer_name= mysqli_real_escape_string($this->con, $data['customer_name']);
			$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
			$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
			$customer_address = mysqli_real_escape_string($this->con, $data['customer_address']);
			$customer_blood = mysqli_real_escape_string($this->con, $data['customer_blood']);
			$customer_gender = mysqli_real_escape_string($this->con, $data['customer_gender']);
			$customer_birth = mysqli_real_escape_string($this->con, $data['customer_birth']);


						$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
					    $file_name = $file['image']['name'];
					    $file_size = $file['image']['size'];
					    $file_temp = $file['image']['tmp_name'];
					    $div            = explode('.', $file_name);
					    $file_ext       = strtolower(end($div));
					    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
					    $uploaded_image = "img/".$unique_image;
					    $move_image = "img/".$unique_image;
					    

			if (empty($customer_birth) && empty($file_name)) {
					$sqlquery = "UPDATE customer_table
											 SET 
											 customer_name = '$customer_name',
											 customer_email = '$customer_email',
											 customer_phone = '$customer_phone',
											 customer_address = '$customer_address',
											 customer_blood = '$customer_blood',
											 customer_gender = '$customer_gender'
											 WHERE customer_id = '$id'";
									$insert_row = self::update($sqlquery);
				
			}elseif(empty($customer_birth)){
				move_uploaded_file($file_temp, $move_image);

									$sqlquery = "UPDATE customer_table
											 SET 
											 customer_name = '$customer_name',
											 customer_email = '$customer_email',
											 customer_phone = '$customer_phone',
											 customer_address = '$customer_address',
											 customer_blood = '$customer_blood',
											 customer_gender = '$customer_gender',
											 image = '$uploaded_image',
											 customer_birth = '$customer_birth'
											 WHERE customer_id = '$id'";
									$insert_row = self::update($sqlquery);

			}elseif(empty($file_name)){

									$sqlquery = "UPDATE customer_table
											 SET 
											 customer_name = '$customer_name',
											 customer_email = '$customer_email',
											 customer_phone = '$customer_phone',
											 customer_address = '$customer_address',
											 customer_blood = '$customer_blood',
											 customer_gender = '$customer_gender',
											 customer_birth = '$customer_birth'
											 WHERE customer_id = '$id'";
									$insert_row = self::update($sqlquery);

			}else{

		 
		 	move_uploaded_file($file_temp, $move_image);
									
									$sqlquery = "UPDATE customer_table
											 SET 
											 customer_name = '$customer_name',
											 customer_email = '$customer_email',
											 customer_phone = '$customer_phone',
											 customer_address = '$customer_address',
											 customer_blood = '$customer_blood',
											 customer_gender = '$customer_gender',
											  image = '$uploaded_image',
											 customer_birth = '$customer_birth'
											 WHERE customer_id = '$id'";
									$insert_row = self::update($sqlquery);






								}
									if ($insert_row) {
											echo "<script> window.location = 'profile.php';</script>";
										}else{
											$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
											return $message;
										}
								}




		public function updateprofiledr($data,$file,$id){
									$customer_name= mysqli_real_escape_string($this->con, $data['customer_name']);
			$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
			$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
			 
			$customer_skype = mysqli_real_escape_string($this->con, $data['customer_skype']);
			$od_fee = mysqli_real_escape_string($this->con, $data['od_fee']);
			$od_desc = mysqli_real_escape_string($this->con, $data['od_desc']);
		 


						$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
					    $file_name = $file['image']['name'];
					    $file_size = $file['image']['size'];
					    $file_temp = $file['image']['tmp_name'];
					    $div            = explode('.', $file_name);
					    $file_ext       = strtolower(end($div));
					    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
					    $uploaded_image = "img/".$unique_image;
					    $move_image = "../img/".$unique_image;
					    

			if (empty($customer_birth) && empty($file_name)) {
					$sqlquery = "UPDATE our_doctor_table
											 SET 
											 od_name = '$customer_name',
											 od_email = '$customer_email',
											 od_phone = '$customer_phone',
											 
											 od_skype = '$customer_skype',
											 od_fee = '$od_fee',
											 od_desc = '$od_desc'
											 WHERE od_id = '$id'";
									$insert_row = self::update($sqlquery);
				
	 
			}else{

		 
		 	move_uploaded_file($file_temp, $move_image);
									
									$sqlquery = "UPDATE our_doctor_table
											 SET 
											 od_name = '$customer_name',
											 od_email = '$customer_email',
											 od_phone = '$customer_phone',
											 
											 od_skype = '$customer_skype',
											 od_fee = '$od_fee',
											 od_desc = '$od_desc',
											  od_image = '$uploaded_image' 
											 WHERE od_id = '$id'";
									$insert_row = self::update($sqlquery);






								}
									if ($insert_row) {
											echo "<script> window.location = 'profile.php';</script>";
										}else{
											$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
											return $message;
										}
								}




		public function drUpdate($data,$id){
		$clinic_id = mysqli_real_escape_string($this->con, $data['clinic_id']);
		$doctor_name = mysqli_real_escape_string($this->con, $data['doctor_name']);
			
			$sqlquery = "UPDATE doctor_table
					 SET 
					 clinic_id = '$clinic_id',
					 doctor_name = '$doctor_name'
					 WHERE doctor_id = '$id'";
			$insert_row = self::update($sqlquery);
			if ($insert_row) {
					$message = "<div class='alert alert-success' role='alert'>Successfully Updated</div>";
					return $message;
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}
		}
		public function postUpdate($data,$file,$id){
					$cat_id = mysqli_real_escape_string($this->con, $data['cat_id']);
					$blog_title = mysqli_real_escape_string($this->con, $data['blog_title']);
					$blog_post = mysqli_real_escape_string($this->con, $data['blog_post']);
					 


		$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
	    $file_name = $file['blog_image']['name'];
	    $file_size = $file['blog_image']['size'];
	    $file_temp = $file['blog_image']['tmp_name'];

	    $div            = explode('.', $file_name);
	    $file_ext       = strtolower(end($div));
	    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "img/".$unique_image;
	    $move_image = "../img/".$unique_image;
	    if (empty($file_name)) {
	    	
		$sqlquery = "UPDATE blog_table
					 SET 
					 cat_id = '$cat_id',
					 blog_title = '$blog_title',
					 blog_post = '$blog_post'
					  
					 WHERE blog_id = '$id'";
		$insert_row = self::update($sqlquery);
	    }else{
	    	    move_uploaded_file($file_temp, $move_image);
	    	$sqlquery = "UPDATE blog_table
					 SET 
					  cat_id = '$cat_id',
					  blog_title = '$blog_title',
					 blog_post = '$blog_post',
					 blog_image = '$uploaded_image'
					 WHERE blog_id = '$id'";
					 $insert_row = self::update($sqlquery);
	    }
		if ($insert_row) {
				$message = "<span style='color:green;'>post name updated</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>post name not updated</span>";
				return $message;
			}
				}


}


 ?>



