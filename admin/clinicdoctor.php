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
                            if (isset($_GET['deletedoctor'])) {
                                $delcat = $dl->deletebasic('doctor_table','doctor_id',$_GET['deletedoctor']);
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                $insertcat = $ic->drInsert($_POST);
                            }
                           if (isset($insertcat)) {
                                echo $insertcat;
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['update'])) {
                                $upcat = $up->drUpdate($_POST,$_GET['editdoctor']);
                            }
                           if (isset($upcat)) {
                                echo $upcat;
                            }
                            if (!empty($_GET['editdoctor'])) {

                                $viewdoctor = $sc->selectalljoinTWOidmain('doctor_table','clinic_table','clinic_id','doctor_id',$_GET['editdoctor']);
                                while ($row = $viewdoctor->fetch_assoc()) {
                                ?>
                                        <form method="post" action="">
                                             <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Clinic's Name</label>
                                                <select class="form-control" name="clinic_id">
                                                    <option name="clinic_id" value="<?php echo $row['clinic_id']; ?>"><?php echo $row['clinic_name']; ?></option>
                                                    <?php
                                                    $viewdoctors = $sc->selectall('clinic_table');
                                                    while ($rows= $viewdoctors->fetch_assoc()) {
                                                    ?>

                                                    <option name="clinic_id" value="<?php echo $rows['clinic_id']; ?>"><?php echo $rows['clinic_name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Doctor's Name</label>
                                                <input class="form-control py-4" name="doctor_name" type="text" value="<?php echo $row['doctor_name'];?>">
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
                                                <select class="form-control" name="clinic_id">
                                                    <option>--select--</option>
                                                    <?php
                                                    $viewdoctor = $sc->selectall('clinic_table');
                                                    while ($row = $viewdoctor->fetch_assoc()) {
                                                    ?>

                                                    <option value="<?php echo $row['clinic_id']; ?>"><?php echo $row['clinic_name']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                          <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Doctor's Name</label>
                                                <input class="form-control py-4" name="doctor_name" type="text" placeholder="Enter Available Doctor">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="submit" value="Add Doctor">
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
                                                <th>Clinic</th>
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                
                                        $viewdoctor = $sc->selectalljoinTWO('doctor_table','clinic_table','clinic_id');
                                            $a = 0;
                                            while ($row = $viewdoctor->fetch_assoc()) {
                                                $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td><?php echo $row['doctor_name'];?></td>
                                                <td><?php echo $row['clinic_name'];?></td>
                                          
                                          
                                                <td>
                                                    
                                                    <a href="clinicdoctor.php?editdoctor=<?php echo $row['doctor_id'] ?>"><i style="padding: -10px; color: green;" class="fas fa-edit"></i></a> <span style="margin-right: 10px;"></span>
                                                    <a href="clinicdoctor.php?deletedoctor=<?php echo $row['doctor_id'] ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
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