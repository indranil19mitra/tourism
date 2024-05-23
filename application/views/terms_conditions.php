<?php
$terms_conditions_details_data = (!empty($terms_conditions_details)) ? $terms_conditions_details->terms_conditions_data : "";
?>
<div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">
    <?php $this->load->view('slider'); ?>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
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
                                                        <h2 class="elementor-heading-title elementor-size-default">Terms and Conditions</h2>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-79e4907 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="79e4907" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                                    <div class="elementor-widget-container">
                                                        <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-cf1757d elementor-widget elementor-widget-text-editor" data-id="cf1757d" data-element_type="widget" data-widget_type="text-editor.default">
                                                    <div class="elementor-widget-container">By using our services, you agree to comply with the terms and conditions outlined below. Please read them carefully to understand your rights and responsibilities.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-12 all_txt_frmt_1">
                <?= $terms_conditions_details_data; ?>
            </div>
        </div>
    </div>
</div>