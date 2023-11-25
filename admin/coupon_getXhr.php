<?php
require "../connect.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $slid = $_POST['slid'];

    $sql ="select * from sale where SL_CODE = '$slid'";

    $rs = querySqlwithResult($conn, $sql);
    $r = $rs->fetch_assoc();
    
    $sl_code = $r['SL_CODE'];
    $sl_percent = $r['SL_PERCENT'];
    $sl_sd = $r['SL_START_DATE'];
    $sl_ed = $r['SL_END_DATE'];
    
    $slArray = array(
        "code" => $sl_code,
        "perc" => $sl_percent,
        "sd" => $sl_sd,
        "ed" => $sl_ed
    );
    
    $slJson = json_encode($slArray);
    
    echo $slJson;

} else {
    echo "Invalid request method";
}

?>
