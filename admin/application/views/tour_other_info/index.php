<div class="content-wrapper">
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="tour_other_info_details_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tour Other Info</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="tour_other_info_details">
                            <div class="row">
                                <input type="hidden" class="clr" id="eid" name="eid">
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="tours_id" class="col-form-label">Tour</label>
                                    <select class="form-select slct_cls" id="tours_id" name="tours_id" aria-label="select example">
                                        <option value="" disabled selected>--Please Select Tour--</option>
                                        <?php
                                        if (!empty($tours_data)) {
                                            foreach ($tours_data as $val) {
                                                echo '<option value=' . $val->id . '>' . $val->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select class="form-select slct_cls" id="status" name="status" aria-label="select example">
                                        <option value="" disabled selected>--Please Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-5">
                                    <label for="tour_other_info_details_text" class="col-form-label">Other Info Section:</label>
                                    <textarea id="tour_other_info_details_text" name="tour_other_info_details_text"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="tour_other_info_details_sbmt">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="tourResetFun()" data-bs-target="#tour_other_info_details_modal" data-whatever="@mdo">Add Other Info</button>
    </div>

    <div class="col-12 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tour Other Info List</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Tour</th>
                                <th>Other Info</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($tour_tour_other_info_details)) :
                                // echo "<pre>";
                                // print_r($tour_tour_other_info_details);
                                // exit;
                                foreach ($tour_tour_other_info_details as $key => $rslt) :
                                    $status_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                    $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                            ?>
                                    <tr>
                                        <td><?= ($key + 1) ?></td>
                                        <td><?= $rslt->name; ?></td>
                                        <td class="text-wrap"><?= $rslt->other_info; ?></td>
                                        <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#tour_other_info_details_modal" onclick="tour_other_infoFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tour_other_infoFunctionalities(<?= $rslt->id ?>,'delete','tour_other_info')"></i></div>
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