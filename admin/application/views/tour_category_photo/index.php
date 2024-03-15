<div class="content-wrapper">
    <div class="row">
        <div class="modal fade" id="tour_photos_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Tour Category Imaage</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" id="category_photos_details">
                            <div class="row">
                                <input type="hidden" class="clr" id="eid" name="eid">
                                <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                    <label for="category_id" class="col-form-label">Category</label>
                                    <select class="form-select slct_cls" id="category_id" name="category_id" aria-label="select example">
                                        <option value="" disabled selected>--Please Select Tour--</option>
                                        <?php
                                        if (!empty($tour_category_data)) {
                                            foreach ($tour_category_data as $val) {
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
                                <div class="form-group mt-4">
                                    <label for="category_photos" id="uploadButton">Choose Photo</label>
                                    <input type="file" id="category_photos" name="category_photos" accept="image/*" capture="camera">
                                    <div id="preview_category_photos" class="img-fluid rounded"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="category_photos_sbmt">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" onclick="tourResetFun()" data-bs-target="#tour_photos_modal" data-whatever="@mdo">Add Category Imaage</button>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tour Category Imaage List</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                            <td><?= $rslt->name; ?></td>
                                            <td><img src="<?= base_url() . $rslt->trip_image; ?>" alt=""></td>
                                            <td><label class="<?= $status_desc_class; ?>"><?= $status_desc; ?></label></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="pe-2"><i class="btn fa-solid fa-pen-to-square p-0 text-danger" data-bs-toggle="modal" data-bs-target="#tour_photos_modal" onclick="tour_category_photo_Functionalities(<?= $rslt->id ?>,'edit')"></i></div>
                                                    <div><i class="btn fa-solid fa-trash p-0 text-danger" onclick="tour_category_photo_Functionalities(<?= $rslt->id ?>,'delete','tour_photos')"></i></div>
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