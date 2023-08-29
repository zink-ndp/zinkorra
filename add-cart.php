<?php
    require 'connect.php';

    if (!isset($_SESSION["id"])){
        $message = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=login.php');
    } else {
        $pdid = $_POST["pdid"];
        $quant = $_POST["quant"];
        $cid = $_SESSION["id"];

        $check_exist = "select count(*) as tontai from cart_detail where CTM_ID = {$cid} and PD_ID = {$pdid}";
        $rs_chk = $conn->query($check_exist);
        $r = mysqli_fetch_assoc($rs_chk);
        if ($r["tontai"]>0) {
            $sql = "update cart_detail set PD_QUANT = PD_QUANT + {$quant}
                    where CTM_ID = {$cid} and PD_ID = {$pdid}";
            $message = "Cập nhật giỏ hàng thành công";
        } else {
            $sql = "insert into cart_detail values ($cid, $pdid, $quant)";
            $message = "Thêm giỏ hàng thành công";
        }

        if($conn->query($sql) == true){
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=product-detail.php?id='.$pdid);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }




?>