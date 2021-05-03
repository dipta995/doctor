<?php include_once 'header.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                          <?php 
                if ($admincheck == 121) {
                    echo " WELCOME TO ADMIN PANEL";
                }else{
                    echo "WELCOME ".Session::get('od_name');  }
                
                 
              
?>

                            </li>
                        </ol>
                      
                    </div>
                </main>
                 <?php include_once 'footer.php'; ?>