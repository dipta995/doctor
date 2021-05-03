<?php include_once 'header.php'; ?>
<?php
  Session::checkSession($redirect_link_var);
  $doctorid = $_GET['doctorid'];

    $per_page = 5;
if (isset($_GET["page"])) {
$page = $_GET["page"];
}else {
$page =1;
}
$start_form = ($page-1) * $per_page;  




?>
<style type="text/css">
.button-time{
background-color: #aaaac4;
color: #f00a0a;
width: 120px;
height: 100px;
font-size: 22px;
border: 2px solid #e6c9c9;
border-radius: 5px;
margin-top: 5px;
margin-left: -20px;
 
    }
   .button-time p{
        color:white; 
        font-size: 14px;
    } 
   .button-time, .time-a:hover {
background-color: green;
color: #f00a0a;
width: 117px;
font-size: 22px;
border: 2px solid #e6c9c9;
border-radius: 5px;
margin-top: 5px;
margin-left: -20px;

    }
</style>
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>doctors</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::doctor_part start::-->
    <section class="doctor_part single_page_doctor_part">
        <div class="container">
             
             <div class="row">
                <?php
    
                    $viewdoctor = $sc->selectallId('our_doctor_table','od_id',$doctorid);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>
                 
                <div class="col-lg-6">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img style="height: 100%; width: 100%;" src="<?php echo $row['od_image'];?>" alt="doctor">
                            <div class="social_icon">
                                <ul>
                                     
                                    
                                    <li><a href="<?php echo $row['od_skype'];?>"> <i class="ti-skype"></i> </a></li>

                                    <li><a href="message.php?messageid=<?php echo $row['od_id'];?>"> Message <i class="fas fa-envelope-square"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                  
                                <h3><?php echo $row['od_name'];?> </h3>
                                <div style="min-height: 70px;">
                                    <p><?php echo $row['od_desc'] ?></p>
                                </div> <br>
                                <div style="height: 50px;">
                                    
                          
                                <p style="margin-top: -14px;font-size: 22px;color: #2d7cfb;font-weight: 900;">Consultation fee:</p>
                                <p style="margin-top: -10px;font-size: 22px;color: #f90729;font-weight: 900; margin-left:180px;">৳</p>
                                <p style="margin-left: 200px;margin-top: -14px;font-size: 22px;color: #2d7cfb;font-weight: 900;"><?php echo $row['od_fee'];?></p>
                                </div>
                                 
                                  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <div style="min-height: 600px;">
                            <p>Comments:</p>
                            <hr>
                            <?php 
                            $commentview = $sc->commentview($start_form,$per_page,$doctorid);
                    
                        while ($result = $commentview->fetch_assoc()) {
                            ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <img style="height: 50px;width: 40px; border-radius: 5px;" src="<?php echo $result['image'] ;?>"> <p><?php echo $result['customer_name'] ;?></p>
                                </div>
                                <div class="col-md-10">
                                   <p><?php echo $result['comment'] ;?></p> 
                                </div>

                            </div> 
                            <hr>

                            <?php } ?>
                        </div>
                          <div style="margin-left: 30%;">

<?php 
$getCourse = $sc->commentviewcount($doctorid);
$total_rows = mysqli_num_rows($getCourse);
$total_page = ceil($total_rows/$per_page);
?>
                                
                                 <ul class="pagination pagination-sm">
             
            <?php
            $drids = $_GET['doctorid'];

      
            for ($i=1; $i <= $total_page; $i++) { 
                echo "<li class='page-item'><a class='page-link' href='single-dr.php?doctorid=$drids&page=".$i."'>".$i."</a>";
            }; ?>
         
  
                                    </ul> 
                            </div>
                            <br>
                        
                        <div>
                    <?php 
                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                        $sendcmd = $ic->commentinsert($_POST,$doctorid,$customer_id);


                    }?>
                            <form method="post" action="">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Comment</span>
                                  </div>
                                  <textarea name="comment" class="form-control" aria-label="With textarea"></textarea>
                                  <div style="margin-left:5px; margin-top: 20px;">
                                      
                                  <input class="btn btn-success" type="submit" value="Comment" name="submit">
                                  </div>
                                </div>
                                </form>
                        </div>



                            
                        </div>
                        </div>
                        
                </div>
               
     </a>
          <?php }} ?>
            
        </div>
        </div>
    </section>
    <!--::doctor_part end::-->

    <!--::regervation_part start::-->
      <a id="appointment"></a>
    <section class="regervation_part section_padding">
        <div class="container">
            <div class="row align-items-center regervation_content">
                <div class="col-lg-7">
                    <div class="regervation_part_iner">
                        <form>
                            <div class="row">
                                   <?php
                                    if (!isset($_GET['doctorid']) || $_GET['doctorid']==NULL) {
      
                                      }else{
                                       
                                      
                    $viewdoctor = $sc->selectalljoinTWOidcondition('appointment_table','our_doctor_table','od_id',$_GET['doctorid']);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                                if(strtotime($row['appointment_date']) > time()) {
                ?>          <a class="btn_2 d-none d-lg-block" href="bookappoinment.php?appointment=<?php echo $row['appointment_id'];?>&doctorid=<?php echo $_GET['doctorid']; ?>">

                  
                                <div class="col-md-3">
                                    
                                <div style="" class="button-time">
                                    <p><?php echo $row['appointment_date'] ?></p>
                                    <p>Time:<?php echo $row['appointment_time']; ?></p>
                                </div>
                              
                                </div> </a>
                            <?php } } } }?>
 
 
 

                                
                            </div>
                           
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="reservation_img">
                        <?php
                         if (!isset($_GET['doctorid']) || $_GET['doctorid']==NULL) {
      
                                      }else{
                                       
                        $docimg = $sc->selectallId('our_doctor_table','od_id',$_GET['doctorid']);
                        while ($row = $docimg->fetch_assoc()){


                        ?>
                        <img style="position: unset;" src="<?php echo $row['od_image']; ?>" alt="" class="reservation_img_iner">
                        
                    <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::regervation_part end::-->

     <?php include_once 'footer.php'; ?>