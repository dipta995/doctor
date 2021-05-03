<?php include_once 'header.php';?>

  <!-- breadcrumb start-->
  <section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Confirm Appoinment</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
       

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Confirm Your Appoinment</h2>
        </div>
        <div class="col-lg-8">
          <?php
          if (isset($_POST['submit'])) {
            $contact  = $ic->bookingappoinment($_POST,$_GET['appointment'],$_GET['doctorid'],$customer_id);
            if ($contact) {
              echo $contact;
            }
          }

         $customer = $sc->selectallId('customer_table','customer_id',$customer_id);
             if ($customer) {
                        while ($row = $customer->fetch_assoc()) { 
          ?>
          <form class="form-contact contact_form" action="" method="post">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="customer_name" id="name" type="text" value="<?php echo  $row['customer_name']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="customer_email" id="name" type="text" value='<?php echo  $row['customer_email']; ?>'>
                </div>
              </div>
               <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="customer_phone" id="name" type="text" value='<?php echo  $row['customer_phone']; ?>'>
                </div>
              </div>
             <!--  <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="c_subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Doctor'" placeholder='Doctor'>
                </div>
              </div> -->
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" required name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" class="button button-contactForm btn_1">Submit Appoinment</button>
            </div>
          </form>
        <?php } } ?>
        </div>
        <?php
                    $viewdoctor = $sc->selectall('office_table');
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>
        <div class="col-lg-4">
          <div class="media contact-info">
             
          </div>
         
        </div>
      <?php }  } ?>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

    <?php include_once 'footer.php'; ?>