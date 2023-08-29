<!DOCTYPE html>
<html lang="en">

<!-- stella-orre/shop.html  30 Nov 2019 03:52:07 GMT -->
<?php
    require 'head.php';
?>

<body>

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
    </section>
    <!--End Shop Features Section-->
	<!--Products Section-->

    <!--End Products Section-->

	<!--Shop Section-->
    <section class="shop-section">
    	<div class="auto-container">
        	<!--Sec Title-->
            <div class="title-box">
            	<h2>Tất cả sản phẩm</h2>
            </div>
            
            <div class="row clearfix">
                <?php
                    // Số sản phẩm trên mỗi trang
                    $productsPerPage = 12;

                    // Xác định trang hiện tại từ biến GET
                    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                    // Truy vấn lấy dữ liệu sản phẩm từ cơ sở dữ liệu
                    $offset = ($current_page - 1) * $productsPerPage;

                    $sql = "SELECT * FROM products";
                    $sql = $sql." LIMIT $offset, $productsPerPage";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        $result = $conn->query($sql);
                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                        foreach ($result_all as $row) {
                ?>
				<!--Shop Item-->
                <div class="shop-item col-lg-4 col-md-5 col-sm-12">
                	<div class="inner-box">
                    	<div class="image-container">
                        	<a href="product-detail.php?id=<?php echo $row["PD_ID"] ?>"><img class="fit-image" src="images/products/<?php echo $row["PD_PIC"] ?>" alt="" /></a>
							<div class="overlay-box">
                                <ul class="option-box">
                                    <li><a href="product-detail.php?id=<?php echo $row["PD_ID"] ?>"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="images/products/<?php echo $row["PD_PIC"] ?>" class="lightbox-image" data-fancybox="products"><span class="fa fa-search"></span></a></li>
                                </ul>
                            </div>
                            <!-- <div class="tag-banner">New</div> -->
                        </div>
                        <div class="lower-content">
                        	<h3><a href="product-detail.php?id=<?php echo $row["PD_ID"] ?>"><?php echo $row["PD_NAME"] ?></a></h3>
                            <div class="price"><?php echo number_format($row["PD_PRICE"]) ?> VND</div>
                        </div>
                    </div>
                </div>

                <?php
                        }
                    }
                ?>
				
			
			</div>

            <div class="shop-pagination">
                <ul class="clearfix">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <?php
                            // Tính số trang dựa trên tổng số sản phẩm
                        $q = "SELECT COUNT(*) AS total FROM products";
                        $rs = $conn->query($q);

                        if ($rs->num_rows > 0) {
                            $r = $rs->fetch_assoc();
                            $total_products = $r['total'];
                        } else {
                            $total_products = 0;
                        }
                        $total_pages = ceil($total_products / $productsPerPage);
                        for ($i = 1; $i <= $total_pages; $i++) {
                            $active_class = ($i == $current_page) ? 'active' : '';
                            echo '<li class="' . $active_class . '"><a href="shop.php?page='.$i.'">'.$i.'</a></li>';
                        }
                    ?>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>

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