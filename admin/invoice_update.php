<?php
    require '../connect.php';

    $bid = $_GET['bid'];
    $stid = $_GET['stid'];
    $stfid = $_SESSION['id'];

    $sql = "update bill set ST_ID = $stid, STF_ID = $stfid where B_ID = $bid";
    querySql($conn,$sql);

    header('Location: invoice.php?stt='.$stid)

?>