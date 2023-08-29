<!DOCTYPE html>
<html lang="en">

<?php
require 'head.php';
?>

<body>

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
                        $query = "select * from custommer where CTM_ID = ".$cid;
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                    ?>
					<div class="content-column col-lg-2"></div>
					<!-- Content Column -->
					<div class="content-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner-column">
							<h2>Thông tin cá nhân</h2>
							<div class="newsletter-form">
								<div class="bold-text form-group">
									<form action="change-info.php" method="post">
										Họ và tên: <input style="color: #000 !important; border: 1px solid #dfb162 !important;" type="text"	name="name" id="" value="<?php echo $row['CTM_NAME'] ?>">
										Số điện thoại: <input style="color: #000 !important; border: 1px solid #dfb162 !important;" type="tel" name="sdt" id="" value="<?php echo $row['CTM_PHONE'] ?>">
										Email: <input style="color: #000 !important; border: 1px solid #dfb162 !important;" type="email" name="email" id="" value="<?php echo $row['CTM_EMAIL'] ?>">

										<input type="checkbox" id="check" onchange="toggleButton()"> <span style="font-size: 18px !important;">Xác nhận thông tin</span>
										<p style="font-size: 13px;">Xem kỹ thông tin và ấn nút xác nhận để đổi thông tin</p>
										<script>
											function toggleButton() {
												var checkbox = document.getElementById("check");
												var button = document.getElementById("button");
												if (checkbox.checked) {
												button.disabled = false;
												button.className = "theme-btn, btn-style-one";
												} else {
												button.disabled = true;
												button.className = "";
												}
											}
										</script>
										<div class="row">
											<button disabled id="button" type="submit" class=""><span class="txt">Đổi thông tin cá nhân</span></button>
											
											<form action="change-info.php" method="post">
												<button type="submit" class="theme-btn btn-style-one"><span class="txt">Đổi mật khẩu</span></button>
											</form>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Image Column -->
					<div class="image-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image">
								<img src="images/custommer/default.png" alt="" />
							</div>
							<form action="change-avt.php" method="post">
								<button style="margin-left: 70px !important;" type="submit" class="theme-btn btn-style-four"><span class="txt">Đổi ảnh</span></button>
							</form>
						</div>
					</div>

					<div class="content-column col-lg-2"></div>

					
					

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

	<!--Search Popup-->
	<div id="search-popup" class="search-popup">
		<div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
		<div class="popup-inner">
			<div class="overlay-layer"></div>
			<div class="search-form">
				<form method="post" action="templateshub.net">
					<div class="form-group">
						<fieldset>
							<input type="search" class="form-control" name="search-input" value=""
								placeholder="Search Here" required>
							<input type="submit" value="Search Now!" class="theme-btn">
						</fieldset>
					</div>
				</form>

				<br>
				<h3>Recent Search Keywords</h3>
				<ul class="recent-searches">
					<li><a href="#">Home Interiors</a></li>
					<li><a href="#">Offices Interiors</a></li>
					<li><a href="#">Showroom Interiors</a></li>
					<li><a href="#">Building Interiors</a></li>
					<li><a href="#">Shops Interiors</a></li>
				</ul>

			</div>

		</div>
	</div>

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

<!-- stella-orre/about.html  30 Nov 2019 03:46:11 GMT -->

</html>