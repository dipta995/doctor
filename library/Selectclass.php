<?php 
include_once 'db.php';
 
 
class Selectclass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}
	public function select($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	public function selects($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result){
			return $result;
		} else {
			return false;
		}
	}
	public function selectsupport($query){
		$result = $this->con->query($query) or die($this->con->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}elseif($result->num_rows == 0){
			return $result;
		} else {
			return false;
		}
	}
		public function selectall($var){
		$query = "SELECT * FROM $var";
		$result = self::selects($query);
		return $result;
	}
	public function selectalllim($var){
		$query = "SELECT * FROM $var limit 4";
		$result = self::select($query);
		return $result;
	}
	public function ourddoctorlim(){
		$query = "SELECT * FROM our_doctor_table left join dept_table on our_doctor_table.dept_id = dept_table.dept_id limit 4";
		$result = self::select($query);
		return $result;
	}
	
	public function selectallId($var,$varid,$id){
		$query = "SELECT * FROM $var WHERE $varid = $id ";
		$result = self::selects($query);
		return $result;
	}
	public function notificationview($date){
		$query = "SELECT * FROM appointment_table WHERE  booking = 1 AND appointment_date='$date'";
		$result = self::selects($query);
		return $result;
	}
	public function blogcommentview($id){
		$query = "SELECT * FROM blogcomment_table LEFT JOIN customer_table ON blogcomment_table.customer_id = customer_table.customer_id WHERE  blog_id = $id";
		$result = self::selects($query);
		return $result;
	}

	public function Doctorprofileview($id){
		$query = "SELECT * FROM our_doctor_table LEFT JOIN dept_table ON our_doctor_table.dept_id = dept_table.dept_id WHERE od_id = $id";
		$result = self::selects($query);
		return $result;
	}

	
	public function notificationviewCustomer($date,$customer_id){
		$query = "SELECT * FROM appointment_table LEFT JOIN bookappoinment ON appointment_table.appointment_id = bookappoinment.appointment_id  WHERE  booking = 1 AND appointment_date='$date' AND customer_id=$customer_id";
		$result = self::selects($query);
		return $result;
	}
	public function notificationCustomerDoctor($date){
		$query = "SELECT * FROM appointment_table LEFT JOIN bookappoinment On appointment_table.appointment_id = bookappoinment.appointment_id LEFT JOIN customer_table ON customer_table.customer_id = bookappoinment.customer_id LEFT JOIN our_doctor_table ON our_doctor_table.od_id = bookappoinment.od_id WHERE  appointment_table.booking = 1 AND appointment_table.appointment_date='$date'";
		$result = self::selects($query);
		return $result;
	}
	public function notificationCustomercustomer($id){
		$query = "SELECT * FROM appointment_table LEFT JOIN bookappoinment On appointment_table.appointment_id = bookappoinment.appointment_id LEFT JOIN customer_table ON customer_table.customer_id = bookappoinment.customer_id LEFT JOIN our_doctor_table ON our_doctor_table.od_id = bookappoinment.od_id WHERE  appointment_table.booking = 1 AND bookappoinment.customer_id=$id ";
		$result = self::selects($query);
		return $result;
	}
	public function clinicview($id){
		$sqlquery = "SELECT * FROM physician_table where clinic_id =$id";
		$result = self::select($sqlquery);
		return $result;

	}
		public function selectalljoinTWO($var,$vars,$id){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id";
		$result = self::select($query);
		return $result;
	}public function selectalljoinTWOpagination($start_form,$per_page,$var,$vars,$id){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id limit $start_form,$per_page";
		$result = self::select($query);
		return $result;
	}

	public function selectalljoinTWOlimit($var,$vars,$id){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id limit 6 order by  ";
		$result = self::select($query);
		return $result;
	}

	public function blogrecentpost($var,$vars,$id){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id  order by blog_id DESC limit 3";
		$result = self::select($query);
		return $result;
	}
	public function selectalljoinTWOid($var,$vars,$id,$i){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id where $var.$id = $i";
		$result = self::selects($query);
		return $result;
	}

	public function selectalljoinTWOidano($var,$vars,$id,$ids,$i){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id where $var.$ids = $i";
		$result = self::select($query);
		return $result;
	}

	
	public function selectalljoinTWOidmain($var,$vars,$id,$idm,$i){
		$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id where $var.$idm = $i";
		$result = self::select($query);
		return $result;
	}
	public function selectalljoinTWOidcondition($var,$vars,$id,$i){
			$query = "SELECT * FROM $var LEFT JOIN $vars ON $var.$id = $vars.$id where $var.$id = $i AND booking=0";
			$result = self::select($query);
			return $result;
		}

		public function messageviewcustomer($cid,$did){
			$query = "SELECT * FROM message_table where customer_id= $cid AND od_id = '$did' ORDER BY msg_id DESC";
			$result = self::selects($query);
			return $result;


		}
		public function messageviewdr($cid,$did){
			$query = "SELECT * FROM message_table where customer_id=$cid AND od_id = $did ORDER BY msg_id DESC";
			$result = self::selects($query);
			return $result;

		}
	public function selectforappoinmentlist(){
				$query = "SELECT * FROM bookappoinment LEFT JOIN our_doctor_table ON bookappoinment.od_id = our_doctor_table.od_id LEFT JOIN appointment_table ON bookappoinment.appointment_id = appointment_table.appointment_id  where  appointment_table.booking=1";
				$result = self::selectsupport($query);
				return $result;
			}
	public function selectappoinment($drid){
		$query = "SELECT * FROM our_doctor_table LEFT JOIN appointment_table ON our_doctor_table.od_id = appointment_table.od_id  where  appointment_table.od_id=$drid";
		$result = self::selectsupport($query);
		return $result;
	}
		public function selectforappoinmentlistdr($drid){
						$query = "SELECT * FROM bookappoinment LEFT JOIN our_doctor_table ON bookappoinment.od_id = our_doctor_table.od_id LEFT JOIN appointment_table ON bookappoinment.appointment_id = appointment_table.appointment_id  where  appointment_table.booking=1 AND bookappoinment.od_id = $drid";
						$result = self::selectsupport($query);
						return $result;
					}


	public function selectforappoinmentlistthird(){
					$query = "SELECT * FROM thirdparty_table LEFT JOIN doctor_table ON thirdparty_table.doctor_id = doctor_table.doctor_id LEFT JOIN clinic_table ON clinic_table.clinic_id = thirdparty_table.clinic_id   ORDER BY thirdparty_table.clinic_id DESC";
					$result = self::select($query);
					return $result;
				}

