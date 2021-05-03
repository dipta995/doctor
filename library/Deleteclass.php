<?php 
include_once 'db.php';


class Deleteclass extends DBconnection{

	public function __construct(){
		$this->connectDataBase();
		
	}


	public function delete($query){
		$delete_row = $this->con->query($query) or die($this->con->error.__LINE__);	
		if($delete_row){
			return $delete_row;
		}else{
			return false;
		}
	}


	public function deletebasic($tbl,$tblid,$id){
		$query = "DELETE FROM $tbl WHERE $tblid = $id";
		$del = self::delete($query);
		if ($del) {
			echo "<script>alert('Deleted successfully');</script>";
			
		}else{
			echo "<script>alert('Deleted Not successfully');</script>";
			
		}
	}
	public function ourdoctordelete($tbl,$tblid,$id){
		$query = "DELETE FROM $tbl WHERE $tblid = $id";
		$querys = "DELETE FROM friend_list WHERE doctor_id = $id";
		$del = self::delete($query);
		$dels = self::delete($querys);
		if ($del) {
			echo "<script>alert('Deleted successfully');</script>";
			echo "<script>window.location='doctors.php';</script>";
			
		}else{
			echo "<script>alert('Deleted Not successfully');</script>";
			
		}
	}

	public function delmultable($tbl,$tbl1,$idnm,$id){
		$query = "SELECT * FROM $tbl1 WHERE $idnm = '$id'";
    $getData = self::delete($query);
    if ($getData) {
        while ($delimg = $getData->fetch_assoc()) { 
            $dellink = '../'.$delimg['blog_image'];
            unlink($dellink);
        }
    }
			$query = "DELETE FROM $tbl WHERE $idnm = $id";
			$del = self::delete($query);
			$querys = "DELETE FROM $tbl1 WHERE $idnm = $id";
			$dels = self::delete($querys);
			if ($del && $dels) {
				echo "<script>alert('Deleted successfully');</script>";
				//echo "<script> window.location = 'appoinmentlist-dr.php';</script>";
				
			}else{
				echo "<script>alert('Deleted Not successfully');</script>";
				
			}
		}



	public function deletewithimg($tbl,$tblid,$id){
		 
			$query = "SELECT * FROM $tbl WHERE $tblid = '$id'";
    $getData = self::delete($query);
    if ($getData) {
        while ($delimg = $getData->fetch_assoc()) { 
            $dellink = '../'.$delimg['blog_image'];
            unlink($dellink);
        }
    }
			$query = "DELETE FROM $tbl WHERE $tblid = $id";
			$del = self::delete($query);
			if ($del) {
				echo "<script>alert('Deleted successfully');</script>";
				//echo "<script> window.location = 'blogpost.php';</script>";
				 
				
			}else{
				echo "<script>alert('Deleted Not successfully');</script>";
				
			}
			

		}


}


 ?>



