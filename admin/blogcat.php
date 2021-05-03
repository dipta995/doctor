<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                          
                            <li class="breadcrumb-item active"> <a class="btn btn-primary" href="blogcat.php">Insert Category</a></li>
                        </ol>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['deltecatid'])) {
                                $delcat = $dl->delmultable('blogcat_table','blog_table','cat_id',$_GET['deltecatid']);
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                $insertcat = $ic->catInsert($_POST);
                            }
                           if (isset($insertcat)) {
                                echo $insertcat;
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['update'])) {
                                $upcat = $up->catUpdate($_POST,$_GET['editcatid']);
                            }
                           if (isset($upcat)) {
                                echo $upcat;
                            }
                            if (!empty($_GET['editcatid'])) {

                                $viewdoctor = $sc->selectallId('blogcat_table','cat_id',$_GET['editcatid']);
                                while ($row = $viewdoctor->fetch_assoc()) {
                                ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Category</label>
                                                <input class="form-control py-4" name="cat_name" type="text" value="<?php echo $row['cat_name'];?>">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="update" value="Update Category">
                                            </div>
                                        </form>

                                
                           <?php } }else{


                            ?>

                         
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Category</label>
                                                <input class="form-control py-4" name="cat_name" type="text" placeholder="Create New Category">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="submit" value="Add Category">
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
                                
                                        $viewdoctor = $sc->selectall('blogcat_table');
                                            $a = 0;
                                            while ($row = $viewdoctor->fetch_assoc()) {
                                                $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td><?php echo $row['cat_name'];?></td>
                                          
                                          
                                                <td>
                                                    
                                                    <a href="blogcat.php?editcatid=<?php echo $row['cat_id'] ?>"><i style="padding: -10px; color: green;" class="fas fa-edit"></i></a> <span style="margin-right: 10px;"></span>
                                                    <a href="blogcat.php?deltecatid=<?php echo $row['cat_id'] ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
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