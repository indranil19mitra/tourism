<?php
$duration = $price = $pl = $dl = $difficult = $tour_about_details = $itinerary = $itinerary_sub = $tours_id = $tour_inclusions = $tour_exclusions = $tour_other_info = "";
if (!empty($get_tours_details)) {
    // echo "<pre>";
    // print_r($get_tours_details);
    $duration = $get_tours_details->duration;
    $price = $get_tours_details->price;
    $pl = $get_tours_details->pikup_location;
    $dl = $get_tours_details->drop_location;
    $difficult = (!empty($get_tours_details->difficulty)) ? $get_tours_details->difficulty : 'NA';
    $tour_about_details = $get_tours_details->tour_about_details;
    $tour_inclusions = $get_tours_details->inclusions;
    $tour_exclusions = $get_tours_details->exclusions;
    $tour_other_info = $get_tours_details->other_info;
    $itinerary = (!empty($get_tours_details->itinerary)) ? (array_filter(explode("##,", rtrim($get_tours_details->itinerary, "##")))) : '';
    $itinerary_sub = (!empty($get_tours_details->itinerary_sub)) ? array_filter(explode("##,", rtrim($get_tours_details->itinerary_sub, "##"))) : '';
    $tour_details_id = (!empty($get_tours_details->tour_details_id)) ? $get_tours_details->tour_details_id : '';
    $tours_id = (!empty($get_tours_details->tours_id)) ? $get_tours_details->tours_id : '';
    // echo "tour_details_id=> ".$tour_details_id;
    // echo "tours_id=> ".$tours_id;
    // exit;
}
?>
<div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17 mb-5">
    <?php $this->load->view('slider'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                        <h2 class="elementor-heading-title elementor-size-default mt-2">overview</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                    </div>
                                                </div>
                                                <!-- <div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-12 mb-5">
                    <div class="d-flex justify-content-between">
                        <div class="col-6">
                            <div><i class="fa-solid fa-clock dtl_icon"></i><span class="mnt_wish_dt_1"> Duration</span><span class="ps-1 mnt_wish_dt dtl_icon1 word-wrap"> <?= $duration; ?></span></div>
                        </div>

                        <div class="col-6">
                            <div><i class="fa-solid fa-indian-rupee-sign dtl_icon"></i><span class="mnt_wish_dt_1"> Starting Price</span><span class="ps-1 mnt_wish_dt dtl_icon1 "> <?= $price; ?>/-</span></div>
                        </div>
                    </div>


                    <div class="mt-5 d-flex justify-content-between">
                        <div class="col-6">
                            <div><i class="fa-solid fa-location-dot dtl_icon"></i><span class="ps-1 mnt_wish_dt dtl_icon1 word-wrap"><?= $pl; ?> - <?= $dl; ?></span></div>
                        </div>

                        <div class="col-6">
                            <div><i class="fa-solid fa-person-hiking dtl_icon1"></i><span class="mnt_wish_dt_1"> Difficulty Level -</span><span class="ps-1 mnt_wish_dt dtl_icon1 word-wrap"> <?= $difficult; ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-start mx-auto col-12">
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="get_itinerary()" type="button">Itinerary</button>
                    </div>
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="get_dates_costing('<?= $tour_details_id; ?>','<?= $tours_id; ?>')" type="button">Dates & Costing</button>
                    </div>
                    <div class="mb-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="get_other_info()" type="button">Other Info</button>
                    </div>
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" data-bs-toggle="modal" data-bs-target="#tour_booking_details_modal" onclick="get_book('<?= $tour_details_id; ?>','<?= $tours_id; ?>')" type="button">Book Now</button>
                    </div>
                </div>
                <?php
                if (!empty($tour_about_details)) :
                ?>
                    <section id="about_details" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                            <h2 class="elementor-heading-title elementor-size-default mt-2">about</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="fs-5 fw-bold text-left">
                                        <!-- <p>The village of Bir (elevation: 1400m), located in the Kangra district of Himachal Pradesh India, is internationally famous as the base for some of the best paragliding in the world. The take-off point at Billing, 14km up a winding road from Bir and 1000m higher, hosts major competitive flying events most years in October or November (including a round of the Paragliding World Cup in 2015). Experienced paragliders fly as far as Dharamshala, Mandi, and Manali from here.<br>
                                        </p>
                                        <p>
                                            Bir is also an important center of the Tibetan exile community: the lower half of the village is known as Tibetan Colony and there are several Buddhist monasteries and institutes in and around Bir, some of which attract numbers of foreigners for courses and retreats.<br>
                                        </p> -->
                                        <?= $tour_about_details; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                endif;
                ?>
                <?php
                if (!empty($itinerary)) :
                ?>
                    <section id="itinerary_details" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                            <h2 class="elementor-heading-title elementor-size-default mt-2">Itinerary</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <?php
                                        foreach ($itinerary as $key => $val) {
                                        ?>
                                            <div class="accordion-item  mt-2">
                                                <h2 class="accordion-header rounded">
                                                    <a class="accordion-button collapsed w-100 itinarary_bg_clr itinarary_bg_clr_hvr text-dark rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?= $key; ?>" aria-expanded="false" aria-controls="flush-<?= $key; ?>">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="fw-bold">Day <?= $key; ?>: </div>
                                                            <div class=""><span><?= $itinerary[$key] ?></span></div>
                                                            <div class=""><i class="fa-regular fa-angle-down"></i></div>
                                                        </div>
                                                    </a>
                                                </h2>
                                                <div id="flush-<?= $key; ?>" class="accordion-collapse collapse itinarary_bg_clr text-dark rounded-4 mt-3 itinarary_bg_clr_2" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <span><?= $itinerary_sub[$key] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                endif;
                ?>
                <div id="dates_and_costing">
                    <section id="dates_and_costing1" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                            <h2 class="elementor-heading-title elementor-size-default mt-2">Dates</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                        </div>
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
                        <div class="row">
                            <div class="col-12">
                                <div id="scheduled_months"></div>
                                <div id="scheduled_dates_month_wise" class="mt-5"></div>
                            </div>
                        </div>
                    </div>

                    <section id="dates_and_costing1" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                            <h2 class="elementor-heading-title elementor-size-default mt-2">Costing</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-borderless table-rounded align-middle tbl">
                            <thead class="table-dark tbl_head">
                                <tr>
                                    <th scope="col">Room Sharing</th>
                                    <th scope="col">Cost (Per Person)</th>
                                </tr>
                            </thead>
                            <tbody class="table-secondary tbl_body">
                                <tr>
                                    <td>Double/ Twin Sharing</td>
                                    <td id="tour_price_month_wise"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if (!empty($tour_inclusions)) :
                    ?>
                        <section id="dates_and_costing1" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                                <h2 class="elementor-heading-title elementor-size-default mt-2">inclusions</h2>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="fs-5 text-left">
                                            <!-- <p>The village of Bir (elevation: 1400m), located in the Kangra district of Himachal Pradesh India, is internationally famous as the base for some of the best paragliding in the world. The take-off point at Billing, 14km up a winding road from Bir and 1000m higher, hosts major competitive flying events most years in October or November (including a round of the Paragliding World Cup in 2015). Experienced paragliders fly as far as Dharamshala, Mandi, and Manali from here.<br>
                                        </p>
                                        <p>
                                            Bir is also an important center of the Tibetan exile community: the lower half of the village is known as Tibetan Colony and there are several Buddhist monasteries and institutes in and around Bir, some of which attract numbers of foreigners for courses and retreats.<br>
                                        </p> -->
                                            <?= $tour_inclusions; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    endif;
                    if (!empty($tour_exclusions)) :
                    ?>
                        <section id="dates_and_costing1" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                                <h2 class="elementor-heading-title elementor-size-default mt-2">exclusions</h2>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="fs-5 text-left">
                                            <!-- <p>The village of Bir (elevation: 1400m), located in the Kangra district of Himachal Pradesh India, is internationally famous as the base for some of the best paragliding in the world. The take-off point at Billing, 14km up a winding road from Bir and 1000m higher, hosts major competitive flying events most years in October or November (including a round of the Paragliding World Cup in 2015). Experienced paragliders fly as far as Dharamshala, Mandi, and Manali from here.<br>
                                        </p>
                                        <p>
                                            Bir is also an important center of the Tibetan exile community: the lower half of the village is known as Tibetan Colony and there are several Buddhist monasteries and institutes in and around Bir, some of which attract numbers of foreigners for courses and retreats.<br>
                                        </p> -->
                                            <?= $tour_exclusions; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php
                    endif;
                    ?>
                </div>

                <?php
                if (!empty($tour_other_info)) :
                ?>
                    <section id="other_info" class="elementor-section elementor-top-section elementor-element elementor-element-6521b521 elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-5" data-id="6521b521" data-element_type="section">
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
                                                            <h2 class="elementor-heading-title elementor-size-default mt-2">other info</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="fs-5 text-left">
                                        <!-- <p>The village of Bir (elevation: 1400m), located in the Kangra district of Himachal Pradesh India, is internationally famous as the base for some of the best paragliding in the world. The take-off point at Billing, 14km up a winding road from Bir and 1000m higher, hosts major competitive flying events most years in October or November (including a round of the Paragliding World Cup in 2015). Experienced paragliders fly as far as Dharamshala, Mandi, and Manali from here.<br>
                                        </p>
                                        <p>
                                            Bir is also an important center of the Tibetan exile community: the lower half of the village is known as Tibetan Colony and there are several Buddhist monasteries and institutes in and around Bir, some of which attract numbers of foreigners for courses and retreats.<br>
                                        </p> -->
                                        <?= $tour_other_info; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php
                endif;
                ?>


                <div id="tour_booking_details">

                    <div class="row">
                        <!-- Modal -->
                        <div class="modal fade" id="tour_booking_details_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog change_booking_mdl modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-center">
                                        <h1 class="modal-title fs-5" id="book_now_modal_header_title">PLEASE SELECT YOUR BATCH DATES</h1>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" id="tour_booking_details_form">
                                            <div class="row" id="plase_select_your_batch_dates">
                                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                    <label for="tour_months" class="col-form-label">Months</label>
                                                    <select class="form-select slct_cls" id="tour_months" name="tour_months" aria-label="select example">
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                                    <div id="get_booking_dates"></div>
                                                </div>
                                            </div>

                                            <div class="row" id="room_sharing">
                                                <div class="d-flex justify-content-between p-5 text-center">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3"><label for="type" class="col-form-label rs_cls1">Type</label></div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3"><label for="per_person" class="col-form-label rs_cls1">Price (per person)</label></div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3"><label for="per_person_icon" class="col-form-label rs_cls2"><i class="fa-solid fa-user"></i></label></div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 mb-3 d-flex justify-content-between p-5 text-center">
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                                                        <label for="type" class="col-form-label rs_cls3">Double Sharing/ Twin Sharing</label>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                                                        <label for="per_person" class="col-form-label rs_cls3">
                                                            <i class="fa-solid fa-indian-rupee-sign pe-1"></i>
                                                            <span id="get_price_details"></span>
                                                            /-
                                                        </label>
                                                        <input type="hidden" id="get_price_details_1" name="get_price_details_1" readonly>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                                                        <label for="per_person_icon" class="col-form-label rs_cls4">
                                                            <button id="fa_minus" type="button" class="rs_cls5" onclick="decrementCount()">
                                                                <i class="fa-solid fa-minus"></i>
                                                            </button>
                                                            <span id="booking_member_count" class="px-2">0</span>
                                                            <button id="fa_plus" type="button" class="rs_cls5" onclick="incrementCount()">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </label>
                                                        <input type="hidden" id="booking_member_count_1" name="booking_member_count_1" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="personal_details">
                                                <div class="p-5">
                                                    <input type="hidden" id="booking_details_ids" name="booking_details_ids" readonly>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3 d-flex justify-content-center">
                                                        <input type="text" class="form-control clr_input" onblur="check_booking_input(this.value, 'name')" id="name" name="name" placeholder="Please Enter Your Name">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3 d-flex justify-content-center">
                                                        <input type="text" class="form-control clr_input" onblur="check_booking_input(this.value, 'contact_no')" id="contact_no" maxlength="10" name="contact_no" placeholder="Please Enter Contact Number">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3 d-flex justify-content-center">
                                                        <input type="email" class="form-control clr_input" onblur="check_booking_input(this.value, 'email')" id="email" name="email" placeholder="Please Enter Email ID">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3 d-flex justify-content-center">
                                                        <textarea type="text" class="form-control clr_input" onblur="check_booking_input(this.value,'address')" rows="4" id="address" name="address" placeholder="Please Enter Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="review_booking">
                                                <div class="px-5">
                                                    <div>
                                                        <span id="tour_details_name" class="tour_details_name"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-calendar-days booking_fnt_icn"></i>
                                                        <span id="tour_details_date" class="booking_fnt_txt"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-user booking_fnt_icn"></i>
                                                        <span id="tour_details_main_customer_name" class="booking_fnt_txt"></span>
                                                        <span id="ttl_number_prsn" class="booking_fnt_txt_1"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-envelope booking_fnt_icn"></i>
                                                        <span id="tour_details_main_customer_email" class="booking_fnt_txt"></span>
                                                    </div>
                                                    <div>
                                                        <i class="fa-solid fa-phone booking_fnt_icn"></i>
                                                        <span id="tour_details_main_customer_phone" class="booking_fnt_txt"></span>
                                                    </div>

                                                    <div class="my-2"><span id="payment_details">Payment Details</span></div>

                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped border table-rounded align-middle tbl">
                                                            <thead class="table-dark tbl_head">
                                                                <tr class="booking_tr1">
                                                                    <th scope="col" class="border booking_bd">Total Cost</th>
                                                                    <th scope="col" id="ttl_amount_of_booking_with_gst" class="border booking_bd"></th>
                                                                    <th scope="col" class="border booking_bd">Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="table-secondary tbl_body">
                                                                <tr class="booking_tr2">
                                                                    <td class="border booking_bd">Double Sharing/ Twin Sharing</td>
                                                                    <td id="ttl_amount_of_booking_without_gst" class="border booking_bd"></td>
                                                                    <td id="ttl_amount_of_booking_per_head_charge_without_gst" class="border booking_bd"></td>
                                                                </tr>
                                                                <tr class="booking_tr2">
                                                                    <td class="border booking_bd">GST @ 5%</td>
                                                                    <td id="ttl_cost_of_booking_gst_amount" class="border booking_bd"></td>
                                                                    <td class="border booking_bd"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" id="ttl_amount_of_booking_without_gst_1" name="ttl_amount_of_booking_without_gst_1">
                                                        <input type="hidden" id="ttl_amount_of_booking_with_gst_1" name="ttl_amount_of_booking_with_gst_1">
                                                        <input type="hidden" id="ttl_cost_of_booking_gst_amount_1" name="ttl_cost_of_booking_gst_amount_1">
                                                    </div>

                                                    <div>
                                                        <span id="tour_booking_adv_requirement"></span>
                                                    </div>
                                                </div>

                                                <div class="mt-5" id="overall_payment_details">
                                                    <div id="overall_payment_details_1">
                                                        <div>
                                                            <span id="tour_booking_adv_payment_methods"></span>
                                                        </div>
                                                        <div>
                                                            <span id="tour_booking_upi_us_at"></span>
                                                        </div>
                                                        <div>
                                                            <span id="tour_booking_upi_name"><strong>UPI Name: </strong></span>
                                                            <span id="tour_booking_upi_name_details">Durbeen / Durbeen Private Limited</span>
                                                        </div>
                                                        <div>
                                                            <span id="bank_transfer"><strong>Bank Transfer:</strong></span>
                                                        </div>
                                                        <div>
                                                            <span id="tour_booking_ac_number"></span>
                                                        </div>
                                                        <div>
                                                            <span id="tour_booking_ac_name"></span>
                                                        </div>
                                                        <div>
                                                            <span id="tour_booking_ac_ifsc"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary back_to_initial_back" onclick="check_back(this)" id="tour_booking_details_back_1">Back</button>
                                        <button type="button" class="btn btn-primary back_to_initial_next" onclick="check_next(this)" id="tour_booking_details_next_1">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <!-- <h1>Contact Us</h1> -->
            </div>
        </div>
    </div>
</div>