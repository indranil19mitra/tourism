<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="tour_photos_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Tour Photos</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="tour_photos_details">
                            <div class="row">
                                <input type="hidden" class="clr" id="eid" name="eid">
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="tours_id" class="col-form-label">Tour</label>
                                    <select class="form-select slct_cls" id="tours_id" name="tours_id" aria-label="select example">
                                        <option value="" disabled selected>--Please Select Tour--</option>
                                        <?php
                                        if (!empty($tours_data)) {
                                            foreach ($tours_data as $val) {
                                                echo '<option value=' . $val->id . '>' . $val->name . ' (' . $val->category_name . ' - ' . date('jS F Y', strtotime($val->tour_start_date)) . ')</option>';
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

                                <div class="form-group mt-4">
                                    <label for="tour_photos" id="uploadButton">Choose Photos</label>
                                    <input type="file" id="tour_photos" name="tour_photos[]" multiple>
                                    <div id="preview_tour_photos" class="img-fluid rounded"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="tour_photos_sbmt">Submit</button>
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="tourResetFun()" data-bs-target="#tour_photos_modal" data-whatever="@mdo">Add Tour Photos</button>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour List</h4>
                    <div class="table-responsive">
                        <table id="tour_photos_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>

                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Tour</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($tour_photos)) :
                                    // echo "<pre>";
                                    // print_r($tour_photos);
                                    foreach ($tour_photos as $key => $rslt) :
                                        $status_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                        $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name . ' (' . $rslt->category_name . ' - ' . date('jS F Y', strtotime($rslt->tour_start_date)) .  ')'; ?></td>
                                            <td><img src="<?= base_url() . $rslt->tour_photo; ?>" alt=""></td>
                                            <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#tour_photos_modal" onclick="tour_photosFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tour_photosFunctionalities(<?= $rslt->id ?>,'delete','tour_photos')"></i></div>
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