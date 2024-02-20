<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="Country_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Country Details</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="Country_details">
                            <input type="hidden" class="clr" id="eid" name="eid">

                            <div class="form-group">
                                <input type="text" class="form-control" onkeyup="isExist(this.value,'country_code'),check_char_with_space(this)" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control clr" onkeyup="check_num(this)" name="code" id="code" placeholder="Code" required>
                            </div>

                            <select class="form-group form-select slct_cls" id="status" name="status" aria-label="select example">
                                <option value="" disabled selected>--Please Select Status--</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="Country_details_sbmt">Submit</button>
                        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="resetFun()" data-bs-target="#Country_modal" data-whatever="@mdo">Add Country</button>
        </div>

        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Country List</h4>
                    <div class="table-responsive">
                        <table id="country_tbl" class="table table-sm table-sm0 table-striped table-hover w-100 dataTable" data-page-length='10'>

                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Country Name</th>
                                    <th>Country Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($Country_details)) :
                                    // echo "<pre>";
                                    // print_r($Country_details);
                                    // exit;
                                    foreach ($Country_details as $key => $rslt) :
                                        $Country_desc = ($rslt->status != 0) ? 'Active' : 'Inactive';
                                        $Country_desc_class = ($rslt->status != 0) ? 'badge badge-success' : 'badge badge-danger';
                                ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><?= $rslt->name; ?></td>
                                            <td><?= $rslt->code; ?></td>
                                            <td><label class="<?= $Country_desc_class; ?>"><?= $Country_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#Country_modal" onclick="CountryFunctionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="CountryFunctionalities(<?= $rslt->id ?>,'delete','country_code')"></i></div>
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