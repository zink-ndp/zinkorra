<!DOCTYPE html>
<html lang="en">

<?php
require 'head.php';
?>

<body>

	<!--Search Popup-->
	<?php
		include "search-popup.php";
	?>


	<div class="page-wrapper">
		<!-- Preloader -->
		<!-- <div class="preloader"></div> -->

		<header class="main-header header-style-one">
			<?php
			require 'head-top.php';
			require 'head-upper.php';
			require 'mobile-menu.php';
			?>
		</header>

		<!--Page Title-->
		<section class="page-title" style="background-image:url(images/background/5.jpg)">
			<div class="auto-container">
				<!-- <h3 style="color: white; font-size: 35px;; ">Thông tin cá nhân</h3> -->
			</div>
		</section>
		<!--End Page Title-->

		<!-- Story Section -->
		<section class="story-section">
			<div class="auto-container">
				<div class="row clearfix">

					<?php
                        $cid = $_SESSION['id'];
                        $result = querySqlwithResult($conn, "select CTM_PASS from custommer where CTM_ID = ".$cid);
                        $row = $result->fetch_assoc();
                    ?>
					<div class="content-column col-lg-3 col-md-2"></div>
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-8 col-sm-12">
						<div class="inner-column">
							<h2>Thay đổi mật khẩu</h2>
							<div class="newsletter-form">
								<div class="form-group mt-3">
								<form action="change-pass-action.php" method="post" id="form">
										<br><input id="opw" class=" w-100 py-3 px-3" style="color: #000 !important; border: 1px solid #dfb162 !important;" type="password"	name="oldpw" placeholder="Nhập mật khẩu cũ">
										<br><input id="npw" class="mt-4 w-100 py-3 px-3" style="color: #000 !important; border: 1px solid #dfb162 !important; " type="password" name="newpw" placeholder="Nhập mật khẩu mới">
										<br><input id="rnpw" class="mt-4 w-100 py-3 px-3" style="color: #000 !important; border: 1px solid #dfb162 !important; " type="password" name="renewpw" placeholder="Nhập lại mật khẩu mới">
										<input type="hidden" name="" id="crpw" value="<?php echo $row['CTM_PASS'] ?>">
										<div class="row">
											<button id="button" class="theme-btn btn-style-one"><span class="txt">Đổi mật khẩu</span></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<script>

							var btn =document.getElementById('button')

							btn.addEventListener('click',function(e){
								e.preventDefault()
								var opw =document.getElementById('opw').value
								var npw =document.getElementById('npw').value
								var rnpw =document.getElementById('rnpw').value
								var crpw =document.getElementById('crpw').value
								var form =document.getElementById('form')

								if (opw != crpw) {
									alert('Mật khẩu không đúng!')
								} else if (npw != rnpw) {
									alert('Mật khẩu nhập lại không đúng')
								} else form.submit()
							})


						</script>
					</div>

					<div class="content-column col-lg-3 col-md-2"></div>

					
					

				</div>
			</div>
		</section>
		<!-- End Story Section -->
		


		<!--Main Footer-->
		<?php require 'footer.php' ?>

	</div>
	<!--End pagewrapper-->

	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
	<!--Scroll to top-->
	<script src="js/jquery.js"></scrip>
	<script src="js/popper.min.js"></scrip>
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

<!-- stella-orre/about.html  30 Nov 2019 03:46:11 GMT -->

</html>