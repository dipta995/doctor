<?php include_once 'header.php'; ?>

    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>blog details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">


               <?php 
               $blogpostid = $_GET['blogpostid'];
               $getsingleblog = $sc->selectalljoinTWOidano('blog_table','blogcat_table','cat_id','blog_id',$blogpostid);
               while ($row = $getsingleblog->fetch_assoc()) {
            
                ?>




               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="<?php echo $row['blog_image']; ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $row['blog_title']; ?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i><?php echo $row['cat_name']; ?></a></li>
                        <li><a href="#"><i class="far fa-comments"></i>     <?php $blogcomment = $sc->selectallId('blogcomment_table','blog_id',$blogpostid); 
                     $get = mysqli_num_rows($blogcomment); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?> Comments</a></li>
                     </ul>
                     <p class="excert">
                       <?php echo $row['blog_post']; ?>
                     </p>
                  </div>
               </div>
            <?php } ?>
               
               <div class="comments-area">
                  <h4>

                     <?php $blogcomment = $sc->selectallId('blogcomment_table','blog_id',$blogpostid); 
                     $get = mysqli_num_rows($blogcomment); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?>



                   Comments</h4>

                  <?php 
                  $blogcomment = $sc->blogcommentview($blogpostid);
               while ($row = $blogcomment->fetch_assoc()) {

                   ?>

                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="<?php echo $row['image']; ?>" alt="">
                           </div>
                           <div class="desc">
                              <p class="comment">
                                <?php echo $row['comment']; ?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#"><?php echo $row['customer_name']; ?></a>
                                    </h5>
                                    <p class="date"><?php echo $row['date']; ?></p>
                                 </div>
                               

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } ?>
                 
               </div>




               <div class="comment-form">
                  <h4>Leave a Reply</h4>

                  <?php 
              
                   if($_SERVER['REQUEST_METHOD']=='POST'){
 
$login = $ic->blogmessageins($_POST,$customer_id); }
                   ?>
                  <form action="" method="post" >
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                                 <input type="hidden" value="<?php echo $_GET['blogpostid']; ?>" name="blog_id">
                           </div>
                        </div>
                        
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button btn_1 button-contactForm">Send Message</button>
                     </div>
                  </form>
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
                                        <p><?php echo $row['cat_name'];?> (
                                                <?php $catcount = $sc->selectalljoinTWOid('blog_table','blogcat_table','cat_id',($row['cat_id'])); 
                     $get = mysqli_num_rows($catcount); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                     ?>



                                        )</p>
                                        
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
   </section>
   <!--================Blog Area end =================-->
   <?php include_once 'footer.php'; ?>