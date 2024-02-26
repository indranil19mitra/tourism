<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="tour_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Tour Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="tour_details">
                            <!-- <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" Stateholder="State Name">
                            </div> -->
                            <input type="hidden" class="clr" id="eid" name="eid">
                            <div class="form-group">
                                <input type="text" class="form-control clr" onkeyup="isExist(this.value,'tours')" name="tour_name" id="tour_name" placeholder="Tour Name">
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Tour Short Description" name="tour_short_desc" id="tour_short_desc" style="height: 100px"></textarea>
                                <label for="tour_short_desc">Tour Short Description</label>
                            </div>

                            <select class="form-group form-select slct_cls" id="place" name="place" aria-label="select example">
                                <option value="" disabled selected>--Please Select Place--</option>
                                <?php
                                if (!empty($place_details)) {
                                    foreach ($place_details as $val) {
                                        echo '<option value=' . $val->id . '>' . $val->name . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <select class="form-group form-select slct_cls" id="tour_category" name="tour_category" aria-label="select example">
                                <option value="" disabled selected>--Please Select Tour Category--</option>
                                <?php
                                if (!empty($tour_category_details)) {
                                    foreach ($tour_category_details as $val) {
                                        echo '<option value=' . $val->id . '>' . $val->name . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <div class="form-group">
                                <input type="text" class="form-control" id="difficulty" name="difficulty" placeholder="Difficulty Level">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="seat_availability" name="seat_availability" placeholder="Seat Availability">
                            </div>

                            <select class="form-group form-select slct_cls" id="status" name="status" aria-label="select example">
                                <option value="" disabled selected>--Please Select--</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>

                            <div class="form-group mt-4">
                                <label for="tour_image" id="uploadButton">Choose Image</label>
                                <input type="file" id="tour_image" name="tour_image">
                                <img id="preview_tour_image" class="img-fluid rounded">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="tour_details_sbmt">Submit</button>
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="tourResetFun()" data-bs-target="#tour_modal" data-whatever="@mdo">Add Tour</button>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour List</h4>
                    <div class="table-responsive">
                        <table id="tour_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>

                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Place</th>
                                    <th>Tour Category</th>
                                    <th>Difficulty</th>
                                    <th>Seat Availability</th>
                                    <th>Image</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($tour_details)) :
                                    // echo "<pre>";
                                    // print_r($tour_details);
                                    foreach ($tour_details as $key => $rslt) :
                                        $status_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                        $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name; ?></td>
                                            <td><?= $rslt->place_name; ?></td>
                                            <td><?= $rslt->tour_category_name; ?></td>
                                            <td><?= $rslt->difficulty; ?></td>
                                            <td><?= $rslt->seat_availability; ?></td>
                                            <td><img src="<?= base_url() . $rslt->main_image; ?>" alt=""></td>
                                            <td><?= $rslt->short_desc; ?></td>
                                            <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#tour_modal" onclick="tourFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tourFunctionalities(<?= $rslt->id ?>,'delete','tours')"></i></div>
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