<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('partners'); ?>
                    <a href="<?php echo site_url('admin/add_partner'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_partner'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('partners'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable_wrapper" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('logo'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($partners->result_array() as $key => $partner) : ?>
                                <?php //$user_details = $this->user_model->get_all_user($partner['user_id'])->row_array(); ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>

                                    <td>
                                        <?php echo $partner['title']; ?><br>
                                        <small class="text-muted"><?php echo date('d M Y', $partner['added_date']); ?></small>
                                    </td>
                                    <td>

                                        <div class="d-flex">
                                            <div>
                                                <img src="<?php echo $this->crud_model->get_partner_thumbnail_url($partner['logo']); ?>" alt="" height="200" width="200" class="img-fluid img-thumbnail">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/edit_partner/' . $partner['partner_id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/partner/delete/' . $partner['partner_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>