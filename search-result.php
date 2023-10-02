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
    </section>
    <!--End Shop Features Section-->
	<!--Products Section-->

    <!--End Products Section-->

	<!--Shop Section-->
    <section class="shop-section">
    	<div class="auto-container">
            <div class="row">
                <div style="text-align: center;" class="col-2">
                    <div class="row clear-fix">
                        <h5 style="font-weight: bold; color: black;">Hình ảnh cần tìm</h5>
                        <img class="mt-2 fit-image" style="height: 200px;" src="ai/img_to_search.png" alt="">
                        <?php
                            $file = fopen("ai/data.txt", "r");
                            $line = trim(fgets($file).PHP_EOL);
                            $sql = "select * from type t join products p on p.TY_ID = t.TY_ID where p.PD_PIC = '{$line}'";
                            $result = querySqlwithResult($conn,$sql);
                            $row = $result->fetch_assoc();
                            echo "<h5 class='mt-2'>".$row['TY_NAME']."</h5>";
                            fclose($file);  
                        ?>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                    <!--Sec Title-->
                    <div class="title-box">
                        <h2>Kết quả phù hợp</h2>
                    </div>
                    
                    <div class="row clearfix">
                        <?php
                            $myfile = fopen("ai/data.txt", "r");
                            while (!feof($myfile)) {
                                $line = fgets($myfile);
                                // echo $line.PHP_EOL."<br>";
                                $sql = "select * from products where PD_PIC like '".trim($line.PHP_EOL)."'";
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
                            }
                            fclose($myfile);    
                        ?>
                        
                    
                    </div>
                </div>
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