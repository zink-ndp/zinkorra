<?php
    $code = $_POST['coupon'];
    
    require 'connect.php';

    $sql = "select * from sale where SL_CODE = '$code' and sysdate()<SL_END_DATE";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $_SESSION['message'] = "Đã áp dụng mã giảm";
        header('Location: cart-page.php?coupon='.$code.'&sale='.$row['SL_PERCENT'].'&popup=1');
    } else {
        $_SESSION['message'] = "Mã giảm giá không tồn tại hoặc đã hết hạn!";
        header('Location: cart-page.php?popup=1');
    }

?>