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
          $rs = querySqlwithResult($conn, "select * from products where PD_ID = {$_GET['id']}");
          $pd = $rs->fetch_assoc();
        ?>
      </nav>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Chỉnh sửa SP</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="block">
                <div class="title"><strong class="d-block"><?php echo $pd['PD_NAME'] ?></strong></div>
                  <div class="block-body">
                    <form method="post" action="product_modi_action.php" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                      <div class="form-group">       
                        <label class="form-control-label">Phân loại nội thất:</label>
                        <select name="interior" class="form-control mb-3 mb-3">
                          <?php 
                                $rsInter = querySqlwithResult($conn,"select * from interior");
                                if ($rsInter->num_rows > 0) {
                                    $rsInter_all = $rsInter -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsInter_all as $row) {
                                      $selected = "";
                                      if($row['ITR_ID']==$pd['ITR_ID']) $selected = "selected";
                                      ?>
                                          <option $seleted value="<?php echo $row['ITR_ID'] ?>"><?php echo $row['ITR_NAME'] ?></option>
                                      <?php
                                    }
                                }
                            ?>
                        </select>
                        <select name="type" class="form-control mb-3 mb-3">
                          <?php 
                                $rsType = querySqlwithResult($conn,"select * from type");
                                if ($rsType->num_rows > 0) {
                                    $rsType_all = $rsType -> fetch_all(MYSQLI_ASSOC);
                                    foreach ($rsType_all as $row) {
                                      $selected = "";
                                      if($row['TY_ID']==$pd['TY_ID']) $selected = "selected";
                                      ?>
                                        <option $selected value="<?php echo $row['TY_ID'] ?>"><?php echo $row['TY_NAME'] ?></option>
                                      <?php
                                    }
                                }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Tên SP:</label>
                        <input name="name" type="text" value="<?php echo $pd['PD_NAME'] ?>" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Mô tả:</label>
                        <textarea name="des" cols="30" rows="4" class="form-control"><?php echo $pd['PD_DESCRI'] ?></textarea>
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Giá (VNĐ):</label>
                        <input name="price" type="number" value="<?php echo $pd['PD_PRICE'] ?>" class="form-control" min="0" step="5000">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Số lượng nhập:</label>
                        <input name="quant" type="number" value="<?php echo $pd['PD_QUANT'] ?>" class="form-control" min="0" step="1">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Hình ảnh SP:</label>
                        <img style="height: 200px;" src="../images/products/<?php echo $pd['PD_PIC'] ?>" alt=""> - hoặc cập nhật ảnh mới-
                        <input name="imgProduct" type="file" style="margin-left: 15px;" accept="image/*" file="<?php echo $pd['PD_PIC'] ?>">
                      </div>
                      <div class="form-group mt-3">       
                        <input type="submit" value="Sửa" class="btn btn-primary">
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