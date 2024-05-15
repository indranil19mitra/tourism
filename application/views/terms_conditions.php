<?php
$terms_conditions_details_data = (!empty($terms_conditions_details)) ? $terms_conditions_details->terms_conditions_data : "";
?>
<div data-elementor-type="wp-page" data-elementor-id="17" class="elementor elementor-17">
    <?php $this->load->view('slider'); ?>
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12 all_txt_frmt_1">
                <?= $terms_conditions_details_data; ?>
            </div>
        </div>
    </div>
</div>