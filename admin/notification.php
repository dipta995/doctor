<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Doctor's List</li>
                        </ol>
                     
                        <div class="card mb-4">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Appoinment time</th>
                                                <th>Doctor</th>
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $presentdate = date('Y-m-d');
                                $getnoti = $sc->notificationCustomerDoctor($presentdate);
                                         $a = 0;
                                         while ($row = $getnoti->fetch_assoc()) {
                                             $a++;
                            
                                             ?>
            
                                            <tr>
                                                <td><?php echo $a; ?></td>

                                                 <td><?php echo $row['customer_name']; ?></td>
                                                 <td><?php echo $row['customer_email']; ?></td>
                                                 <td><?php echo $row['customer_phone']; ?></td>
                                                 <td><?php echo $row['customer_address']; ?></td>
                                                 <td><?php echo $row['appointment_date'].'('.$row['appointment_time'].')'; ?></td>
                                                  <td><?php echo $row['od_name']; ?></td>
                                                 
                                            
                                                <td>
                                                   
                                                    <a href="viewdoctor.php">Send Mail</a>
                                                </td>
                                                
                                            </tr>
                            <?php } ?>

                                            
                                        </tbody>
                                    </table>
                            <div class="card-body">
                                <div class="table-responsive">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


<?php include_once 'footer.php'; ?>