<?php include_once 'header.php';
if (isset($_GET['removeappoin'])) {
    $delappoin = $dl->delmultable('appointment_table','bookappoinment','appointment_id',$_GET['removeappoin']);

}
if (isset($_GET['removeappoin'])) {
    echo "<script> window.location = 'appoinmentlist-dr.php';</script>";
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $getdoctor = $ic->insertourdoctorappoinment($_POST,$drid);
    
}
 ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                       
                        <div class="row">
                            
                            <div class="col-md-6">
                                  <form method="post" action="">
                                          
                                           <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">appointment date </label>
                                               <?php include_once ('datepick.php'); ?> 
                                            <!--     <input name="appointment_date" class="form-control py-4" type="date"  -->
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">appointment Day</label>
                                                

                                                <select class="form-control" name="appointment_day" >
                                                    <option value="<?php echo date('D'); ?>"><?php echo date('D'); ?></option>
                                                    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Appointment Time(Min 40 Minutes)</label>
                                                <input class="form-control py-4" placeholder="Example: 11AM-12PM" type="text" name="appointment_time">
                                            </div>
                                          
                                             
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="submit" value="Add appointment">
                                            </div>
                                        </form>
                            </div>
                            <div class="col-md-6">



                                <div class="card mb-4">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                
                                        $viewdoctor = $sc->selectappoinment($drid);
                        $a = 0;
                        while ($row = $viewdoctor->fetch_assoc()) {
                            $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'].'('.$row['appointment_day'].')';?></td>
                                          
                                          
                                                <td>
                                                    
                                                     <a href="?removeappoin=<?php echo $row['appointment_id']; ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
                                                </td>
                                                
                                            </tr>
                                     <?php }  ?>

                                            
                                        </tbody>
                                    </table>
                            <div class="card-body">
                                <div class="table-responsive">
                                   
                                </div>
                            </div>
                        </div>







                                
 


                            </div>
                        </div>
                     
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <ol class="breadcrumb mb-4">
                                         <a href="exportfile.php?drid=<?php  echo $drid; ?>"> <button class="btn btn-primary">Download EXcell File</button></a>
                                    </ol>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                         
                                            </tr>
                                        </thead>
                                        <tbody>
                 <?php
                    $viewdoctor = $sc->selectforappoinmentlistdr($drid);
                   		$a = 0;
                        while ($row = $viewdoctor->fetch_assoc()) {
                        	$a++;
                ?>
                                            <tr>
                                            	<td><?php echo $a;?></td>
                                                 
                                                <td><?php echo $row['appointment_date'];?></td>
                                                <td><?php echo $row['appointment_time'].'('.$row['appointment_day'].')';?></td>
                                                <td><a href="viewpatientpro.php?messageid=<?php echo $row['customer_id'];?>"><?php echo $row['customer_name'];?></a></td>
                                                <td><?php echo $row['customer_email'];?></td>
                                                <td><?php echo $row['customer_phone'];?></td>
                                                <td>
                                                	
                                               
                                                </td>
                                                
                                            </tr>
                                     <?php }  ?>

                                            
                                        </tbody>
                                    </table>
                                    <?php
      $viewdoctor = $sc->selectforappoinmentlistdr($drid);
                         
                        $html = '<table><tr><td>name</td><td>Email</td><td>Doctor</td><tr>';
                        while ($row = $viewdoctor->fetch_assoc()) {
                         

                            $html.='<tr><td>'.$row['customer_name'].'</td></td>'.$row['customer_email'].'</td><td>'.$row['od_name'].'</td><tr>';
                        }
                        $html = '</table>';
                        echo $html;

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include_once 'footer.php'; ?>