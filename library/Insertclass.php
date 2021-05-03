<?php 
include_once 'db.php';
include_once 'Slang.php';
 
	

class InsertClass extends DBconnection{
	private $sl;

	public function __construct(){
		$this->connectDataBase();
		$this->sl = new Slangword();
		
	}
 

	public function insert($query){
		$insert = $this->con->query($query) or die($this->con->error.__LINE__);
		if($insert){
			return $insert;
		} else {
			return false;
		}
	}


	public function catInsert($data){
		/*$cat_name = $this->sl->sch($data['cat_name']);*/
		$cat_name = mysqli_real_escape_string($this->con, $data['cat_name']);
		if (empty($cat_name)) {
			echo "Field must not be empty";
		} else{

		
	
		$sqlquery = "INSERT INTO  blogcat_table(cat_name)VALUES('$cat_name')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
				return $message;
			}
			}
	}
	public function blogmessageins($data,$customer_id){
			$comment = mysqli_real_escape_string($this->con, $data['comment']);
			$blog_id = mysqli_real_escape_string($this->con, $data['blog_id']);
			if (empty($comment)) {
				echo "Field must not be empty";				 
			}elseif(empty($customer_id)){
				echo "Please Login Before Comment";
			}
			else{


		
			$sqlquery = "INSERT INTO  blogcomment_table(comment,blog_id,customer_id)VALUES('$comment','$blog_id','$customer_id')";
			$insert_row = self::insert($sqlquery);
			if ($insert_row) {
					$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
					return $message;
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}

			}
		}





	public function clInsert($data){
		$clinic_name = mysqli_real_escape_string($this->con, $data['clinic_name']);
	
		$sqlquery = "INSERT INTO  clinic_table(clinic_name)VALUES('$clinic_name')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
				return $message;
			}
	}
	 public function deptInsert($data){
		$clinic_name = mysqli_real_escape_string($this->con, $data['dept_name']);
	
		$sqlquery = "INSERT INTO  dept_table(dept_name)VALUES('$clinic_name')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
				return $message;
			}
	}
	 
	public function commentinsert($data,$doctorid,$customer_id){
			$comment = $this->sl->sch($data['comment'],$customer_id);
			$comment = mysqli_real_escape_string($this->con, $comment);
			if (empty($comment)) {
				
			}else{
		
			$sqlquery = "INSERT INTO comment_table(comment,od_id,customer_id)VALUES('$comment','$doctorid','$customer_id')";
			$insert_row = self::insert($sqlquery);
			if ($insert_row) {
					
					echo "<script> window.location = 'single-dr.php?doctorid=$doctorid';</script>";
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}
				
			}

		}




	public function drInsert($data){
		$clinic_id = mysqli_real_escape_string($this->con, $data['clinic_id']);
		$doctor_name = mysqli_real_escape_string($this->con, $data['doctor_name']);
	
		$sqlquery = "INSERT INTO  doctor_table(clinic_id,doctor_name)VALUES('$clinic_id','$doctor_name')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
				return $message;
			}
	}

	public function postInsert($data,$file){
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

	    move_uploaded_file($file_temp, $move_image);
		
	
		$sqlquery = "INSERT INTO  blog_table(cat_id,blog_title,blog_post,blog_image)VALUES('$cat_id','$blog_title','$blog_post','$uploaded_image')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
				return $message;
			}else{
				$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
				return $message;
			}
	}



		public function customersenddata($data,$file){
			$customer_name = mysqli_real_escape_string($this->con, $data['customer_name']);
			$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
			$customer_phone = mysqli_real_escape_string($this->con, $data['customer_phone']);
			$customer_address = mysqli_real_escape_string($this->con, $data['customer_address']);
			$customer_gender = mysqli_real_escape_string($this->con, $data['customer_gender']);
			$customer_birth = mysqli_real_escape_string($this->con, $data['customer_birth']);
			$customer_blood = mysqli_real_escape_string($this->con, $data['customer_blood']);
			$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		      $div            = explode('.', $file_name);
			    $file_ext       = strtolower(end($div));
			    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "img_new/".$unique_image;
			    $move_image = "img_new/".$unique_image;

		    move_uploaded_file($file_temp, $move_image);
		    if (empty($customer_name)) {
		    	 	echo "<div style='color:red;' role='alert'>Not send</div>";
		    }elseif (strlen($customer_phone) < 10 || strlen($customer_phone) > 14) {
        	echo "Invalid phone. Go to <a href='index.php'>home</a>";
     		} else{
			
		
			$sqlquery = "INSERT INTO  customer_table(customer_name,customer_email,customer_phone,customer_address,customer_gender,customer_birth,customer_blood,customer_password,image)VALUES('$customer_name','$customer_email','$customer_phone','$customer_address','$customer_gender','$customer_birth','$customer_blood','$customer_password','$uploaded_image')";
			$insert_row = self::insert($sqlquery);
			if ($insert_row) {
				 echo "<div style='color:green;' role='alert'>Sign up succcessfully<br><a href='login.php'>Login</a></div>";
				}else{
					echo "<div style='color:red;' role='alert'>Not send</div>";
					 
				}}
		}



		


		public function insertourdoctor($data,$file){
				$od_name = mysqli_real_escape_string($this->con, $data['od_name']);
				$od_email = mysqli_real_escape_string($this->con, $data['od_email']);
				$od_phone = mysqli_real_escape_string($this->con, $data['od_phone']);
				$od_skype = mysqli_real_escape_string($this->con, $data['od_skype']);
				$od_dept = mysqli_real_escape_string($this->con, $data['dept_id']);
				$od_pass = mysqli_real_escape_string($this->con, $data['od_pass']);
				$od_fee = mysqli_real_escape_string($this->con, $data['od_fee']);

				$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
			    $file_name = $file['od_image']['name'];
			    $file_size = $file['od_image']['size'];
			    $file_temp = $file['od_image']['tmp_name'];

			    $div            = explode('.', $file_name);
			    $file_ext       = strtolower(end($div));
			    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "img/".$unique_image;
			    $move_image = "../img/".$unique_image;

			    $permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp','pdf');
			    $fname = $file['od_valid']['name'];
			    //$file_size = $file['od_valid']['size'];
			    $ftemp = $file['od_valid']['tmp_name'];

			    $divs            = explode('.', $fname);
			    $fext       = strtolower(end($divs));
			    $uniqimg   = substr(md5(time()), 0, 10).'.'.$fext;
			    $upimg = "doc/".$uniqimg;
			    $moveimg = "../doc/".$uniqimg;

			    move_uploaded_file($file_temp, $move_image);
			    move_uploaded_file($ftemp, $moveimg);
				
			
				$sqlquery = "INSERT INTO  our_doctor_table(od_name,od_phone,od_email,od_image,od_skype,dept_id,od_pass,od_fee,od_valid)VALUES('$od_name','$od_phone','$od_email','$uploaded_image','$od_skype','$od_dept','$od_pass','$od_fee','$upimg')";
				$insert_row = self::insert($sqlquery);
				if ($insert_row) {
						$message = "<div class='alert alert-success' role='alert'>Registration Successful <a href='../doctorlogin.php'>Login Now</a></div>";
						return $message;
					}else{
						$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
						return $message;
					}
			}





