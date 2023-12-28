<?php
$duration = $price = $pl = $dl = $difficult = $tour_about_details = "";
if (!empty($get_tours_details)) {
    // echo "<pre>";
    // print_r($get_tours_details);
    $duration = $get_tours_details->duration;
    $price = $get_tours_details->price;
    $pl = $get_tours_details->pikup_location;
    $dl = $get_tours_details->drop_location;
    $difficult = $get_tours_details->difficulty;
    $tour_about_details = $get_tours_details->tour_about_details;
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
                            <div><i class="fa-solid fa-clock dtl_icon"></i><span class="ps-1 dtl_icon1 word-wrap">Duration <?= $duration; ?></span></div>
                        </div>

                        <div class="col-6">
                            <div><i class="fa-solid fa-indian-rupee-sign dtl_icon"></i><span class="ps-1 dtl_icon1 ">Starting Price <?= $price; ?>/-</span></div>
                        </div>
                    </div>


                    <div class="mt-5 d-flex justify-content-between">
                        <div class="col-6">
                            <div><i class="fa-solid fa-location-dot dtl_icon"></i><span class="ps-1 dtl_icon1 word-wrap">P.L - <?= $pl; ?> /D.L - <?= $dl; ?></span></div>
                        </div>

                        <div class="col-6">
                            <div><i class="fa-solid fa-location-dot dtl_icon"></i><span class="ps-1 dtl_icon1 word-wrap">Difficulty Level - <?= $difficult; ?></span></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-12"> -->
                <div class="d-flex flex-wrap justify-content-start mx-auto col-12">
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="" type="button">Itinerary</button>
                    </div>
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="" type="button">Dates & Costing</button>
                    </div>
                    <!-- <div class="mb-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="" type="button">Other Info</button>
                    </div> -->
                    <div class="mb-2 px-2">
                        <button class="btn btn-primary rounded mx-auto" onclick="" type="button">Book Now</button>
                    </div>
                </div>
                <!-- </div> -->
                <?php
                if (!empty($tour_about_details)) :
                ?>
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
                    </section>
                    <div class="container">
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
                <?php
                endif;
                ?>
                <!-- <div class="container" id="other_info">
                    <div class="row">
                        <div class="col-12">
                            <div class=""><span class="fw-bold fs-2">Must Carry</span>
                                <ul class="fs-5">
                                    <li>Authentic Government ID Card</li>
                                    <li>Comfortable warm clothing</li>
                                    <li>Sunscreen &amp; lip balm</li>
                                    <li>Personal Medicines (if any)</li>
                                </ul>
                            </div>

                            <div class="mt-5">
                                <span class="fw-bold fs-2">Cancellation Policy</span><br>
                                <span class="fw-bold fs-3">No Refund shall be made with respect to the initial booking amount for any cancellations. However,</span>
                                <ul class="">
                                    <li class="fs-5">If cancellations are made 30 days before the start date of the trip, 50% of the trip cost will be charged as cancellation fees.</li>
                                    <li class="fs-5">If cancellations are made 15-30 days before the start date of the trip, 75% of the trip cost will be charged as cancellation fees.</li>
                                    <li class="fs-5">If cancellations are made within 0-15 days before the start date of the trip, 100% of the trip cost will be charged as cancellation fees.</li>
                                    <li class="fs-5">In the case of unforeseen weather conditions or government restrictions, certain activities may be cancelled and in such cases, the operator will try his best to provclasse an alternate feasible activity. However, no refund will be provided for the same.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <!-- <h1>abcd</h1> -->
            </div>
        </div>
    </div>
</div>