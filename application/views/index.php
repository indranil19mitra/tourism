<div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">
	<?php $this->load->view('slider'); ?>

	<?php
	if (!empty($get_travel_mates_images)) :
	?>
		<section class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6521b521" data-element_type="section">
			<div class="elementor-background-overlay"></div>
			<div class="container d-flex flex-wrap elementor-column-gap-default  p-0 g-0">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3198fc93" data-id="3198fc93" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-73351ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73351ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fbfb681" data-id="fbfb681" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-446a8ec animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="446a8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default">Our Travel Mates</h2>
											</div>
										</div>
										<div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<span class="elementor-heading-title elementor-size-default">Durbeen</span>
											</div>
										</div>
										<div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">We're not just travellers; we're integral members of the D U R B E E N family, bound by a shared passion for exploration and discovery. Together, we weave stories, create bonds, and embark on journeys that transcend mere sightseeing, immersing ourselves in the fabric of each destination.</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>

		<section class="elementor-section elementor-inner-section elementor-element elementor-element-65bf764c animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default crsl_tp" data-id="6521b521" data-element_type="section">

			<div class="container p-0 g-0">
				<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
					<!-- <div class="carousel-indicators">
						<?php
						foreach ($get_travel_mates_images as $key => $val) :

							if ($key == 0) {
						?>
								<button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="<?= $key ?>" class="active" aria-current="true" aria-label="Slide <?= $key + 1 ?>"></button>
							<?php
							} else {
							?>
								<button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="<?= $key ?>" aria-label="Slide <?= $key + 1 ?>"></button>
							<?php
							}
							?>
						<?php
						endforeach;
						?>
					</div> -->
					<div class="carousel-inner rounded">
						<?php
						foreach ($get_travel_mates_images as $key => $val) :

							if ($key == 0) {
						?>
								<div class="carousel-item active">
									<img src="<?= base_url("admin/" . $val->travel_mate_images) ?>" class="w-100 crsl_img1" style="width: 100%;" alt="..." data-bs-interval="100">
								</div>
							<?php
							} else {
							?>
								<div class="carousel-item">
									<img src="<?= base_url("admin/" . $val->travel_mate_images) ?>" class="d-block w-100 crsl_img1" style="width: 100%;" alt="..." data-bs-interval="100">
								</div>
							<?php
							}
							?>
						<?php
						endforeach;
						?>
					</div>
				</div>
				<div class="d-flex flex-wrap flex-md-nowrap justify-content-end align-items-center mb-0 mt-2 p-2">
					<div class="d-flex flex-wrap flex-md-nowrap flex-column-reverse flex-md-row gap-2">
						<div class="carousel-slider d-flex justify-content-end gap-4">
							<a class=" bg-transparent position-relative d-block" href="#" role="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
								<i class="fa-solid fa-arrow-left-long"></i>
							</a>
							<a class=" bg-transparent position-relative d-block w-auto" href="#" role="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
								<i class="fa-solid fa-arrow-right-long"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php
	endif;
	?>

	<div class="mb-5">
		<section class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6521b521" data-element_type="section">
			<div class="elementor-background-overlay"></div>
			<div class="container d-flex flex-wrap elementor-column-gap-default  p-0 g-0">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3198fc93" data-id="3198fc93" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-73351ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73351ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fbfb681" data-id="fbfb681" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-446a8ec animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="446a8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default">Destination</h2>
											</div>
										</div>
										<div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<span class="elementor-heading-title elementor-size-default">Durbeen</span>
											</div>
										</div>
										<div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">Discover hidden gems, untamed landscapes, and authentic cultures in unexplored offbeat destinations. Escape the crowds, embrace adventure, and create unforgettable memories off the beaten path.</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
		<div class="container">
			<div class="row mb-2">
				<!-- <div class="d-flex justify-content-center flex-wrap">
				<?php
				// if (!empty($get_tours_dates)) {
				// 	foreach ($get_tours_dates as $key => $val) {
				// 		if ($key <= 5) :
				?>
							<button type="button" onclick="tourGetOnDates('<?= $val->start_date ?>')" style="padding: 10px 20px 10px 20px" class="btn btn-outline-info rounded-pill btn-sm m-1"><?= date("M 'y", strtotime($val->start_date)); ?></button>
						<?php
						// else :
						// Introduce a line break after the third button
						// if ($key == 6) {
						// 	echo '</div><div class="d-flex justify-content-center flex-wrap">';
						// }
						?>
							<button type="button" onclick="tourGetOnDates('<?= $val->start_date ?>')" style="padding: 10px 20px 10px 20px" class="btn btn-outline-info rounded-pill btn-sm m-1"><?= date("M 'y", strtotime($val->start_date)); ?></button>
				<?php
				// 		endif;
				// 	}
				// }
				?>
				</div> -->

				<div class="d-flex justify-content-between flex-wrap">
					<?php
					if (!empty($get_tours_dates)) :
						foreach ($get_tours_dates as $key => $val) :
							if ($key < 12) :
					?>
								<a type="button" onclick="tourGetOnDates('<?= $val->start_date ?>')" style="padding: 5px 20px 5px 20px" class="text-secondary btn btn-outline-secondary rounded-pill btn-sm dt_btn mb-2"><?= date("M 'y", strtotime($val->start_date)); ?></a>
					<?php
							endif;
						endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
		<div class="container-fluid crd_mn mb-3">
			<div class="row">
				<div class="w-100" id="dt_swpr1">
					<div class="swiper swiper_container1 mb-3">
						<div class="swiper-wrapper p-2 ps-0 ps-md-2">
							<?php
							if (!empty($get_tours_date_wise)) :
								foreach ($get_tours_date_wise as $val) {
									$names = implode("-", explode(" ", $val->name));
							?>
									<div class="swiper-slide p-1">
										<div class="card px-3 pt-3">
											<img src="<?= base_url() . "admin/" . $val->main_image ?>" class="card-img-top rounded crd_img" alt="...">
											<div class="card-body px-0">
												<h4 class="card-title"><?= $val->name; ?></h4>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-clock"></i><span class="ps-1"><?= $val->duration; ?></span></div>
													<div><i class="fa-solid fa-stamp"></i><span class="ps-1 text-danger"><?= $val->seat_availability; ?></span> Seat Availability</div>
												</div>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-calendar-days"></i><span class="ps-1"><?= date("d M", strtotime($val->start_date)); ?></span></div>
													<div><i class="fa-solid fa-indian-rupee-sign"></i><span class="ps-1"><?= $val->price; ?>/- Onwards</span></div>
												</div>
												<div class="d-grid gap-2 mt-2">
													<button class="btn btn-primary rounded" onclick="getDetails('<?= $names; ?>','<?= $val->tour_details_id; ?>')" type="button">View Details</button>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
							endif;
							?>
						</div>
					</div>
					<!-- Navigation buttons for Swiper Slider 1 -->
					<div class="d-flex flex-wrap flex-md-nowrap justify-content-end align-items-center mb-0">
						<div class="d-flex flex-wrap flex-md-nowrap flex-column-reverse flex-md-row gap-2">
							<div class="carousel-slider d-flex justify-content-end gap-4">
								<a class=" bg-transparent position-relative d-block swiper-button-prev1" href="#" role="button">
									<div class="swiper-button-prev text-primary position-relative w-auto p-1"></div>
								</a>
								<a class=" bg-transparent position-relative d-block w-auto swiper-button-next1" href="#" role="button">
									<div class="swiper-button-next text-primary position-relative w-auto p-1"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="w-100" id="dt_swpr2">
				</div>
			</div>
		</div>
	</div>

	<?php
	if (!empty($get_tour_category_images)) :
		foreach ($get_tour_category_images as $val) :
			if ($val->tour_category_id == 1) :
	?>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-65bf764c animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default crsl_tp mt-5" data-id="6521b521" data-element_type="section">

					<div class="container-fluid p-0 g-0">
						<div class="">
							<img src="<?= base_url("admin/" . $val->trip_image) ?>" class="d-block w-100 crsl_img" style="width: 100%;" alt="..." data-bs-interval="2000">
						</div>
					</div>
				</section>
	<?php
			endif;
		endforeach;
	endif;
	?>

	<?php
	if (!empty($get_tours_weekend_trip)) {
	?>
		<section id="category_section_1" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6521b521" data-element_type="section">
			<div class="elementor-background-overlay"></div>
			<div class="container d-flex flex-wrap elementor-column-gap-default  p-0 g-0">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3198fc93" data-id="3198fc93" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-73351ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73351ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fbfb681" data-id="fbfb681" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-446a8ec animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="446a8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default"><?= (!empty($category_1)) ? $category_1->name : '' ?></h2>
											</div>
										</div>
										<div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<span class="elementor-heading-title elementor-size-default">Durbeen</span>
											</div>
										</div>
										<div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">Escape the hustle with weekend hikes. Explore nature's wonders, breathe in fresh air, and recharge. Whether solo or with friends, find your trail and adventure awaits.</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
		<div class="container-fluid crd_mn mb-5">
			<div class="row">
				<div class="w-100">
					<!-- Swiper Slider 1 -->
					<div class="swiper swiper_container2 mb-3">
						<div class="swiper-wrapper p-2 ps-0 ps-md-2">
							<?php
							if (!empty($get_tours_weekend_trip)) :
								// echo "<pre>";
								// print_r($get_tours_weekend_trip);
								foreach ($get_tours_weekend_trip as $val) {
									$names = implode("-", explode(" ", $val->name));
							?>
									<div class="swiper-slide p-1">
										<div class="card px-3 pt-3">
											<img src="<?= base_url() . "admin/" . $val->main_image ?>" class="card-img-top rounded crd_img" alt="...">
											<div class="card-body px-0">
												<h4 class="card-title"><?= $val->name; ?></h4>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-clock"></i><span class="ps-1"><?= $val->duration; ?></span></div>
													<div><i class="fa-solid fa-stamp"></i><span class="ps-1 text-danger"><?= $val->seat_availability; ?></span> Seat Availability</div>
												</div>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-calendar-days"></i><span class="ps-1"><?= date("d M", strtotime($val->start_date)); ?></span></div>
													<div><i class="fa-solid fa-indian-rupee-sign"></i><span class="ps-1"><?= $val->price; ?>/- Onwards</span></div>
												</div>
												<div class="d-grid gap-2 mt-2">
													<button class="btn btn-primary rounded" onclick="getDetails('<?= $names; ?>','<?= $val->tour_details_id; ?>')" type="button">View Details</button>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
							endif;
							?>
						</div>
					</div>
					<!-- Navigation buttons for Swiper Slider 1 -->
					<div class="d-flex flex-wrap flex-md-nowrap justify-content-end align-items-center mb-0">
						<div class="d-flex flex-wrap flex-md-nowrap flex-column-reverse flex-md-row gap-2">
							<div class="carousel-slider d-flex justify-content-end gap-4">
								<a class=" bg-transparent position-relative d-block swiper-button-prev2" href="#" role="button">
									<div class="swiper-button-prev text-primary position-relative w-auto p-1"></div>
								</a>
								<a class=" bg-transparent position-relative d-block w-auto swiper-button-next2" href="#" role="button">
									<div class="swiper-button-next text-primary position-relative w-auto p-1"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<?php
	if (!empty($get_tour_category_images)) :
		foreach ($get_tour_category_images as $val) :
			if ($val->tour_category_id == 2) :
	?>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-65bf764c animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default crsl_tp mt-5" data-id="6521b521" data-element_type="section">

					<div class="container-fluid p-0 g-0">
						<div class="">
							<img src="<?= base_url("admin/" . $val->trip_image) ?>" class="d-block w-100 crsl_img" style="width: 100%;" alt="..." data-bs-interval="2000">
						</div>
					</div>
				</section>
	<?php
			endif;
		endforeach;
	endif;
	?>

	<?php
	if (!empty($get_tours_popular_trip)) {
	?>
		<section id="category_section_2" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6521b521" data-element_type="section">
			<div class="elementor-background-overlay"></div>
			<div class="container d-flex flex-wrap elementor-column-gap-default  p-0 g-0">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3198fc93" data-id="3198fc93" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-73351ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73351ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fbfb681" data-id="fbfb681" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-446a8ec animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="446a8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default"><?= (!empty($category_2)) ? $category_2->name : '' ?></h2>
											</div>
										</div>
										<div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<span class="elementor-heading-title elementor-size-default">Durbeen</span>
											</div>
										</div>
										<div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">Durbeen's sought-after offbeat trips are like hotcakes. Explore hidden gems, off the beaten path. Discover unique cultures, breathtaking landscapes, and unforgettable experiences with us.</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>

		<div class="container-fluid crd_mn mb-5">
			<div class="row">
				<div class="w-100">
					<!-- Swiper Slider 1 -->
					<div class="swiper swiper_container3 mb-3">
						<div class="swiper-wrapper p-2 ps-0 ps-md-2">
							<?php
							if (!empty($get_tours_popular_trip)) :
								// echo "<pre>";
								// print_r($get_tours_popular_trip);
								foreach ($get_tours_popular_trip as $val) {
									$names = implode("-", explode(" ", $val->name));
							?>
									<div class="swiper-slide p-1">
										<div class="card px-3 pt-3">
											<img src="<?= base_url() . "admin/" . $val->main_image ?>" class="card-img-top rounded crd_img" alt="...">
											<div class="card-body px-0">
												<h4 class="card-title"><?= $val->name; ?></h4>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-clock"></i><span class="ps-1"><?= $val->duration; ?></span></div>
													<div><i class="fa-solid fa-stamp"></i><span class="ps-1 text-danger"><?= $val->seat_availability; ?></span> Seat Availability</div>
												</div>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-calendar-days"></i><span class="ps-1"><?= date("d M", strtotime($val->start_date)); ?></span></div>
													<div><i class="fa-solid fa-indian-rupee-sign"></i><span class="ps-1"><?= $val->price; ?>/- Onwards</span></div>
												</div>
												<div class="d-grid gap-2 mt-2">
													<button class="btn btn-primary rounded" onclick="getDetails('<?= $names; ?>','<?= $val->tour_details_id; ?>')" type="button">View Details</button>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
							endif;
							?>
						</div>
					</div>
					<!-- Navigation buttons for Swiper Slider 1 -->
					<div class="d-flex flex-wrap flex-md-nowrap justify-content-end align-items-center mb-0">
						<div class="d-flex flex-wrap flex-md-nowrap flex-column-reverse flex-md-row gap-2">
							<div class="carousel-slider d-flex justify-content-end gap-4">
								<a class=" bg-transparent position-relative d-block swiper-button-prev3" href="#" role="button">
									<div class="swiper-button-prev text-primary position-relative w-auto p-1"></div>
								</a>
								<a class=" bg-transparent position-relative d-block w-auto swiper-button-next3" href="#" role="button">
									<div class="swiper-button-next text-primary position-relative w-auto p-1"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>

	<?php
	if (!empty($get_tour_category_images)) :
		foreach ($get_tour_category_images as $val) :
			if ($val->tour_category_id == 3) :
	?>
				<section class="elementor-section elementor-inner-section elementor-element elementor-element-65bf764c animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default crsl_tp mt-5" data-id="6521b521" data-element_type="section">

					<div class="container-fluid p-0 g-0">
						<div class="">
							<img src="<?= base_url("admin/" . $val->trip_image) ?>" class="d-block w-100 crsl_img" style="width: 100%;" alt="..." data-bs-interval="2000">
						</div>
					</div>
				</section>
	<?php
			endif;
		endforeach;
	endif;
	?>
	<?php
	if (!empty($get_tours_adv_trip)) {
	?>
		<section id="category_section_3" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6521b521" data-element_type="section">
			<div class="elementor-background-overlay"></div>
			<div class="container d-flex flex-wrap elementor-column-gap-default  p-0 g-0">
				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3198fc93" data-id="3198fc93" data-element_type="column">
					<div class="elementor-widget-wrap elementor-element-populated">
						<section class="elementor-section elementor-inner-section elementor-element elementor-element-73351ef elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="73351ef" data-element_type="section">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fbfb681" data-id="fbfb681" data-element_type="column">
									<div class="elementor-widget-wrap elementor-element-populated">
										<div class="elementor-element elementor-element-446a8ec animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="446a8ec" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<h2 class="elementor-heading-title elementor-size-default"><?= (!empty($category_3)) ? $category_3->name : '' ?></h2>
											</div>
										</div>
										<div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
											<div class="elementor-widget-container">
												<span class="elementor-heading-title elementor-size-default">Durbeen</span>
											</div>
										</div>
										<div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
											<div class="elementor-widget-container">Embark on adrenaline-fueled adventures and thrilling treks, where you'll conquer towering peaks, explore rugged terrain, and immerse yourself in the beauty of nature's challenges. Unforgettable experiences await those who dare to explore.</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>

		<div class="container-fluid crd_mn mb-5">
			<div class="row">
				<div class="w-100">
					<!-- Swiper Slider 1 -->
					<div class="swiper swiper_container4 mb-3">
						<div class="swiper-wrapper p-2 ps-0 ps-md-2">
							<?php
							if (!empty($get_tours_adv_trip)) :
								foreach ($get_tours_adv_trip as $val) {
									$names = implode("-", explode(" ", $val->name));
							?>
									<div class="swiper-slide p-1">
										<div class="card px-3 pt-3">
											<img src="<?= base_url() . "admin/" . $val->main_image ?>" class="card-img-top rounded crd_img" alt="...">
											<div class="card-body px-0">
												<h4 class="card-title"><?= $val->name; ?></h4>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-clock"></i><span class="ps-1"><?= $val->duration; ?></span></div>
													<div><i class="fa-solid fa-stamp"></i><span class="ps-1 text-danger"><?= $val->seat_availability; ?></span> Seat Availability</div>
												</div>
												<div class="d-flex justify-content-between">
													<div><i class="fa-solid fa-calendar-days"></i><span class="ps-1"><?= date("d M", strtotime($val->start_date)); ?></span></div>
													<div><i class="fa-solid fa-indian-rupee-sign"></i><span class="ps-1"><?= $val->price; ?>/- Onwards</span></div>
												</div>
												<div class="d-grid gap-2 mt-2">
													<button class="btn btn-primary rounded" onclick="getDetails('<?= $names; ?>','<?= $val->tour_details_id; ?>')" type="button">View Details</button>
												</div>
											</div>
										</div>
									</div>
							<?php
								}
							endif;
							?>
						</div>
					</div>
					<!-- Navigation buttons for Swiper Slider 1 -->
					<div class="d-flex flex-wrap flex-md-nowrap justify-content-end align-items-center mb-0">
						<div class="d-flex flex-wrap flex-md-nowrap flex-column-reverse flex-md-row gap-2">
							<div class="carousel-slider d-flex justify-content-end gap-4">
								<a class=" bg-transparent position-relative d-block swiper-button-prev4" href="#" role="button">
									<div class="swiper-button-prev text-primary position-relative w-auto p-1"></div>
								</a>
								<a class=" bg-transparent position-relative d-block w-auto swiper-button-next4" href="#" role="button">
									<div class="swiper-button-next text-primary position-relative w-auto p-1"></div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>

	<section class="elementor-section elementor-top-section elementor-element elementor-element-5bbb119 animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="5bbb119" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;video&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;background_video_link&quot;:&quot;https://www.youtube.com/watch?v=GqMLB49TED8&quot;,&quot;background_video_start&quot;:548,&quot;background_video_end&quot;:559}">
		<div class="elementor-background-video-container elementor-hidden-phone">
			<div class="elementor-background-video-embed"></div>
		</div>
		<div class="elementor-background-overlay"></div>
		<div class="elementor-container elementor-column-gap-default">
			<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-34c8d8f" data-id="34c8d8f" data-element_type="column">
				<div class="elementor-widget-wrap elementor-element-populated">
					<div class="elementor-element elementor-element-cb076d4 animated-slow elementor-invisible elementor-widget elementor-widget-jkit_video_button" data-id="cb076d4" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:10}" data-widget_type="jkit_video_button.default">
						<div class="elementor-widget-container">
							<div class="jeg-elementor-kit jkit-video-button jeg_module_17_35_654c63d6210df" data-autoplay="0" data-loop="0" data-controls="0" data-type="youtube" data-mute="0" data-start="0" data-end="0"><a href="https://www.youtube.com/watch?v=GqMLB49TED8" class="jkit-video-popup-btn glow-enable"><span class="icon-position-before"><i aria-hidden="true" class="jki jki-play1-light"></i></span></a></div>
						</div>
					</div>
					<div class="elementor-element elementor-element-7097f91 elementor-widget elementor-widget-heading" data-id="7097f91" data-element_type="widget" data-widget_type="heading.default">
						<div class="elementor-widget-container">
							<h2 class="elementor-heading-title elementor-size-default">Travel far enough, you meet yourself.</h2>
						</div>
					</div>
					<div class="elementor-element elementor-element-d90b36c elementor-widget elementor-widget-text-editor" data-id="d90b36c" data-element_type="widget" data-widget_type="text-editor.default">
						<div class="elementor-widget-container"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>