<?php

    require 'connect.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tinh = $_POST['tinh'];
    $huyen = $_POST['calc_shipping_district'];
    $note = $_POST['note'];
    $pay = $_POST['payment'];
    if (isset($_POST['sale'])){
        $sale = $_POST['sale'];
    } else $sale = null;

    $sql = "select max(B_ID) as maxId from bill";
    $rs = $conn->query($sql);
    $r = $rs->fetch_assoc();
    $nextId = $r['maxId']+1;

    $diachi = $note.', '.$huyen.', '.$tinh;
    $sql = "insert into bill values ($nextId, 1, $pay, null, {$_SESSION['id']}, '$sale', sysdate(),'$diachi')";
    if ($conn->query($sql)){
        $sql = "select cd.*, pd.PD_ID, pd.PD_NAME, pd.PD_PRICE from cart_detail cd join products pd on pd.PD_ID=cd.PD_ID where cd.CTM_ID={$_SESSION['id']}";
        $rs = $conn->query($sql);
        $rs_all = $rs->fetch_all(MYSQLI_ASSOC);
        foreach ($rs_all as $row) {
            $sql_insert = "insert into bill_detail values ($nextId, {$row['PD_ID']}, {$row['PD_QUANT']})";
            $conn->query($sql_insert);
        }

        $del_cart = "delete from cart_detail where CTM_ID = {$_SESSION['id']}";
        $conn->query($del_cart);
        $_SESSION['message'] = "Đã đặt hàng thành công";
        header('Location: cart-page.php?popup=1');
    }

?>