public function sendmsgpatient($data,$file,$od_id,$customer_id){
				$message_p = mysqli_real_escape_string($this->con, $data['message_p']);
				 

				$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
			    $file_name = $file['image_p']['name'];
			    $file_size = $file['image_p']['size'];
			    $file_temp = $file['image_p']['tmp_name'];

			    $div            = explode('.', $file_name);
			    $file_ext       = strtolower(end($div));
			    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
			    $uploaded_image = "img_new/".$unique_image;
			    $move_image = "img_new/".$unique_image;

			     $qry = "SELECT * FROM friend_list WHERE doctor_id= '$od_id' and customer_id = '$customer_id'";
			     $check = self::insert($qry);
			     // $getval = mysqli_fetch_array($check);
                $rows = mysqli_num_rows($check);
              if ($rows > 0) {

              }elseif(!empty($od_id)){
              	$getqry = "INSERT INTO  friend_list(doctor_id,customer_id)VALUES('$od_id','$customer_id')";
              	$upquery = "UPDATE friend_list
								 SET 
								 sendmsgtime = now()
								 WHERE customer_id = '$customer_id' AND doctor_id = '$od_id'";

					    	$gets = self::insert($upquery);
			    	$senddata = self::insert($getqry);
			    	echo "<script> window.location = 'message.php?messageid=$od_id';</script>";
              }else{}


			 if (empty($file_ext)) {
			    	$squery = "INSERT INTO  message_table(message_p,customer_id,od_id)VALUES('$message_p','$customer_id','$od_id')";
			    	$upquery = "UPDATE friend_list
								 SET 
								 sendmsgtime = now()
								 WHERE customer_id = '$customer_id' AND doctor_id = '$od_id'";

					    	$gets = self::insert($upquery);
			    	$get = self::insert($squery);
			    	echo "<script> window.location = 'message.php?messageid=$od_id';</script>";
			    }else{

			    move_uploaded_file($file_temp, $move_image);
				
			$sqlquery = "INSERT INTO  message_table(message_p,image_p,customer_id,od_id)VALUES('$message_p','$uploaded_image','$customer_id','$od_id')";
			$upquery = "UPDATE friend_list
								 SET 
								 sendmsgtime = now()
								 WHERE customer_id = '$customer_id' AND doctor_id = '$od_id'";

					    	$gets = self::insert($upquery);

				$insert_row = self::insert($sqlquery);
				echo "<script> window.location = 'message.php?messageid=$od_id';</script>";
			    }


				 
			}



		public function sendmsgdoctor($data,$file,$customer_id,$od_id){
						$message_d = mysqli_real_escape_string($this->con, $data['message_d']);
						 

						$permited  = array('jpg', 'jpeg', 'png', 'gif', 'webp');
					    $file_name = $file['image_d']['name'];
					    $file_size = $file['image_d']['size'];
					    $file_temp = $file['image_d']['tmp_name'];

					    $div            = explode('.', $file_name);
					    $file_ext       = strtolower(end($div));
					    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
					    $uploaded_image = "img_new/".$unique_image;
					    $move_image = "../img_new/".$unique_image;

					     


					 if (empty($file_ext)) {
					    	$squery = "INSERT INTO  message_table(message_d,customer_id,od_id)VALUES('$message_d','$customer_id','$od_id')";
					    	$upquery = "UPDATE friend_list
								 SET 
								 sendmsgtime = now()
								 WHERE customer_id = '$customer_id' AND doctor_id = '$od_id'";

					    	$gets = self::insert($upquery);
					    	$get = self::insert($squery);
					    	echo "<script> window.location = 'message.php?messageid=$customer_id';</script>";
					    }else{

					    move_uploaded_file($file_temp, $move_image);
						
					$sqlquery = "INSERT INTO  message_table(message_d,image_d,customer_id,od_id)VALUES('$message_d','$uploaded_image','$customer_id','$od_id')";
					$upquery = "UPDATE friend_list
								 SET 
								 sendmsgtime = now()
								 WHERE customer_id = '$customer_id' AND doctor_id = '$od_id'";

					    	$gets = self::insert($upquery);
						$insert_row = self::insert($sqlquery);
						echo "<script> window.location = 'message.php?messageid=$customer_id';</script>";
					    }


						 
					}









	public function contactInsert($data,$id){
		$a = mysqli_real_escape_string($this->con, $data['c_name']); 
		$b = mysqli_real_escape_string($this->con, $data['c_email']);
		$c = mysqli_real_escape_string($this->con, $data['c_subject']);
		$d = $this->sl->sch($data['c_message'],$id);
		$d = mysqli_real_escape_string($this->con, $d);
		$sqlquery = "INSERT INTO  contact_table(c_name,c_email,c_subject,c_message)VALUES('$a','$b','$c','$d')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				$message = "<span style='color:green;'>Successfully send</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Something wrong try again</span>";
				return $message;
			}
	}


	public function insertourdoctorappoinment($data,$drid){
		$appointment_date = mysqli_real_escape_string($this->con, $data['appointment_date']);
		$appointment_day = mysqli_real_escape_string($this->con, $data['appointment_day']);
		$appointment_time = mysqli_real_escape_string($this->con, $data['appointment_time']);
		if (empty($appointment_date)|| empty($appointment_time) || empty($appointment_day)) {
			echo "Field required";
		}else{
if ($appointment_date!=date("m/d/Y")) {
	
 
		$sqlquery = "INSERT INTO  appointment_table(appointment_date,appointment_day,appointment_time,od_id)VALUES('$appointment_date','$appointment_day','$appointment_time','$drid')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
				echo "<script> window.location = 'appoinmentlist-dr.php'</script>";
				$message = "<span style='color:green;'>Successfully send</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Something wrong try again</span>";
				return $message;
			}
		}
		}
		
	}
	public function aboutdeptinsert($data){
			$d_name = mysqli_real_escape_string($this->con, $data['d_name']);
			$d_description = mysqli_real_escape_string($this->con, $data['d_description']);
			$sqlquery = "INSERT INTO  department_table(d_name,d_description)VALUES('$d_name','$d_description')";
			$insert_row = self::insert($sqlquery);
			if ($insert_row) {
					$message = "<span style='color:green;'>Successfully send</span>";
					return $message;
				}else{
					$message = "<span style='color:red;'>Something wrong try again</span>";
					return $message;
				}
		}
	public function bookingappoinment($data,$appointment,$doctor,$customer){
		$od_id = mysqli_real_escape_string($this->con, $doctor);
		$customer_id = mysqli_real_escape_string($this->con, $customer);
		$appointment_id = mysqli_real_escape_string($this->con, $appointment);
		$customer_name  = mysqli_real_escape_string($this->con, $data['customer_name']);
		$customer_email  = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_phone  = mysqli_real_escape_string($this->con, $data['customer_phone']);
		$message   = mysqli_real_escape_string($this->con, $data['message']);
		$sqlquery = "INSERT INTO  bookappoinment(od_id,customer_id,appointment_id,customer_name,customer_email,customer_phone,message)VALUES('$od_id','$customer_id','$appointment_id','$customer_name','$customer_email','$customer_phone','$message')";
		$insert_row = self::insert($sqlquery);
		if ($insert_row) {
			
			$sqlq = "UPDATE appointment_table
					 SET 
					 booking = '1'
					 WHERE appointment_id = '$appointment'";
		$insert_row = self::insert($sqlq);
				$message = "<span style='color:green;'>Successfully send</span>";
				return $message;
			}else{
				$message = "<span style='color:red;'>Something wrong try again</span>";
				return $message;
			}
	}
	public function Serialfortretment($data,$id){
	 
		$doctor_id   = mysqli_real_escape_string($this->con, $data['doctor']);
		$clinic_id  = mysqli_real_escape_string($this->con, $data['clinic_name']);
		$name = $this->sl->sch($data['name'],$id);
		$name  = mysqli_real_escape_string($this->con, $name);
		$email   = mysqli_real_escape_string($this->con, $data['email']);
		$phone   = mysqli_real_escape_string($this->con, $data['phone']);
		$comment = $this->sl->sch($data['comment'],$id);
		$comment   = mysqli_real_escape_string($this->con, $comment);
		$issueat = date("Y-m-d");
		if ( empty($name) || empty($email) || empty($phone)) {
			$message = "<div class='alert alert-danger' role='alert'>Please Complete the process</div>";
				return $message;
		}else{
			
			$sqlquery = "INSERT INTO  thirdparty_table(doctor_id,clinic_id,name,email,phone,comment,issueat)VALUES('$doctor_id','$clinic_id','$name','$email','$phone','$comment','$issueat')";
			$insert_row = self::insert($sqlquery);
			if ($insert_row) {
					$message = "<div class='alert alert-success' role='alert'>Successfully send</div>";
					return $message;
				}else{
					$message = "<div class='alert alert-danger' role='alert'>Not send</div>";
					return $message;
				}
		}
	}
	


}	


 