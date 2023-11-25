<!DOCTYPE html>
<html>
<?php
require '../connect.php';
require 'popup-message.php';
require 'head.php';
?>

<body>
    <?php require 'header.php' ?>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <!-- Sidebar Navidation Menus-->
            <?php
            require 'sidebar_header.php';
            require 'sidebar_menu.php';
            ?>
        </nav>
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <div class="table-responsive">
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <th class="col-3">Mã</th>
                                    <th class="col-2">Tỉ lệ (%)</th>
                                    <th class="col-3">Ngày bắt đầu</th>
                                    <th class="col-3">Ngày kết thúc</th>
                                    <th class="col-1"></th>
                                    <!-- <th class="col-1"></th> -->
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "select * from sale";
                                    $rs = querySqlwithResult($conn, $sql);
                                    $rsa = $rs->fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsa as $km) {
                                        echo '<tr>';
                                        echo '<td>' . $km['SL_CODE'] . '</td>';
                                        echo '<td>' . $km['SL_PERCENT'] . '</td>';
                                        echo '<td>' . $km['SL_START_DATE'] . '</td>';
                                        echo '<td>' . $km['SL_END_DATE'] . '</td>';
                                        $endDate = $km["SL_END_DATE"];
                                        $curDate = date("Y-m-d");
                                        if ($endDate >= $curDate) {
                                            echo '<td><span class="badge badge-success">Hoạt động</span></td>';
                                        } else {
                                            echo '<td><span class="badge badge-danger">Hết hạn</span></td>';
                                        }
                                        // echo '<td><a id="btnEdit"><i class="fas fa-edit dashtext-3"></i></a></td>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-4">
                            <div class="block col-12">
                                <div class="title"><strong>Thêm mã khuyến mãi</strong></div>
                                <form action="coupon_add.php" method="get">
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Mã:</strong></label>
                                        <input name="code" type="text" placeholder="XXXXXX" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Tỉ lệ (%):</strong></label>
                                        <input name="tile" type="number" min="0" max="100" step="1" placeholder="XX"
                                            class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Bắt đầu:</strong></label>
                                        <input name="startd" type="date" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Kết thúc:</strong></label>
                                        <input name="endd" type="date" class="form-control ">
                                    </div>
                                    <button type="submit" class="btn btn-warning mt-2 px-4">Thêm</button>
                                </form>
                            </div>
                            <div class="block col-12">
                                <div class="title"><strong>Cập nhật khuyến mãi</strong></div>
                                <form action="coupon_edit.php" method="get">
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Mã:</strong></label>
                                        <select id="slSale" name="code" class="form-control">
                                            <option selected value="">- Chọn mã -</option>
                                            <?php
                                            $sql = "select SL_CODE as code from sale";
                                            $rs = querySqlwithResult($conn, $sql);
                                            $sCodes = $rs->fetch_all(MYSQLI_ASSOC);
                                            foreach ($sCodes as $sCode) {
                                                echo '<option value="' . $sCode['code'] . '">' . $sCode['code'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            var select = document.getElementById("slSale");
                                            select.addEventListener("change", function () {
                                                var slCode = select.value;
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("POST", "coupon_getXhr.php", true);
                                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                xhr.onload = function () {
                                                    if (xhr.status === 200) {
                                                        var response = JSON.parse(xhr.responseText);
                                                        $('#ipTile').val(response.perc)
                                                        $('#ipNbd').val(response.sd)
                                                        $('#ipNkt').val(response.ed)
                                                        console.log(response)
                                                    } else {
                                                        console.error("Lỗi yêu cầu:", xhr.status, xhr.statusText);
                                                    }
                                                };
                                                var data = "slid=" + slCode;
                                                xhr.send(data);
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Tỉ lệ (%):</strong></label>
                                        <input name="tile" id="ipTile" type="number" min="0" max="100" step="1"
                                            placeholder="XX" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Bắt đầu:</strong></label>
                                        <input name="startd" id="ipNbd" type="date" class="form-control ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Kết thúc:</strong></label>
                                        <input name="endd" id="ipNkt" type="date" class="form-control ">
                                    </div>
                                    <button type="submit" class="btn btn-warning mt-2 px-4">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php require 'end.php' ?>
</body>

</html>