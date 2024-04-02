    <?php
    if (empty($this->uri->segment('1'))) {
    ?><section id="section_1" class="elementor-section elementor-top-section elementor-element elementor-element-5e65fa3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e65fa3" data-element_type="section">

            <div class="elementor-background-overlay" id="elementor-background-overlay_1"></div>
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-86585c9" data-id="86585c9" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated p-0">
                        <div class="elementor-element elementor-element-f010fc5 animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="f010fc5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <h1 class="elementor-heading-title elementor-size-default mt-3 set_ht_1_html set_ht_1_html_sz">Be Prepared For The
                                    Mountains And Beyond</h1>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-33d31a1 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading set_ht_2" data-id="33d31a1" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-7e000c1 animated-slow elementor-invisible elementor-widget elementor-widget-text-editor" data-id="7e000c1" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container mt-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure
                                dolor </div>
                        </div>

                        <!-- <section class="elementor-section elementor-inner-section elementor-element elementor-element-8182021 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8182021" data-element_type="section"> -->

                        <div class="elementor-element elementor-element-7e000c1 animated-slow elementor-invisible elementor-widget elementor-widget-text-editor" data-id="7e000c1" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="text-editor.default">

                            <div class="container mt-5" id="search_dv">
                                <form class="d-flex" id="search_form">
                                    <div class="input-group">
                                        <input type="hidden" id="serching_data_id" name="serching_data_id">
                                        <!-- <input id="serching_data" name="serching_data" class="form-control rounded-start-3 border border-3" placeholder="Where do you want to go?" aria-label="Where do you want to go?"> -->
                                        <input id="serching_data" name="serching_data" class="form-control rounded-start-3 border border-3" placeholder="Where do you want to go?" aria-label="Where do you want to go?" aria-describedby="button-addon2" autocomplete="off">

                                        <button class="btn btn-outline-secondary rounded-end-3" id="srch_box" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="container" id="" style="position: relative; margin-top:-0px;">
                                <div class="list-group text-left" id="show-list">
                                    <!-- <a href="" class="list-group-item list-group-item-action border-1 lst_itm">List 1</a> -->
                                </div>
                            </div>

                            <!-- </section> -->

                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    if (!empty($this->uri->segment('1'))) {
        $page_url = ($this->uri->segment('1') == "about-us") ? (explode('-', $this->uri->segment('1'))) : ((!empty($this->input->get('dtl_nm'))) ? (explode('-', $this->input->get('dtl_nm'))) : '');
        $current_page = "";
        if (!empty($page_url)) {
            foreach ($page_url as $val) {
                $current_page .= " " . $val;
            }
        }
        // echo "current_page=> " . $current_page;
        // exit;
        ?><section id="section_2" class="elementor-section elementor-top-section elementor-element elementor-element-5e65fa3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e65fa3" data-element_type="section">

                <div class="elementor-background-overlay" id="elementor-background-overlay_1"></div>
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-86585c9" data-id="86585c9" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-f010fc5 animated-slow elementor-invisible elementor-widget elementor-widget-heading set_ht1" data-id="f010fc5" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h1 class="elementor-heading-title elementor-size-default mt-3 set_ht_1_html_sz"><?= $current_page; ?></h1>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-33d31a1 elementor-absolute animated-slow elementor-invisible elementor-widget elementor-widget-heading set_ht2" data-id="33d31a1" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <span class="elementor-heading-title elementor-size-default">Durbeen</span>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-7e000c1 animated-slow elementor-invisible elementor-widget elementor-widget-text-editor" data-id="7e000c1" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInRight&quot;}" data-widget_type="text-editor.default">
                                <div class="elementor-widget-container mt-5" id="tour_srt_desc_1" style="font-size:20px">we wander for distraction, but we travel for fulfilment – Hillary bellock</div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>
            </section>