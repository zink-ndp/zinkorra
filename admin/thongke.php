<?php

if (isset($_GET['from']) && isset($_GET['to'])) {
    $timefrom = $_GET['from'];
    $timeto = $_GET['to'];
} else {
    $timefrom = '2023-01-01';
    $timeto = '2023-12-31';
}
$timeframe = " (B_DATE BETWEEN '$timefrom' AND '$timeto')";

$sql = "select count(*) as tatcadh from bill where" . $timeframe;
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$tatcadonhang = $r['tatcadh'];

$sql = "select sum(B_TOTAL) as doanhthu from bill where" . $timeframe;
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$doanhthu = $r['doanhthu'];

//----------------------------------------

$sql = "select count(*) as tongdonhang from bill where (ST_ID = 3 or ST_ID = 4) and" . $timeframe;
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$tongdonhang = $r['tongdonhang'];
echo '<script>var tongdh = ' . $tongdonhang . '</script>';

$sql = "select count(*) as dhht from bill where ST_ID = 3 and" . $timeframe;
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$donhoanthanh = $r['dhht'];
echo '<script>var dh_hoanthanh = ' . $donhoanthanh . '</script>';


$sql = "select count(*) as dhh from bill where ST_ID = 4  and" . $timeframe;
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$donhuy = $r['dhh'];
echo '<script>var dh_huy = ' . $donhuy . '</script>';

$sql_dt = "SELECT YEAR(B_DATE) AS year, MONTH(B_DATE) AS month, SUM(B_TOTAL) AS monthly_revenue
                FROM bill
                WHERE " . $timeframe . "
                GROUP BY YEAR(B_DATE), MONTH(B_DATE)";
$rs = querySqlwithResult($conn, $sql_dt);
$data_year = array();
$data_month = array();
$data_revenue = array();
while ($row = mysqli_fetch_assoc($rs)) {
    $data_year[] = $row['year'];
    $data_month[] = $row['month'];
    $data_revenue[] = $row['monthly_revenue'];
}
$jsonDataYear = json_encode($data_year);
$jsonDataMonth = json_encode($data_month);
$jsonDataRevenue = json_encode($data_revenue);

echo '<script>';
echo 'var yearJson = ' . $jsonDataYear . '; ';
echo 'var monthJson = ' . $jsonDataMonth . '; ';
echo 'var revenueJson = ' . $jsonDataRevenue . '; ';
echo '</script>';

//--------------------------------------

$sql = "SELECT B_TOTAL, B_ID
            FROM bill
            WHERE " . $timeframe . " AND B_TOTAL = (SELECT MAX(B_TOTAL) FROM bill where " . $timeframe . ")
            ";
$rs = querySqlwithResult($conn, $sql);
if ($rs->num_rows > 0) {
    $r = $rs->fetch_assoc();
    $giatricaonhat = $r['B_TOTAL'];
    $idgiatrinhat = $r['B_ID'];
} else {
    $giatricaonhat = 0;
    $idgiatrinhat = 0;
}


//----------------------------------

$sql = "SELECT bd.PD_ID, pd.PD_NAME, COUNT(bd.PD_ID) AS product_count
            FROM bill_detail bd
            JOIN products pd ON bd.PD_ID = pd.PD_ID
            WHERE bd.B_ID IN (SELECT B_ID FROM bill WHERE B_DATE >= '2023-01-01' AND B_DATE <= '2023-12-31')
            GROUP BY bd.PD_ID, pd.PD_NAME
            ORDER BY product_count DESC
            LIMIT 1
            ";
$rs = querySqlwithResult($conn, $sql);
$r = $rs->fetch_assoc();
$spbannhieunhat = $r['PD_NAME'];
$idspbannhieu = $r['PD_ID'];

//--------------------------------

$sql = "SELECT it.ITR_NAME, sum(pd.PD_PRICE) as dt
FROM bill_detail bd
join products pd on pd.PD_ID = bd.PD_ID
join bill b on b.B_ID = bd.B_ID
join interior it on it.ITR_ID = pd.ITR_ID
where " . $timeframe . " group by it.ITR_NAME;";

$rs = querySqlwithResult($conn, $sql);
$itrn = array();
$itrdata = array();
while ($itr = mysqli_fetch_assoc($rs)) {
    $itrn[] = $itr['ITR_NAME'];
    $itrdata[] = $itr['dt'];
}
$itrnJson = json_encode($itrn);
$itrdataJson = json_encode($itrdata);
echo '<script>';
echo 'var itrNameJson = ' . $itrnJson . '; ';
echo 'var itrDataJson = ' . $itrdataJson . '; ';
echo '</script>';

//--------------------------------


$sql = "SELECT t.TY_NAME, sum(pd.PD_PRICE) as dt
FROM bill_detail bd
join products pd on pd.PD_ID = bd.PD_ID
join bill b on b.B_ID = bd.B_ID
join type t on t.TY_ID = pd.TY_ID
where " . $timeframe . " group by t.TY_NAME;";

$rs = querySqlwithResult($conn, $sql);
$tName = array();
$tData = array();
while ($itr = mysqli_fetch_assoc($rs)) {
    $tName[] = $itr['TY_NAME'];
    $tData[] = $itr['dt'];
}
$tNameJson = json_encode($tName);
$tDataJson = json_encode($tData);
echo '<script>';
echo 'var typeNameJson = ' . $tNameJson . '; ';
echo 'var typeDataJson = ' . $tDataJson . '; ';
echo '</script>';

?>