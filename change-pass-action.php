<?php

    require 'connect.php';
    
    $opw = $_POST['oldpw'];
    $npw = $_POST['newpw'];
    $rnpw = $_POST['renewpw'];

    querySql($conn, "update custommer set CTM_PASS = '$npw' where CTM_ID = '{$_SESSION['id']}'");

    $_SESSION['message'] = "Cập nhật mật khẩu thành công";

    header('Location: cus-info.php?popup=1');
    
?>