  

  <?php
  include "../library/Selectclass.php";
 

$sc = new Selectclass();

if (!isset($_GET['drid'])) {
 
             $viewdoctor = $sc->selectforappoinmentlist();
                   		 
                   		$html = '<table><tr><td>Doctor</td><td>Date</td><td>Time</td><td>Patient</td><td>email</td><td>Phone</td><tr>';
                        while ($row = $viewdoctor->fetch_assoc()) {
                         

                        	$html.='<tr><td>'.$row['od_name'].'</td><td>'.$row['appointment_date'].'</td><td>'.$row['appointment_time'].'('.$row['appointment_day'].')'.'</td><td>'.$row['customer_name'].'</td><td>'.$row['customer_email'].'</td><td>'.$row['customer_phone'].'</td><tr>';
                        }
                        $html .= '</table>';
                        header('Content-Type:application/xls');
                        header('Content-Disposition:attachment;filename=report.xls');
                        echo $html;


}else{



                        $viewdoctor = $sc->selectforappoinmentlistdr($_GET['drid']);
                       
                      $html = '<table><tr><td>Doctor</td><td>Date</td><td>Time</td><td>Patient</td><td>email</td><td>Phone</td><tr>';
                        while ($row = $viewdoctor->fetch_assoc()) {
                         

                          $html.='<tr><td>'.$row['od_name'].'</td><td>'.$row['appointment_date'].'</td><td>'.$row['appointment_time'].'('.$row['appointment_day'].')'.'</td><td>'.$row['customer_name'].'</td><td>'.$row['customer_email'].'</td><td>'.$row['customer_phone'].'</td><tr>';
                        }
                        $html .= '</table>';
                        header('Content-Type:application/xls');
                        header('Content-Disposition:attachment;filename=serial.xls');
                        echo $html;

                      }
                      

                ?>