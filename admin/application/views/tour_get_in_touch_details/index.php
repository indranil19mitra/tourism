<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Get In touch List</h4>
                    <div class="table-responsive">
                        <table id="tour_get_in_touch_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>
                            <thead>
                                <tr>
                                    <th class="text-wrap">Sl No</th>
                                    <th class="text-wrap">Name</th>
                                    <th class="text-wrap">Contact</th>
                                    <th class="text-wrap">Email</th>
                                    <th class="text-wrap">Preferred Destination</th>
                                    <th class="text-wrap">Query Date</th>
                                    <!-- <th class="text-wrap">Status</th>
                                    <th class="text-wrap">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($get_in_touch_details)) :
                                    // echo "<pre>";
                                    // print_r($get_in_touch_details);
                                    // exit;
                                    foreach ($get_in_touch_details as $key => $rslt) :
                                        // 	'pending'=>1, 'confirmed'=>2, 'cancelled'=>3, 'paid'=>4, 'start'=>5, 'completed'=>6	

                                        if ($rslt->query_status == 1) {
                                            $status_desc = "pending";
                                        } elseif ($rslt->query_status == 2) {
                                            $status_desc = "confirmed";
                                        } elseif ($rslt->query_status == 3) {
                                            $status_desc = "cancelled";
                                        } elseif ($rslt->query_status == 4) {
                                            $status_desc = "paid";
                                        } elseif ($rslt->query_status == 5) {
                                            $status_desc = "start";
                                        } elseif ($rslt->query_status == 6) {
                                            $status_desc = "completed";
                                        } else {
                                            $status_desc = "";
                                        }


                                        // $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                        $status_desc_class = 'badge badge-danger';

                                        $query_date = date('D, j M, Y', strtotime($rslt->query_time));
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->git_cust_name; ?></td>
                                            <td><?= $rslt->code . ' ' . $rslt->git_cust_contact; ?></td>
                                            <td><?= $rslt->git_cust_email; ?></td>
                                            <td><?= $rslt->git_cust_destination; ?></td>
                                            <td><?= $query_date; ?></td>
                                        </tr>

                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = onPageLoad;

    function onPageLoad() {
        document.querySelector('.dt-buttons').classList.add("float-start", "mb-2");
        document.querySelector('.buttons-csv').classList.add("btn", "btn-sm", "btn-primary");
        document.querySelector('.buttons-excel').classList.add("btn", "btn-sm", "btn-primary");
        document.querySelector('.buttons-pdf').classList.add("btn", "btn-sm", "btn-primary");
        document.querySelector('.dataTables_paginate').classList.add("btn", "btn-sm", "btn-primary");
        // document.querySelector('.dataTables_paginate').classList.add("btn-outline-primary");
        document.querySelector('.dataTables_paginate').classList.add("float-end"); // Float pagination buttons to the right
        // $("#example_filter").children("label").hide();
    }
</script>