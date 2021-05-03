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
                            
                             <div class="card-body">
                                <?php
                                      if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insert'])){
                                        $postinsert = $ic->aboutdeptinsert($_POST);
                                        if (isset($postinsert)) {
                                          echo $postinsert;
                                        }
                                    }
                                    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['insertabout'])){
                                        $postinsert = $up->aboutinsert($_POST,1);
                                        if (isset($postinsert)) {
                                          echo $postinsert;
                                        }
                                    }
                                                    ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Department title</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="d_name" type="text" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Details</label>
                                                <textarea class="form-control py-4" id="inputEmailAddress" name="d_description"></textarea>
                                            </div>
                                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                               <input class="btn btn-primary" name="insert" type="submit" name="Add">
                                               
                                            </div>
                                        </form> 
                                        <form method="post" action="">
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Details</label>
                                                                            <?php
                    $viewabout = $sc->selectall('about_table');
                       
                        while ($row = $viewabout->fetch_assoc()) {
                          
                ?>
                                                <textarea class="form-control py-4" id="inputEmailAddress" name="about_details"><?php echo $row['about_details'];?></textarea>
                                                 <?php } ?>
                                            </div>
                                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                           
                                               <input class="btn btn-primary" name="insertabout" type="submit" name="Add">
                                          
                                               
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </main>
               <?php include_once 'footer.php'; ?>