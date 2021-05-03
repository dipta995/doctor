<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                          
                            <li class="breadcrumb-item active"> <a class="btn btn-primary" href="clinicadd.php">Insert Clinic's Name</a></li>
                        </ol>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['deleteclid'])) {
                                $delcat = $dl->deletebasic('clinic_table','clinic_id',$_GET['deleteclid']);
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                $insertcat = $ic->clInsert($_POST);
                            }
                           if (isset($insertcat)) {
                                echo $insertcat;
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['update'])) {
                                $upcat = $up->clUpdate($_POST,$_GET['editclid']);
                            }
                           if (isset($upcat)) {
                                echo $upcat;
                            }
                            if (!empty($_GET['editclid'])) {

                                $viewdoctor = $sc->selectallId('clinic_table','clinic_id',$_GET['editclid']);
                                while ($row = $viewdoctor->fetch_assoc()) {
                                ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Clinic's Name</label>
                                                <input class="form-control py-4" name="clinic_name" type="text" value="<?php echo $row['clinic_name'];?>">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="update" value="Update Clinic's Name">
                                            </div>
                                        </form>

                                
                           <?php } }else{


                            ?>

                         
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Clinic's Name</label>
                                                <input class="form-control py-4" name="clinic_name" type="text" placeholder="Create New Category">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="submit" value="Add Clinic's Name">
                                            </div>
                                        </form>
<?php }
                            ?>

                                    </div>
                     
                        <div class="card mb-4">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Name</th>
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                
                                        $viewdoctor = $sc->selectall('clinic_table');
                                            $a = 0;
                                            while ($row = $viewdoctor->fetch_assoc()) {
                                                $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td><?php echo $row['clinic_name'];?></td>
                                          
                                          
                                                <td>
                                                    
                                                    <a href="clinicadd.php?editclid=<?php echo $row['clinic_id'] ?>"><i style="padding: -10px; color: green;" class="fas fa-edit"></i></a> <span style="margin-right: 10px;"></span>
                                                    <a href="clinicadd.php?deleteclid=<?php echo $row['clinic_id'] ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
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