<form id="admin_company_create_update_form">
  <input type="hidden" name="company_id" value="<?php echo esc_output($company['company_id']); ?>" />
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label><?php echo lang('title'); ?></label>
          <input type="text" class="form-control" name="title" value="<?php echo esc_output($company['title']); ?>">
        </div>
      </div>
      <div class="col-md-12">
        <label><?php echo lang('status'); ?></label>
        <select class="form-control" name="status">
          <option value="1" <?php sel($company['status'], 1); ?>><?php echo lang('active'); ?></option>
          <option value="0" <?php sel($company['status'], 0); ?>><?php echo lang('inactive'); ?></option>
        </select>
      </div>
    </div>          
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?php echo lang('close'); ?></button>
    <button type="submit" class="btn btn-primary btn-blue" id="admin_company_create_update_form_button">
      <?php echo lang('save'); ?>
    </button>
  </div>
</form>
