<?php

    require '../connect.php';

    $pdid = getMaxId($conn, "select max(PD_ID) as maxid from products") +1 ;

    $itr = $_POST['interior'];
    $ty = $_POST['type'];
    $name = $_POST['name'];
    $des = $_POST['des'];
    $price = $_POST['price'];
    $quant = $_POST['quant'];

    $file = $_FILES["imgProduct"];

    $filename = $file['name'];
    $img = uploadImage($file, $filename, "../images/products/", $pdid.'.png');

    querySql($conn, "insert into products values ($pdid, $itr, $ty, '$name', $price, '$des', '$img', '$quant')");

    header('Location: product_all.php');

?>