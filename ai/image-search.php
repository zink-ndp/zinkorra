<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zink Orr'a - Search by Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
        }
        
        .rectangle {
            text-align: center;
            background-color: #dfb162; /* Màu chữ nhật */
            padding: 60px 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .rectangle1 {
            text-align: center;
            background-color: #dfb162; /* Màu chữ nhật */
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="rectangle">
            <div class="rectangle1">
                <img style="height: 230px; margin-top: -50px;" src="robot.gif" alt="">
            </div>
            <h3 style="margin-top: -20px;">AI đang xử lý. Vui lòng đợi...</h3>
        </div>
    </div>
</body>
</html>

<?php
    // Lấy dữ liệu file
    $file = $_FILES["img"];

    // Kiểm tra xem file có phải là ảnh không
    if (!is_uploaded_file($file['tmp_name'])) {
    return false;
    }

    // Lấy tên file
    $filename = $file['name'];


    move_uploaded_file($file['tmp_name'],$filename);

    $new_filename = 'img_to_search.png';
    rename($filename, $new_filename);
    
    header("Refresh: 0.1; url=loading_ai.php");

    
?>

