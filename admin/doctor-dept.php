<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                          
                            <li class="breadcrumb-item active"> <a class="btn btn-primary" href="doctor-dept.php">Insert Department's Name</a></li>
                        </ol>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['deleteclid'])) {
                                $delcat = $dl->deletebasic('dept_table','dept_id',$_GET['deleteclid']);
                                echo "<script> window.location = 'doctor-dept.php';</script>";
                                
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                $insertcat = $ic->deptInsert($_POST);
                            }
                           if (isset($insertcat)) {
                                echo $insertcat;
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['update'])) {
                                $upcat = $up->deptUpdate($_POST,$_GET['editdept']);
                            }
                           if (isset($upcat)) {
                                echo $upcat;
                            }
                            if (!empty($_GET['editdept'])) {

                                $viewdoctor = $sc->selectallId('dept_table','dept_id',$_GET['editdept']);
                                while ($row = $viewdoctor->fetch_assoc()) {
                                ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">department's Name</label>
                                                <input class="form-control py-4" name="dept_name" type="text" value="<?php echo $row['dept_name'];?>">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="update" value="Update Department Name">
                                            </div>
                                        </form>

                                
                           <?php } }else{


                            ?>

                         
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Department's Name</label>
                                                <input class="form-control py-4" name="dept_name"  type="text" placeholder="Enter department name">
         
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="submit" value="Add DEPT Name">
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
                                
                                        $viewdoctor = $sc->selectall('dept_table');
                                            $a = 0;
                                            while ($row = $viewdoctor->fetch_assoc()) {
                                                $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td><?php echo $row['dept_name'];?></td>
                                          
                                          
                                                <td>
                                                    
                                                    <a href="doctor-dept.php?editdept=<?php echo $row['dept_id'] ?>"><i style="padding: -10px; color: green;" class="fas fa-edit"></i></a> <span style="margin-right: 10px;"></span>
                                                    <a href="doctor-dept.php?deleteclid=<?php echo $row['dept_id'] ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
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