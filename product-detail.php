<!DOCTYPE html>
<html lang="en">

<?php
    require 'head.php';
?>

<body>

<!--Search Popup-->
<?php
	require "search-popup.php";
    require "popup-message.php";
?>

<div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->

    <header class="main-header header-style-one">
        <!--Header Top-->
        <?php require 'head-top.php' ?>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <?php require 'head-upper.php' ?>
        <!--End Header Upper-->

    	<!-- Mobile Menu  -->
        <?php require 'mobile-menu.php' ?>
        <!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg)">
    	<div class="auto-container">
        	<h2>Chi tiết sản phẩm</h2>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Shop Single Section-->
    <section class="shop-single-section">
    	<div class="auto-container">
        	
            <div class="shop-single">
                <div class="product-details">
                    
                    <!--Basic Details-->
                    <?php
                        $spid = $_GET['id'];
                        $query = "select * from products where PD_ID = ".$spid;
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        $pd_type = $row['TY_ID'];
                    ?>
                    <div class="basic-details">
                        <div class="row clearfix">
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <figure class="image-box"><a href="images/products/<?php echo $row['PD_PIC'] ?>" class="lightbox-image" title="Image Caption Here"><img src="images/products/<?php echo $row['PD_PIC'] ?>" alt=""></a></figure>
                            </div>
                            <div class="info-column col-lg-6 col-md-12 col-sm-12">
                            	<div class="inner-column">
                                    <h4><?php echo $row['PD_NAME'] ?></h4>
                                    <div class="text"><?php echo $row['PD_DESCRI'] ?></div>
                                    <div class="price">Giá niêm yết: <span><?php echo number_format($row['PD_PRICE']) ?> VND</span></div>
                                    
                                    <div class="clear-fix row">
                                        <div class="col-12">
                                            <form method="post" id="myForm">
                                                <span class="price">Số lượng</span> :</label><input class="quant_number price ms-3" type="number" value="1" min="1" name="quant"><br>
                                                <input type="hidden" name="pdid" value="<?php echo $row["PD_ID"] ?>">
                                                <button name="addcart-btn" type="submit" class="theme-btn cart-btn px-4">Thêm vào giỏ hàng</button>
                                                <button name="buynow-btn" type="submit" class="theme-btn cart-btn ms-3 mt-4 px-4">Thanh toán ngay</button>
                                            </form>
                                            <script>
                                                document.getElementById("myForm").addEventListener("submit", function(event) {
                                                    const submitButton = event.submitter;

                                                    if (submitButton.name === "addcart-btn") {
                                                        this.action = "add-cart.php"; // Thay đổi trang khi nhấp nút "Submit for Page 1"
                                                    } else if (submitButton.name === "buynow-btn") {
                                                        this.action = "payment-page.php"; // Thay đổi trang khi nhấp nút "Submit for Page 2"
                                                    }

                                                    // Tiếp tục thực hiện submit form theo action đã thay đổi
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Basic Details-->
                    
                    <!--Product Info Tabs-->
                    <div class="product-info-tabs">
                        <!--Product Tabs-->
                        <div class="prod-tabs tabs-box">
                        
                            <!--Tab Btns-->
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#prod-reviews" class="tab-btn active-btn">Review (2)</li>
                                <li data-tab="#prod-details" class="tab-btn">Descripton</li>
                                <!-- <li data-tab="#prod-spec" class="tab-btn">Specification</li> -->
                            </ul>
                            
                            <!--Tabs Container-->
                            <div class="tabs-content">
                                <!--Tab-->
                                <!-- <div class="tab" id="prod-spec">
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div> -->
                                
                                <!--Tab-->
                                <div class="tab active-tab" id="prod-reviews">
                                    <!-- <h2 class="title">2 Reviews For win Your Friends</h2> -->
                                    <!--Reviews Container-->
                                    <div class="comments-area">
                                        <!--Comment Box-->
                                        <div class="comment-box">
                                            <div class="comment">
                                                <div class="author-thumb"><img src="images/resource/author-1.jpg" alt=""></div>
                                                <div class="comment-inner">
                                                    <div class="comment-info clearfix">Steven Rich – Sep 17, 2016:</div>
                                                    <div class="rating">
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star light"></span>
                                                    </div>
                                                    <div class="text">How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <!-- Comment Form -->
                                    <div class="shop-comment-form">	
                                        <h2>Add Your Review</h2>
                                        <div class="rating-box">
                                            <div class="text"> Your Rating:</div>
                                            <div class="rating">
                                                <a id="astar1" href="#"><span class="fa fa-star"></span></a>
                                            </div>
                                            <div class="rating">
                                                <a id="astar2" href="#"><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                            </div>
                                            <div class="rating">
                                                <a id="astar3" href="#"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                            </div>
                                            <div class="rating">
                                                <a id="astar4" href="#"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                            </div>
                                            <div class="rating">
                                                <a id="astar5" href="#"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                            </div>
                                        </div>
                                        <form method="post" action="templateshub.net">
                                            <div class="row clearfix">
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <label>First Name *</label>
                                                    <input type="text" name="username" placeholder="" required>
                                                </div>
                                                
                                                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                    <label>Last Name*</label>
                                                    <input type="email" name="email" placeholder="" required>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <label>Email*</label>
                                                    <input type="text" name="number" placeholder="" required>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <label>Your Comments*</label>
                                                    <textarea name="message" placeholder=""></textarea>
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                    <button class="theme-btn btn-style-four" type="submit" name="submit-form"><span class="txt">Submit now</span></button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                            
                                    </div>
                                    
                                </div>

                                <!--Tab / Active Tab-->
                                <div class="tab" id="prod-details">
                                    <div class="content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                    <!--End Product Info Tabs-->
                    
                </div>
            </div>
            
        </div>
    </section>
    <!--End Shop Single Section-->
	
	<!-- Related Products -->
	<section class="related-products">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="title-box">
            	<h2>Sản phẩm liên quan</h2>
            </div>
            
            <div class="row clearfix">
                <!--Shop Item-->
                
                <?php
                    $sql = "select * from products where TY_ID = {$pd_type} and PD_ID <> {$spid} limit 4";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        $result = $conn->query($sql);
                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                        foreach ($result_all as $row) {
                ?>

                    <div class="shop-item col-lg-3 col-md-6 col-sm-12">
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
			
		</div>
	</section>
	
	<!--Main Footer-->
   <?php
        require 'footer.php';
   ?>
	
</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Search Popup-->
<?php require 'search-popup.php' ?>

<!--Scroll to top-->
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.bootstrap-touchspin.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/script.js"></script>
</body>

<!-- stella-orre/product-detail.html  30 Nov 2019 03:52:15 GMT -->
</html>