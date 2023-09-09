<?php
if(isset($_GET['popup'])){
    $message = $_SESSION['message'];
    ?>
    <div id="popup" class="popup">
        <div class="popup-content" style="margin-bottom: -15px;">
            <p><?php echo $message ?> <i style="color: #dfb162; margin-left: 10px; " class="fas fa-check-circle fa-lg"></i></p>
        </div>
    </div>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: black;
            background-color: white;
            padding: 30px 60px;
            border-radius: 5px;
            transition: opacity 3.5s;
            z-index: 99999;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            text-align: center;
            font-size: 30px;
        }
    </style>
    <script>
        // Hiển thị popup
        function showPopup() {
            const popup = document.getElementById("popup");
            popup.style.display = "block";
            setTimeout(function() {
                popup.style.opacity = "1";
            }, 10); // Một khoảng nhỏ để tránh transition ngay khi hiển thị
        }

        // Ẩn popup
        function hidePopup() {
            const popup = document.getElementById("popup");
            popup.style.opacity = "0";
            setTimeout(function() {
                popup.style.display = "none";
            }, 1500); // 0.5 giây
        }

        // Tự động ẩn popup sau 0.5 giây
        setTimeout(function() {
            showPopup();
            setTimeout(function() {
                hidePopup();
            }, 500); // 0.5 giây
        }, 0); // 0 giây (hiển thị ngay khi tải trang)
    </script>

    <?php
}
?>