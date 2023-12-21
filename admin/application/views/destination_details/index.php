<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="destination_details_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Destination Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="destination_details">
                            <!-- <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="State Name">
                            </div> -->
                            <input type="hidden" class="clr" id="eid" name="eid">

                            <div class="form-check form-switch float-end mb-4">
                                <input class="form-check-input" type="checkbox" value="0" onclick="getCheck(this)" role="switch" id="is_discount" name="is_discount">
                                <label class="form-check-label" for="is_discount">Discount</label>
                            </div>
                            <select class="form-group form-select slct_cls" id="tours_id" name="tours_id" aria-label="select example">
                                <option value="" disabled selected>--Please Select Tour--</option>
                                <?php
                                if (!empty($tours_data)) {
                                    foreach ($tours_data as $val) {
                                        echo '<option value=' . $val->id . '>' . $val->name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <div class="form-group">
                                <label for="start_date" class="text-left">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="text-left">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pikup_location" name="pikup_location" placeholder="Pikup Location">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="drop_location" name="drop_location" placeholder="Drop Location">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="disc_percent" name="disc_percent" placeholder="Discount Percent">
                            </div>
                            <select class="form-group form-select slct_cls" id="status" name="status" aria-label="select example">
                                <option value="" disabled selected>--Please Select--</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                            <div class="row grid-margin">
                                <div class="col-12">
                                    <!-- <div class="card">
                                        <div class="card-body"> -->
                                            <!-- <h4 class="card-title">Quill Editor</h4> -->
                                            <div id="tourabout" class="quill-container" placeholder="tour_about">
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="destination_details_sbmt">Submit</button>
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="tourResetFun()" data-bs-target="#destination_details_modal" data-whatever="@mdo">Add Destination Details</button>
        </div>


        <div class="col-12 grid-margin stretch-card mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Destination Details List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Tour</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Pikup Location</th>
                                    <th>Drop Location</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Discount Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($tour_destination_details)) :
                                    // echo "<pre>";
                                    // print_r($tour_destination_details);
                                    // exit;
                                    foreach ($tour_destination_details as $key => $rslt) :
                                        $status_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                        $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                        $disc_amnt = (($rslt->price * $rslt->disc_percent) / 100);
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name; ?></td>
                                            <td><?= $rslt->start_date; ?></td>
                                            <td><?= $rslt->end_date; ?></td>
                                            <td><?= $rslt->pikup_location; ?></td>
                                            <td><?= $rslt->drop_location; ?></td>
                                            <td><?= $rslt->duration; ?></td>
                                            <td><?= $rslt->price; ?></td>
                                            <td><?= (!empty($rslt->disc_percent)) ? $rslt->disc_percent : 'No'; ?></td>
                                            <td><?= $disc_amnt; ?></td>
                                            <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#destination_details_modal" onclick="tourDestFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tourDestFunctionalities(<?= $rslt->id ?>,'delete','tour_details')"></i></div>
                                                </div>
                                            </td>
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