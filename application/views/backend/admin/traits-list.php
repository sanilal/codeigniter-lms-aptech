<div class="bootstrap-iso">
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('traits'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
    <div class="card-body">
                <div class="datatable-top-controls datatable-top-controls-filter">
                  <?php //if (allowedTo('create_traits')) { ?>
                  <button type="button" class="btn btn-primary btn-blue btn-flat create-or-edit-trait">
                    <i class="fa fa-plus"></i> <?php echo site_phrase('add_trait'); ?>
                  </button>
                  <?php // } ?>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-blue btn-flat"><?php echo site_phrase('actions'); ?></button>
                    <button type="button" class="btn btn-primary btn-blue btn-flat dropdown-toggle" 
                      data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#" class="bulk-action" data-action="activate"><?php echo site_phrase('activate'); ?></a></li>
                      <li><a href="#" class="bulk-action" data-action="deactivate"><?php echo site_phrase('deactivate'); ?></a></li>
                    </ul>
                  </div>
                </div>
                <div class="datatable-top-controls datatable-top-controls-dd">
                  <div class="input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default btn-flat"><i class="fa fa-filter"></i> <?php echo site_phrase('filter_by_status'); ?></button>
                    </span>
                    <select class="form-control select2" id="status">
                      <option value=""><?php echo site_phrase('all'); ?></option>
                      <option value="1"><?php echo site_phrase('active'); ?></option>
                      <option value="0"><?php echo site_phrase('inactive'); ?></option>
                    </select>
                  </div>
                </div>
              <!-- </div>
            </div>
          </div> -->
          <!-- /.box-header -->
          <div class="box-body">
            <?php //if (allowedTo('view_traits')) { ?>
            <table class="table table-bordered table-striped" id="traits_datatable">
              <thead>
              <tr>
                <th><input type="checkbox" class="minimal all-check"></th>
                <th><?php echo site_phrase('title'); ?></th>
                <th><?php echo site_phrase('created_on'); ?></th>
                <th><?php echo site_phrase('status'); ?></th>
                <th><?php echo site_phrase('actions'); ?></th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <?php //} ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<!-- JS Language Variables file -->
<script src="<?php echo base_url(); ?>assets/backend/js/cf/lang.js"></script>

<!-- page script -->
<script src="<?php echo base_url(); ?>assets/backend/js/cf/trait.js"></script>

</body>
</html>

