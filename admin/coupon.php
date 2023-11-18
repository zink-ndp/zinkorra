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
                          <th class="col-2">Tỉ lệ</th>
                          <th class="col-3">Ngày bắt đầu</th>
                          <th class="col-3">Ngày kết thúc</th>
                          <th class="col-1"></th>
                      </thead>
                      <tbody>
                          <?php
                            $sql = "select * from sale";
                            $rs = querySqlwithResult($conn,$sql)
                            
                          ?>
                      </tbody>
                  </table>
                </div>
                <div class="col-4 block">
                    <div class="title"><strong>Thêm mã khuyến mãi</strong></div>
                    <form action="coupon_add.php" method="get">
                        <div class="form-group">
                            <label class="form-control-label"><strong>Mã:</strong></label>
                            <input type="text" placeholder="XXXXXX" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><strong>Tỉ lệ (%):</strong></label>
                            <input type="number" min="0" max="100" step="1" placeholder="XX" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><strong>Bắt đầu:</strong></label>
                            <input type="date" class="form-control ">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"><strong>Kết thúc:</strong></label>
                            <input type="date" class="form-control ">
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <?php require 'end.php' ?>
  </body>
</html>