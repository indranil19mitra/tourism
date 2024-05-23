<div class="content-wrapper">
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="tour_itinerary_details_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tour Itenary</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="tour_itinerary_details">
                            <div class="row">
                                <input type="hidden" class="clr" id="eid" name="eid">
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="tours_id" class="col-form-label">Tour</label>
                                    <select class="form-select slct_cls clr_slct" id="tours_id" name="tours_id" aria-label="select example">
                                        <option value="" disabled selected>--Please Select Tour--</option>
                                        <?php
                                        if (!empty($tours_data)) {
                                            foreach ($tours_data as $val) {
                                                echo '<option value=' . $val->id . '>' . $val->name . ' (' . $val->category_name .  ' - ' . date('jS F Y', strtotime($val->tour_start_date)) . ')</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="status" class="col-form-label">Status</label>
                                    <select class="form-select slct_cls clr_slct" id="status" name="status" aria-label="select example">
                                        <option value="" disabled selected>--Please Select--</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="border rounded border-2 p-3 mb-3 col-lg-12 col-md-12 col-sm-12">
                                        <div class="mb-3 form-floating"><textarea class="form-control clr" placeholder="Leave a question here" id="itinerary_0" name="itinerary"></textarea><label for="floatingTextarea2">Days</label>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control clr" onkeyup="check_num(this)" id="sequence" name="sequence" placeholder="Sequence">
                                        </div>

                                        <div class="col-12 mt-5">
                                            <label for="tour_about_details_text" class="col-form-label">Days Description</label>
                                            <textarea id="itinerary_descriptions" name="itinerary_descriptions" class="clr_tinymce"></textarea>
                                        </div>
                                        <!-- <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a question here" id="itinerary_descriptions_0" name="itinerary_descriptions[]"></textarea><label for="floatingTextarea2">Itinerary Descriptions 1</label>
                                        </div> -->
                                    </div>
                                    <!-- <div id="itinerary_data"></div> -->
                                    <!-- <button type="button" id="add_itinerary" onclick="get_itinerary_form()" class="btn btn-primary float-end">Add Itinerary</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="tour_itinerary_details_sbmt">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="resetFun()" data-bs-target="#tour_itinerary_details_modal" data-whatever="@mdo">Add Itenary</button>
    </div>

    <div class="col-12 grid-margin stretch-card mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tour Itenary List</h4>
                <div class="table-responsive">
                    <table id="tour_itinerary_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Tour</th>
                                <th>Itenary</th>
                                <th>Itenary Description</th>
                                <th>Sequence</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($tour_itinerary_details)) :
                                // echo "<pre>";
                                // print_r($tour_itinerary_details);
                                // exit;
                                foreach ($tour_itinerary_details as $key => $rslt) :
                                    $status_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                    $status_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                            ?>
                                    <tr>
                                        <td><?= ($key + 1) ?></td>
                                        <td><?= $rslt->name . ' (' . $rslt->category_name . ' - ' . date('jS F Y', strtotime($rslt->tour_start_date)) . ')'; ?></td>
                                        <td class="text-wrap"><?= $rslt->itinerary; ?></td>
                                        <td class="text-wrap"><?= $rslt->itinerary_sub; ?></td>
                                        <td class="text-wrap"><?= $rslt->sequence; ?></td>
                                        <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#tour_itinerary_details_modal" onclick="tour_itineraryFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tour_itineraryFunctionalities(<?= $rslt->id ?>,'delete','tour_itinerary_main')"></i></div>
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