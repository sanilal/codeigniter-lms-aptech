<div class="edit-resume-content">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <div class="account-box">
        <p class="account-box-heading">
          <span class="account-box-heading-text"><?php echo site_phrase('general'); ?></span>
          <span class="account-box-heading-line"></span>
        </p>
        <div class="container">
          <form class="form" id="resume_edit_general_form">
          <div class="row resume-item-edit-box-section">
              <div class="col-md-12 col-lg-12">
                <div class="form-group form-group-account">
                  <label for=""><?php echo site_phrase('title'); ?></label>
                  <input type="hidden" name="id" value="<?php echo encode($resume['resume_id']); ?>" />
                  <input type="text" class="form-control" placeholder="Marketing Resume" 
                  name="title" value="<?php echo esc_output($resume['title']); ?>">
                  <small class="form-text text-muted"><?php echo site_phrase('enter_title'); ?></small>
                </div>
                <div class="form-group form-group-account">
                  <label for=""><?php echo site_phrase('designation'); ?></label>
                  <input type="text" class="form-control" placeholder="Marketing Manager" 
                  name="designation" value="<?php echo esc_output($resume['designation']); ?>">
                  <small class="form-text text-muted"><?php echo site_phrase('enter_designation'); ?></small>
                </div>
                <div class="form-group form-group-account">
                  <label for=""><?php echo site_phrase('objective'); ?></label>
                  <textarea class="form-control" placeholder="Marketing Manager" 
                  name="objective"><?php echo esc_output($resume['objective']); ?></textarea>
                  <small class="form-text text-muted"><?php echo site_phrase('enter_objective'); ?>.</small>
                </div>
                <div class="form-group form-group-account">
                  <label for="input-file-now-custom-1">
                    <?php echo site_phrase('file'); ?>
                    <?php if ($resume['file']) { ?>
                    <a target="_blank" href="<?php echo candidateThumb($resume['file']); ?>" title="Download">
                      <?php echo site_phrase('download'); ?>
                    </a>
                    <?php } ?>
                  </label>
                  <input type="file" id="input-file-now-custom-1" class="dropify" 
                  data-default-file="" name="file" />
                  <small class="form-text text-muted"><?php echo site_phrase('only_doc_docx_pdf_allowed'); ?></small>
                </div>                
                <div class="form-group form-group-account">
                  <label for=""><?php echo site_phrase('status'); ?></label>
                  <select class="form-control" name="status">
                    <option value="1" <?php sel($resume['status'], '1'); ?>><?php echo site_phrase('active'); ?></option>
                    <option value="0" <?php sel($resume['status'], '0'); ?>><?php echo site_phrase('inactive'); ?></option>
                  </select>
                  <small class="form-text text-muted"><?php echo site_phrase('select_status'); ?></small>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="form-group form-group-account">
                <button type="submit" class="btn btn-success" title="Save" id="resume_edit_general_form_button">
                  <i class="fa fa-floppy-o"></i> <?php echo site_phrase('save'); ?>
                </button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>                                 
</div>
