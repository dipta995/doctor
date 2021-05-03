<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                          
                            <li class="breadcrumb-item active"> <a class="btn btn-primary" href="blogpost.php">Insert Post</a></li>
                        </ol>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['deletepost'])) {
                                $delcat = $dl->deletewithimg('blog_table','blog_id',$_GET['deletepost']);
                               
                               
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
                                $insertcat = $ic->postInsert($_POST,$_FILES);
                            }
                           if (isset($insertcat)) {
                                echo $insertcat;
                            }
                            if ($_SERVER['REQUEST_METHOD']=='POST'  && isset($_POST['update'])) {
                                $upcat = $up->postUpdate($_POST,$_FILES,$_GET['editpost']);
                            }
                           if (isset($upcat)) {
                                echo $upcat;
                            }
                            if (!empty($_GET['editpost'])) {

                                $viewdoctor = $sc->selectalljoinTWOidmain('blog_table','blogcat_table','cat_id','blog_id',$_GET['editpost']);
                                while ($row = $viewdoctor->fetch_assoc()) {
                                ?>
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Category</label>
                                                <select name="cat_id">
                                                    <option name="cat_id" value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?> </option>
                                                    <?php
                                                       $viewdoctor = $sc->selectall('blogcat_table');
                                                     while ($rows = $viewdoctor->fetch_assoc()) {
                                                    ?>
                                                    <option name="cat_id" value="<?php echo $rows['cat_id'];?>"><?php echo $rows['cat_name'];?> </option>
                                                <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Post</label>
                                                <input class="form-control py-4" name="blog_title" type="text" value="<?php echo $row['blog_title'];?>">
                                            </div>
                                           <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Details</label>
                                                <textarea class="form-control py-4" name="blog_post"><?php echo $row['blog_post'];?></textarea>
                                            </div>
                                           <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Image</label>
                                                <input type="file" name="blog_image">
                                                <img style="width: 120px; height: 100px;" src="../<?php echo $row['blog_image'];?>">
                                            </div>
                                          
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                 <input class="btn btn-success" type="submit" name="update" value="Update Category">
                                            </div>
                                        </form>

                                
                           <?php } }else{


                            ?>

                         
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Category</label>
                                                <select name="cat_id">

                                                    <?php
                                                       $viewdoctor = $sc->selectall('blogcat_table');
                                                     while ($rows = $viewdoctor->fetch_assoc()) {
                                                    ?>
                                                    <option name="cat_id" value="<?php echo $rows['cat_id'];?>"><?php echo $rows['cat_name'];?> </option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                           <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Post Name</label>
                                                <input class="form-control py-4" name="blog_title" type="text" placeholder="Create New Category">
                                            </div>
                                           <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Details</label>
                                                <textarea class="form-control py-4" name="blog_post"> </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label class="large mb-1" for="inputEmailAddress">Image</label>
                                                <input class="form-control py-4" name="blog_image" type="file" >
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
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Details</th>
                                                <th>Category</th>
                                              <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                
                                        $viewdoctor = $sc->selectalljoinTWO('blog_table','blogcat_table','cat_id');
                                            $a = 0;
                                            while ($row = $viewdoctor->fetch_assoc()) {
                                                $a++;
                                    ?>
                                            <tr>
                                                <td><?php echo $a;?></td>
                                              
                                                <td ><img style="height: 80px; width: 100px;" src="../<?php echo $row['blog_image'];?>"> </td>
                                                <td><?php echo $row['blog_title'];?></td>
                                                <td><?php echo $row['blog_post'];?></td>
                                                <td><?php echo $row['cat_name'];?></td>
                                          
                                          
                                                <td>
                                                    
                                                    <a href="blogpost.php?editpost=<?php echo $row['blog_id'] ?>"><i style="padding: -10px; color: green;" class="fas fa-edit"></i></a> <span style="margin-right: 10px;"></span>
                                                    <a href="blogpost.php?deletepost=<?php echo $row['blog_id'] ?>"><i style="padding: -10px; color: red;" class="fa fa-trash"></i></a>
                                                    
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