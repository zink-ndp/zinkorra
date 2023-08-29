<?php
    require '../connect.php';

    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $password = mysqli_real_escape_string($conn, $_GET['pw']);

    $sql = "select * from staff where STF_email = '".strtolower($email)."' and STF_pass = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['STF_ID'];
        $_SESSION['name'] = $row['STF_NAME'];
        $r = "select * from ROLE where RO_ID = {$row['RO_ID']}";
        $rsr = $conn->query($r);
        $role = $rsr->fetch_assoc();
        $_SESSION['role'] = $role['RO_NAME'];
        $_SESSION['email'] = $email;
        if($row['STF_avt']==null){
            $_SESSION["avt"] = "default.png";
          } else {
            $_SESSION["avt"] = $row['STF_avt'];
          }
        header('Location: index.php');
    } else {
        $message = "Email hoặc mật khẩu không đúng. Vui lòng thử lại!.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=login.php');
    }
    // header('Location: index.php');
?>