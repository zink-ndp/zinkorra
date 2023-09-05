<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #333333; /* Nền trắng */
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
            padding: 100px 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .rectangle1 {
            text-align: center;
            background-color: #dfb162; /* Màu chữ nhật */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .preloader {
            display: inline-block;
            width: 10px;
            height: 10px;
            background-color: #000;
            border-radius: 50%;
            margin: 0 5px;
            animation: preloaderAnimation 0.6s infinite alternate; /* Hiệu ứng anim */
        }

        @keyframes preloaderAnimation {
            0% {
                transform: scale(0.8);
            }
            100% {
                transform: scale(1.3);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="rectangle">
            <div class="rectangle1">
                <div class="preloader"></div>
                <div class="preloader"></div>
                <div class="preloader"></div>
            </div>
            <h3 style="margin-top: 20px;">AI đang xử lý. Vui lòng đợi...</h3>
        </div>
    </div>
</body>
</html>