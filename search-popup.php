<div id="search-popup" class="search-popup">
	<div class="close-search theme-btn"><span class="flaticon-cancel"></span></div>
	<div class="popup-inner">
		<div class="overlay-layer"></div>
    	<div class="search-form">
        	<form method="get" action="shop.php">
            	<div class="form-group">
                	<fieldset>
                        <input type="search" class="form-control" name="search" value="" placeholder="Bạn muốn tìm gì..." required >
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
                <li><a href="shop.php?room=<?php echo $row["ITR_ID"] ?>&rname=<?php echo $row["ITR_NAME"] ?>"><?php echo $row["ITR_NAME"] ?></a></li>
                <?php
                        }
                    }
                ?> 
            </ul>
            
            <div style="width: 100%; text-align: center;" >
                <h3 class="mt-4">Tìm kiếm bằng hình ảnh</h3>
                <form action="ai/image-search.php" method="post" enctype="multipart/form-data">
                    
                    <div class="row search-panel" style="text-align: center;">
                        <div class="col-12" style="border: 1px dashed grey; padding: 10px;">
                            <input style="height: 40%; width: 100%; display: none;" type="file" name="img" id="imageInput" accept="image/*">
                                <h3>
                                    <label style="font-size: 23px; color: white" for="imageInput">Chọn file</label>
                                </h3>
                                <h3 style="font-size: 23px;" class="mt-n4">
                                    hoặc <br> Kéo hình ảnh vào đây
                                </h3>
                                <i id="df-img" style="font-size: 60px" class="far fa-images mb-4"></i>
                                <div class="col-12" id="lower-panel" style="display: none;">
                                    <div class="col-12 image-container mt-2" style="border: none !important; width: 100% !important; align-items: center;" id="imagePreview"></div>
                                    <div class="col-12" id="btn"></div>
                                </div>
                            </input>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const imageInput = document.getElementById("imageInput");
                            const imagePreview = document.getElementById("imagePreview");
                            const spanel = document.getElementsByClassName('search-panel');
                            const lower =document.getElementById('lower-panel');
                            const dfimg =document.getElementById('df-img');
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
                                    dfimg.style = "display: none";
                                    lower.style = "display: block;";
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

