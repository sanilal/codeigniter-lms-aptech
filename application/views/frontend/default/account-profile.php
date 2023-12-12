  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2><span><?php echo site_phrase('account'); ?> > <?php echo site_phrase('profile'); ?></span></h2>
      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Account Area Setion
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row mt-10">
          <div class="col-lg-3">
            <div class="account-area-left">
              <ul>
                <?php include('partials/account-sidebar.php'); ?>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-lg-9 col-sm-12">
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="account-box">
                  <p class="account-box-heading">
                    <span class="account-box-heading-text"><?php echo site_phrase('profile'); ?></span>
                    <span class="account-box-heading-line"></span>
                  </p>
                  <div class="container">
                  <form class="form" id="profile_update_form">
                    <div class="row">
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('first_name'); ?></label>
                          <input type="text" class="form-control" placeholder="Adam" name="first_name" 
                          value="<?php echo esc_output($candidate['first_name']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_first_name'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('phone'); ?> 1</label>
                          <input type="text" class="form-control" placeholder="12345 67891011" name="phone1" v
                          alue="<?php echo esc_output($candidate['phone1']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_phone'); ?> 1.</small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('city'); ?></label>
                          <input type="text" class="form-control" placeholder="New York" name="city" 
                          value="<?php echo esc_output($candidate['city']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_city'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('country'); ?></label>
                          <input type="text" class="form-control" placeholder="Australia" name="country" 
                          value="<?php echo esc_output($candidate['country']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_country'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('gender'); ?></label>
                          <select name="gender" class="form-control">
                            <option value="male" <?php echo esc_output($candidate['gender']) == 'male' ? 'selected' : ''; ?>>
                              <?php echo site_phrase('male'); ?>
                            </option>
                            <option value="female" <?php echo esc_output($candidate['gender']) == 'female' ? 'selected' : ''; ?>>
                              <?php echo site_phrase('female'); ?>
                            </option>
                            <option value="other" <?php echo esc_output($candidate['gender']) == 'other' ? 'selected' : ''; ?>>
                              <?php echo site_phrase('other'); ?>
                            </option>
                          </select>
                          <small class="form-text text-muted"><?php echo site_phrase('select_gender'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('date_of_birth'); ?></label>
                          <input type="text" class="form-control datepicker" placeholder="1990-10-10" name="dob" 
                          value="<?php echo esc_output($candidate['dob']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('select_date_of_birth'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6">
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('last_name'); ?></label>
                          <input type="text" class="form-control" placeholder="Smith" name="last_name" 
                          value="<?php echo esc_output($candidate['last_name']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_last_name'); ?>.</small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('email'); ?></label>
                          <input type="text" class="form-control" placeholder="email" name="email" 
                          value="<?php echo esc_output($candidate['email']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_email'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('phone'); ?> 2</label>
                          <input type="text" class="form-control" placeholder="67891011" name="phone2" 
                          value="<?php echo esc_output($candidate['phone2']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_phone'); ?> 2.</small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('state'); ?></label>
                          <input type="text" class="form-control" placeholder="New York" name="state" 
                          value="<?php echo esc_output($candidate['state']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_state'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('address'); ?></label>
                          <input type="text" class="form-control" placeholder="House # 30, Street 32" name="address" 
                          value="<?php echo esc_output($candidate['address']); ?>">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_address'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('short_biography'); ?></label>
                          <textarea class="form-control" placeholder="Short Bio" name="bio"><?php echo esc_output($candidate['bio'], 'textarea'); ?></textarea>
                          <small class="form-text text-muted"><?php echo site_phrase('enter_short_biography'); ?></small>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <label for="input-file-now-custom-1"><?php echo site_phrase('image_file'); ?></label>
                          <input type="file" id="input-file-now-custom-1" class="dropify" 
                          data-default-file="<?php echo candidateThumb($candidate['image']); ?>" name="image" />
                          <small class="form-text text-muted"><?php echo site_phrase('only_jpg_or_png_allowed'); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <button type="submit" class="btn btn-success" title="Save" id="profile_update_form_button">
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
        </div>

      </div>

    </section><!-- #account area section ends -->

  </main>

  <?php //include(VIEW_ROOT.'/front/layout/footer.php'); ?>