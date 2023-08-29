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
        
        </div>
        
    </div>
</div>