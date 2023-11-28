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
                    <h2 class="h5 no-margin-bottom">Cập nhật nhân viên</h2>
                </div>
            </div>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 block">
                            <?php
                            $stfid = $_GET['stfid'];
                            $sql = "select * from staff where STF_ID=$stfid";
                            $rs = querySqlwithResult($conn, $sql);
                            $stf = $rs->fetch_assoc()
                                ?>
                            <form action="staff_edit_action.php" method="post">
                                <input type="hidden" name="stfid" value="<?php echo $stfid ?>">
                                <div class="form-group">
                                    <label class="form-control-label"><strong>Vai trò:</strong></label>
                                    <select name="role" class="form-control mb-3 mb-3">
                                        <option <?php if ($stf['RO_ID'] == 2)
                                            echo 'selected' ?> value="2">Nhân viên
                                            </option>
                                            <option <?php if ($stf['RO_ID'] == 1)
                                            echo 'selected' ?> value="1">Quản lý
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Họ và tên:</strong></label>
                                        <input name="name" type="text" class="form-control"
                                            value="<?php echo $stf['STF_NAME'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"><strong>Giới tính:</strong></label>
                                    <select name="gender" class="form-control mb-3 mb-3">
                                        <option <?php if ($stf['STF_GENDER'] == 'm')
                                            echo 'selected' ?> value="m">Nam
                                            </option>
                                            <option <?php if ($stf['STF_GENDER'] == 'f')
                                            echo 'selected' ?> value="f">Nữ
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><strong>Số điện thoại:</strong></label>
                                        <input name="sdt" type="phone" value="<?php echo $stf['STF_PHONE'] ?>"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"><strong>Email:</strong></label>
                                    <input name="email" type="email" value="<?php echo $stf['STF_EMAIL'] ?>"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label"><strong>Mật khẩu đăng nhập:</strong></label>
                                    <input name="pw" type="password" value="<?php echo $stf['STF_PASS'] ?>"
                                        class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning float-right mt-2 px-4">Cập nhật</button>
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