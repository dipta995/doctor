<?php 
include_once 'header.php'; 
  // Session::checkSession($redirect_link_var);
?>

  <!-- breadcrumb start-->
  <section class="breadcrumb_part breadcrumb_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>contact</h2>
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
       


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Get in Touch</h2>
        </div>
        <div class="col-lg-8">
          <?php
          if (isset($_POST['submit'])) {
            $contact  = $ic->contactInsert($_POST,$customer_id);
            if ($contact) {
              echo $contact;
            }
          }

          ?>
          <form class="form-contact contact_form" action="" method="post">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" required name="c_message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="c_name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" required name="c_email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" required name="c_subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Enter Subject'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button type="submit" name="submit" class="button button-contactForm btn_1">Send Message</button>
            </div>
          </form>
        </div>
        <?php
                    $viewdoctor = $sc->selectall('office_table');
                    if ($viewdoctor) {
                        while ($row = $viewdoctor->fetch_assoc()) {
                ?>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3><?php echo $row['o_address'];?></h3>
              <p><?php echo $row['o_address_one'];?></p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><?php echo $row['o_phone'];?></h3>
              <p>Saturday to Thursday 10am to 10pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><?php echo $row['o_email'];?></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      <?php }  } ?>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

    <?php include_once 'footer.php'; ?>