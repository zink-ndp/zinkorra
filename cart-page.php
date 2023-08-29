<!DOCTYPE html>
<html lang="en">

<?php require 'head.php' ?>

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
    <!-- End Main Header -->

    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg)">
    </section>
    <!--End Page Title-->
	
	<!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">

            <!--Cart Outer-->
            <div class="cart-outer">
                <?php
                    
                ?>
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                            	<th class="col-2">Hình ảnh</th>
                            	<th class="col-3">Tên sản phẩm</th>
                                <th class="col-2">Đơn giá</th>
                                <th class="col-2">Số lượng</th>
                                <th class="col-2">Tổng tiền</th>
                                <th class="col-1">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $cid = $_SESSION["id"];
                                $sl = 0;
                                $sql = "select PD_ID, PD_QUANT from cart_detail where CTM_ID = {$cid}";
                                $rs = $conn->query($sql);
                                $total = 0;
                                foreach ($rs as $sp) {
                                    $spid = $sp["PD_ID"];
                                    $query = "select p.PD_NAME, p.PD_PRICE, p.PD_PIC 
                                    from products p 
                                    join cart_detail cd on cd.PD_ID = p.PD_ID
                                    where p.PD_ID = $spid";
                                    $result = $conn->query($query);
                                    foreach ($result as $s) {
                                        $sl += $sp["PD_QUANT"];
                                        
                            ?>
                        	<tr>
                                <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><a href="product-detail.php?id=<?php echo $spid ?>"><img style="width: 130%;" src="images/products/<?php echo $s["PD_PIC"] ?>" alt=""></a></figure>
                                    </div>
                                </td>
                                <td><h4 class="prod-title"><?php echo $s["PD_NAME"] ?></h4></td>
                                <td><?php echo number_format($s["PD_PRICE"]) ?> đ</td>
                                <td>
                                    <form action="update-cart.php" method="post">
                                        <input class="width: 100px !important;" type="number" min="1" name="pdq" id="" value="<?php echo $sp["PD_QUANT"] ?>">
                                        <div style="text-align: center">
                                            <input type="hidden" name="pdid" value="<?php echo $spid ?>">
                                            <button style="padding: 5px 10px; background-color: white; border: 1px solid #dfb162; color: #dfb162" type="submit">Cập nhật<i class="fas fa-sync-alt ms-2"></i></button>
                                        </div>
                                    </form>
                                </td>
                                <td><?php echo number_format($s["PD_PRICE"]*$sp["PD_QUANT"]) ?> đ</td>
                                <td><a href="remove-in-cart.php?pdid=<?php echo $spid ?>" class="remove-btn"><span class="fas fa-times"></span></a></td>
                            </tr>
                            <?php
                                        $total +=  $s["PD_PRICE"]*$sp["PD_QUANT"];
                                    }
                                } 
                                if ($sl==0) {
                                    echo '<td colspan="5"><h4>Chưa có sản phẩm nào trong giỏ hàng</h4></td>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="cart-options clearfix">
                    <div class="pull-left">
                        <div class="apply-coupon clearfix">
                            <div class="form-group clearfix">
                                <input type="text" name="coupon-code" value="" placeholder="Mã giảm giá">
                            </div>
                            <div class="form-group clearfix">
                                <button type="button" class="theme-btn coupon-btn">Áp dụng mã</button>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="del-all-cart.php" id="showAlertButton" type="button" class="theme-btn cart-btn" style="background-color: white; border: 1px solid #dfb162; color: #dfb162">Xoá tất cả</a>
                        <a href="shop.php" type="button" class="theme-btn cart-btn ms-2">Thêm sản phẩm khác</a>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const showAlertButton = document.getElementById("showAlertButton");

                            showAlertButton.addEventListener("click", function() {
                                const result = window.confirm("Bạn có chắc chắn muốn xoá tất cả sản phẩm trong giỏ hàng?");
                                
                                if (result) {
                                    window.location.href = 'del-all-cart.php';
                                } 
                            });
                        });
                    </script>

                </div>

                <div class="row clearfix">

					<div class="column col-lg-7 col-md-5 col-sm-12">
					</div>
					
                    <div class="column col-lg-5 col-md-7 col-sm-12">
                        <form action="payment-page.php" method="post">
                            <!--Totals Table-->
                            <ul class="totals-table">
                                <li><h3>Tổng giỏ hàng</h3></li>
                                <!-- <li class="clearfix"><span class="col">Sub Total</span><span class="col">$25.00</span></li> -->
                                <li class="clearfix total"><span class="col">Tổng tiền</span><span class="col price"><?php echo number_format($total) ?> đ</span></li>
                                <li class="clearfix total"><span class="col">Phương thức</span>
                                    <select required name="payment" id="">
                                        <?php
                                            $sql = "SELECT * FROM payment";
                                            $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                $result = $conn->query($sql);
                                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                                foreach ($result_all as $row) {
                                        ?>
                                            <option value="<?php echo $row["PM_ID"] ?>"><?php echo $row["PM_NAME"] ?></option>
                                        <?php }} ?>
                                    </select>
                                </li>
                                <li class="text-right"><button type="submit" class="theme-btn proceed-btn">Thanh toán</button></li>
                            </ul>
                        </form>
					</div>
				</div>
			</div>

        </div>
    </section>
    <!--End Cart Section-->
	
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
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
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
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.bootstrap-touchspin.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/script.js"></script>
</body>

<!-- stella-orre/cart-page.html  30 Nov 2019 03:52:15 GMT -->
</html>