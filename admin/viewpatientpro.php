<?php

 include_once 'header.php';
 $patientid = "";
 if (isset($_GET['messageid'])) {
     $patientid = $_GET['messageid'];
 }else{
     echo "<script> window.location = 'message.php';</script>";
 }


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
    body{
    padding-top: 68px;
    padding-bottom: 50px;
}
        .image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
</style>
    <!-- breadcrumb start-->
    <section class="breadcrumb_part breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Doctor profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


<div style="margin-left: 100px;" class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                              <?php 
                                       $viewdoctor = $sc->selectallId('customer_table','customer_id',$patientid);
         
                        while ($row = $viewdoctor->fetch_assoc()) {

                               ?>
                                <div class="image-container">
                                    <img src="../<?php echo $row['image'];?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                               <!--      <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div> -->
                     
                                <div class="userData ml-3">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="#"><?php echo $row['customer_name'];?></a></h2>
                                    <h6 class="d-block"><a href="#">Email:</a> <?php echo $row['customer_email'];?></h6>
                           
                                </div>
                                    <?php } ?>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                              
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                                      <?php
       
                    $viewdoctor = $sc->selectallId('customer_table','customer_id',$patientid);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>




 
                                 

 
                          
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Adderss</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_address'];?>
                                            </div>
                                        </div>
                                        <hr />
                  


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_gender'];?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Blood Group</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_blood'];?>
                                            </div>
                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_birth'];?>
                                            </div>
                                        </div>
                                 


                               
 







                                    </div>
                                 
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>




























 
    <!--::doctor_part end::-->
 

     <?php }} include_once 'footer.php'; ?>