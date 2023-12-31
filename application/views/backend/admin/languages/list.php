<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fas fa-cube"></i> <?php echo site_phrase('languages'); ?><small></small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-tachometer-alt"></i> <?php echo site_phrase('home'); ?></a></li>
      <li class="active"><i class="fas fa-cube"></i> <?php echo site_phrase('languages'); ?></li>
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
                <?php if (allowedTo('languages_settings')) { ?>
                <div class="datatable-top-controls datatable-top-controls-filter">
                  <button type="button" class="btn btn-primary btn-blue btn-flat create-language">
                    <i class="fa fa-plus"></i> <?php echo site_phrase('add_language'); ?>
                  </button>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if (allowedTo('languages_settings')) { ?>
            <table class="table table-bordered table-striped" id="languages_datatable">
              <thead>
              <tr>
                <th><input type="checkbox" class="minimal all-check"></th>
                <th><?php echo site_phrase('title'); ?></th>
                <th><?php echo site_phrase('created_on'); ?></th>
                <th><?php echo site_phrase('selected'); ?></th>
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
<script src="<?php echo base_url(); ?>assets/admin/js/cf/language.js"></script>

</body>
</html>

