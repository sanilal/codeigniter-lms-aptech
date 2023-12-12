  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2><span><?php echo lang('account'); ?> > <?php echo lang('job_applications'); ?></span></h2>
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
                <?php include(VIEW_ROOT.'/front/partials/account-sidebar.php'); ?>
              </ul>
            </div>
          </div>
          <div class="col-md-9 col-lg-9 col-sm-12">
            <?php if ($jobs) { ?>
            <?php foreach ($jobs as $job) { ?>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="job-listing">
                  <p class="job-listing-heading">
                    <span class="job-listing-heading-text">
                      <a href="<?php echo base_url(); ?>job/<?php echo encode($job['job_id']); ?>"><?php echo esc_output($job['title'], 'html'); ?></a>
                    </span>
                    <span class="job-listing-heading-line"></span>
                  </p>
                  <p class="job-listing-job-info">
                    <span class="job-listing-job-info-date"><i class="fa fa-clock-o"></i> <?php echo lang('applied_on'); ?> : <?php echo timeFormat($job['applied_on']); ?></span>
                    <span class="job-listing-job-info-date"><i class="fa fa-bookmark"></i> <?php echo esc_output($job['department'], 'html'); ?></span>
                    <span class="job-listing-job-info-item refer-job" title="Refer this job"
                      data-id="<?php echo encode($job['job_id']); ?>">
                      <i class="fa fa-user-plus"></i></span>
                  </p>
                  <div class="job-listing-job-description">
                    <?php echo trimString($job['description'], 280); ?>
                    <a href="<?php echo base_url(); ?>job/<?php echo encode($job['job_id']); ?>"><?php echo lang('read_more'); ?></a>
                  </div>
                  <div class="container">
                    <div class="row job-listing-items-container">
                      <?php if ($job['fields']) { ?>
                        <?php foreach ($job['fields'] as $key => $value) { ?>
                          <?php if ($value['label']) { ?>
                          <div class="col-md-4 col-sm-6 job-listing-items">
                            <span class="job-listing-items-title" title="<?php echo esc_output($value['label'], 'html'); ?>">
                              <?php echo trimString(esc_output($value['label'], 'html')); ?>
                            </span>
                            <span class="job-listing-items-value" title="<?php echo esc_output($value['value'], 'html'); ?>">
                              <?php echo trimString(esc_output($value['value'], 'html')); ?>
                            </span>
                          </div>                          
                          <?php } ?>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="container">
                    <?php if ($job['job_status'] == 'rejected') { ?>
                    <div class="row job-application-progress">
                        <div class="col-6 job-application-progress-step complete">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('applied'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                        </div>
                        <div class="col-6 job-application-progress-step complete">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('rejected'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="row job-application-progress">
                        <div class="col-xs-3 job-application-progress-step <?php jobStatus($job['job_status'], 1); ?>">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('applied'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                        </div>
                        <div class="col-xs-3 job-application-progress-step <?php jobStatus($job['job_status'], 2); ?>">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('shortlisted'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                          <div class="job-application-progress-info text-center"></div>
                        </div>
                        <div class="col-xs-3 job-application-progress-step <?php jobStatus($job['job_status'], 3); ?>">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('interviewed'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                          <div class="job-application-progress-info text-center"></div>
                        </div>
                        <div class="col-xs-3 job-application-progress-step <?php jobStatus($job['job_status'], 4); ?>">
                          <div class="text-center job-application-progress-stepnum"><?php echo lang('hired'); ?></div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="job-application-progress-dot"></a>
                          <div class="job-application-progress-info text-center"></div>
                        </div>
                    </div>
                  <?php } ?>
                  </div>                  
                </div>
              </div>
            </div>
            <?php } ?>
            <?php } else { ?>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="job-detail account-no-content-box">
                  <?php echo lang('no_jobs_found'); ?>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <?php echo esc_output($pagination, 'raw'); ?>
              </div>
            </div>             
          </div>
        </div>

      </div>

    </section><!-- #account area section ends -->

  </main>

  <?php include(VIEW_ROOT.'/front/layout/footer.php'); ?>