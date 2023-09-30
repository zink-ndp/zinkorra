<?php

    require 'connect.php';
    require 'function.php';

    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $pdid = $_GET['pdid'];
    $title = $_GET['title'];
    $cmt = $_GET['comment'];
    $star = $_GET['star'];

    $nextId = getMaxId($conn, "select max(R_ID) as maxid from rate") + 1;

    querySql($conn, "insert into rate values ($nextId, $id, $pdid, '$title', '$star', '$cmt', sysdate())");

    $_SESSION['message'] = "Đánh giá thành công";
    header('Location: bill.php?active=1&popup=1');

?>