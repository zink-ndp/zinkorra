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
        	<h2>Sản phẩm</h2>
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
            <div class="shop-fill mb-5">
                <?php
                    $newest="fill-active";
                    $hot="fill-item";
                    $price="fill-item";
                    $type="fill-item";
                    if (isset($_GET['active'])){
                        switch ($_GET['active']) {
                            case 'newest':
                                $newest = "fill-active";
                                $hot="fill-item";
                                $price="fill-item";
                                $type="fill-item";
                                break;
                            case 'hot':
                                $hot = "fill-active";
                                $newest="fill-item";
                                $price="fill-item";
                                $type="fill-item";
                                break;
                            case 'price':
                                $price = "fill-active";
                                $newest="fill-item";
                                $hot="fill-item";
                                $type="fill-item";
                                break;
                            case 'type':
                                $price = "fill-item";
                                $newest="fill-item";
                                $hot="fill-item";
                                $type="fill-active";
                                break;
                            }
                        }
                ?>
                <div class="fill">
                    <span style="margin-top: 7px">
                        Sắp xếp theo: 
                    </span>
                    <a href="?active=newest">
                        <div class="<?php echo $newest ?>" style="margin-left: 30px !important;">
                            Mới nhất
                        </div>
                    </a>
                    <a href="?active=hot">
                        <div class="<?php echo $hot ?>">
                            Bán chạy
                        </div>
                    </a>
                    <!-- ------ -->
                    <?php
                        $defaultPrice="selected";
                        $htl="";
                        $lth="";
                        if (isset($_GET['priceFill'])){
                            switch ($_GET['priceFill']) {
                                case 'htl':
                                    $htl = "selected";
                                    $defaultPrice="";
                                    break;
                                
                                case 'lth':
                                    $lth = "selected";
                                    $defaultPrice="";
                                    break;
                                default:
                                    $defaultPrice="selected";
                                    break;
                            }
                        }
                    ?>
                    <form id="priceForm" action="#" method="get">
                        <select id="priceSelect" name="priceFill" class="<?php echo $price ?>">
                            <option disabled value="" <?php echo $defaultPrice ?>>Giá</option>
                            <option value="">Mặc định</option>
                            <option value="htl" <?php echo $htl ?>>Cao đến thấp</option>
                            <option value="lth" <?php echo $lth ?>>Thấp đến cao</option>
                        </select>
                        <input type="hidden" name="active" value="price">
                    </form>
                    <script>
                        document.getElementById("priceSelect").addEventListener("change", function() {
                            document.getElementById("priceForm").submit();
                        });
                    </script>
                    <!-- ------ -->
                    <form id="typeForm" action="#" method="get">
                        <select id="typeSelect" name="typeFill" class="<?php echo $type ?> ">
                            <option disabled value="">Loại nội thất</option>
                            <option value="">Mặc định</option>
                            <?php 
                                $sqlType = "select * from type";
                                $rsType = $conn->query($sqlType);
                                if ($rsType->num_rows > 0) {
                                    $rsType = $conn->query($sqlType);
                                    $rsType_all = $rsType -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsType_all as $row) {
                                        ?>
                                            <option value="<?php echo $row['TY_ID'] ?>"><?php echo $row['TY_NAME'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                            
                        <input type="hidden" name="active" value="type">
                    </select>
                    </form>
                    <script>
                        document.getElementById("typeSelect").addEventListener("change", function() {
                            document.getElementById("typeForm").submit();
                        });
                    </script>
                </div>
            </div>
            
            <div class="row clearfix">
                <?php
                    // Số sản phẩm trên mỗi trang
                    $productsPerPage = 20;

                    // Xác định trang hiện tại từ biến GET
                    $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                    // Truy vấn lấy dữ liệu sản phẩm từ cơ sở dữ liệu
                    $offset = ($current_page - 1) * $productsPerPage;

                    $sql = "SELECT * FROM products where 1";

                    if (isset($_GET['priceFill'])){
                        switch ($_GET['priceFill']) {
                            case 'htl':
                                $sql .= " ORDER BY PD_PRICE DESC";
                                break;

                            case 'lth':
                                $sql .= " ORDER BY PD_PRICE ASC";
                                break;
                            
                            default:
                                # code...
                                break;
                        }
                    }

                    if (isset($_GET['typeFill'])){
                        $sql .= " AND TY_ID = {$_GET['typeFill']}";
                    }
                    $search_result="";
                    if (isset($_GET['room']) && isset($_GET['rname'])){
                        $sql .= " AND ITR_ID = {$_GET['room']}";
                        $search_result = "Kết quả tìm kiếm cho từ khoá: ".$_GET['rname'];
                    }
                    if (isset($_GET['search'])){
                        $sql .= " AND PD_NAME like '%{$_GET['search']}%'";
                        $search_result = "Kết quả tìm kiếm cho từ khoá: ".$_GET['search'];
                    }
                ?>
                    <div class="col-12" style="text-align: center; margin-bottom: 15px;">
                        <span style="font-size: 20px;">
                            <?php echo $search_result ?>
                        </span>
                    </div>
                <?php
                    $sql = $sql." LIMIT $offset, $productsPerPage";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        $result = $conn->query($sql);
                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                        foreach ($result_all as $row) {
                ?>
               
				<!--Shop Item-->
                <div class="shop-item col-lg-3 col-md-4 col-sm-12">
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
                        	<h3 style="font-size: 14px;"><a href="product-detail.php?id=<?php echo $row["PD_ID"] ?>"><?php echo $row["PD_NAME"] ?></a></h3>
                            <div class="price mt-n2" style="font-size: 18px !important;"><?php echo number_format($row["PD_PRICE"]) ?> VND</div>
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