<?php
include "library/Selectclass.php";
include "library/Insertclass.php";
include "library/Updateclass.php";
include "library/Sessionclass.php";
$protocol = $_SERVER['SERVER_PROTOCOL'];
if (strpos($protocol,"HTTPS")) {
   $protocol = "HTTPS://";
}else{
    $protocol = "HTTP://";
}
$redirect_link_var = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
Session::blankSession();
$sc = new Selectclass();
$ic = new Insertclass();
$up= new Updateclass();
$customer_id =Session::get('customer_id');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>medical</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/swc.css">
    <link rel="stylesheet" href="css/style.css">
    
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

<!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

 

<script src="js/jquery.bpopup.min.js"></script>

 

<script>
$( document ).ready(function() {
    $('#popup_this').bPopup();
});
</script> -->





















  
 <script type="text/javascript">
   $(document).ready(function(){

      
       $("#clinic_name").change(function(){
             var clinic_name=$("#clinic_name").val();
             $.ajax({
                type:"post",
                url:"ajax.php",
                data:"clinic_name="+clinic_name,
                success:function(data){
                      $("#doctor").html(data);
                }
             });
       });
   });
</script>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php"> <img src="img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-center"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">about</a>
                                </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="todays-serial.php">Todays Serial</a>
                                </li>
                                 

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="doctor.php" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Doctors
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php 
                                        $deptview = $sc->selectall('dept_table');
                   
                                        while ($row = $deptview->fetch_assoc()) {
                                        ?>
                                        <a class="dropdown-item" href="doctor-dept.php?deptid=<?php echo $row['dept_id']; ?>"><?php echo $row['dept_name']; ?></a>
                                        <?php } ?>
                                       
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.php">Blog</a>
                                </li>
                                 
                                <!-- login -->
                                <?php
                                     
                    if (Session::get('customer_id') != true) {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Log in
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="login.php">User</a>
                                      <a class="dropdown-item" href="doctorlogin.php">Doctor</a>
                                    </div>
                                   </li>
                               <?php } ?>


                  <?php
                                     
                    if (Session::get('customer_id') == true) {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="login.php" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php
                      echo Session::get('customer_name');
               
                     
                  
                                       ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="profile.php"> Profile</a>
                                        <a class="dropdown-item" href="message.php">message</a>
                                        <a class="dropdown-item" href="?action=logout">Logout</a>
                                    </div>
                                  <?php      } else{  ?>
                                    <li class="nav-item">
                                    <!-- <a class="nav-link" href="login.php">Login</a> -->
                                </li>

                                  <?php } 
                                 
                    if (isset($_GET['action']) && $_GET['action']== 'logout') {
                        Session::destroy();
                    }
                    ?>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                         <a style="width: 120px; padding:10px 30px; margin:0px 5px;" class="btn_2 d-none d-lg-block" href="serial.php">Serial</a>
                         <a style="width: 120px; padding:10px 10px; margin-left:10px;" class="btn_2 d-none d-lg-block" href="doctor.php">Consultation</a>
                       <!--  <a style="margin-left: 10px;" class="btn_2 d-none d-lg-block" href="profile.php">HOT LINE- 09856  -->
 <?php 
                        if ($customer_id==true) { ?><a href="profile.php#notif">
                            <i style="font-size: 22px; color: red; margin:0px 8px;" class="fa fa-bell" aria-hidden="true"></i> <?php
                         
                        

                            $presentdate = date('Y-m-d');
                        $dataget = $sc->notificationviewCustomer($presentdate,$customer_id);
                    
                        
                        $get = mysqli_num_rows($dataget); 
                        if ($get>0) {
                            echo $get;
                        }else{
                            echo '0';
                        }

                    }
                             ?></a></a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->