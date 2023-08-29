<?php
require 'connect.php';

$username = mysqli_real_escape_string($conn, $_POST['usname']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "select * from custommer where CTM_EMAIL = '".strtolower($username)."' and CTM_PASS = '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  
  $row = $result->fetch_assoc();
  $_SESSION["id"] = $row['CTM_ID'];
  $_SESSION["pw"] = $row['CTN_PASS'];
  $_SESSION["name"] = $row['CTM_NAME'];
  $fullname = explode(' ', $row['CTM_NAME']);
  $lastname = end($fullname);
  $_SESSION["lname"] = $lastname;
  $_SESSION["email"] = $row['CTM_EMAIL'];
  if($row['CTM_AVT']==null){
    $_SESSION["avt"] = "macdinh.jpg";
  } else {
    $_SESSION["avt"] = $row['CTM_AVT'];
  }
  header('Location: index.php');
} else {
  $message = $username.$password."Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=login.php');
}

$conn->close();
?>