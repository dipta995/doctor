
<?php
 include "library/Selectclass.php";
$sc = new Selectclass();
 
 $clinic_name=$_POST["clinic_name"];
 

	$viewdoctor = $sc->selectallId('doctor_table','clinic_id',$clinic_name);

while ($row = $viewdoctor->fetch_assoc()) {
     echo '<option value="'.$row['doctor_id'].'">'.$row['doctor_name'].'</option>';
 }

 
  
?>