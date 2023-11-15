<?php
    require '../connect.php';

    $bid = $_GET['bid'];
    $stid = $_GET['stid'];
    $stfid = $_SESSION['id'];

    $sql = "update bill set ST_ID = $stid, STF_ID = $stfid where B_ID = $bid";
    querySql($conn,$sql);

    if ($stid == 3){
        $sql = "select pd.*, bd.PD_QUANT as quant from products pd join bill_detail bd on bd.PD_ID=pd.PD_ID where bd.B_ID=$bid";
        $rs = querySqlwithResult($conn, $sql);
        $rs_all = $rs->fetch_all(MYSQLI_ASSOC);
        foreach ($rs_all as $row) {
            querySql($conn, "update products set PD_QUANT = PD_QUANT - {$row['quant']} where PD_ID = {$row['PD_ID']}");
        }
    }

    header('Location: invoice.php?stt='.$stid)

?>