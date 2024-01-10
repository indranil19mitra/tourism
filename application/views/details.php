<?php
$duration = $price = $pl = $dl = $difficult = $tour_about_details = $itinerary = $itinerary_sub = $tours_id = "";
if (!empty($get_tours_details)) {
    // echo "<pre>";
    // print_r($get_tours_details);
    $duration = $get_tours_details->duration;
    $price = $get_tours_details->price;
    $pl = $get_tours_details->pikup_location;
    $dl = $get_tours_details->drop_location;
    $difficult = (!empty($get_tours_details->difficulty)) ? $get_tours_details->difficulty : 'NA';
    $tour_about_details = $get_tours_details->tour_about_details;
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
                            <div><i class="fa-solid fa-person-hiking dtl_icon"></i><span class="mnt_wish_dt_1"> Difficulty Level -</span><span class="ps-1 mnt_wish_dt dtl_icon1 word-wrap"> <?= $difficult; ?></span></div>
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
                        <button class="btn btn-primary rounded mx-auto" onclick="get_info()" type="button">Other Info</button>
                    </div>
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="get_book()" type="button">Book Now</button>
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
                </div>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <!-- <h1>Contact Us</h1> -->
            </div>
        </div>
    </div>
</div>