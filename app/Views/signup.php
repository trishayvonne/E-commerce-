<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CloudDash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/vendors/feather/feather.css">
  <link rel="stylesheet" href="template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <style>
    .submit{
      display: flex;
      justify-content:center;
      align-items:center;
    }   
</style>
  <link rel="stylesheet" href="template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>register" method="post">
               
                <div class="form-group">
                  <input type="text"name="username"  class="form-control form-control-lg" value="<?= old('username'); ?>" id="username" placeholder="Username">
                 </div>
                <div class="form-group">
                  <input type="email" name="email"class="form-control form-control-lg"  value="<?= old('email'); ?>"  id="email"  placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" name="password"class="form-control form-control-lg" value="<?= old('password'); ?>" id="password" placeholder="Password">
                  </div>
                <div class="form-group">
                  <input type="password" name="confirmpassword"class="form-control form-control-lg" value="<?= old('confirmpassword'); ?>" id="confirmpassword" placeholder="Confirm Password">
                </div>
                <div class="mb-3 submit" > <input type="submit" value="Register" class="btn btn-primary"></div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="/signin" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  <script src="template/js/settings.js"></script>
  <script src="template/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
