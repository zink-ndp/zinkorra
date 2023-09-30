<!DOCTYPE html>
<html lang="en">

<!-- stella-orre/shop.html  30 Nov 2019 03:52:07 GMT -->
<?php
    require 'head.php';
?>

<body>

<!--Search Popup-->
<?php
	require "search-popup.php";
    require 'popup-message.php';

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
        <div class="auto-container row">
            <div class="col-7">
                <h2>Đơn hàng</h2>
            </div>
            <div class="col-5">
                <form method="get" action="bill.php" class="mt-2">
                    <div class="search-box">
                        <input type="hidden" name="active" value="1">
                        <input class="search" type="text" name="search" value="" placeholder="Tìm theo mã hoá đơn, tên sản phẩm, ngày đặt,..." required>
                        <button type="submit" class="theme-btn btn-style-one"><span class="txt">Tìm</span></button>
                    </div>
                </form>
            </div>
        </div>
        <style>
            .search-box{
                display: flex;
                flex-direction: row;
            }

            .search{
                padding: 0 1rem;
                width: 100%;
                color: white;
                background-color: transparent;
                border: 1px solid white;
            }
        </style>
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
                    padding: 5px 0; /* Khoảng cách trong container */
                }

                .fill {
                    width: 100%; /* Độ rộng của hai div con */
                    padding: 5px; /* Khoảng cách trong hai div con */
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
                                $cond = "";
                                break;
                            case '2':
                                $all = "fill-item";
                                $wait = "fill-active";
                                $trans = "fill-item";
                                $finish = "fill-item";
                                $cancel = "fill-item";
                                $cond = " and b.ST_ID=1";
                                break;
                            case '3':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-active";
                                $finish = "fill-item";
                                $cancel = "fill-item";
                                $cond = " and b.ST_ID=2";
                                break;
                            case '4':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-item";
                                $finish = "fill-active";
                                $cancel = "fill-item";
                                $cond = " and b.ST_ID=3";
                                break;
                            case '5':
                                $all = "fill-item";
                                $wait = "fill-item";
                                $trans = "fill-item";
                                $finish = "fill-item";
                                $cancel = "fill-active";
                                $cond = " and b.ST_ID=4";
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

            <div class="row clearfix">
                <?php
                    $sql = "select b.*, c.CTM_ID, s.* from bill b
                            join custommer c on c.CTM_ID=b.CTM_ID
                            join status s on s.ST_ID=b.ST_ID
                            where b.CTM_ID = {$_SESSION['id']}";
                    if (isset($_GET['search'])){
                        $s = " and (b.B_ID like '%{$_GET['search']}%' or b.B_DATE = '{$_GET['search']}')";
                        $sql .= $s;
                        ?>
                            <div style="text-align: center; width: 100%; font-size: 18px;" class="mt-3">
                                Kết quả tìm kiếm cho "<?php echo $_GET['search'] ?>"
                            </div>
                        <?php
                    } else {
                        $sql .= $cond;
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows>0) {
                        $result = $conn->query($sql);
                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                        foreach ($result_all as $row) {
                            $bid = $row['B_ID'];
                ?>
                    
                    <div class="container-fluid mt-4" style="box-shadow: 2px 2px 5px grey;">
                        <div class="row" style="padding: 10px; border-bottom: 1px dashed #ededed">
                            <div class="col-lg-9 col-md-7" style="font-weight: bold; font-size: 16px;">
                                <!-- <?php echo date_format(date_create($row['B_DATE']),'d-m-Y') ?> -->
                                <?php echo date_format(date_create($row['B_DATE']),'d-m-Y') ?> _ Mã hoá đơn: <?php echo $bid ?>
                            </div>
                            <div class="col-lg-3 col-md-5" style="text-align: right; text-transform: uppercase; color: #dfb162; font-weight: bold;">
                                <?php echo $row['ST_NAME'] ?>
                            </div>
                        </div>
                        <?php
                            $tt = 0;
                            $bill_dt = "select bd.*, p.PD_NAME, p.PD_PRICE, p.PD_PIC from bill_detail bd
                                        join products p on p.PD_ID=bd.PD_ID
                                        where bd.B_ID={$row['B_ID']}";
                            $rsbill = $conn->query($bill_dt);
                            if ($rsbill->num_rows > 0) {
                                $rsbill = $conn->query($bill_dt);
                                $rsall = $rsbill -> fetch_all(MYSQLI_ASSOC);
                                foreach ($rsall as $pd) {
                                    $tt += $pd['PD_PRICE']*$pd['PD_QUANT'];
                        ?>
                        <div class="row rate" style="padding: 10px; margin: 10px;  border-bottom: 1px dashed #ededed">
                            <div class="col-1" style="border: 1px solid #f0f0f0; width: 80px; height: 80px;">
                                <img style="height: 100%; width: 100%; object-fit: cover" src="images/products/<?php echo $pd['PD_PIC'] ?>" alt="">
                            </div>
                            <div class="col-8">
                                <a href="product-detail.php?id=<?php echo $pd['PD_ID'] ?>">
                                    <span style="color: #dfb162; font-size: 16px;"><?php echo $pd['PD_NAME'] ?></span><br>
                                </a>
                                <span>Số lượng: <?php echo $pd['PD_QUANT'] ?></span><br>
                            </div>
                            <div class="col-2 mt-3" style="text-align: right;">
                                <span style="font-size: 16px; color: black"><?php echo number_format($pd['PD_PRICE']) ?>đ</span>
                            </div>
                            <?php
                                if($row['ST_ID']==3){
                                    $yourDate = $row['B_DATE']; 
                                    $interval = new DateInterval('P30D');
                                    $dateTime = new DateTime($yourDate);
                                    $dateTime->add($interval);
                                    $rateDate = $dateTime->format('d-m-Y');
                                    $curdate = strtotime(date('Y-m-d'));
                                    $expdate = strtotime($dateTime->format('Y-m-d'));
                                    $isExpire = '';
                                    if ($curdate>$expdate){
                                        $isExpire = 'disabled';
                                    }
                            ?>
                                <div class="col-1">
                                    <button class="theme-btn btn-style-four mt-2 " type="button" <?php echo $isExpire ?> style="padding: 2px 6px !important; font-size: 10px !important">
                                        <span data-target="rate-box-<?php echo $pd['PD_ID']; ?>" class="txt rate-btn"><i class="fas fa-star"></i> RATE</span>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <div id="rate-box-<?php echo $pd['PD_ID']; ?>" style="display: none;" class="shop-comment-form mt-4 rate-box">	
                                        <div style="width: 40%; 
                                                    background-color: white; 
                                                    padding: 3rem 0rem; 
                                                    z-index: 999; 
                                                    position: fixed;
                                                    top: 50%;
                                                    left: 50%;
                                                    transform: translate(-50%, -50%);
                                                    box-shadow: 15px 15px 50px grey;">
                                            <form method="get" action="add-review.php">
                                                <div class="row clearfix">
                                                    <div class="col-2"></div>
                                                    <div class="col-8">
                                                        <div class="rating-box">
                                                            <h4> <?php echo $pd['PD_NAME'] ?></h4>
                                                            <div class="text mt-5" id="text"> Đánh giá của bạn:</div>
                                                            <div class="rating">
                                                                <a id="star-<?php echo $pd['PD_ID']; ?>" class="astar1" ><span class="fa fa-star"></span></a>
                                                            </div>
                                                            <div class="rating">
                                                                <a id="star-<?php echo $pd['PD_ID']; ?>" class="astar2" ><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                                            </div>
                                                            <div class="rating">
                                                                <a id="star-<?php echo $pd['PD_ID']; ?>" class="astar3" ><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                                            </div>
                                                            <div class="rating">
                                                                <a id="star-<?php echo $pd['PD_ID']; ?>" class="astar4" ><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                                            </div>
                                                            <div class="rating">
                                                                <a id="star-<?php echo $pd['PD_ID']; ?>" class="astar5" ><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></a>
                                                            </div>
                                                        </div>
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                                <label>Tiêu đề:</label>
                                                                <input type="text" name="title" id="">
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                                <label>Bình luận:</label>
                                                                <textarea name="comment" placeholder=""></textarea>
                                                            </div>
                                                            <input type="hidden" name="pdid" value="<?php echo $pd['PD_ID'] ?>">
                                                            <div id="rate-<?php echo $pd['PD_ID']; ?>"></div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group" style="display: flex; justify-content: right;">
                                                                <button class="theme-btn btn-style-four" type="submit" name="submit-form"><span class="txt">Gửi</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <button id="close-<?php echo $pd['PD_ID']; ?>" type="button" class="btn btn-link text-danger close-button">Đóng X</button>
                                                    </div>
                                                </div>
                                                <script>

                                                    document.addEventListener('click', function(e) {
                                                        if (e.target && e.target.classList.contains('rate-btn')) {
                                                            var targetId = e.target.getAttribute('data-target');
                                                            var ratebox = document.getElementById(targetId);
                                                            var productId = ratebox.id.split('-')[2];
                                                            if (ratebox) {
                                                                ratebox.style.display = 'block';

                                                                // Select all star elements with the 'star' class
                                                                const stars = document.querySelectorAll('#star-' + productId);
                                                                const rate = document.getElementById('rate-' + productId);

                                                                // Loop through each star element and add an event listener
                                                                stars.forEach((star, index) => {
                                                                    star.addEventListener('click', function(e) {
                                                                        e.preventDefault();

                                                                        // Reset the color of all stars
                                                                        stars.forEach((s, i) => {
                                                                            if (i <= index) {
                                                                                s.style.color = '#ffb600';
                                                                            } else {
                                                                                s.style.color = '#adb5bd';
                                                                            }
                                                                        });

                                                                        // Update the 'rate' input field with the selected star value
                                                                        const starValue = index + 1;
                                                                        rate.innerHTML = '<input type="hidden" name="star" value="' + starValue + '">';
                                                                    });
                                                                });


                                                            }   
                                                        }

                                                        

                                                        if (e.target && e.target.classList.contains('close-button')) {
                                                            var productId = e.target.id.split('-')[1];
                                                            var ratebox = document.getElementById('rate-box-' + productId)
                                                            if (ratebox) {
                                                                ratebox.style.display = 'none';
                                                            }
                                                        }

                                                    });
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <?php
                                }
                            } 
                        ?>
                        <div class="row" style="padding: 10px;">
                            <div class="col-12" style="text-align: right">
                                <span style="font-size: 15px;">Thành tiền:</span>
                                <span style="font-size: 19px; font-weight: bold; color: #dfb162"><?php echo number_format($tt) ?>đ</span>
                            </div>
                        </div>
                        <div class="row" style="padding: 25px 15px;">
                            <div class="col-8">
                                <?php
                                    if ($row['ST_ID'] == 3){
                                        echo 'Đánh giá sản phẩm trước ngày '.$rateDate;
                                    } else {
                                        echo 'Đánh giá sản phẩm sau khi nhận hàng';
                                    }
                                ?>
                            </div>
                            <div class="col-4" style="text-align: right;">
                                <?php
                                    if($row['ST_ID']==3){
                                ?>
                                    <a href="rebuy.php?id=<?php echo $bid ?>">
                                        <button type="button" class="theme-btn btn-style-four" style="margin-left: 15px !important; padding: 5px 15px !important; background-color: #888 !important"><span class="txt">Mua lại</span></button>
                                    </a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
                    require 'bill-noproduct.php';
                }
                ?>
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