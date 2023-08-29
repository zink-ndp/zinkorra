<!--Products Section-->
<section class="products-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Product Column-->
                <div class="product-column col-lg-6 col-md-12 col-sm-12">
                	<div class="row clearfix">
                    	<!--Shop Item Two-->
                        <?php
                            $sql = "SELECT * FROM products ORDER BY PD_PRICE DESC LIMIT 2";
                            $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {
                        ?>
                    	<div class="shop-item-two col-lg-6 col-md-6 col-sm-12">
                        	<div class="inner-box">
                            	<div class="image" style="height: 250px !important;">
                                	<a href="product-detail.html"><img style="object-fit: cover !important;" class="lightbox-image" src="images/products/<?php echo $row["PD_PIC"] ?>" alt="" /></a>
                                </div>
                                <div class="lower-content">
                                	<h3><a href="product-detail.html"><?php echo $row["PD_NAME"] ?></a></h3>
									<div class="price"><?php echo number_format($row["PD_PRICE"]) ?> VND</div>
									<a href="product-detail.html" class="theme-btn cart-btn">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                
                <!--Content Column-->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                	<div class="inner-column">
                    	<h2>Nội thất tốt nhất <span>cho nhà bạn</span></h2>
                        <div class="text">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </div>
                        <a href="#" class="theme-btn btn-style-one"><span class="txt">Xem tất cả sản phẩm</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>