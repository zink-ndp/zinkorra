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
      ?>
    </nav>
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Thêm nhân viên</h2>
        </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6 block">
              <form action="staff_add_action.php" method="post">
                <div class="form-group">
                  <label class="form-control-label"><strong>Vai trò:</strong></label>
                  <select name="role" class="form-control mb-3 mb-3">
                    <option value="2">Nhân viên</option>
                    <option value="1">Quản lý</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label"><strong>Họ và tên:</strong></label>
                  <input name="name" type="text" placeholder="Nguyễn Văn A" class="form-control ">
                </div>
                <div class="form-group">
                  <label class="form-control-label"><strong>Giới tính:</strong></label>
                  <select name="gender" class="form-control mb-3 mb-3">
                    <option value="m">Nam</option>
                    <option value="f">Nữ</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-control-label"><strong>Số điện thoại:</strong></label>
                  <input name="sdt" type="phone" placeholder="0xxxxxxxxxx" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-control-label"><strong>Email:</strong></label>
                  <input name="email" type="email" placeholder="a@gmail.com" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-control-label"><strong>Mật khẩu đăng nhập:</strong></label>
                  <input name="pw" type="password" placeholder="xxx" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning float-right mt-2 px-4">Thêm</button>
              </form>
            </div>
            <div class="col-3"></div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php require 'end.php' ?>
</body>

</html>