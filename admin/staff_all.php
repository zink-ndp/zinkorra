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
            <h2 class="h5 no-margin-bottom">DS Nhân viên</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div> 
              <table class="table table-striped table-hover">
                  <thead>
                      <th class="col-1">ID</th>
                      <th class="col-3">Tên NV</th>
                      <th class="col-2">Chức vụ</th>
                      <th class="col-1">Giới tính</th>
                      <th class="col-1">SĐT</th>
                      <th class="col-3">Email</th>
                      <th class="col-1"></th>
                  </thead>
                  <tbody>
                      <?php
                          $result = querySqlwithResult($conn,"select * from staff");;
                          $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                          foreach ($result_all as $row) {
                      ?>
                      <tr>
                          <td><?php echo $row['STF_ID'] ?></td>
                          <td><?php echo $row['STF_NAME'] ?></td>
                          <td>
                            <?php 
                              if ($row['RO_ID'] == "1") echo "Quản lý";
                              else echo "Nhân viên";
                            ?>
                          </td>
                          <td>
                            <?php 
                              if ($row['STF_GENDER']=="m") echo "Nam";
                              else echo "Nữ"; 
                            ?>
                          </td>
                          <td><?php echo $row['STF_PHONE'] ?></td>
                          <td><?php echo $row['STF_EMAIL'] ?></td>
                          <td>
                              <div class="row">
                                  <a href="staff_edit.php?stfid=<?php echo $row['STF_ID'] ?>">
                                      <button class="btn btn-link text-warning"><i class="fas fa-edit"></i></button>
                                  </a>
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