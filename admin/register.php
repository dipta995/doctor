

<?php
include "../library/Selectclass.php";
include "../library/Insertclass.php";
include "../library/Updateclass.php";

$sc = new Selectclass();
$ic = new Insertclass();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $getdoctor = $ic->insertourdoctor($_POST,$_FILES);
    
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
        <title>Doctor Registration</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account As a Register Doctor</h3>
                                        <?php 
                                        if (isset($getdoctor)) {
        echo $getdoctor;
    }
                                        ?>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Name</label>
                                                        <input class="form-control py-4" id="inputFirstName" name="od_name" type="text" placeholder="Enter Your Full Name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Phone Number</label>
                                                        <input name="od_phone" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter Your Contact Number" />
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                        <input name="od_email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">MY Fee (TAKA)</label>
                                                        <input name="od_fee" class="form-control py-4" id="inputLastName" type="text" placeholder="Ammount" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Password</label>
                                                        <input name="od_pass" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Enter Your password" />
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Skype</label>
                                                        <input name="od_skype" class="form-control py-4" id="inputLastName" type="text" placeholder="Entery Your Skype Id" />
                                                    </div>
                                                </div>
                                            </div>
                                
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Department</label>
                                                        <!-- <input name="od_dept" class="form-control py-4"  type="text" placeholder="Enter Dept Name" /> -->
                                                        <select class="form-control" name="dept_id" >
                                                              <?php 
                                        $deptview = $sc->selectall('dept_table');
                   
                                        while ($row = $deptview->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['dept_id'] ?>"><?php echo $row['dept_name'] ?></option>
                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Profile Image</label>
                                                <input name="od_image" class="form-control" id="inputEmailAddress" type="file"/>
                                                    </div>
                                                </div>
                                                  <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputEmailAddress">Valid Documentation</label>
                                                <input name="od_valid" class="form-control" id="inputEmailAddress" type="file"/>
                                                    </div>
                                                </div>

                                            
                                               
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Sign Up</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="../doctorlogin.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php include_once 'footer.php'; ?>