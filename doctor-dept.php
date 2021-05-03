<?php include_once 'header.php'; ?>
<?php
  Session::checkSession($redirect_link_var);

 

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
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2> Experienced Doctors</h2>
                        <p>Face replenish sea good winged bearing years air divide wasHave night male also</p>
                    </div>
                </div>
            </div>
            <style type="text/css">
                a.tip {
    border-bottom: 1px dashed;
    text-decoration: none
}
a.tip:hover {
    cursor: help;
    position: relative
}
a.tip title {
    display: none
}

            </style>
             <div class="row">
                <?php
    
                    $viewdoctor = $sc->selectalljoinTWOid('our_doctor_table','dept_table','dept_id',$_GET['deptid']);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>

                
                <div class="col-sm-6 col-lg-3">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <a class="tip" title="<?php echo  strip_tags($row['od_desc'].'
                 '.$row['od_email']); ?>" href="single-dr.php?doctorid=<?php echo  $row['od_id']; ?>#appointment">
                            <img style="width: 160px; height: 180px;" src="<?php echo $row['od_image'];?>" alt="doctor">
                                 </a>
                            <div class="social_icon">
                               
                            </div>
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">    
                                <h3><?php echo $row['od_name'];?></h3>
                                <p><?php echo $row['dept_name'];?></p>
                                <a class="btn btn-primary" href="single-dr.php?doctorid=<?php echo $row['od_id'];?>#appointment">GO FOR MORE >> </a>
                                  
                            </div>
                        </div>
                    </div>
                </div>
               

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
                ?>          <a class="btn_2 d-none d-lg-block" href="bookappoinment.php?appointment=<?php echo $row['appointment_id'];?>&doctorid=<?php echo $_GET['doctorid']; ?>">
                                <div class="col-md-3">
                                    
                                <div style="" class="button-time">
                                    <p><?php echo $row['appointment_day'].",". $row['appointment_date'] ?></p>
                                    <p>Time:<?php echo $row['appointment_time']; ?></p>
                                </div>
                              
                                </div> </a>
                            <?php } } }?>
     
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