<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour Booking Details List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-wrap">Sl No</th>
                                    <th class="text-wrap">Tour</th>
                                    <th class="text-wrap">Name</th>
                                    <th class="text-wrap">Contact</th>
                                    <th class="text-wrap">Email</th>
                                    <th class="text-wrap">Address</th>
                                    <th class="text-wrap">Number of Person</th>
                                    <th class="text-wrap">Amount Per-Head</th>
                                    <th class="text-wrap">Amount</th>
                                    <th class="text-wrap">GST Amount</th>
                                    <th class="text-wrap">Total Amount</th>
                                    <th class="text-wrap">Received Amount</th>
                                    <th class="text-wrap">Due Amount</th>
                                    <th class="text-wrap">Booking Date</th>
                                    <th class="text-wrap">Tour Date</th>
                                    <th class="text-wrap">P/D Location</th>
                                    <th class="text-wrap">Duration</th>
                                    <!-- <th class="text-wrap">Status</th>
                                    <th class="text-wrap">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($tour_booking_details)) :
                                    // echo "<pre>";
                                    // print_r($tour_booking_details);
                                    // exit;
                                    foreach ($tour_booking_details as $key => $rslt) :
                                        // 	'pending'=>1, 'confirmed'=>2, 'cancelled'=>3, 'paid'=>4, 'start'=>5, 'completed'=>6	

                                        if ($rslt->status == 1) {
                                            $status_desc = "pending";
                                        } elseif ($rslt->status == 2) {
                                            $status_desc = "confirmed";
                                        } elseif ($rslt->status == 3) {
                                            $status_desc = "cancelled";
                                        } elseif ($rslt->status == 4) {
                                            $status_desc = "paid";
                                        } elseif ($rslt->status == 5) {
                                            $status_desc = "start";
                                        } elseif ($rslt->status == 6) {
                                            $status_desc = "completed";
                                        } else {
                                            $status_desc = "";
                                        }


                                        // $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                        $status_desc_class = 'badge badge-danger';

                                        $ttl_due = $rslt->booking_amount_with_gst - $rslt->received_amount;
                                        $booked_date = date('D, j M, Y', strtotime($rslt->booking_date_time));
                                        $tour_date = date('D, j M, Y', strtotime($rslt->start_date)) . " - " . date('D, j M, Y', strtotime($rslt->end_date));
                                        $pickup_drop_lcn = $rslt->pikup_location . " - " . $rslt->drop_location;
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name; ?></td>
                                            <td><?= $rslt->cust_name; ?></td>
                                            <td><?= $rslt->cust_contact; ?></td>
                                            <td><?= $rslt->cust_mail; ?></td>
                                            <td><?= $rslt->cust_addr; ?></td>
                                            <td><?= $rslt->nmbr_of_person; ?></td>
                                            <td><?= $rslt->price; ?></td>
                                            <td><?= $rslt->booking_amount_without_gst; ?></td>
                                            <td><?= $rslt->booking_gst_amount; ?></td>
                                            <td><?= $rslt->booking_amount_with_gst; ?></td>
                                            <td><?= $rslt->received_amount; ?></td>
                                            <td><?= $ttl_due; ?></td>
                                            <td><?= $booked_date; ?></td>
                                            <td><?= $tour_date; ?></td>
                                            <td><?= $pickup_drop_lcn; ?></td>
                                            <td><?= $rslt->duration; ?></td>
                                            <!-- <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#destination_details_modal" onclick="tourDestFunctionalities(<?= $rslt->tour_booking_details_id ?>,'edit')"></i></div>
                                                </div>
                                            </td> -->
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