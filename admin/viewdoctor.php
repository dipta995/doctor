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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Designation</th>
                                                <th>Details</th>
                                                <th>Details</th>
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php
                $doctorid = $_GET['doctorid'];
                    $viewdoctor = $sc->selectallId('our_doctor_table','od_id',$doctorid);
                        $a = 0;
                        while ($row = $viewdoctor->fetch_assoc()) {
                            $a++;
                ?>
                                            <tr>
    
                                                <iframe  type="application/pdf" src="../<?php echo $row['od_valid'];?>" width="100%" height="400px"></iframe> </object>
                                              
                                                <td><img style="height: 100px; width: 80px;" src="../<?php echo $row['od_image'];?>"></td>
                                                <td><?php echo $row['od_name'];?></td>
                                                <td><?php echo $row['od_email'];?></td>
                                                <td><?php echo $row['od_phone'];?></td>
                                                <td><?php echo $row['od_dept'];?></td>
                                                <td><?php echo $row['od_desc'];?></td>
                                                <td><?php echo $row['od_skype'];?></td>
                                                <td>
                                                   
                                                    <a href="viewdoctor.php">Remove</a>
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
                </main>





             <?php include_once 'footer.php'; ?>