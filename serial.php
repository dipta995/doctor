

<?php
include "header.php";
  Session::checkSession($redirect_link_var);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
  
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

  
    
    <br>
    <div class="limiter">
        <div class="container-login100">
            <div style="margin-top: 100px;" class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <form method="post" action="" class="login100-form validate-form">

                    <span class="login100-form-title p-b-33">
                       Appoinment at Clinic 

                    </span>
<span style="color:red; font-weight: 200px;">
      <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
 
$login = $ic->Serialfortretment($_POST,$customer_id);


}
    ?>

                      <?php if (isset($login)){
                    
                      echo $login;
                      }  ?>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Name of a Patient">
                         
                    </div><br>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                         
                    </div><br>
                    

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="phone" placeholder="mobile number">
                         
                    </div> <br>
                      <div class="rs1 validate-input">
                        <select  style="padding:5px; margin-bottom: 5px;" class="wrap-input100 validate-input" name="clinic_name" id="clinic_name">
            <option value="">--Choose Your Clinic--</option>
            <?php
            $viewdoctor = $sc->selectall('clinic_table');      
            while ($row = $viewdoctor->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['clinic_id']; ?>"><?php echo $row['clinic_name']; ?></option>
        <?php } ?>
        </select></div> <br>
                          <div class="wrap-input100 rs1 validate-input">
                     
                        <select style="padding:5px;" class="wrap-input100 validate-input" name="doctor" id="doctor">
                            <option>choose Clinic first</option>

           
                         </select></div><br>


                            <div class="wrap-input100  validate-input">
                                <textarea placeholder="describe Your Problem  shortly(OPTIONAL)" rows="4" cols="50" name="comment" class="input100"></textarea>
                        
                         
                    </div> <br>
                         
                 

                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    

    
 
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
 
    <script src="vendor/animsition/js/animsition.min.js"></script>
 
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
 
    <script src="vendor/select2/select2.min.js"></script>
 
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
 
    <script src="vendor/countdowntime/countdowntime.js"></script>
 
    <script src="js/main.js"></script>

</body>
</html>