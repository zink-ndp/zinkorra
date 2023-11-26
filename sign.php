<?php
require 'connect.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);
$repassword = mysqli_real_escape_string($conn, $_POST['repass']);
$name = $_POST['name'];
$phone = $_POST['phone'];

if ($repassword != $password){
  $_SESSION['message'] = "Mật khẩu nhập lại không khớp. Vui lòng thử lại!";
  header('Location: signin.php?popup=1');
} else {

  $result = querySqlwithResult($conn,"select CTM_EMAIL from custommer where CTM_EMAIL = '$email'");
  
  if ($result->num_rows>0){
    $message = "Email đăng ký đã tồn tại. Vui lòng thử lại!.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=signin.php');
  
  } else {
  
    $nextId = getMaxId($conn,"select max(CTM_ID) as maxid from custommer")+1;
    
    querySql($conn,"insert into custommer value ($nextId, '$name', '$phone', '$email', '$password', null)");
  
    $_SESSION['message'] = "Tạo tài khoản thành công. Vui lòng đăng nhập để tiếp tục";
    header('Location: login.php?popup=1');
  }
}




$conn->close();
?>