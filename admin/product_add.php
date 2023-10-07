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
            <h2 class="h5 no-margin-bottom">Thêm SP</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="block">
                <div class="title"><strong class="d-block">Sản phẩm mới</strong></div>
                  <div class="block-body">
                    <form method="post" action="product_add_action.php" enctype="multipart/form-data">
                      <div class="form-group">       
                        <label class="form-control-label">Phân loại nội thất:</label>
                        <select name="interior" class="form-control mb-3 mb-3">
                          <option value="">- Phòng ... -</option>
                          <?php 
                                $rsInter = querySqlwithResult($conn,"select * from interior");
                                if ($rsInter->num_rows > 0) {
                                    $rsInter_all = $rsInter -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsInter_all as $row) {
                                        ?>
                                            <option value="<?php echo $row['ITR_ID'] ?>"><?php echo $row['ITR_NAME'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                        <select name="type" class="form-control mb-3 mb-3">
                          <option value="">- Loại -</option>
                          <?php 
                                $rsType = querySqlwithResult($conn,"select * from type");
                                if ($rsType->num_rows > 0) {
                                    $rsType_all = $rsType -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsType_all as $row) {
                                        ?>
                                            <option value="<?php echo $row['TY_ID'] ?>"><?php echo $row['TY_NAME'] ?></option>
                                        <?php
                                    }
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Tên SP:</label>
                        <input name="name" type="text" placeholder="Tên của sản phẩm" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Mô tả:</label>
                        <textarea name="des" cols="30" rows="4" placeholder="Mô tả cho SP" class="form-control"></textarea>
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Giá (VNĐ):</label>
                        <input name="price" type="number" placeholder="Giá SP" class="form-control" min="0" step="5000">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Số lượng nhập:</label>
                        <input name="quant" type="number" placeholder="Số lượng SP" class="form-control" min="0" step="1">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Hình ảnh SP:</label>
                        <input name="imgProduct" type="file" style="margin-left: 15px;" accept="image/*" >
                      </div>
                      <div class="form-group mt-3">       
                        <input type="submit" value="Thêm" class="btn btn-primary">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
        </section>
      </div>
    </div>
    <?php require 'end.php' ?>
  </body>
</html>