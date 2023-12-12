<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fas fa-cube"></i> <?php echo site_phrase('quiz_categories'); ?><small></small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-tachometer-alt"></i> <?php echo site_phrase('home'); ?></a></li>
      <li class="active"><i class="far fa-list-alt"></i> <?php echo site_phrase('quizes'); ?></li>
      <li class="active"><i class="fas fa-cube"></i> <?php echo site_phrase('quiz_categories'); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    
    <div class="row">
      <div class="col-xs-12">
        <!-- box -->
        <div class="">
          <div class="box-header">
            <div class="row">
              <div class="col-md-12">
                <div class="datatable-top-controls datatable-top-controls-filter">
                  <?php if (allowedTo('create_quiz_categories')) { ?>
                  <button type="button" class="btn btn-primary btn-blue btn-flat create-or-edit-quiz-category">
                    <i class="fa fa-plus"></i> <?php echo site_phrase('add_quiz_category'); ?>
                  </button>
                  <?php } ?>
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
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (allowedTo('view_quiz_categories')) { ?>
            <table class="table table-bordered table-striped" id="quiz_categories_datatable">
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
            <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include(VIEW_ROOT.'/admin/layout/footer.php'); ?>

<!-- page script -->
<script src="<?php echo base_url(); ?>assets/admin/js/cf/quiz_category.js"></script>

</body>
</html>

