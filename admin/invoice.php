<!DOCTYPE html>
<html>
  <?php
    require '../connect.php';
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
          require 'sidebar_header.php' ;
          require 'sidebar_menu.php' ;
        ?>
      </nav>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form action="#" method="get">
                <div class="row d-flex justify-content-between">
                    <div>
                        <h2 class="h5 no-margin-bottom">Đơn hàng</h2>
                        <div class="form-group row mt-2">
                            <div class="col-12">
                                <?php
                                    $isChoosed1 = "";
                                    $isChoosed2 = "";
                                    $isChoosed3 = "";
                                    $isChoosed4 = "";
                                    switch ($_GET['stt']) {
                                        case '1':
                                            $isChoosed1 = "selected";
                                            break;
                                        case '2':
                                            $isChoosed2 = "selected";
                                            break;
                                        case '3':
                                            $isChoosed3 = "selected";
                                            break;
                                        case '4':
                                            $isChoosed4 = "selected";
                                            break;
                                    }
                                ?>
                                <select name="stt" class="form-control">
                                    <option <?php echo $isChoosed1 ?> value="1">Đợi xác nhận</option>
                                    <option <?php echo $isChoosed2 ?> value="2">Đang giao</option>
                                    <option <?php echo $isChoosed3 ?> value="3">Hoàn thành</option>
                                    <option <?php echo $isChoosed4 ?> value="4">Đã huỷ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-inline">
                        <?php
                            if (isset( $_GET['from']) && $_GET['to']) {
                                $from = $_GET['from'];
                                $to = $_GET['to'];
                            } else {
                                $from = "";
                                $to = "";
                            }
                        ?>
                        <div class="form-group">
                            Từ:
                            <input id="inlineFormInput" value="<?php echo $from ?>" type="date" name="from" class="mr-sm-3 form-control">
                        </div>
                        <div class="form-group">
                            Đến:
                            <input id="inlineFormInputGroup" value="<?php echo $to ?>" type="date" name="to" class="mr-sm-3 form-control form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Lọc" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="table-responsive"> 
              <table class="table table-striped table-hover">
                  <thead>
                      <th class="col-1">ID</th>
                      <th class="col-2">Tên KH</th>
                      <th class="col-3">Địa chỉ</th>
                      <th class="col-1">SĐT</th>
                      <th class="col-1">Ngày</th>
                      <th class="col-2">Trạng thái</th>
                      <th class="col-1"></th>
                      <th class="col-1"></th>
                  </thead>
                  <tbody>
                      <?php
                            $stt = $_GET['stt'];
                            $sql = "select b.*, c.CTM_NAME, c.CTM_PHONE, s.* from bill b
                                    join custommer c on c.CTM_ID = b.CTM_ID
                                    join status s on s.ST_ID = b.ST_ID
                                    where b.ST_ID = $stt";
                            if (isset( $_GET['from']) && $_GET['to']) {
                                $from = $_GET['from'];
                                $to = $_GET['to'];
                                $sql .= " and (B_DATE between '$from' and '$to')";
                            }
                            $result = querySqlwithResult($conn,$sql);;
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                      ?>
                      <tr>
                            <td><?php echo $row['B_ID'] ?></td>
                            <td><?php echo $row['CTM_NAME'] ?></td>
                            <td><?php echo $row['B_ADDRESS'] ?></td>
                            <td><?php echo $row['CTM_PHONE'] ?></td>
                            <td><?php echo date_format(date_create($row['B_DATE']),"d-m-Y") ?></td>
                            <form action="invoice_update.php" method="get">
                                <td>
                                    <?php 
                                        $currentStt1 = "";
                                        $currentStt2 = "";
                                        $currentStt3 = "";
                                        $currentStt4 = "";
                                        switch ($row['ST_ID'] ) {
                                            case '1':
                                                $currentStt1 = "selected";
                                                break;
                                            case '2':
                                                $currentStt2 = "selected";
                                                break;
                                            case '3':
                                                $currentStt3 = "selected";
                                                break;
                                            case '4':
                                                $currentStt4 = "selected";
                                                break;
                                        }
                                        
                                    ?>
                                    <select name="stid" class="form-control">
                                        <option <?php echo $currentStt1 ?> value="1">Đợi xác nhận</option>
                                        <option <?php echo $currentStt2 ?> value="2">Đang giao</option>
                                        <option <?php echo $currentStt3 ?> value="3">Hoàn thành</option>
                                        <option <?php echo $currentStt4 ?> value="4">Đã huỷ</option>
                                    </select>
                                </td>
                                <td>
                                    
                                        <input type="hidden" name="bid" value="<?php echo $row['B_ID'] ?>">
                                        <?php
                                            if ($row['ST_ID']==3 || $row['ST_ID']==4){
                                                $isDisable = "disabled";
                                                $class = "btn";
                                            } else {
                                                $isDisable = "";
                                                $class = "btn btn-primary";
                                            }
                                            echo '<input '.$isDisable.' type="submit" value="Cập nhật" class="'.$class.'">';
                                        ?>
                                </td>
                            </form>
                        <td><a href="./bill_detail.php">Chi tiết ></a></td>
                      </tr>
                      <?php
                          }
                      ?>
                  </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php require 'end.php' ?>
  </body>
</html>