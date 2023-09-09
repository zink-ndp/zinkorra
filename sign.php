<?php
require 'connect.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);
$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = "select CTM_EMAIL from custommer where CTM_EMAIL = '$email'";
$result = $conn->query($sql);
if ($result->num_rows>0){
  $message = "Email đăng ký đã tồn tại. Vui lòng thử lại!.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=signin.php');

} else {
  $sql = "select max(CTM_ID) as maxid from custommer";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $nextId = $row['maxid']+1;
  
  $sql = "insert into custommer value ($nextId, '$name', '$phone', '$email', '$password', null)";
  $conn->query($sql);
  $_SESSION['message'] = "Tạo tài khoản thành công. Vui lòng đăng nhập để tiếp tục";
  header('Location: login.php?popup=1');
}



$conn->close();
?>