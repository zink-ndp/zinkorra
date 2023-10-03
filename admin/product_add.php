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
            <h2 class="h5 no-margin-bottom">Thống kê</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
          </div>
        </section>
      </div>
    </div>
    <?php require 'end.php' ?>
  </body>
</html>