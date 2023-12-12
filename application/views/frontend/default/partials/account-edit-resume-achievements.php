<div class="row resume-item-edit-box-section achievement-box">
  <div class="col-md-12 col-lg-12">
    <div class="resume-item-edit-box-section-remove remove-section" 
      data-type="achievement"
      data-id="<?php echo $achievement['resume_achievement_id'] ? encode($achievement['resume_achievement_id']) : ''; ?>"
      title="Remove Section">
      <i class="fas fa-trash-alt"></i> <?php echo site_phrase('remove_section'); ?>
    </div>
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group form-group-account">
      <label for=""><?php echo site_phrase('title'); ?> *</label>
      <input type="hidden" name="resume_id[]" 
      value="<?php echo $achievement['resume_id'] ? encode($achievement['resume_id']) : ''; ?>" />
      <input type="hidden" name="resume_achievement_id[]" 
      value="<?php echo $achievement['resume_achievement_id'] ? encode($achievement['resume_achievement_id']) : ''; ?>" />
      <input type="text" class="form-control" placeholder="My Designs" name="title[]" 
        value="<?php echo esc_output($achievement['title']); ?>">
      <small class="form-text text-muted"><?php echo site_phrase('enter_title'); ?></small>
    </div>
    <div class="form-group form-group-account">
      <label for=""><?php echo site_phrase('date'); ?></label>
      <input type="text" class="form-control datepicker" placeholder="29-12-1985" name="date[]"
        value="<?php echo dateOnly($achievement['date']); ?>">
      <small class="form-text text-muted"><?php echo site_phrase('enter_date'); ?></small>
    </div>                                              
  </div>
  <div class="col-md-6 col-lg-6">
    <div class="form-group form-group-account">
      <label for=""><?php echo site_phrase('link'); ?></label>
      <input type="text" class="form-control" placeholder="http://www.example.com" name="link[]"
        value="<?php echo esc_output($achievement['link']); ?>">
      <small class="form-text text-muted"><?php echo site_phrase('enter_link'); ?></small>
    </div>
    <div class="form-group form-group-account">
      <label for=""><?php echo site_phrase('select_type'); ?> *</label>
      <select class="form-control" name="type[]">
        <option value="certificate" <?php sel('certificate', $achievement['type']); ?>><?php echo site_phrase('certificate'); ?></option>
        <option value="portfolio" <?php sel('portfolio', $achievement['type']); ?>><?php echo site_phrase('portfolio'); ?></option>
        <option value="publication" <?php sel('publication', $achievement['type']); ?>><?php echo site_phrase('publication'); ?></option>
        <option value="award" <?php sel('award', $achievement['type']); ?>><?php echo site_phrase('award'); ?></option>
        <option value="other" <?php sel('other', $achievement['type']); ?>><?php echo site_phrase('other'); ?></option>
      </select>
      <small class="form-text text-muted"><?php echo site_phrase('select_type'); ?></small>
    </div>                                              
  </div>
  <div class="col-md-12 col-lg-12">
    <div class="form-group form-group-account">
      <label for=""><?php echo site_phrase('description'); ?> *</label>
      <textarea class="form-control" placeholder="Description" name="description[]"><?php echo esc_output($achievement['description'], 'textarea'); ?></textarea>
      <small class="form-text text-muted"><?php echo site_phrase('enter_description'); ?></small>
    </div>
  </div>
</div>
