  

  <?php
  include "../library/Selectclass.php";
 

$sc = new Selectclass();
    $viewdoctor = $sc->selectforappoinmentlistthird();
   		 
   		$html = '<table><tr><td>Medicle</td><td>Doctor</td><td>Patient</td><td>phone</td><td>comment</td><tr>';
        while ($row = $viewdoctor->fetch_assoc()) {
         

        	$html.='<tr><td>'.$row['clinic_name'].'</td><td>'.$row['doctor_name'].'</td><td>'.$row['name'].'('.$row['email'].')'.'</td><td>'.$row['phone'].'</td><td>'.$row['comment'].'</td><td>'.'</td><tr>';
        }
        $html .= '</table>';
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=report.xls');
        echo $html;

?>