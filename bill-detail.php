<?php

    require 'head.php';

    $bid = $_GET['bid'];

    $sql = "select * from bill b
            join custommer c on c.CTM_ID = b.CTM_ID
            left join sale s on s.SL_CODE = b.SL_CODE
            where B_ID = $bid";

    $rs = querySqlwithResult($conn, $sql);
    $r = $rs->fetch_assoc();
?>

    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-12 p-5" id="print-area">
            <div class="row d-flex text-center">
                <h6 class="text-dark text-bold">HOÁ ĐƠN ZINK ORRA<b><br>
            </div>
            <div class="d-flex justify-content-between">
                <p class="text-secondary-emphasis fs-6">Số hoá đơn: <?php echo $r['B_ID'] ?></p>
                <p class="text-secondary-emphasis fs-6"><?php echo $r['B_DATE'] ?></p>
            </div>
            <span>Khách hàng: <?php echo $r['CTM_NAME'] ?></span><br>
            <span>Số điện thoại: <?php echo $r['CTM_PHONE'] ?></span><br>
            <span>Địa chỉ giao hàng: <?php echo $r['B_ADDRESS'] ?></span><br>
            <span>Danh sách sản phẩm:</span>

            <style>
                @page {
                    size: 210mm 297mm; /* Kích thước giấy A4 */
                    margin: 20mm 15mm; /* Khoảng lề */
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                }

                table, th, td {
                    border: 1px solid #000;
                    padding: 5px;
                }
            </style>
            <table class="mt-2" style="width: 100%;">
                <thead>
                    <th>STT</th>
                    <th>Tên SP</th> 
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tạm tính</th>
                </thead>
                <tbody>
                    <?php
                        $bid = $_GET['bid'];
 
                        $sql = "select b.*, bd.*, pd.PD_NAME, pd.PD_PRICE from bill b
                                join bill_detail bd on bd.B_ID = b.B_ID
                                join products pd on pd.PD_ID = bd.PD_ID
                                where b.B_ID = $bid";
                    
                        $rs = querySqlwithResult($conn, $sql);
                        $rsa = $rs->fetch_all(MYSQLI_ASSOC);

                        $stt = 0;
                        $total = 0;
                        foreach ($rsa as $sp) {
                            $stt += 1;
                            echo '<tr>';
                            echo '<td>'.$stt.'</td>';
                            echo '<td>'.$sp['PD_NAME'].'</td>';
                            echo '<td>'.$sp['PD_PRICE'].'</td>';
                            echo '<td>'.$sp['PD_QUANT'].'</td>';
                            echo '<td>'.$sp['PD_QUANT']*$sp['PD_PRICE'].'</td>';
                            echo '</tr>';
                            $total += $sp["PD_QUANT"] * $sp["PD_PRICE"];
                        }
                    ?>
                </tbody>
            </table>
            <?php
                if ($r['SL_CODE']!=null) {
                    $sale = $r['SL_CODE'].' - '.$r['SL_PERCENT'].'%'  ;
                    $gg = $total*($r['SL_PERCENT']/100);
                } else {
                    $sale = "Không áp dụng";
                    $gg = 0;
                }
            ?>
            <span>Mã giảm giá: <?php echo $sale ?></span><br>
            <span class="float-end">Tạm tính: <?php echo number_format($total) ?>đ</span><br>
            <span class="float-end">Giá giảm: <?php echo number_format($gg) ?>đ</span><br>
            <span class="float-end">Thành tiền: <?php echo number_format($total-$gg) ?>đ</span><br>
            
        </div>
    </div>