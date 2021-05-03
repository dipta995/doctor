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
                                                <th>Subject</th>
                                                <th>Message</th>
                                             
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            if (isset($_GET['read'])) {
                                                $up->updatecontactformmsg($_GET['read']);
                                                 
                                            }
                                                      if (isset($_GET['unread'])) {
                                                            $up->updatecontactformmsgun($_GET['unread']);
                                                             
                                                        }


                                            $presentdate = date('Y-m-d');
                                $getnoti = $sc->selectallId('contact_table','seen',0);
                                         $a = 0;
                                         while ($row = $getnoti->fetch_assoc()) {
                                             $a++;
                            
                                             ?>
            
                                            <tr>
                                                <td><?php echo $a; ?></td>

                                                 <td><?php echo $row['c_name']; ?></td>
                                                 <td><?php echo $row['c_email']; ?></td>
                                                 <td><?php echo $row['c_subject']; ?></td>
                                                 <td><?php echo $row['c_message']; ?></td>
                                                
                                               
                                                 
                                            
                                                <td>
                                                   
                                                    <a href="?read=<?php echo $row['c_id'];  ?>"> READ</a>
                                                </td>
                                                
                                            </tr>
                            <?php } ?>

                                            
                                        </tbody>
                                    </table>


                                    <hr>


                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                             
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                            if (isset($_GET['read'])) {
                                                $up->updatecontactformmsg($_GET['read']);
                                                 
                                            }
                                            $presentdate = date('Y-m-d');
                                $getnoti = $sc->selectallId('contact_table','seen',1);
                                         $a = 0;
                                         while ($row = $getnoti->fetch_assoc()) {
                                             $a++;
                            
                                             ?>
            
                                            <tr>
                                                <td><?php echo $a; ?></td>

                                                 <td><?php echo $row['c_name']; ?></td>
                                                 <td><?php echo $row['c_email']; ?></td>
                                                 <td><?php echo $row['c_subject']; ?></td>
                                                 <td><?php echo $row['c_message']; ?></td>
                                                
                                               
                                                 
                                            
                                                <td>
                                                   
                                                    <a href="?unread=<?php echo $row['c_id'];  ?>"> Unread</a>
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