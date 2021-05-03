<?php include_once 'header.php'; 

  $per_page = 3;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;




?>

    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>our blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                       
 <?php
 if (isset($_GET['catid'])) { 
    $viewdoctor = $sc->selectalljoinTWOid('blog_table','blogcat_table','cat_id',$_GET['catid']);
                     
                        while ($row = $viewdoctor->fetch_assoc()) {

    ?>
    <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php echo $row['blog_image'];?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <!-- <h3>15</h3>
                                    <p>Jan</p> -->
                                    <?php 
                                    $timestamp = $row['date'];
                                     ?> 
                                     <p><?php  echo date("M d",strtotime($timestamp)); ?></p>
                                     <h3><?php echo date("yy",strtotime($timestamp)); ?></h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?blogpostid=<?php echo $row['blog_id'];?>">
                                    <h2><?php echo $row['blog_title'];?></h2>
                                </a>
                                <p><?php echo $row['blog_post'];?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> <?php echo $row['cat_name'];?></a></li>
                                    <li><a href="single-blog.php?blogpostid=<?php echo $row['blog_id'];?>"><i class="far fa-comments"></i>  <?php $blogcomment = $sc->selectallId('blogcomment_table','blog_id',$row['blog_id']); 
                     $get = mysqli_num_rows($blogcomment); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php }  ?>

    
                     <?php }else{

                      ?>

                    <?php

                    
                    $viewdoctor = $sc->selectalljoinTWOpagination($start_form,$per_page,'blog_table','blogcat_table','cat_id');
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="<?php echo $row['blog_image'];?>" alt="">
                                <a href="#" class="blog_item_date">
                                           <?php 
                                    $timestamp = $row['date'];
                                     ?> 
                                     <p><?php  echo date("M d",strtotime($timestamp)); ?></p>
                                     <h3><?php echo date("yy",strtotime($timestamp)); ?></h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?blogpostid=<?php echo $row['blog_id'];?>">
                                    <h2><?php echo $row['blog_title'];?></h2>
                                </a>
                                <p><?php echo $row['blog_post'];?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="far fa-user"></i> <?php echo $row['cat_name'];?></a></li>
                                    <li><a href="single-blog.php?blogpostid=<?php echo $row['blog_id'];?>"><i class="far fa-comments"></i>  <?php $blogcomment = $sc->selectallId('blogcomment_table','blog_id',$row['blog_id']); 
                     $get = mysqli_num_rows($blogcomment); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?> Comments</a></li>
                                </ul>
                            </div>
                        </article>
                    <?php } } }?>



<?php 
if (isset($_GET['catid'])) {
    
}else{

$getCourse =  $sc->selectalljoinTWO('blog_table','blogcat_table','cat_id');
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);

?>
  








                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                
                                <?php echo "<li class='page-item'>
                                    <a href='blog.php?page=1' class='page-link' aria-label='Previous'>
                                        <i class='ti-angle-left'></i>
                                    </a>
                                </li>";  
                                for ($i=1; $i <= $total_page; $i++) { 
                                        echo "
                                          <li class='page-item'><a class='page-link' href='blog.php?page=".$i."'>".$i."</a> </li>";
                                    };



                                 ?>
                                  <?php echo " <li class='page-item'><a href='blog.php?page=1' class='page-link' aria-label='Next'>
                                        <i class='ti-angle-right'></i>
                                    </a></li>"; ?>
     
                            </ul>
                        </nav>

<?php } ?>






                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                       

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                                      <ul class="list cat-list">
                                <?php
                    $viewdoctor = $sc->selectall('blogcat_table');
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>
                                <li>
                                    <a href="blog.php?catid=<?php echo $row['cat_id'];?>" class="d-flex">
                                        <p><?php echo $row['cat_name'];?> (<?php $catcount = $sc->selectalljoinTWOid('blog_table','blogcat_table','cat_id',($row['cat_id'])); 
                     $get = mysqli_num_rows($catcount); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?>)</p>
                                        
                                    </a>
                                </li>
                            <?php } } ?>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>

                  <?php
                    $viewdoctor = $sc->blogrecentpost('blog_table','blogcat_table','cat_id');
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                    ?>
                            <div class="media post_item">
                                <img style="width: 100px; height: 80px;" src="<?php echo $row['blog_image'];?>" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.php?blogpostid=<?php echo $row['blog_id'] ?>">
                                        <h3><?php echo $row['blog_title'];?></h3>
                                    </a>
                                    <p><?php echo $row['date'];?></p>
                                </div>
                            </div>
                             
                    <?php  } }?>
                             
                             
                        </aside>
 

                        

                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

      <?php include_once 'footer.php'; ?>