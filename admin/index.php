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
      require 'sidebar_header.php';
      require 'sidebar_menu.php';
      require 'thongke.php';
      ?>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <div class="row d-flex justify-content-between">
            <h2 class="h5 mt-2">Thống kê</h2>
            <div>
              <form action="#" class="form-inline">
                <a href="index.php" style="margin-right: 10px;"><input type="button" value="Đặt về mặc định"
                    class="btn btn-dark"></a>
                <div class="form-group">
                  <label for="inlineFormInput" class="sr-only">Từ ngày</label>
                  <input id="inlineFormInput" type="date" name="from" class="mr-sm-3 form-control"
                    value="<?php echo $timefrom ?>">
                </div>
                <div class="form-group">
                  <label for="inlineFormInputGroup" class="sr-only">Đến ngày</label>
                  <input id="inlineFormInputGroup" type="date" name="to" class="mr-sm-3 form-control form-control"
                    value="<?php echo $timeto ?>">
                </div>
                <div class="form-group">
                  <input type="submit" value="Lọc" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      ?>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Tổng số Đơn hàng</strong>
                  </div>
                  <div class="number dashtext-3" style="font-size: 25px !important;">
                    <?php echo $tatcadonhang ?>
                  </div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-contract"></i></div><strong>Đơn hoàn thành</strong>
                  </div>
                  <div class="number dashtext-3" style="font-size: 25px !important;">
                    <?php echo $donhoanthanh ?>
                  </div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Đơn bị huỷ</strong>
                  </div>
                  <div class="number dashtext-3" style="font-size: 25px !important;">
                    <?php echo $donhuy ?>
                  </div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Doanh thu</strong>
                  </div>
                  <div class="number dashtext-3" style="font-size: 25px !important;">
                    <?php echo number_format($doanhthu) ?>đ
                  </div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-8">
              <div class="line-chart block chart">
                <div class="title"><strong>Doanh thu</strong></div>
                <canvas id="chart_doanhthu"></canvas>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="pie-chart chart block">
                <div class="title"><strong>Tỉ lệ hoàn thành/huỷ đơn hàng</strong></div>
                <div class="pie-chart chart margin-bottom-sm">
                  <canvas id="chart_tiledon"></canvas>
                </div>
              </div>
              <div class="statistic-block block py-4">
                <div class="d-flex justify-content-between">

                  <span>Đơn hàng giá trị nhất:
                    <span style="font-size: 21px; color: #ffd300">
                      <?php echo number_format($giatricaonhat) ?>đ
                    </span>
                  </span>

                  <a target="_blank" href="../bill-detail.php?bid=<?php echo $idgiatrinhat ?>">Xem chi tiết</a>

                </div>
              </div>
              <div class="statistic-block block py-4">
                <div class="d-flex justify-content-between">
                  <span>
                    Sản phẩm được mua nhiều nhất:
                    <span style="font-size: 17px; color: #ffd300">
                      <?php echo $spbannhieunhat ?>
                    </span>
                  </span>
                  <a href="product_modi.php?id=<?php echo $idspbannhieu ?>">Xem sản phẩm</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="bar-chart block chart">
                <div class="title"><strong>Phân loại theo loại phòng</strong></div>
                <div class="bar-chart chart">
                  <canvas id="chart_loaiphong"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            <div class="bar-chart block chart">
                <div class="title"><strong>Phân loại theo loại nội thất</strong></div>
                <div class="bar-chart chart">
                  <canvas id="chart_loaihang"></canvas>
                </div>
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