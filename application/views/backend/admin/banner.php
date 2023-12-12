<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('banners'); ?>
                    <a href="<?php echo site_url('admin/add_banner'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_banner'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('banners'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable_wrapper" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('banner'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($banners->result_array() as $key => $banner) : ?>
                                <?php $user_details = $this->user_model->get_all_user($banner['user_id'])->row_array(); ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>

                                    <td>
                                        <?php echo $banner['title']; ?><br>
                                        <small class="text-muted"><?php echo date('d M Y', $banner['added_date']); ?></small>
                                    </td>
                                    <td>

                                        <div class="d-flex">
                                            <div>
                                                <img src="<?php echo $this->crud_model->get_banner_thumbnail_url($banner['banner']); ?>" alt="" height="200" width="200" class="img-fluid img-thumbnail">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/edit_banner/' . $banner['banner_id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/banner/delete/' . $banner['banner_id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
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