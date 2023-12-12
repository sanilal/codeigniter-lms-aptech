<?php
  $homepage_banner = themeConfiguration(get_frontend_settings('theme'), 'homepage');
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('website_settings'); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('website_settings');?></h4>

                <form class="required-form" action="<?php echo site_url('admin/frontend_settings/frontend_update'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="top_left_location"><?php echo get_phrase('top_left_location'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_left_location" id = "top_left_location" class="form-control" value="<?php echo get_frontend_settings('top_left_location');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_left_map"><?php echo get_phrase('top_left_map'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_left_map" id = "top_left_map" class="form-control" value="<?php echo get_frontend_settings('top_left_map');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_right_location"><?php echo get_phrase('top_right_location'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_right_location" id = "top_right_location" class="form-control" value="<?php echo get_frontend_settings('top_right_location');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_right_map"><?php echo get_phrase('top_right_map'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_right_map" id = "top_right_map" class="form-control" value="<?php echo get_frontend_settings('top_right_map');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_marque"><?php echo get_phrase('top_marque'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_marque" id = "top_marque" class="form-control" value="<?php echo get_frontend_settings('top_marque');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_tel"><?php echo get_phrase('top_tel'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_tel" id = "top_tel" class="form-control" value="<?php echo get_frontend_settings('top_tel');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_email"><?php echo get_phrase('top_email'); ?><span class="required">*</span></label>
                        <input type="email" name = "top_email" id = "top_email" class="form-control" value="<?php echo get_frontend_settings('top_email');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="top_timing"><?php echo get_phrase('top_timing'); ?><span class="required">*</span></label>
                        <input type="text" name = "top_timing" id = "top_timing" class="form-control" value="<?php echo get_frontend_settings('top_timing');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="banner_title"><?php echo get_phrase('banner_title'); ?><span class="required">*</span></label>
                        <input type="text" name = "banner_title" id = "banner_title" class="form-control" value="<?php echo get_frontend_settings('banner_title');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="banner_sub_title"><?php echo get_phrase('banner_sub_title'); ?><span class="required">*</span></label>
                        <input type="text" name = "banner_sub_title" id = "banner_sub_title" class="form-control" value="<?php echo get_frontend_settings('banner_sub_title');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="career_survey"><?php echo get_phrase('career_survey'); ?><span class="required">*</span></label>
                        <input type="text" name = "career_survey" id = "career_survey" class="form-control" value="<?php echo get_frontend_settings('career_survey');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="career_survey_text"><?php echo get_phrase('career_survey_text'); ?><span class="required">*</span></label>
                        <input type="text" name = "career_survey_text" id = "career_survey_text" class="form-control" value="<?php echo get_frontend_settings('career_survey_text');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="career_survey_btn"><?php echo get_phrase('career_survey_btn'); ?><span class="required">*</span></label>
                        <input type="text" name = "career_survey_btn" id = "career_survey_btn" class="form-control" value="<?php echo get_frontend_settings('career_survey_btn');  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="career_survey_url"><?php echo get_phrase('career_survey_url'); ?><span class="required">*</span></label>
                        <input type="text" name = "career_survey_url" id = "career_survey_url" class="form-control" value="<?php echo get_frontend_settings('career_survey_url');  ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cookie_status"><?php echo get_phrase('cookie_status'); ?><span class="required">*</span></label><br>
                        <input type="radio" value="active" name="cookie_status" <?php if(get_frontend_settings('cookie_status') == 'active') echo 'checked'; ?>> <?php echo get_phrase('active'); ?>
                        &nbsp;&nbsp;
                        <input type="radio" value="inactive" name="cookie_status" <?php if(get_frontend_settings('cookie_status') == 'inactive') echo 'checked'; ?>> <?php echo get_phrase('inactive'); ?>
                    </div>
                    <div class="form-group">
                        <label for="cookie_note"><?php echo get_phrase('cookie_note'); ?></label>
                        <textarea name="cookie_note" id = "cookie_note" class="form-control" rows="5"><?php echo get_frontend_settings('cookie_note'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="facebook"><?php echo get_phrase('facebook'); ?></label>
                        <input type="text" name = "facebook" id = "facebook" class="form-control" value="<?php echo get_frontend_settings('facebook');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="instagram"><?php echo get_phrase('instagram'); ?></label>
                        <input type="text" name = "instagram" id = "instagram" class="form-control" value="<?php echo get_frontend_settings('instagram');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="twitter"><?php echo get_phrase('twitter'); ?></label>
                        <input type="text" name = "twitter" id = "twitter" class="form-control" value="<?php echo get_frontend_settings('twitter');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="linkedin"><?php echo get_phrase('linkedin'); ?></label>
                        <input type="text" name = "linkedin" id = "linkedin" class="form-control" value="<?php echo get_frontend_settings('linkedin');  ?>">
                    </div>

                    <div class="form-group">
                        <label for="cookie_policy"><?php echo get_phrase('cookie_policy'); ?></label>
                        <textarea name="cookie_policy" id = "cookie_policy" class="form-control" rows="5"><?php echo get_frontend_settings('cookie_policy'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="about_us"><?php echo get_phrase('about_us'); ?></label>
                        <textarea name="about_us" id = "about_us" class="form-control" rows="5"><?php echo get_frontend_settings('about_us'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="terms_and_condition"><?php echo get_phrase('terms_and_condition'); ?></label>
                        <textarea name="terms_and_condition" id ="terms_and_condition" class="form-control" rows="5"><?php echo get_frontend_settings('terms_and_condition'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="privacy_policy"><?php echo get_phrase('privacy_policy'); ?></label>
                        <textarea name="privacy_policy" id = "privacy_policy" class="form-control" rows="5"><?php echo get_frontend_settings('privacy_policy'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="refund_policy"><?php echo get_phrase('refund_policy'); ?></label>
                        <textarea name="refund_policy" id = "refund_policy" class="form-control" rows="5"><?php echo get_frontend_settings('refund_policy'); ?></textarea>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary btn-block" onclick="checkRequiredFields()"><?php echo get_phrase('update_settings'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('recaptcha_settings');?></h4>

                <form action="<?php echo site_url('admin/frontend_settings/recaptcha_update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label><?php echo get_phrase('recaptcha_status'); ?><span class="required">*</span></label><br>
                        <input type="radio" id="recaptcha_active" value="1" name="recaptcha_status" <?php if(get_frontend_settings('recaptcha_status') == 1) echo 'checked'; ?>> <label for="recaptcha_active"><?php echo get_phrase('active'); ?></label>
                        &nbsp;&nbsp;
                        <input type="radio" id="recaptcha_inactive" value="0" name="recaptcha_status" <?php if(get_frontend_settings('recaptcha_status') == 0) echo 'checked'; ?>> <label for="recaptcha_inactive"><?php echo get_phrase('inactive'); ?></label>
                    </div>

                    <div class="form-group">
                        <label for="recaptcha_sitekey"><?php echo get_phrase('recaptcha_sitekey'); ?> (v2)<span class="required">*</span></label>
                        <input type="text" name = "recaptcha_sitekey" id = "recaptcha_sitekey" class="form-control" value="<?php echo get_frontend_settings('recaptcha_sitekey');  ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="recaptcha_secretkey"><?php echo get_phrase('recaptcha_secretkey'); ?> (v2)<span class="required">*</span></label>
                        <input type="text" name = "recaptcha_secretkey" id = "recaptcha_secretkey" class="form-control" value="<?php echo get_frontend_settings('recaptcha_secretkey');  ?>" required>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('update_recaptcha_settings'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <?php if (count($homepage_banner) > 0):
      if ($homepage_banner['homepage_banner_image']):?>
      <div class="col-xl-4 col-lg-6">
          <div class="card">
              <div class="card-body">
                  <div class="col-xl-12">
                      <h4 class="mb-3 header-title"><?php echo get_phrase('update_banner_image');?></h4>
                      <div class="row justify-content-center">
                          <form action="<?php echo site_url('admin/frontend_settings/banner_image_update'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                              <div class="form-group mb-2">
                                  <div class="wrapper-image-preview">
                                      <div class="box" style="width: 250px;">
                                          <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/'.get_frontend_settings('banner_image'));?>); background-color: #F5F5F5;"></div>
                                          <div class="upload-options">
                                              <label for="banner_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_banner_image'); ?> <br> <small>(<?php echo $homepage_banner['homepage_banner_image_size']; ?>)</small> </label>
                                              <input id="banner_image" style="visibility:hidden;" type="file" class="image-upload" name="banner_image" accept="image/*">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_banner_image'); ?></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-xl-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_light_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/light_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo')); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="light_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_light_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                            <input id="light_logo" style="visibility:hidden;" type="file" class="image-upload" name="light_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_light_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_dark_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/dark_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="dark_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_dark_logo'); ?> <br> <small>(330 X 70)</small> </label>
                                            <input id="dark_logo" style="visibility:hidden;" type="file" class="image-upload" name="dark_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_dark_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_small_logo');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/small_logo'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/'.get_frontend_settings('small_logo')); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="small_logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_small_logo'); ?> <br> <small>(49 X 58)</small> </label>
                                            <input id="small_logo" style="visibility:hidden;" type="file" class="image-upload" name="small_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_small_logo'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('update_favicon');?></h4>
                    <div class="row justify-content-center">
                        <form action="<?php echo site_url('admin/frontend_settings/favicon'); ?>" method="post" enctype="multipart/form-data" style="text-align: center;">
                            <div class="form-group mb-2">
                                <div class="wrapper-image-preview">
                                    <div class="box" style="width: 250px;">
                                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/system/'.get_frontend_settings('favicon')); ?>); background-color: #F5F5F5;"></div>
                                        <div class="upload-options">
                                            <label for="favicon" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_favicon'); ?> <br> <small>(90 X 90)</small> </label>
                                            <input id="favicon" style="visibility:hidden;" type="file" class="image-upload" name="favicon" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><?php echo get_phrase('upload_favicon'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#about_us', '#terms_and_condition', '#privacy_policy', '#cookie_policy', '#refund_policy']);
  });
</script>