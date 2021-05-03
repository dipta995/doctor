<?php include_once 'header.php'; ?>
<style type="text/css">
    .msg{
        height: 500px;
        width: 90%;
        margin: 0 auto;
    }
    .personsingle{
        float: left;
        border: 1px solid blue;
    } 
    .personsingle a img{
        height: 50px;
width: 65px;
border-radius: 10px; 
margin-left: 42px;
margin-top: 5px;
     }
     .personsingle a h3{
        font-size: 14px;
        font-weight: 400;
        text-align: center;
        color: ##060606;
     }
     
</style>
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>depertments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- our depertment part start-->
 
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div style="margin: 70px"></div>
                    <div class="depertment_content">
                        <div style="float: right;">
                                <?php 
                                    if ($_SERVER['REQUEST_METHOD']=='POST') {
                                        $sendcmd = $ic->sendmsgdoctor($_POST,$_FILES,$_GET['messageid'],$drid);
                                    }?>
                             
                                 <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Message</span>
                                  </div>
                                           <textarea name="message_d" class="form-control" aria-label="With textarea"></textarea>
                                      <div style="margin-left:5px; margin-top: 20px;">
                                    <input style="width: 100px;" type="file" name="image_d">  
                                  <input class="btn btn-success" type="submit" value="Message" name="submit">
                              
                             
                                      </div>
                                </div>
                                </form>
                             </div>
                        <div class="msg row">
                            <div style="background-image: url(../img/elements/primary-check.png);
    height: 400px;
    border: 1px solid #f76f6f;
    overflow: auto;
    background-blend-mode: darken;" class="col-md-3">
                                <?php
                                    $friendview = $sc->friendviewbydr($drid);
                    
                        while ($result = $friendview->fetch_assoc()) {
                                ?>
                                
                            <div style="float: left;
    border: 2px solid #22222375;
    width: 100%;
    margin-top: 10px; border-radius: 10px;" class="personsingle">
                                <a style="float: left;" href="?messageid=<?php echo $result['customer_id'];?> ">
                                    <img src="../<?php echo $result['image'];?>">
                                     <p style="font-weight: 600;color: red;text-align: center;" ><?php echo $result['customer_name'];?></p><a class="btn btn-danger" href="viewpatientpro.php?messageid=<?php echo $result['customer_id'];?>">View Profile</a>
                                </a>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="col-md-1"></div>

                                 <div style="background-image: url('../img/elements/success-check.png');height:500px;width:120px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;"  class="col-md-8">

                            <div style="height: 100%;">
                                <?php

                                if (isset($_GET['messageid'])) {
                           
                                $messageview = $sc->messageviewdr($_GET['messageid'],$drid);
                    
                        while ($result = $messageview->fetch_assoc()) { 
                                                     ?>
                                <div>
                                    
                                    <?php if ($result['image_p']!=NULL){ ?>
                                        <p title="time:<?php echo $result['msgtime'];?>" style="margin:20px;padding-left:10px;text-align: left;color: #443a3a;font-size: 14px;border-radius: 10px;background-color: #eff4f7;"><?php echo $result['message_p'];?></p><br>
                                        <a target="_blank" href="../../doctor/<?php echo $result['image_p'];?>">
                                    <img title="time:<?php echo $result['msgtime'];?>" style="height: 80px;width: 163px;margin-top: -30px;margin-right: 227px;"src="../<?php echo $result['image_p'];?>">
                                </a><br>
                                    <?php }else{ ?>
                                        <p title="time:<?php echo $result['msgtime'];?>" style="margin:20px;padding-left:10px;text-align: left;color: #443a3a;font-size: 14px;border-radius: 10px;background-color: #eff4f7;"><?php echo $result['message_p'];?></p><br>

                                    <?php } ?>
                                </div>
                                <div>
                                      
                                    <?php if ($result['image_d']!=NULL){ ?>
                                        <p title="send at:<?php echo $result['msgtime'];?>" style="margin:20px;padding-right:10px;text-align: right;color: #443a3a;font-size: 14px;border-radius: 10px;background-color: #DCF8C6;"><?php echo $result['message_d'];?></p><br>
                                        <a target="_blank" href="../../doctor/<?php echo $result['image_d'];?>">
                                    <img title="send at:<?php echo $result['msgtime'];?>" style="height: 80px;width: 163px;margin-top: -30px;margin-left: 227px;"src="../<?php echo $result['image_d'];?>"></a><br>
                                    <?php }else{ ?>
                                        <p title="send at:<?php echo $result['msgtime'];?>" style="margin: 20px;padding-right:10px;text-align: right;color: #443a3a;font-size: 14px;border-radius: 10px;background-color: #DCF8C6;"><?php echo $result['message_d'];?></p>

                                    <?php } ?>
                                </div>
                            <?php } } ?>
                                
                            </div>
                           
                             
                             
                        </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
   
    <!-- our depertment part end-->

   

      <?php include_once 'footer.php'; ?>