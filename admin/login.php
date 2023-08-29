<!DOCTYPE html>
<html>
  <?php
    require 'head.php';
  ?>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Zink Orr'a</h1>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action="log.php" method="get" class="form-validate">
                    <div class="form-group">
                      <input id="login-username" type="text" name="email" required data-msg="Vui lòng nhập email đăng nhập" class="input-material">
                      <label for="login-username" class="label-material">Email đăng nhập</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="pw" required data-msg="Vui lòng nhập mật khẩu" class="input-material">
                      <label for="login-password" class="label-material">Mật khẩu</label>
                    </div>
                    <button type="submit" id="login" class="btn btn-primary">Đăng nhập</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                  <a href="#" class="forgot-pass">Quên mật khẩu?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>2018 &copy; Zink Orr'a <a href="../index.php"> Trang bán hàng</a></p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>