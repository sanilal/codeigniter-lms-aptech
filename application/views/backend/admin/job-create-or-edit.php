<div class="bootstrap-iso">
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('jobs'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
    <div class="card-body">

    <!-- Main content -->
    <!-- <section class="content">
      <div class="row"> -->

        <?php /* if (allowedTo('create_jobs') || allowedTo('edit_jobs')) { */ ?>
        <div class="col-md-12">
          <!-- general form elements  box -->
          <div class="box-primary" style="height: auto;">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo site_phrase('details'); ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="admin_job_create_update_form">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label><?php echo site_phrase('title'); ?></label>
                      <input type="hidden" name="job_id" value="<?php echo esc_output($job['job_id']); ?>" />
                      <input type="text" class="form-control" placeholder="Enter Title" name="title" 
                      value="<?php echo esc_output($job['title']); ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label><?php echo site_phrase('status'); ?></label>
                      <select class="form-control">
                        <option value="1" <?php sel($job['status'], 1); ?>><?php echo site_phrase('active'); ?></option>
                        <option value="0" <?php sel($job['status'], 0); ?>><?php echo site_phrase('inactive'); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>
                        <?php echo site_phrase('departments'); ?>
                        <button type="button" class="btn btn-xs btn-warning btn-blue create-or-edit-department" data-id="" 
                        title="Add New Department">
                          <i class="fa fa-plus"></i>
                        </button>
                      </label>
                      <select class="form-control select2" id="departments" name="department_id">
                        <option value=""><?php echo site_phrase('none'); ?></option>
                        <?php foreach ($departments as $key => $value) { ?>
                          <option value="<?php echo esc_output($value['department_id']); ?>" <?php sel($job['department_id'], $value['department_id']); ?>><?php echo esc_output($value['title'], 'html'); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label><?php echo site_phrase('is_static_allowed'); ?></label>
                      <select class="form-control" name="is_static_allowed">
                        <option value="0" <?php sel($job['is_static_allowed'], 0); ?>><?php echo site_phrase('no'); ?></option>
                        <option value="1" <?php sel($job['is_static_allowed'], 1); ?>><?php echo site_phrase('yes'); ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo site_phrase('description'); ?></label>
                      <textarea id="description" name="description" rows="10" cols="80">
                        <?php echo esc_output($job['description'], 'textarea'); ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr />
                  </div>

                  <?php if ($job_filters) { ?>
                  <?php foreach ($job_filters as $filter) { ?>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label><?php echo esc_output($filter['title']); ?></label>
                      <select class="form-control select2" id="<?php echo esc_output($filter['job_filter_id']); ?>" 
                          name="filters[<?php echo esc_output($filter['job_filter_id']); ?>][]" multiple="multiple">
                        <?php foreach ($filter['values'] as $v) { ?>
                          <?php $sel = sel2($filter['job_filter_id'], $job['job_filter_ids'], $v['id'], $job['job_filter_value_ids']); ?>
                          <option value="<?php echo esc_output($v['id']); ?>" <?php echo esc_output($sel); ?>><?php echo esc_output($v['title']); ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <?php } ?>
                  <?php } else { ?>
                  <div class="row resume-item-edit-box-section">
                    <div class="col-md-12 col-lg-12">
                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo site_phrase('no_job_filters'); ?></p>
                    </div>
                  </div>
                  <?php } ?>

                  <div class="col-md-12">
                    <hr />
                    <div class="form-group">
                      <label>
                        <?php echo site_phrase('custom_fields'); ?>
                        <button type="button" class="btn btn-xs btn-warning btn-blue add-custom-field" title="Add Custom Field">
                          <i class="fa fa-plus"></i>
                        </button>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 custom-fields-container">
                    <?php foreach ($fields as $field) { ?>
                    <?php include(base_url().'/backend/admin/jobs/custom-field.php'); ?>
                    <?php } ?>
                    <div class="row resume-item-edit-box-section no-custom-value-box">
                      <div class="col-md-12 col-lg-12">
                        <p><?php echo site_phrase('no_custom_fields'); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <hr />
                    <div class="form-group">
                      <label><?php echo site_phrase('traits'); ?></label>
                      <select class="form-control select2" id="traits[]" name="traits[]" multiple="multiple">
                        <?php  foreach ($traits as $key => $value) { ?>
                          <?php $jobTraits = $job['traits'] ? explode(',', $job['traits']) : array(); ?>
                          <option value="<?php echo esc_output($value['trait_id']); ?>" <?php sel($value['trait_id'], $jobTraits); ?>>
                          <?php echo esc_output($value['title'], 'html'); ?></option>
                        <?php } ?>
                      </select>
                      <br />
                      <br />
                      <b><?php echo site_phrase('notes'); ?></b><br />
                      <ul>
                        <li><?php echo site_phrase('traits_can_not_be_assigned'); ?></li>
                        <li><?php echo site_phrase('traits_can_only_be_answerd'); ?></li>
                      </ul>
                    </div>                    
                  </div>
               
                  <div class="col-sm-12">
                  <hr />
                      <b><?php echo site_phrase('in_general'); ?></b><br />
                      <ul>
                        <li><?php echo site_phrase('traits_can_be_assigned'); ?></li>
                        <li><?php echo site_phrase('traits_can_be_assigned_before_and_or'); ?></li>
                        <li><?php echo site_phrase('traits_can_be_assigned_only_after'); ?></li>
                      </ul>                      
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="admin_job_create_update_form_button">
                  <?php echo site_phrase('save'); ?>
                </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <?php /* } */ ?>

      </div>
      <!-- /.row -->
    <!-- </section> -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php //include(VIEW_ROOT.'/admin/layout/footer.php'); ?>
<!-- JS Language Variables file -->
<script src="<?php echo base_url(); ?>assets/backend/js/cf/lang.js"></script>
<!-- page script -->

<script src="<?php echo base_url(); ?>assets/backend/js/cf/company.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/cf/department.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/cf/job.js"></script>


</body>
</html>

