<?php

    require '../connect.php';

    $stfid = getMaxId($conn, "select max(STF_ID) as maxid from staff") +1 ;


    $role = $_POST['role'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    // $file = $_FILES["imgProduct"];

    // $filename = $file['name'];
    // $img = uploadImage($file, $filename, "../images/products/", $pdid.'.png');

    $sql = "insert into staff values ($stfid, $role, '$name', '$gender', '$sdt', '$email', '$pw', null)";

    echo $sql;

    querySql($conn, $sql);

    header('Location: staff_all.php');

?>