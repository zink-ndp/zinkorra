<!DOCTYPE html>
<html lang="en">

<!-- stella-orre/shop.html  30 Nov 2019 03:52:07 GMT -->
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

    <!--Shop Banner Section-->
    <!-- <section class="shop-banner-section" style="background-image:url(images/background/8.jpg);">
    	<div class="auto-container">

			<div class="content-box">
				<div class="box-inner">
					<h2>Modern Furniture</h2>
					<div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative.</div>
					<a href="product-detail.html" class="theme-btn btn-style-one"><span class="txt">purchase now</span></a>
				</div>
			</div>
            
        </div>
    </section> -->
    <!--End Shop Banner Section-->
	
	 <!--Page Title-->
     <section class="page-title" style="background-image:url(images/background/5.jpg)">
        <div class="auto-container">
        	<h2>Đơn hàng</h2>
        </div>
    </section>
    <!--End Shop Features Section-->
	<!--Products Section-->

    <!--End Products Section-->

	<!--Shop Section-->
    <section class="shop-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <style>
                /* CSS để tạo giao diện */
                .shop-fill {
                    display: flex;
                    justify-content: space-between; /* Các phần tử con nằm ở hai bên cùng */
                    align-items: center; /* Căn giữa theo chiều dọc */
                    width: 100%; /* Độ rộng của container */
                    background-color: #f0f0f0;
                    padding: 10px; /* Khoảng cách trong container */
                }

                .fill {
                    width: 100%; /* Độ rộng của hai div con */
                    padding: 10px; /* Khoảng cách trong hai div con */
                    display: flex;
                    flex-direction: row;
                }

                .fill-item {
                    margin: 0 10px;
                    background-color: white;
                    color: #dfb162;
                    padding: 7px 13px;
                }

                .fill-item:hover {
                    background-color: #dfb162;
                    color: white;
                }

                .fill-active {
                    margin: 0 10px;
                    padding: 7px 13px;
                    background-color: #dfb162 !important;
                    color: white !important;
                }
            </style>
            <div class="shop-fill mt-n8">
                <?php
                    $all = "fill-active";
                    $wait = "fill-item";
                    $trans = "fill-item";
                    $finish = "fill-item";
                    $cancel = "fill-item";
                    if (isset($_GET['active'])){
                        switch ($_GET['active']) {
                            case '1':
                                $all = "fill-active";
                                $wait = "fill-item";
                                $trans = "fill-item";
                                $finish = "fill-item";
                                $cancel = "fill-item";
                                break;
                            case '2':
                                $all = "fill-item";
                                $wait = "fill-active";
                                $trans = "fill-item";
                                $finish = "fill-item";
                                $cancel = "fill-item";
                                break;
                            case '3':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-active";
                                $finish = "fill-item";
                                $cancel = "fill-item";
                                break;
                            case '4':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-item";
                                $finish = "fill-active";
                                $cancel = "fill-item";
                                break;
                            case '5':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-item";
                                $finish = "fill-item";
                                $cancel = "fill-active";
                                break;
                            }
                        }
                ?>
                <div class="fill row">
                    <div class="col-1"></div>
                    <div class="col-lg-2 col-md-4 col-xs-6" style="text-align: center; margin: 5px 0;">
                        <!-- all -->
                        <a href="?active=1"> 
                            <div class="<?php echo $all ?>">
                                Tất cả
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-xs-6" style="text-align: center; margin: 5px 0;">
                        <!-- waiting -->
                        <a href="?active=2">
                            <div class="<?php echo $wait ?>">
                                Chờ xác nhận
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-xs-6" style="text-align: center; margin: 5px 0;">
                        <!-- transporting -->
                        <a href="?active=3">
                            <div class="<?php echo $trans ?>">
                                Đang giao
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-xs-6" style="text-align: center; margin: 5px 0;">
                        <!-- finished -->
                        <a href="?active=4">
                            <div class="<?php echo $finish ?>">
                                Hoàn thành
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-xs-6" style="text-align: center; margin: 5px 0;">
                        <!-- canceled -->
                        <a href="?active=5">
                            <div class="<?php echo $cancel ?>">
                                Đã huỷ
                            </div>
                        </a>
                    </div>
                    <div class="col-1"></div>
                    <!-- ------ -->
                </div>
            </div>
            
            <?php
            
            $sql = "select * from ";

            switch ($_GET['active']) {
                case '1':
                    ?><?php
                    break;
                case '2':
                    ?><?php
                    break;
                case '3':
                    ?><?php
                    break;
                case '4':
                    ?><?php
                    break;
                case '5':
                    ?><?php
                    break;
                }

            ?>

		</div>
	</section>
	
	
	
	<!--Main Footer-->
    <?php
        include "footer.php";
    ?>
	
</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Search Popup-->
<?php
    include "search-popup.php";
?>

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