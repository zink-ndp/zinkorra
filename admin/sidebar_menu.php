<span class="heading">Cửa hàng</span>
<ul class="list-unstyled">
    <li class="active"><a href="index.php"> <i class="icon-chart"></i>Thống kê </a></li>
    <li><a href="#dropDown_Staff" aria-expanded="false" data-toggle="collapse"><i class="fas fa-user"></i>Nhân viên </a>
        <ul id="dropDown_Staff" class="collapse list-unstyled ">
        <li><a href="staff_all.php">DS Nhân viên</a></li>
        <li><a href="staff_add.php">Thêm NV</a></li>
        </ul>
    </li>
    <li><a href="#dropDown_Product" aria-expanded="false" data-toggle="collapse"><i class="fas fa-chair"></i>Sản phẩm </a>
        <ul id="dropDown_Product" class="collapse list-unstyled ">
        <li><a href="product_all.php">DS Sản phẩm</a></li>
        <li><a href="product_add.php">Thêm SP</a></li>
        </ul>
    </li>
    <li> <a href="invoice.php?stt=1"><i class="fas fa-file-invoice-dollar"></i></i>Đơn hàng </a></li>
</ul><span class="heading">Tài khoản</span>
<ul class="list-unstyled">
    <li><a href="forms.html">FORM</a></li>
    <li><a href="charts.html">CHART</a></li>
    <li><a href="tables.html">TABLE</a></li>

    <li> <a href="#"><i class="fas fa-user-edit"></i>Thông tin cá nhân </a></li>
    <li> <a href="#"><i class="fas fa-key"></i>Đổi mật khẩu </a></li>
    <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất </a></li>
</ul>



<?php

    if (isset($_POST['tx_ma'])){
        $form_act = "chitiet_datxe.php";
        $matx = $_POST['tx_ma'];
    } else {
        $form_act = "chon_taixe.php";
        $matx = "";
    }

?>