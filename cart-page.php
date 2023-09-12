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
    <?php
        require 'popup-message.php';
    ?>
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
                                <th class="col-1">Số lượng</th>
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
                                <td><a href="cart-remove-one.php?pdid=<?php echo $spid ?>" class="remove-btn"><span class="fas fa-times"></span></a></td>                            
                            </tr>
                            <?php
                                    $total += $s["PD_PRICE"]*$sp["PD_QUANT"];
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
                            <form action="coupon-apply.php" method="post">
                                <div class="form-group clearfix">
                                    <input type="text" name="coupon" value="" placeholder="Mã giảm giá">
                                </div>
                                <div class="form-group clearfix">
                                    <button type="submit" class="theme-btn coupon-btn">Áp dụng mã</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a id="showAlertButton" type="button" class="theme-btn cart-btn" style="background-color: white; border: 1px solid #dfb162; color: #dfb162">Xoá tất cả</a>
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
                        <!--Totals Table-->
                        <ul class="totals-table">
                            <li><h3>Thông tin giao hàng</h3></li>
                            <li class="clearfix total">
                                <span class="col">Tên khách hàng *</span>
                                <input required type="text" name="name" id="" class="col" value="<?php echo $_SESSION['name'] ?>">
                            </li>
                            <li class="clearfix total">
                                <span class="col">Số điện thoại *</span>
                                <input required type="text" name="name" id="" class="col" value="<?php echo $_SESSION['phone'] ?>">
                            </li>
                            <li class="clearfix total">
                                <span class="col">Địa chỉ *</span>
                                <div class="col">
                                    <style>
                                        .address{
                                            width: 70%;
                                        }
                                    </style>
                                    <select class="address" require name="calc_shipping_provinces" required="">
                                        <option value="">Tỉnh / Thành phố</option>
                                    </select>
                                    <select class="address" require name="calc_shipping_district" required="">
                                        <option value="">Quận / Huyện</option>
                                    </select>
                                    <input class="billing_address_1" name="" type="hidden" value="">
                                    <input class="billing_address_2" name="" type="hidden" value="">
                                </div>
                            </li>
                            <li class="clearfix total">
                                <span class="col">Ghi chú *</span>
                                <input required type="text" name="name" id="" class="col" value="" placeholder="Số nhà, tên đường, ...">
                            </li>
                            <li class="clearfix total">
                                <span style="color: red;">Vui lòng kiểm tra kỹ thông tin và không để trống ô chứa dấu *</span>
                            </li>
                        </ul>
					</div>
					
                    <div class="column col-lg-5 col-md-7 col-sm-12">
                        <form action="checkout.php" method="get">
                            <!--Totals Table-->
                            <ul class="totals-table">
                                <li><h3>Tổng giỏ hàng</h3></li>
                                <li class="clearfix total"><span class="col">Tổng tiền</span><span class="col price"><?php echo number_format($total) ?> đ</span></li>
                                <?php
                                    if (isset($_GET['coupon'])){
                                        $code = $_GET['coupon'];
                                        $cp = $_GET['sale'];
                                        ?>
                                            <li class="clearfix total">
                                                <span class="col">Tiền giảm</span>
                                                <span class="col price"><?php echo $cp .'% - '. number_format($total*$cp*0.01) ?> đ <p class="mb-n1" style="font-size: 12px;">Mã: <?php echo $code ?></p></span>
                                            </li>                                    
                                            <?php
                                        $total -= $total*$cp*0.01;
                                    } else {
                                        echo '<li class="clearfix total"><span class="col">Giảm giá</span><span class="col price">0</span></li>';                                    
                                    }
                                ?>
                                <li class="clearfix total"><span class="col">Thành tiền</span><span class="col price"><?php echo number_format($total) ?> đ</span></li>
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
<?php
	include "search-popup.php";
?>

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
<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
<script>
if (address_2 = localStorage.getItem('address_2_saved')) {
  $('select[name="calc_shipping_district"] option').each(function() {
    if ($(this).text() == address_2) {
      $(this).attr('selected', '')
    }
  })
  $('input.billing_address_2').attr('value', address_2)
}
if (district = localStorage.getItem('district')) {
  $('select[name="calc_shipping_district"]').html(district)
  $('select[name="calc_shipping_district"]').on('change', function() {
    var target = $(this).children('option:selected')
    target.attr('selected', '')
    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
    address_2 = target.text()
    $('input.billing_address_2').attr('value', address_2)
    district = $('select[name="calc_shipping_district"]').html()
    localStorage.setItem('district', district)
    localStorage.setItem('address_2_saved', address_2)
  })
}
$('select[name="calc_shipping_provinces"]').each(function() {
  var $this = $(this),
    stc = ''
  c.forEach(function(i, e) {
    e += +1
    stc += '<option value=' + e + '>' + i + '</option>'
    $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
    if (address_1 = localStorage.getItem('address_1_saved')) {
      $('select[name="calc_shipping_provinces"] option').each(function() {
        if ($(this).text() == address_1) {
          $(this).attr('selected', '')
        }
      })
      $('input.billing_address_1').attr('value', address_1)
    }
    $this.on('change', function(i) {
      i = $this.children('option:selected').index() - 1
      var str = '',
        r = $this.val()
      if (r != '') {
        arr[i].forEach(function(el) {
          str += '<option value="' + el + '">' + el + '</option>'
          $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
        })
        var address_1 = $this.children('option:selected').text()
        var district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('address_1_saved', address_1)
        localStorage.setItem('district', district)
        $('select[name="calc_shipping_district"]').on('change', function() {
          var target = $(this).children('option:selected')
          target.attr('selected', '')
          $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
          var address_2 = target.text()
          $('input.billing_address_2').attr('value', address_2)
          district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.setItem('address_2_saved', address_2)
        })
      } else {
        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
        district = $('select[name="calc_shipping_district"]').html()
        localStorage.setItem('district', district)
        localStorage.removeItem('address_1_saved', address_1)
      }
    })
  })
})
</script>
</body>

<!-- stella-orre/cart-page.html  30 Nov 2019 03:52:15 GMT -->
</html>