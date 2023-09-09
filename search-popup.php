<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="post" action="templateshub.net">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Tìm ở đây..." required >
                        <input type="submit" value="Tìm" class="theme-btn">
                    </fieldset>
                </div>
            </form>
            
            <br>
            <h3>Từ khoá thường dùng</h3>
            <ul class="recent-searches">
                <?php
                    $sql = "SELECT * FROM interior";
                    $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        $result = $conn->query($sql);
                        $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                        foreach ($result_all as $row) {
                ?>
                <li><a href="#"><?php echo $row["ITR_NAME"] ?></a></li>
                <?php
                        }
                    }
                ?> 
            </ul>
            
            <div style="width: 100%; text-align: center;" >
                <h3 class="mt-4">Tìm kiếm bằng hình ảnh</h3>
                <form action="ai/image-search.php" method="post" enctype="multipart/form-data">
                    <div class="row" style="text-align: center;">
                        <div class="col-12">
                            <input type="file" name="img" id="imageInput" accept="image/*">
                        </div>

                        <div class="col-4"></div>
                        <div class="col-4 image-container mt-2" style="border: none !important;" id="imagePreview"></div>
                        <div class="col-4"></div>
                        <div class="col-12" id="btn"></div>
                        <div class="col-12">
                            <div id="spinner"></div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const imageInput = document.getElementById("imageInput");
                            const imagePreview = document.getElementById("imagePreview");
                            const button = document.getElementById("btn");

                            imageInput.addEventListener("change", function() {
                                const selectedImage = imageInput.files[0]; // Lấy file đã chọn
                                if (selectedImage) {
                                    const reader = new FileReader();

                                    reader.onload = function(event) {
                                        const img = document.createElement("img");
                                        img.src = event.target.result;
                                        img.classList.add("preview-image", "fit-image");
                                        imagePreview.innerHTML = ""; // Xoá bỏ ảnh hiện tại (nếu có)
                                        imagePreview.appendChild(img); // Thêm ảnh mới
                                    };

                                    reader.readAsDataURL(selectedImage);

                                    button.innerHTML = '<button id="search-btn" class="theme-btn btn-style-one mt-2" type="submit">Tìm</button>'

                                }
                            });
                        });


                    </script>
                </form>
            </div>

        </div>
        
    </div>
</div>