public function selectforappoinmentlistthirdtoday($today){
					$query = "SELECT * FROM thirdparty_table LEFT JOIN doctor_table ON thirdparty_table.doctor_id = doctor_table.doctor_id LEFT JOIN clinic_table ON clinic_table.clinic_id = thirdparty_table.clinic_id where thirdparty_table.issueat = '$today'  ORDER BY thirdparty_table.clinic_id DESC";
					$result = self::selectsupport($query);
					return $result;
				}
				



				public function commentview($a,$b,$dr){
					$query = "SELECT * FROM comment_table LEFT JOIN customer_table ON comment_table.customer_id = customer_table.customer_id WHERE od_id = '$dr' limit $a,$b";
					$result = self::selectsupport($query);
					return $result;
				}
	public function commentviewcount($dr){
						$query = "SELECT * FROM comment_table LEFT JOIN customer_table ON comment_table.customer_id = customer_table.customer_id WHERE od_id = '$dr'";
						$result = self::selectsupport($query);
						return $result;
					}

			public function friendviewbycustomer($customer){
								$query = "SELECT * FROM friend_list LEFT JOIN our_doctor_table ON our_doctor_table.od_id = friend_list.doctor_id  WHERE customer_id = '$customer' ORDER BY sendmsgtime DESC";
								$result = self::selectsupport($query);
								return $result;
							}


		public function friendviewbydr($drid){
			$query = "SELECT * FROM customer_table LEFT JOIN friend_list ON customer_table.customer_id = friend_list.customer_id WHERE doctor_id = '$drid' ORDER BY sendmsgtime DESC";
			$result = self::selects($query);
			return $result;
		}




		public function Logincustomer($data,$redirect_link){
			

		$customer_email = mysqli_real_escape_string($this->con, $data['customer_email']);
		$customer_password = mysqli_real_escape_string($this->con, $data['customer_password']);

		if (empty($customer_email) || empty($customer_password)) {
			$loginmsg = "field must not be empty";
			return $loginmsg;
		}else{
			$sql = "SELECT * FROM customer_table WHERE customer_email= '$customer_email' and customer_password = '$customer_password' and block=0 Or block=1 Or block=2";
	
			$result = self::select($sql);
			if ($result !=false) {
				foreach ($result as $value) {
				 
          		Session::set("login", true);
                Session::set("customer_id",$value['customer_id']);
                Session::set("customer_name",$value['customer_name']);
                if (empty($redirect_link)) {
                	header("Location:index.php");
                }else{
                	header("Location:".$redirect_link);
                }

               
				}

             
         
        }else{
				$loginmsg = "Wrong email or password. If want, contact with Admin@gmail.com";
				return $loginmsg;

			}

		} 

	}




			public function Logindoctor($data,$redirect_link){
						

					$od_email = mysqli_real_escape_string($this->con, $data['od_email']);
					$od_pass = mysqli_real_escape_string($this->con, $data['od_pass']);

					if (empty($od_email) || empty($od_pass)) {
						echo "<div class='alert alert-danger'>Enter your Email and password</div>";
					}else{
						$sql = "SELECT * FROM our_doctor_table WHERE od_email= '$od_email' and od_pass = '$od_pass'";
				
						$result = self::select($sql);
						/*$sqls = "SELECT * FROM admin_table WHERE admin_email= '$od_email' and admin_password = '$od_pass'";
				
						$results = self::select($sqls);*/
						if ($result !=false) {
							foreach ($result as $value) {
							 
			          		Session::set("login", true);
			                Session::set("od_id",$value['od_id']);
			                Session::set("od_name",$value['od_name']);
			                if (empty($redirect_link)) {
			                	header("Location:admin/index.php");
			                }else{
			                	header("Location:".$redirect_link);
			     }
			               
					}
						}


					/*	elseif($results !=false && $result ==false){
							foreach ($results as $value) {
							 
			          		Session::set("login", true);
			                Session::set("od_id",$value['admin_id']);
			                Session::set("od_name",$value['admin_name']);
			                Session::set("action",$value['action']);
			                Session::set("admincheck",121);
			                if (empty($redirect_link)) {
			                	header("Location:index.php");
			                }else{
			                	header("Location:".$redirect_link);
			     }
			               
					}
						}*/else{
							return "<div class='alert alert-danger'>Email or password is incorrect</div>";
						}

					} 

				}

				public function Loginadmin($data,$redirect_link){
						

					$od_email = mysqli_real_escape_string($this->con, $data['od_email']);
					$od_pass = mysqli_real_escape_string($this->con, $data['od_pass']);

					if (empty($od_email) || empty($od_pass)) {
						echo "<div class='alert alert-danger'>Enter your Email and password</div>";
					}else{
				 
						$sqls = "SELECT * FROM admin_table WHERE admin_email= '$od_email' and admin_password = '$od_pass'";
				
						$results = self::select($sqls);
			 


						if($results !=false){
							foreach ($results as $value) {
							 
			          		Session::set("login", true);
			                Session::set("od_id",$value['admin_id']);
			                Session::set("od_name",$value['admin_name']);
			                Session::set("action",$value['action']);
			                Session::set("admincheck",121);
			                if (empty($redirect_link)) {
			                	header("Location:index.php");
			                }else{
			                	header("Location:".$redirect_link);
			     }
			               
					}
						}else{
							echo "<div class='alert alert-danger'>Email or password is incorrect</div>";
						}

					} 

				}








}


 ?>