  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2><span><?php echo site_phrase('account'); ?> > <?php echo site_phrase('password'); ?></span></h2>
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
                    <span class="account-box-heading-text"><?php echo site_phrase('password'); ?></span>
                    <span class="account-box-heading-line"></span>
                  </p>
                  <div class="container">
                    <form class="form" id="password_update_form">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('old_password'); ?></label>
                          <input type="password" name="old_password" class="form-control" placeholder="adsfadsf">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_old_password'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('new_password'); ?></label>
                          <input type="password" name="new_password" class="form-control" placeholder="adsfadsf">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_new_password'); ?></small>
                        </div>
                        <div class="form-group form-group-account">
                          <label for=""><?php echo site_phrase('retype_password'); ?></label>
                          <input type="password" name="retype_password" class="form-control" placeholder="adsfadsf">
                          <small class="form-text text-muted"><?php echo site_phrase('enter_password_again'); ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <button type="submit" class="btn btn-success" title="Save" id="password_update_form_button">
                            <i class="fa fa-floppy-o"></i> <?php echo site_phrase('update'); ?>
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
