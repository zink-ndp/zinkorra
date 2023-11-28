<?php

    require '../connect.php';

    $id = $_POST['stfid'];
    $role = $_POST['role'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    // $file = $_FILES["imgProduct"];

    // $filename = $file['name'];
    // $img = uploadImage($file, $filename, "../images/products/", $pdid.'.png');

    $sql = "update staff set RO_ID=$role, STF_NAME='$name', STF_GENDER='$gender', STF_PHONE='$sdt', STF_EMAIL='$email', STF_PASS='$pw' where STF_ID=$id";

    echo $sql;

    querySql($conn, $sql);

    header('Location: staff_all.php');

?>