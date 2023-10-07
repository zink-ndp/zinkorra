<?php

    require 'connect.php';

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tinh = $_POST['tinh'];
    $huyen = $_POST['calc_shipping_district'];
    $note = $_POST['note'];
    $pay = $_POST['payment'];
    $total = $_POST['total'];

    $nextId = getMaxId($conn, "select max(B_ID) as maxId from bill")+1;

    $diachi = $note.', '.$huyen.', '.$tinh;
    
    if (isset($_POST['sale'])){
        $sql = "insert into bill values ($nextId, 1, $pay, null, {$_SESSION['id']}, '{$_POST['sale']}', sysdate(),'$diachi',$total)";
    } else {
        $sql = "insert into bill values ($nextId, 1, $pay, null, {$_SESSION['id']}, null, sysdate(),'$diachi',$total)";
    }
    if ($conn->query($sql)){
        $rs = querySqlwithResult($conn, "select cd.*, pd.PD_ID, pd.PD_NAME, pd.PD_PRICE from cart_detail cd join products pd on pd.PD_ID=cd.PD_ID where cd.CTM_ID={$_SESSION['id']}");
        $rs_all = $rs->fetch_all(MYSQLI_ASSOC);
        foreach ($rs_all as $row) {
            querySql($conn, "insert into bill_detail values ($nextId, {$row['PD_ID']}, {$row['PD_QUANT']})");
            // querySql($conn, "update products set PD_QUANT = PD_QUANT - {$row['PD_QUANT']} where PD_ID = {$row['PD_ID']}");
        }

        querySql($conn,"delete from cart_detail where CTM_ID = {$_SESSION['id']}");
        $_SESSION['message'] = "Đã đặt hàng thành công";
        header('Location: cart-page.php?popup=1');
    } else {
        echo $sql;
    }

?>