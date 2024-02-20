<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="place_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Place Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="place_details">
                            <!-- <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="place Name">
                            </div> -->
                            <input type="hidden" class="clr" id="eid" name="eid">
                            <div class="form-group">
                                <!-- <label for="place">place</label> -->
                                <input type="text" class="form-control clr" onkeyup="isExist(this.value,'place')" name="place" id="place" placeholder="place">
                            </div>


                            <select class="form-group form-select slct_cls" id="state" name="state" aria-label="select example">
                                <option value="" disabled selected>--Please Select Stete--</option>
                                <?php
                                if (!empty($state_details)) {
                                    foreach ($state_details as $val) {
                                        echo '<option value=' . $val->id . '>' . $val->name . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <select class="form-group form-select slct_cls" id="status" name="status" aria-label="select example">
                                <option value="" disabled selected>--Please Select Status--</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="place_details_sbmt">Submit</button>
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="resetFun()" data-bs-target="#place_modal" data-whatever="@mdo">Add place</button>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Place List</h4>
                    <div class="table-responsive">
                        <table id="tuor_place_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>

                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>State</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($place_details)) :
                                    // echo "<pre>";
                                    // print_r($place_details);
                                    // exit;
                                    foreach ($place_details as $key => $rslt) :
                                        $place_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                        $place_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name; ?></td>
                                            <td><?= $rslt->state_name; ?></td>
                                            <td><label class="<?= $place_desc_class; ?>"><?= $place_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#place_modal" onclick="placeFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="placeFunctionalities(<?= $rslt->id ?>,'delete','place')"></i></div>
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