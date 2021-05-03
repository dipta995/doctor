<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                           <a href="exportfilethird.php"> <button class="btn btn-primary">Download EXcell Sheet</button></a>
                        </ol>
                     
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Medicle</th>
                                                <th>Doctor</th>
                                                <th>Patient</th>
                                                 
                                                <th>email</th>
                                                
                                                <th>Comment</th>
                                                
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                 <?php
                 if (isset($_GET['removeser'])) {
                     $dl->deletebasic('thirdparty_table','third_id',$_GET['removeser']);
                 }
                    $viewdoctor = $sc->selectforappoinmentlistthird();
                   		$a = 0;
                        while ($row = $viewdoctor->fetch_assoc()) {
                        	$a++;
                ?>
                                            <tr>
                                            	<td><?php echo $a;?></td>
                                               
                                                <td><?php echo $row['clinic_name'];?></td>
                                                <td><?php echo $row['doctor_name'];?></td>
                                                
                                                <td><?php echo $row['name'].'('.$row['phone'].')';?></td>
                                                
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['comment'];?></td>
                                                <td><a href="?removeser=<?php echo $row['third_id'];?>">Remove</a></td>
                                                <!-- <td>
                                                	
                                                    <a href="#">Remove</a>
                                                </td> -->
                                                
                                            </tr>
                                     <?php }  ?>

                                            
                                        </tbody>
                                    </table>
                                    <?php
      $viewdoctor = $sc->selectforappoinmentlist();
                         
                        $html = '<table><tr><td>name</td><td>city</td><td>email</td><tr>';
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