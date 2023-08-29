<!DOCTYPE html>
<html lang="en">
<?php
    require 'head.php';
?>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    <header class="main-header header-style-one">
        <!--Header Top-->
        <?php
			require 'head-top.php';
		?>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <?php
			require 'head-upper.php';
		?>
        <!--End Header Upper-->

    	<!-- Mobile Menu  -->
        <?php
			require 'mobile-menu.php';
		?>
        <!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

    <!-- main -->
    <main class="main-content pt-8">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Đăng kí</h4>
                  <p class="mb-0">Chào mừng bạn</p>
                </div>
                <div class="card-body">
                  <form role="form" method="post" action="log.php">
                    <div class="mb-3">
                      <input required type="text" name="name" class="form-control form-control-lg" placeholder="Nhập họ và tên của bạn" aria-label="Name" id="Name">
                    </div>
                    <div class="mb-3">
                      <input required type="tel" name="phone" class="form-control form-control-lg" placeholder="Nhập số điện thoại" aria-label="Password" id="passInput">
                    </div>
                    <div class="mb-3">
                      <input required type="email" name="email" class="form-control form-control-lg" placeholder="Nhập Email" aria-label="Username">
                    </div>
                    <div class="mb-3">
                      <input required type="password" name="pass" class="form-control form-control-lg" placeholder="Nhập Mật khẩu" aria-label="Password" id="passInput">
                    </div>
                    <div class="mb-3">
                      <input required type="password" name="repass" class="form-control form-control-lg" placeholder="Nhập lại Mật khẩu" aria-label="Password" id="passReput">
                    </div>
                    <div class="mb-3 mt-n2 d-flex justify-content-center">                      
                      <button class="bg_white" type="button" id="showPasswordBtn">
                        <span class="txt">Hiện mật khẩu  </span><i class="fa fa-eye" aria-hidden="true"></i>
                      </button>
                    </div>
                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" class="theme-btn btn-style-four w-100 mt-n1 mb-0"><span class="txt">Đăng nhập</span></button>
                    </div>
                    
                  </form>
                </div>
                <script>
                  const passInput = document.getElementById('passInput');
                  const showPasswordBtn = document.getElementById('showPasswordBtn');
                  showPasswordBtn.addEventListener('click', () => {
                      if (passInput.type === 'password') {
                          passInput.type = 'text';
                          showPasswordBtn.innerHTML = 'Ẩn mật khẩu <i class="fa fa-eye-slash" aria-hidden="true"></i>';
                      } else {
                          passInput.type = 'password';
                          showPasswordBtn.innerHTML = 'Hiện mật khẩu <i class="fa fa-eye" aria-hidden="true"></i>';
                      }
                  });
                </script>

                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://images.unsplash.com/photo-1606744824163-985d376605aa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80'); background-size: cover;">
                <span class="bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">Đã là thành viên của Zink Orr'a?</h4>
                <p class="text-white position-relative">Đăng nhập ngay để có trải nghiệm tuyệt vời <br> và nhận những ưu đãi hấp dẫn!</p>
                <div class="text-center">
                  <a href="login.php" type="submit" class="theme-btn btn-style-two w-30 mt-5 mb-0"><span class="txt">Đăng nhập</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
	
	
	
	<!--Main Footer-->
    <?php
        include "footer.php";
    ?>
	
</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Scroll to top-->
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/isotope.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/script.js"></script>
</body>

<!-- stella-orre/shop.html  30 Nov 2019 03:52:14 GMT -->
</html>