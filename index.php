<!DOCTYPE html>
<html lang="en">

<?php
	require 'head.php';
?>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->

    <header class="main-header header-style-one">
        <!--Header Top-->
        <?php
			require 'head-top.php';
		?>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <?php
			require 'head-upper.php';
		?>
        <!--End Header Upper-->

    	<!-- Mobile Menu  -->
        <?php
			require 'mobile-menu.php';
		?>
		<!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

    <!-- Main Slider -->
	<section class="main-slider">
		<div class="slider-box">
		
			<!-- Banner Carousel -->
			<div class="banner-carousel owl-theme owl-carousel">
			
				<!-- Slide -->
				<div class="slide">
                	<div class="image-layer" style="background-image:url(images/main-slider/1.jpg)"></div>
					<div class="auto-container">
						<div class="content">
							<h2>Đưa căn nhà trong mơ <br> thành hiện thực</h2>
							<div class="text">Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living & dining.</div>
							<div class="btns-box">
								<a href="#services-section" class="theme-btn btn-style-one"><span class="txt">Tìm hiểu thêm</span></a>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Slide -->
				<div class="slide">
                	<div class="image-layer" style="background-image:url(images/main-slider/5.jpg)"></div>
					<div class="auto-container">
						<div class="content">
							<h2>Thiết kế phù hợp với<br> Phong cách của bạn</h2>
							<div class="text">Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living & dining.</div>
							<div class="btns-box">
								<a href="#services-section" class="theme-btn btn-style-one"><span class="txt">Tìm hiểu thêm</span></a>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Slide -->
				<div class="slide">
                	<div class="image-layer" style="background-image:url(images/main-slider/3.jpg)"></div>
					<div class="auto-container">
						<div class="content">
							<h2>Giải pháp cho <br> Căn bếp hiện đại</h2>
							<div class="text">Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living & dining.</div>
							<div class="btns-box">
								<a href="#services-section" class="theme-btn btn-style-one"><span class="txt">Tìm hiểu thêm</span></a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Banner Section -->
	
	<!-- Services Section -->
	<section class="services-section" id="services-section">
		<div class="auto-container">
			<!-- Title Box -->
			<div class="title-box">
				<h2>Sản phẩm mới nhất</h2>
			</div>
			
			<div class="row clearfix">
				<?php
					$sql = "select * from products order by PD_ID DESC limit 3";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$result = $conn->query($sql);
						$result_all = $result -> fetch_all(MYSQLI_ASSOC);
						foreach ($result_all as $row) {
				?>
				<!-- Service Block -->
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image-container" style="height: 200px !important;">
							<a href="product-detail.php?id=<?php echo $row['PD_ID'] ?>"><img class="fit-image" src="images/products/<?php echo $row['PD_PIC'] ?>" alt="" /></a>
						</div>
						<div class="lower-content">
							<h3><a href="product-detail.php?id=<?php echo $row['PD_ID'] ?>"><?php echo $row['PD_NAME'] ?></a></h3>
							<div class="text"><?php echo $row['PD_DESCRI'] ?></div>
							<a href="product-detail.php?id=<?php echo $row['PD_ID'] ?>" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				<?php }} ?>
				
			</div>
			
		</div>
	</section>
	<!-- End Services Section -->
	
	<!-- Services Section Two -->
	<section class="services-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h2>Dịch vụ của chúng tôi</h2>
				<div class="text">Osed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numquam qui ratione voluptatem sequi nesciunt.</div>
			</div>
			
			<div class="row clearfix">
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-couch fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Nội thất phòng khách</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-bed fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Nội thất phòng ngủ</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-utensils fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Nội thất nhà bếp</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-toilet fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Thiết bị vệ sinh</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-umbrella-beach fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Không gian ngoài trời</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
						<div class="content">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-laptop fa-xs"></i></span>
							</div>
							<h3><a href="office-interior.html">Phòng làm việc</a></h3>
							<div class="text">Lorem Ipsum is  simply my text of the printing and Ipsum is the Ipsum is simply.</div>
							<a href="office-interior.html" class="read-more">Xem thêm</a>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Services Section Two -->
	
	<!-- Project Section -->
	<section class="project-section">
		<div class="auto-container">
			<!-- Title Box -->
			<div class="title-box">
				<h2>Những dự án của chúng tôi</h2>
			</div>
		</div>
		
		<div class="outer-container">
			
			<!--Isotope Galery-->
            <div class="sortable-masonry">
                
                <!--Filter-->
                <div class="filters clearfix">
                	
                	<ul class="filter-tabs filter-btns text-center clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">Tất cả</li>
						<li class="filter" data-role="button" data-filter=".residential">Phòng khách</li>
						<li class="filter" data-role="button" data-filter=".commercial">Phòng ngủ</li>
						<li class="filter" data-role="button" data-filter=".office">Bếp</li>
						<li class="filter" data-role="button" data-filter=".outside">Ngoài trời</li>
                    </ul>
                    
                </div>
                
				<div class="items-container row clearfix">
				
					<!-- Gallery Item -->
					<div class="gallery-item large-block masonry-item all hospital commercial">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/1.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/1.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item small-block masonry-item all hospital commercial">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/2.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/2.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item small-block masonry-item all residential office commercial">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/3.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/3.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item small-block masonry-item all commercial">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/4.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/4.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item large-block masonry-item all hospital office residential">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/7.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/7.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item small-block masonry-item all residential">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/5.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/5.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
					<!-- Gallery Item -->
					<div class="gallery-item small-block masonry-item all hospital office">
						<div class="inner-box">
							<figure class="image-box">
								<img src="images/gallery/6.jpg" alt="">
								<!--Overlay Box-->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<h3><a href="projects-fullwidth.html">Modular Kitchen</a></h3>
											<a href="images/gallery/6.jpg" data-fancybox="gallery-1" data-caption="" class="link"><span class="icon flaticon-magnifying-glass-1"></span></a>
											<a href="projects-fullwidth.html" class="link"><span class="icon flaticon-unlink"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>
					
				</div>
				
			</div>
		
			<!-- More Projects -->
			<div class="more-projects">
				<a href="projects-classic.html" class="projects">Xem thêm tất cả dự án</a>
			</div>
		
		</div>
	</section>
	<!-- End Project Section -->
	
	<!-- Fluid Section One -->
    <section class="fluid-section-one">
    	<div class="outer-container clearfix">
        	
			<!--Content Column-->
			<div class="content-column">
				<div class="content-box">
					<h2>Khiến việc thiết kế nội thất trở nên đơn giản</h2>
					<div class="text">To give you a home that lasts, we bring you only the best in everything — quality raw materials, state-of-the-art manufacturing, rigorous quality checks, professional installations and transparent prices.</div>
					<ul class="list-style-one">
						<li>Whole Home Interior</li>
						<li>Modular Kitchen and Wardrobe</li>
						<li>Furniture, Decore and more</li>
						<li>Post-surgery, including cosmetic, joint replacement, or heart surgery</li>
						<li>Chronic conditions, such as diabetes, COPD, or cancer</li>
						<li>On Site Expertiset</li>
					</ul>
					<div class="bold-text">Thiết kế căn nhà của bạn với Zink Orr'a <br> <a href="contact.html">Liên hệ với nhà thiết kế</a></div>
				</div>
			</div>
			
			<!--Image Column-->
        	<div class="image-column" style="background-image: url(images/resource/video-img.jpg)">
				<div class="inner-column">
					<div class="image">
						<img src="images/resource/video-img.jpg" alt="">
					</div>
					<a href="https://www.youtube.com/watch?v=SXZXtD60t2g" class="overlay-link lightbox-image">
						<div class="icon-box">
							<span class="icon"><i class="fas fa-play"></i></span>
                            <i class="ripple"></i>
						</div>
					</a>
				</div>
            </div>
            <!--End Image Column-->
			
		</div>
	</section>
	
	<!-- Testimonial Section -->
	<section class="testimonial-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title-two centered">
				<h2>Những người khác nói gì?</h2>
				<div class="title-text">Hàng triệu người Việt tin tưởng</div>
			</div>
			
			<div class="testimonial-carousel owl-carousel owl-theme">
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="content">
							<div class="image-outer">
								<div class="image">
									<img src="images/resource/author-1.jpg" alt="" />
								</div>
							</div>
							<h3>Michale John</h3>
							<div class="title">I got luxuary inteior from Stella Orr'e</div>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numqua.</div>
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="content">
							<div class="image-outer">
								<div class="image">
									<img src="images/resource/author-2.jpg" alt="" />
								</div>
							</div>
							<h3>Michale John</h3>
							<div class="title">I got luxuary inteior from Stella Orr'e</div>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numqua.</div>
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="content">
							<div class="image-outer">
								<div class="image">
									<img src="images/resource/author-1.jpg" alt="" />
								</div>
							</div>
							<h3>Michale John</h3>
							<div class="title">I got luxuary inteior from Stella Orr'e</div>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numqua.</div>
						</div>
					</div>
				</div>
				
				<!-- Testimonial Block -->
				<div class="testimonial-block">
					<div class="inner-box">
						<div class="content">
							<div class="image-outer">
								<div class="image">
									<img src="images/resource/author-2.jpg" alt="" />
								</div>
							</div>
							<h3>Michale John</h3>
							<div class="title">I got luxuary inteior from Stella Orr'e</div>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci sed quia non numqua.</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
	
	<!-- Featured Section -->
	<section class="featured-section" style="background-image: url(images/background/2.jpg)">
		<div class="auto-container">
			<!-- Title Box -->
			<div class="title-box">
				<h2>Tiến trình làm việc của chúng tôi</h2>
			</div>
			
			<div class="row clearfix">
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-outer">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-handshake"></i></span>
							</div>
							<div class="feature-number">1</div>
						</div>
						<div class="lower-content">
							<h3><a href="residental-interior.html">Gặp khách hàng</a></h3>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
						</div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="icon-outer">
							<div class="icon-box">
								<span class="icon"><i class="fab fa-discourse"></i></span>
							</div>
							<div class="feature-number">2</div>
						</div>
						<div class="lower-content">
							<h3><a href="residental-interior.html">Thảo luận thiết kế</a></h3>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
						</div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
						<div class="icon-outer">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-pencil-ruler"></i></span>
							</div>
							<div class="feature-number">3</div>
						</div>
						<div class="lower-content">
							<h3><a href="residental-interior.html">Thiết kế sơ thảo</a></h3>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
						</div>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="750ms" data-wow-duration="1500ms">
						<div class="icon-outer">
							<div class="icon-box">
								<span class="icon"><i class="fas fa-paint-roller"></i></span>
							</div>
							<div class="feature-number">4</div>
						</div>
						<div class="lower-content">
							<h3><a href="residental-interior.html">Thực hiện</a></h3>
							<div class="text">Osed quia consequuntur magni dolores eos qui rati one volu ptatem sequi nesciunt.</div>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Featured Section -->
	
	<!-- News Section -->
	<section class="news-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h2>Need a design fix? Read our magazine</h2>
				<div class="text">Stay updated with latest trends, inspiration, expert tips, DIYs and more</div>
			</div>
			
			<div class="row clearfix">
				
				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li>By <span>Michale</span></li>
								<li>Modular Kitchen</li>
							</ul>
							<h3><a href="blog-detail.html">15 Vastu ideas for the main door emphasizes on every par ...</a></h3>
							<a href="blog-detail.html" class="read-more">Xem thêm <span class="icon flaticon-right-arrow-1"></span></a>
						</div>
					</div>
				</div>
				
				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="250ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="blog-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li>By <span>Michale</span></li>
								<li>Interior, awesome</li>
							</ul>
							<h3><a href="blog-detail.html">Storage ideas for the bedroom by interior designers ...</a></h3>
							<a href="blog-detail.html" class="read-more">Xem thêm <span class="icon flaticon-right-arrow-1"></span></a>
						</div>
					</div>
				</div>
				
				<!-- News Block -->
				<div class="news-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
						<div class="image">
							<a href="blog-detail.html"><img src="images/resource/news-3.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<ul class="post-meta">
								<li>By <span>Michale</span></li>
								<li>Interior, awesome</li>
							</ul>
							<h3><a href="blog-detail.html">Kids bedroom design ideas by interior designers in NY</a></h3>
							<a href="blog-detail.html" class="read-more">Xem thêm <span class="icon flaticon-right-arrow-1"></span></a>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End News Section -->
	
	<!-- Call To Action Section -->
	<section class="call-to-action-section" style="background-image: url(images/background/1.jpg)">
		<div class="auto-container">
			<h2>Nghĩ đến nội thất. Nghĩ đến Zink Orr'a</h2>
			<div class="text">Nội thất với mọi phân loại và mức giá. Lụa chọn từ hàng nghìn <br> bản thiết kế. Lắng nghe ước muốn của bạn.</div>
			<a href="contact.html" class="theme-btn btn-style-two"><span class="txt">Liên hệ ngay</span></a>
		</div>
	</section>
	<!-- End Call To Action Section -->
	
	<!--Main Footer-->
    <?php
		include "footer.php"
	?>
	
</div>  
<!--End pagewrapper-->

<script>var BotStar={appId:"sdf3e8bd6-2af1-42e2-832e-61f026f59e99",mode:"livechat"};!function(t,a){var e=function(){(e.q=e.q||[]).push(arguments)};e.q=e.q||[],t.BotStarApi=e;!function(){var t=a.createElement("script");t.type="text/javascript",t.async=1,t.src="https://widget.botstar.com/static/js/widget.js";var e=a.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();}(window,document)</script>
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Search Popup-->
<?php
	include "search-popup.php";
?>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/isotope.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/scrollbar.js"></script>
<script src="js/script.js"></script>
</body>

<!-- stella-orre/  30 Nov 2019 03:45:45 GMT -->
</html>