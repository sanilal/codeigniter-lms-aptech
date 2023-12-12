  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2>
          <span><?php echo site_phrase('account'); ?> > <?php echo site_phrase('resumes'); ?> </span>
          <button type="submit" class="btn btn-primary btn-sm add-resume" title="Add New">
            <i class="fa fa-plus"></i>
          </button>
        </h2>
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
              <?php include('partials/account-sidebar.php'); ?>
            </div>
          </div>

          <div class="col-md-9 col-lg-9 col-sm-12">
              <div class="row">
                <?php if ($resumes) { ?>
                  <?php foreach ($resumes as $resume) { ?>
                    <?php $id = encode($resume['resume_id']); ?>
                    <?php if ($resume['type'] == 'detailed') { ?>
                    <div class="col-md-6 col-lg-4 col-sm-12">
                      <div class="resume-item-box">
                        <div class="dotmenu">
                          <ul class="dotMenudropbtn dotmenuicons dotmenuShowLeft" 
                          onclick="showDotMenu('<?php echo esc_output($id); ?>')">
                            <li></li><li></li><li></li>
                          </ul>
                          <div id="<?php echo esc_output($id); ?>" class="dotmenu-content">
                            <a href="<?php echo base_url(); ?>account/resume/<?php echo esc_output($id); ?>">
                              <?php echo site_phrase('edit'); ?>
                            </a>
                          </div>
                        </div>
                        <p class="resume-item-box-heading" title="<?php echo esc_output($resume['title']); ?>">
                          <?php echo trimString($resume['title'], 23); ?>
                        </p>
                        <p class="resume-item-box-date"><?php echo site_phrase('updated'); ?> : <?php echo timeFormat($resume['updated_at']); ?></p>
                        <p class="resume-item-box-item">
                          <i class="fa fa-history"></i> 
                          <?php echo esc_output($resume['experience'], 'html'); ?> <?php echo site_phrase('experiences'); ?>
                        </p>
                        <p class="resume-item-box-item">
                          <i class="fa fa-site_phraseuage"></i> 
                          <?php echo esc_output($resume['site_phraseuage'], 'html'); ?> <?php echo site_phrase('site_phraseuages'); ?>
                        </p>
                        <p class="resume-item-box-item">
                          <i class="fa fa-graduation-cap"></i> 
                          <?php echo esc_output($resume['qualification'], 'html'); ?> <?php echo site_phrase('qualifications'); ?>
                        </p>
                        <p class="resume-item-box-item">
                          <i class="fa fa-trophy"></i> 
                          <?php echo esc_output($resume['achievement'], 'html'); ?> <?php echo site_phrase('achievements'); ?>
                        </p>
                        <p class="resume-item-box-item">
                          <i class="fa fa-globe"></i> 
                          <?php echo esc_output($resume['reference'], 'html'); ?> <?php echo site_phrase('references'); ?>
                        </p>
                      </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-md-6 col-lg-4 col-sm-12">
                      <div class="resume-item-box">
                        <div class="dotmenu">
                          <ul class="dotMenudropbtn dotmenuicons dotmenuShowLeft" 
                            onclick="showDotMenu('<?php echo esc_output($id); ?>')">
                            <li></li><li></li><li></li>
                          </ul>
                          <div id="<?php echo esc_output($id); ?>" class="dotmenu-content">
                            <a href="<?php echo base_url(); ?>account/resume/<?php echo esc_output($id); ?>"><?php echo site_phrase('edit'); ?></a>
                          </div>
                        </div>
                        <p class="resume-item-box-heading" title="<?php echo esc_output($resume['title']); ?>">
                          <?php echo trimString($resume['title'], 25); ?>
                        </p>
                        <p class="resume-item-box-date"><?php echo site_phrase('updated'); ?> : <?php echo timeFormat($resume['updated_at']); ?></p>
                        <?php if (strpos($resume['file'], 'pdf')) { ?>
                        <i class="far fa-file-pdf resume-item-box-file"></i>
                        <?php } else { ?>
                        <i class="far fa-file-word resume-item-box-file"></i>
                        <?php } ?>
                      </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                <?php } else { ?>
                  <p><?php echo site_phrase('no_resumes_found'); ?></p>
                <?php } ?>
              </div>
          </div>

        </div>

      </div>
    </section><!-- #account area section ends -->

  </main>

  <!-- Top Modal -->
  <div class="modal fade in" id="modal-default-2" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header resume-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title resume-modal-title"><?php echo site_phrase('new_resume'); ?></h4>
      </div>
      <div class="modal-body-container">
        <div class="container">
          <form class="form" id="resume_create_form">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="form-group form-group-account">
                <label for=""><?php echo site_phrase('title'); ?></label>
                <input type="text" class="form-control" placeholder="Marketing Resume" name="title">
                <small class="form-text text-muted">Enter Title.</small>
              </div>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="form-group form-group-account">
                <label for=""><?php echo site_phrase('designation'); ?></label>
                <input type="text" class="form-control" placeholder="Marketing Manager" name="designation">
                <small class="form-text text-muted"><?php echo site_phrase('enter_designation'); ?></small>
              </div>
            </div>
            <div class="col-md-12 col-lg-12">
              <div class="form-group form-group-account">
                <label for=""><?php echo site_phrase('type'); ?></label>
                <select class="form-control" name="type">
                  <option value="detailed"><?php echo site_phrase('detailed'); ?></option>
                  <option value="document"><?php echo site_phrase('document'); ?></option>
                </select>
                <small class="form-text text-muted"><?php echo site_phrase('select_type'); ?></small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="form-group form-group-account">
                <button type="submit" class="btn btn-success" title="Save" id="resume_create_form_button">
                  <i class="fa fa-floppy-o"></i> <?php echo site_phrase('save'); ?>
                </button>
              </div>
            </div>
          </div>          
          </form>
        </div>
      </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
  </div>

