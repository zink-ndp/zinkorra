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
          require 'sidebar_header.php' ;
          require 'sidebar_menu.php' ;
        ?>
      </nav>
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
              <h2 class="h5 no-margin-bottom">Danh sách sản phẩm</h2>
              <input type="text" name="stfSearch" id="stfSearch" class="form-control w-50" placeholder="Tìm tên sản phẩm">
              <a href="product_add.php">(Thêm sản phẩm mới)</a>
            </div>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="table-responsive"> 
                <table class="table table-striped table-hover">
                    <thead>
                        <th class="col-1">ID</th>
                        <th class="col-5">Sản phẩm</th>
                        <th class="col-3">Mô tả</th>
                        <th class="col-1">Giá</th>
                        <th class="col-1">Tồn kho</th>
                        <th class="col-2"></th>
                    </thead>
                    <tbody>
                        <?php
                            $result = querySqlwithResult($conn,"select * from products");;
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['PD_ID'] ?></td>
                            <td>
                              <img style="width: 70px;" src="../images/products/<?php echo $row['PD_PIC'] ?>" alt="">
                              <?php echo $row['PD_NAME'] ?>
                            </td>
                            <td class="limited-text"><?php echo $row['PD_DESCRI'] ?></td>
                            <td><?php echo number_format($row['PD_PRICE']) ?>đ</td>
                            <td><?php echo $row['PD_QUANT'] ?></td>
                            <td>
                                <div class="row">
                                    <form action="product_modi.php" method="get">
                                      <input type="hidden" name="id" value="<?php echo $row['PD_ID'] ?>">
                                      <button class="btn btn-link text-warning"><i class="fas fa-edit"></i></button>
                                    </form>
                                    <form action="product_del.php" method="get">
                                      <input type="hidden" name="id" value="<?php echo $row['PD_ID'] ?>">
                                      <button class="btn btn-link text-warning"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
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