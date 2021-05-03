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
                            <h2>Customer profile</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                              <?php 
                                       $viewdoctor = $sc->selectallId('customer_table','customer_id',$customer_id);
         
                        while ($row = $viewdoctor->fetch_assoc()) {

                               ?>
                                <div class="image-container">
                                    <img src="<?php echo $row['image'];?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                     
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
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Update Profile</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                                      <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
                    $login = $up->updateprofile($_POST,$_FILES,$customer_id);
                }
                    $viewdoctor = $sc->selectallId('customer_table','customer_id',$customer_id);
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>




 
                                 


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_name'];?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_birth'];?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_email'];?>
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
                                                <label style="font-weight:bold;">Phone</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_phone'];?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <?php echo $row['customer_address'];?>
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







                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                       <div class="single_text">
                        
                             <div class="single_blog_text">
                                <style type="text/css">
                                    .customform{
                                        width: 600px;
                                        height: auto;
                                        background-color: #c1dfff;
                                        padding-top: 30px;
                                        padding-bottom: 30px;
                                    }
                                    .customform label{
                                         margin-left: 50px;
                                         margin-top: 10px;

                                    }
                                    .customform .inputcls{
                                      
                                        height: 60px; width: auto; 
                                            
                                        }
                                    .customform .inputcls input{
                                          
                                            padding: 5px; width: 400px; border-radius: 5px;float: right; margin-right: 10px;
                                                
                                            }
                                            .genderway{
                                                margin-right: 159px;
                                                margin-top: -10px;
                                            }
                                    .genderway label,input{
                                        float: right;

                                    }

                                </style>
                            <br>
                            <form class="customform" action="" method="post" enctype= multipart/form-data>
                                <?php 
                                 $viewdoctor = $sc->selectallId('customer_table','customer_id',$customer_id);
                                    if ($viewdoctor) {
                                        while ($row = $viewdoctor->fetch_assoc()) {

                                 ?>
                                <div class="inputcls">
                                    
                                <label>Name</label>
                                <input  type="text" value="<?php echo $row['customer_name']; ?>"  name="customer_name">
                                </div>
                               <div class="inputcls">
                                    
                                <label>Email</label>
                                <input readonly  type="text" value="<?php echo $row['customer_email']; ?>"  name="customer_email">
                                </div>
                               
                                <div class="inputcls">
                                <label>Phone</label>
                                <input value="<?php echo $row['customer_phone']; ?>" type="text" name="customer_phone">
                                </div>
                                 <div class="inputcls">
                                <label>Depertment</label>
                                <input value="<?php echo $row['customer_address']; ?>" type="" name="customer_address">
                                </div>
                                <div class="inputcls">
                                <label>Blood</label>
                                <input readonly value="<?php echo $row['customer_blood']; ?>" type="" name="customer_blood">
                                </div>
                                
                                 
                                 <div class="genderway">
                                    <?php 
                                    if ($row['customer_gender']=='Male') {?>
                                    <label style="float: left;">Gender</label>
                               <input checked style="margin-top: 13px;" type="radio" id="male" name="customer_gender" value="Male">
                                <label for="male">Male</label>
                                <input style="margin-top: 13px;" type="radio" id="female" name="customer_gender" value="Female">
                                <label for="female">Female</label><br>
                            <?php }elseif($row['customer_gender']=='Female'){ ?>
                                <label style="float: left;">Gender</label>
                               <input  style="margin-top: 13px;" type="radio" id="male" name="customer_gender" value="Male">
                                <label for="male">Male</label>
                                <input checked style="margin-top: 13px;" type="radio" id="female" name="customer_gender" value="Female">
                                <label for="female">Female</label><br>
                            <?php }else{ ?>
                                 <label style="float: left;">Gender</label>
                               <input style="margin-top: 13px;" type="radio" id="male" name="customer_gender" value="Male">
                                <label for="male">Male</label>
                                <input style="margin-top: 13px;" type="radio" id="female" name="customer_gender" value="Female">
                                <label for="female">Female</label><br>
                            <?php } ?>
                            </div>
                            <div style="margin-top: 10px;" class="inputcls">
                                <label style="float: left;margin-left: -45px;"> </label>
                                 <input readonly value="<?php echo $row['customer_birth'];?>" style="margin-top: 0px;" type="date" name="customer_birth">
                             </div>

                              <div style="margin-top: 10px;" class="inputcls">
                                <label>Image</label>
                                 <input style="margin-top: 0px;" type="file" name="image">
                             </div>

                             
                         <?php } } ?>
                             <div style="margin-top: 20px;">
                                 <button style="margin-left: 50%" class="btn btn-primary">Save profile</button>
                             </div>
                            </form>
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


























 




    <!--::doctor_part start::-->
 
        <div class="container">
             
             <div class="row">.
                 

                 
                <div class="col-lg-6">
                    <div class="single_blog_item">
         







                        
                    </div>
                </div>
            <?php } } ?>
                 <div class="col-md-6">
                      <a id="notif"></a>

                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Appoinment time</th>
                                                <th>Doctor</th>
                                                <th> < > </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                             
                                $getnoti = $sc->notificationCustomercustomer($customer_id);
                                         $a = 0;
                                         while ($row = $getnoti->fetch_assoc()) {
                                             $a++;
                            
                                             ?>
            
                                            <tr>
                                                <td><?php echo $a; ?></td>

                                                 <td><?php echo $row['customer_name']; ?></td>
                                                 <td><?php echo $row['customer_email']; ?></td>
                                                 <td><?php echo $row['customer_phone']; ?></td>
                                                 <td><?php echo $row['customer_address']; ?></td>
                                                 <td><?php echo $row['appointment_date'].'('.$row['appointment_time'].')'; ?></td>
                                                  <td><?php echo $row['od_name']; ?></td>
                                                 
                                            </tr>
                            <?php } ?>

                                            
                                        </tbody>
                                    </table>
                 </div>
              
            
        </div>
        </div>
 
    <!--::doctor_part end::-->
 

     <?php include_once 'footer.php'; ?>