<?php


class DBconnection{

	public $con;
	public $error;

	public function connectDataBase(){
		$this->con = new mysqli('localhost', 'root', '','doctor_db');
		if ($this->con == false) {
			$this->error = "Fail".$this->con->connect_error;
		}
	}


}

?>