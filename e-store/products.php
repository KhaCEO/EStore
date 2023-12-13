<?php include './include/header.php';
?>

<div class="main-content main-content-product no-sidebar">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-trail breadcrumbs">
					<?php
					if (isset($_GET['category'])) {
					?>
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="./index.php">Home</a>
							</li>
							<li class="trail-item trail-end active">
								<a href="./products.php">Products</a>
							</li>
							<li class="trail-item trail-end active">
								<a>Category</a>
							</li>
						</ul>
					<?php
					} 
					elseif (isset($_GET['brands'])) {
					?>
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="./index.php">Home</a>
							</li>
							<li class="trail-item trail-end active">
								<a href="./products.php">Products</a>
							</li>
							<li class="trail-item trail-end active">
								<a>Brand</a>
							</li>
						</ul>
						<?php
					} 
					elseif (isset($_GET['products'])) {
						$id = $_GET['products'];
						$ProDetail = getProDetail($id);
						foreach ($ProDetail as $item) {
						?>
							<ul class="trail-items breadcrumb">
								<li class="trail-item trail-begin">
									<a href="./index.php">Home</a>
								</li>
								<li class="trail-item trail-end active">
									<a href="./products.php">Products</a>
								</li>
								<li class="trail-item trail-end active">
									<a><?= $item['product_Name'] ?></a>
								</li>
							</ul>
						<?php
						}
					} 
					else {
						?>
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="./index.php">Home</a>
							</li>
							<li class="trail-item trail-end active">
								<a href="./products.php">Products</a>
							</li>
						</ul>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<?php
					if (!isset($_GET['products'])) {
					?>
						<h3 class="custom_blog_title">
							Products
						</h3>
						<div class="shop-top-control">
							<form class="select-item select-form">
								<span class="title">Sort</span>
								<select title="sort" data-placeholder="9 Products/Page" class="chosen-select">
									<option value="2">9 Products/Page</option>
									<option value="1">12 Products/Page</option>
									<option value="3">10 Products/Page</option>
									<option value="4">8 Products/Page</option>
									<option value="5">6 Products/Page</option>
								</select>
							</form>
							<form class="filter-choice select-form">
								<span class="title">Sort by</span>
								<select title="sort-by" data-placeholder="Price: Low to High" class="chosen-select">
									<option value="1">Price: Low to High</option>
									<option value="2">Sort by popularity</option>
									<option value="3">Sort by average rating</option>
									<option value="4">Sort by newness</option>
									<option value="5">Sort by price: low to high</option>
								</select>
							</form>
							<div class="grid-view-mode">
								<div class="inner">
									<a href="listproducts.html" class="modes-mode mode-list">
										<span></span>
										<span></span>
									</a>
									<a href="gridproducts.html" class="modes-mode mode-grid  active">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
							</div>
						</div>
					<?php
					}
					?>
					<ul class="row list-products auto-clear equal-container product-grid">
						<?php
							if (isset($_GET['category'])) {
								$id = $_GET['category'];
								$category = getById('category', $id);
								$products = getProduct($id);
								if (mysqli_num_rows($products) > 0) {
								foreach ($products as $product){
									?>
										<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
												<div class="product-inner equal-element">
													<div class="product-top">
														<div class="flash">
															<span class="onnew">
																<span class="text">
																	new
																</span>
															</span>
														</div>
													</div>
													<div class="product-thumb">
														<div class="thumb-inner">
															<a href="#">
																<img src="./uploads/<?= $product['product_Img'] ?>" alt="img">
															</a>
															<div class="thumb-group">
																<div class="yith-wcwl-add-to-wishlist">
																	<div class="yith-wcwl-add-button">
																		<a href="#">Add to Wishlist</a>
																	</div>
																</div>
																<a href="#" class="button quick-wiew-button">Quick View</a>
															</div>
														</div>
													</div>
													<div class="product-info">
														<h5 class="product-name product_title">
															<a href="#"><?= $product['product_Name'] ?></a>
														</h5>
														<div class="group-info">
															<div class="stars-rating">
																<div class="star-rating">
																	<span class="star-3"></span>
																</div>
																<div class="count-star">
																	(3)
																</div>
															</div>
															<div class="price">
																<ins>$<?= $product['product_Price'] ?></ins>
															</div>
														</div>
													</div>
												</div>
										</li>
									<?php
								}
								} 
								else{
									?>
									<img src="./uploads/brands/1689688624.jpg">
									<?php
								}
							} 
							elseif (isset($_GET['brands'])) {
									$id = $_GET['brands'];
									$category = getById('brands', $id);
									$products = getProductBrand($id);
									if (mysqli_num_rows($products) > 0) {
										foreach ($products as $product) {
										?>
											<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
												<div class="product-inner equal-element">
													<div class="product-top">
														<div class="flash">
															<span class="onnew">
																<span class="text">
																	new
																</span>
															</span>
														</div>
													</div>
													<div class="product-thumb">
														<div class="thumb-inner">
															<a href="#">
																<img src="./uploads/<?= $product['product_Img'] ?>" alt="img">
															</a>
															<div class="thumb-group">
																<div class="yith-wcwl-add-to-wishlist">
																	<div class="yith-wcwl-add-button">
																		<a href="#">Add to Wishlist</a>
																	</div>
																</div>
																<a href="#" class="button quick-wiew-button">Quick View</a>
															</div>
														</div>
													</div>
													<div class="product-info">
														<h5 class="product-name product_title">
															<a href="#"><?= $product['product_Name'] ?></a>
														</h5>
														<div class="group-info">
															<div class="stars-rating">
																<div class="star-rating">
																	<span class="star-3"></span>
																</div>
																<div class="count-star">
																	(3)
																</div>
															</div>
															<div class="price">
																<ins>$<?= $product['product_Price'] ?></ins>
															</div>
														</div>
													</div>
												</div>
											</li>
										<?php
										}
									} else {
										?>
										<img src="./uploads/brands/1689688624.jpg">
									<?php
									}
							} 
							elseif (isset($_GET['products'])) {
									$id = $_GET['products'];
									$ProDetail = getProDetail($id);
									foreach ($ProDetail as $item) {
									?>
										<div class="content-area content-details col-lg-9 col-md-8 col-sm-12 col-xs-12">
											<div class="site-main">
												<div class="details-product">
													<div class="details-thumd">
														<div class="image-preview-container image-thick-box image_preview_container">
															<img id="img_zoom" data-zoom-image="./uploads/<?= $item['product_Img'] ?>" src="./uploads/<?= $item['product_Img'] ?>" alt="img">
															<a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
														</div>
														<div class="product-preview image-small product_preview">
															<div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true" data-autoplay="false" data-dots="false" data-loop="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>

																<?php
																$DetailImg = getProDetailImg($id);
																foreach ($DetailImg as $img) {
																?>
																	<a href="#" data-image="./uploads/detail/<?= $img['image'] ?>" data-zoom-image="./uploads/detail/<?= $img['image'] ?>" class="active">
																		<img src="./uploads/detail/<?= $img['image'] ?>" data-large-image="./uploads/detail/<?= $img['image'] ?>" alt="img">
																	</a>
																<?php
																}
																?>
															</div>
														</div>
													</div>
													<div class="details-infor">
														<h1 class="product-title">
															<?= $item['product_Name'] ?>
														</h1>
														<div class="stars-rating">
															<div class="star-rating">
																<span class="star-5"></span>
															</div>
															<div class="count-star">
																(7)
															</div>
														</div>
														<div class="availability">
															<?php
															if ($item['product_Stock'] > 1) {
															?>
																<p>availability: <span class="text-success fw-bold">in Stock</span></p>
															<?php
															} else {
															?>
																<p>availability: <span class="text-danger fw-bold">out Stock</span></p>
															<?php
															}
															?>
														</div>
														<div class="price">
															<span>$<?= $item['product_Price'] ?></span>
														</div>
														<div class="product-details-description">
															<ul>
																<li><?= $item['brand_name'] ?></li>
																<li><?= $item['category_Name'] ?></li>
																<!-- <li>Art.No. 06-7680</li> -->
															</ul>
														</div>
														<form action="./middleware/cart-code.php" method="post">
														<div class="variations">
															<div class="attribute attribute_color">
																<div class="color-text text-attribute">
																	Color:
																</div>
																<div class="list-color list-item">
																	<?php
																	$color = getProColor($id);
																	foreach ($color as $item) {
																	?>
																		<label for="<?= $item['color_name'] ?>" style="border: 1px solid <?= $item['color_name'] ?>" >
																			<input type="radio" id="<?= $item['color_name'] ?>" value="<?= $item['color_name'] ?>" name="product_color">
																			<span><?= $item['color_name'] ?></span>
																		</label>
																	<?php
																	}
																	?>
																</div>
															</div>
															<div class="attribute attribute_size">
																<div class="size-text text-attribute">
																	Pots Size:
																</div>
																<div class="list-size list-item">
																	<?php
																	$size = getProSize($id);
																	foreach ($size as $item) {
																	?>
																		<label for="<?= $item['size_name'] ?>" >
																			<input type="radio" id="<?= $item['size_name'] ?>" value="<?= $item['size_name'] ?>" name="product_size">
																			<span><?= $item['size_name'] ?></span>
																		</label>
																	<?php
																	}
																	?>
																</div>
															</div>
														</div>
														<div class="group-button">
															<div class="yith-wcwl-add-to-wishlist">
																<div class="yith-wcwl-add-button">
																	<a href="#">Add to Wishlist</a>
																</div>
															</div>
															<div class="size-chart-wrapp">
																<div class="btn-size-chart">
																	<a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox">View Size Chart</a>
																</div>
															</div>
															<div class="quantity-add-to-cart">
																<div class="quantity">
																	<div class="control">
																		<input type="hidden" name="product_id" value="<?= $item['id'] ?>">
																		<a class="btn-number qtyminus quantity-minus" href="#">-</a>
																		<input type="text" value="1" title="Qty" class="input-qty qty" size="4" name="product_qty">
																		<a href="#" class="btn-number qtyplus quantity-plus">+</a>
																	</div>
																</div>
																<button class="single_add_to_cart_button button" name="addCart">Add to cart</button>
															</div>
														</div>
														</form>
													</div>
												</div>
												<div class="tab-details-product">
													<ul class="tab-link">
														<li class="active">
															<a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
														</li>
														<li class="">
															<a data-toggle="tab" aria-expanded="true" href="#information">Information </a>
														</li>
														<li class="">
															<a data-toggle="tab" aria-expanded="true" href="#reviews">Reviews</a>
														</li>
													</ul>
													<div class="tab-container">
														<div id="product-descriptions" class="tab-panel active">
															<p>
																<?= $item['productDetail'] ?>
															</p>
														</div>
														<div id="information" class="tab-panel">
															<table class="table table-bordered">
																<tr>
																	<td>Size</td>
																	<?php
																	$size = getProSize($id);
																	foreach ($size as $item) {
																	?>
																		<td><?= $item['size_name'] ?></td>
																	<?php
																	}
																	?>
																</tr>
																<tr>
																	<td>Color</td>
																	<?php
																	$color = getProColor($id);
																	foreach ($color as $item) {
																	?>
																		<td><?= $item['color_name'] ?></td>
																	<?php
																	}
																	?>
																</tr>
															</table>
														</div>
														<div id="reviews" class="tab-panel">
															<div class="reviews-tab">
																<div class="comments">
																	<h2 class="reviews-title">
																		1 review for
																		<span>Areca palm</span>
																	</h2>
																	<ol class="commentlist">
																		<li class="conment">
																			<div class="conment-container">
																				<a href="#" class="avatar">
																					<img src="assets/images/avartar.jpeg" alt="img">
																				</a>
																				<div class="comment-text">
																					<div class="stars-rating">
																						<div class="star-rating">
																							<span class="star-5"></span>
																						</div>
																						<div class="count-star">
																							(1)
																						</div>
																					</div>
																					<p class="meta">
																						<strong class="author">Cobus Bester</strong>
																						<span>-</span>
																						<span class="time">June 7, 2013</span>
																					</p>
																					<div class="description">
																						<p>Simple and effective design. One of my favorites.</p>
																					</div>
																				</div>
																			</div>
																		</li>
																	</ol>
																</div>
																<div class="review_form_wrapper">
																	<div class="review_form">
																		<div class="comment-respond">
																			<span class="comment-reply-title">Add a review </span>
																			<form class="comment-form-review">
																				<p class="comment-notes">
																					<span class="email-notes">Your email address will not be published.</span>
																					Required fields are marked
																					<span class="required">*</span>
																				</p>
																				<div class="comment-form-rating">
																					<label>Your rating</label>
																					<p class="stars">
																						<span>
																							<a class="star-1" href="#"></a>
																							<a class="star-2" href="#"></a>
																							<a class="star-3" href="#"></a>
																							<a class="star-4" href="#"></a>
																							<a class="star-5" href="#"></a>
																						</span>
																					</p>
																				</div>
																				<p class="comment-form-comment">
																					<label>
																						Your review
																						<span class="required">*</span>
																					</label>
																					<textarea title="review" id="comment" name="comment" cols="45" rows="8"></textarea>
																				</p>
																				<p class="comment-form-author">
																					<label>
																						Name
																						<span class="">*</span>
																					</label>
																					<input title="author" id="author" name="author" type="text" value="">
																				</p>
																				<p class="comment-form-email">
																					<label>
																						Email
																						<span class="">*</span>
																					</label>
																					<input title="email" id="email" name="email" type="email" value="">
																				</p>
																				<p class="form-submit">
																					<input name="submit" type="submit" id="submit" class="submit" value="Submit">
																				</p>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div style="clear: left;"></div>

												<div class="related products product-grid">
													<h2 class="product-grid-title">You may also like</h2>
													<div class="owl-products owl-slick equal-container nav-center" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-1.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">Corn Plant </a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-2.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">Cretan Brake Fern</a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-3.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">Dumb Cane</a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-4.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">Glass Cleaner</a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="sidebar sidebar-details col-lg-3 col-md-4 col-sm-12 col-xs-12">
											<div class="wrapper-sidebar">
												<div class="widget widget-categories">
													<h3 class="widgettitle">Categories</h3>
													<ul class="list-categories">
														<li>
															<input type="checkbox" id="cb1">
															<label for="cb1" class="label-text">
																New Arrivals
															</label>
														</li>
														<li>
															<input type="checkbox" id="cb2">
															<label for="cb2" class="label-text">
																Ferns
															</label>
														</li>
														<li>
															<input type="checkbox" id="cb3">
															<label for="cb3" class="label-text">
																Succulents
															</label>
														</li>
														<li>
															<input type="checkbox" id="cb4">
															<label for="cb4" class="label-text">
																Cacti
															</label>
														</li>
														<li>
															<input type="checkbox" id="cb5">
															<label for="cb5" class="label-text">
																Accessories
															</label>
														</li>
														<li>
															<input type="checkbox" id="cb6">
															<label for="cb6" class="label-text">
																Palms
															</label>
														</li>
													</ul>
												</div>
												<div class="widget widget-related-products">
													<h3 class="widgettitle">Related Products</h3>
													<div class="slider-related-products owl-slick nav-top-right equal-container" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1 }},{"breakpoint":"992","settings":{"slidesToShow":2}}]'>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-1.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">Areca palm</a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="product-item style-1">
															<div class="product-inner equal-element">
																<div class="product-top">
																	<div class="flash">
																		<span class="onnew">
																			<span class="text">
																				new
																			</span>
																		</span>
																	</div>
																</div>
																<div class="product-thumb">
																	<div class="thumb-inner">
																		<a href="#">
																			<img src="assets/images/product-item-2.jpg" alt="img">
																		</a>
																		<div class="thumb-group">
																			<div class="yith-wcwl-add-to-wishlist">
																				<div class="yith-wcwl-add-button">
																					<a href="#">Add to Wishlist</a>
																				</div>
																			</div>
																			<a href="#" class="button quick-wiew-button">Quick View</a>
																			<div class="loop-form-add-to-cart">
																				<button class="single_add_to_cart_button button">Add to cart
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="product-info">
																	<h5 class="product-name product_title">
																		<a href="#">European Pan Palm</a>
																	</h5>
																	<div class="group-info">
																		<div class="stars-rating">
																			<div class="star-rating">
																				<span class="star-3"></span>
																			</div>
																			<div class="count-star">
																				(3)
																			</div>
																		</div>
																		<div class="price">
																			<del>
																				$65
																			</del>
																			<ins>
																				$45
																			</ins>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="widget widget-banner">
													<a href="#">
														<img src="assets/images/widget-banner.jpg" alt="img">
													</a>
												</div>
												<div class="widget widget-testimonials">
													<h3 class="widgettitle">Testimonials</h3>
													<div class="slider-related-products owl-slick nav-top-right" data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"991","settings":{"slidesToShow":1 }}]'>
														<div class="testimonials-item">
															<div class="Testimonial-inner">
																<div class="comment">
																	Donec ligula mauris, posuere sed tincidunt a, facilisis id enim. Class aptent taciti sociosqu ad litora torquent per conubia.
																</div>
																<div class="author">
																	<div class="avt">
																		<img src="assets/images/member1.png" alt="img">
																	</div>
																	<h3 class="name">
																		Adam Smith
																		<span class="position">
																			CEO/Founder Apple
																		</span>
																	</h3>

																</div>
															</div>
														</div>
														<div class="testimonials-item">
															<div class="Testimonial-inner">
																<div class="comment">
																	Donec ligula mauris, posuere sed tincidunt a, facilisis id enim. Class aptent taciti sociosqu ad litora torquent per conubia.
																</div>
																<div class="author">
																	<div class="avt">
																		<img src="assets/images/member2.png" alt="img">
																	</div>
																	<h3 class="name">
																		Tom Milikin
																		<span class="position">
																			CEO/Founder Apple
																		</span>
																	</h3>

																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									<?php
									}
							} 
							else {
								$products = getAll('products');
								foreach ($products as $product) {
								?>
									<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
										<div class="product-inner equal-element">
												<div class="product-top">
													<div class="flash">
														<span class="onnew">
															<span class="text">
																new
															</span>
														</span>
													</div>
												</div>
												<div class="product-thumb">
													<div class="thumb-inner">
														<a href="#">
															<img src="./uploads/<?= $product['product_Img'] ?>" alt="img">
														</a>
														<div class="thumb-group">
															<div class="yith-wcwl-add-to-wishlist">
																<div class="yith-wcwl-add-button">
																	<a href="#">Add to Wishlist</a>
																</div>
															</div>
															<a href="#" class="button quick-wiew-button">Quick View</a>
														</div>
													</div>
												</div>
												<div class="product-info">
													<h5 class="product-name product_title">
														<a href="./products.php?products=<?= $product['id'] ?>"><?= $product['product_Name'] ?></a>
													</h5>
													<div class="group-info">
														<div class="stars-rating">
															<div class="star-rating">
																<span class="star-3"></span>
															</div>
															<div class="count-star">
																(3)
															</div>
														</div>
														<div class="price">
															<ins>$<?= $product['product_Price'] ?></ins>
														</div>
													</div>
												</div>
										</div>
									</li>
								<?php
								}
							}
						?>
					</ul>
						<?php
							if (!isset($_GET['products'])) {
								?>
									<div class="pagination clearfix style2">
											<div class="nav-link">
												<a href="#" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
												<a href="#" class="page-numbers">1</a>
												<a href="#" class="page-numbers">2</a>
												<a href="#" class="page-numbers current">3</a>
												<a href="#" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
											</div>
									</div>
								<?php
							}
						?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include './include/script.php'; ?>