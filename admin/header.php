<?php
include "../library/Selectclass.php";
include "../library/Insertclass.php";
include "../library/Updateclass.php";
include "../library/Deleteclass.php";
include "../library/Sessionclass.php";

$sc = new Selectclass();
$ic = new Insertclass();
$up= new Updateclass();
$dl= new Deleteclass();
Session::checkSessiondr();
$admincheck = Session::get('admincheck');
 
if ($admincheck == 121) {
   
$drid = Session::get('od_id');
}else{
$drid = Session::get('od_id');

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Appoinment</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <?php 
                if ($admincheck == 121) {
                    echo "ADMIN PANEL";
                }else{
                    echo "DOCTOR PANEL";  }
                
                 
              
?>

            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <?php
if ($admincheck == 121) {

?>
             
              <ul>
                <a style="color: #ffb300;;" href="patient_msg.php"><i style="font-size: 25px;margin-top: 18px;" class="fa fa-envelope" aria-hidden="true"></i>


                    <?php 
                        $presentdate = date('Y-m-d');
                        $totalmsg = $sc->selectallId('contact_table','seen',0);
                        echo $get = mysqli_num_rows($totalmsg);
                        

                     ?>


                </a>
            </ul>

 



              <ul>
                <a style="color: #ffb300;;" href="notification.php"><i style="font-size: 25px;margin-top: 18px;" class="fa fa-bell" aria-hidden="true"></i>

                    <?php 
                        $presentdate = date('Y-m-d');
                        $dataget = $sc->notificationview($presentdate);
                    
                        
                        echo $get = mysqli_num_rows($dataget);
                        

                     ?>


                </a>
            </ul>




        <?php } ?>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a> 
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><?php echo Session::get('od_name') ?></a>
                                  <?php 
                if ($admincheck == 121) { ?>
                     
                <?php }else{ ?>
                    <a class="dropdown-item" href="profile.php">PRofile</a>
                <?php }?>
                        
                        <div class="dropdown-divider"></div>
                        <?php 
                        if (isset($_GET['action']) && $_GET['action']=='doctorlogout') {
                         session_destroy();
                            echo "<script> window.location='../doctorlogin.php'</script>";
                        }
                        if ($admincheck == 121) {  ?>
                        <a class="dropdown-item" href="login.php">Logout</a>
                    <?php }else{ ?>
                        <a class="dropdown-item" href="?action=doctorlogout">Logout</a>
                    <?php } ?>
                    </div>
                </li>
            </ul>
          
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>

                 
<?php
if ($admincheck == 121) {
 

?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="doctors.php">Doctors</a>
                                    <a class="nav-link" href="doctor-dept.php">Doctor's Dept</a>
                                    <a class="nav-link" href="appoinmentlist.php">Apoinment list</a>
                                    <a class="nav-link" href="patients.php">Patients</a>
                                    <a class="nav-link" href="about.php">Department(about)</a>
                                    <a class="nav-link" href="blogcat.php">Blog Category</a>
                                    <a class="nav-link" href="blogpost.php">Blog Post</a>
                                    <a class="nav-link" href="clinicadd.php">Add Clinic</a>
                                    <a class="nav-link" href="clinicdoctor.php">Add clinic doctor</a>
                                    <a class="nav-link" href="serialother.php">Third party Serial</a>
                                </nav>
                            </div>
                        <?php } ?>

                        <?php
                        if ($admincheck != 121) {
                        ?>
                              <a class="nav-link" href="message.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Communication
                            </a>
                            <a class="nav-link" href="appoinmentlist-dr.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Appoinment Schedule
                            </a>

                        <?php } ?>
                        
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo Session::get('od_name'); ?>
                    </div>
                </nav>
            </div>