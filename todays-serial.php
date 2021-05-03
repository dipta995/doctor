<?php include_once 'header.php'; ?>
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>about us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
          
       
                     
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
                                                 
                                    
                                           
                                                
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                 
                                        <tbody>
                 <?php

    $today = date("Y-m-d");
                    $viewdoctor = $sc->selectforappoinmentlistthirdtoday($today);
                    $a=0;
                   
                        while ($row = $viewdoctor->fetch_assoc()) {
                            $a++;
                         
                ?>
                                            <tr>
                                            	<td><?php echo $a;?></td>
                                               
                                                <td><?php echo $row['clinic_name'];?></td>
                                                <td><?php echo $row['doctor_name'];?></td>
                                                
                                                <td><?php echo $row['name'];?></td>
                                         
                                                <!-- <td>
                                                	
                                                    <a href="#">Remove</a>
                                                </td> -->
                                                
                                            </tr>
                                     <?php }  ?>

                                            
                                        </tbody>
                                    </table>
   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include_once 'footer.php'; ?>