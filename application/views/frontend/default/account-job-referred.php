<?php include "profile_menus.php"; ?>

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
            <?php if ($jobs) { ?>
            <?php foreach ($jobs as $job) { ?>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="job-listing">
                  <p class="job-listing-heading">
                    <span class="job-listing-heading-text">
                      <a href="<?php echo base_url(); ?>job/<?php echo encode($job['job_id']); ?>">
                        <?php echo esc_output($job['title'], 'html'); ?>
                      </a>
                    </span>
                    <span class="job-listing-heading-line"></span>
                  </p>
                  <p class="job-listing-job-info">
                    <span class="job-listing-job-info-date"><i class="fa fa-clock-o"></i> <?php echo site_phrase('favorited_on'); ?> : <?php echo timeFormat($job['favorited_on']); ?></span>
                    <span class="job-listing-job-info-date"><i class="fa fa-bookmark"></i> <?php echo esc_output($job['department'], 'html'); ?></span>
                    <?php $favorite = in_array($job['job_id'], $jobFavorites) ? 'favorited' : ''; ?>
                    <span class="job-listing-job-info-item mark-favorite <?php echo esc_output($favorite); ?>"
                      title="<?php echo esc_output($favorite) ? site_phrase('unmark_favorite') : site_phrase('mark_favorite'); ?>"
                      data-id="<?php echo encode($job['job_id']); ?>">
                      <i class="fa fa-heart"></i></span>
                  </p>
                  <div class="job-listing-job-description">
                    <?php echo trimString($job['description'], 280); ?>
                    <a href="<?php echo base_url(); ?>job/<?php echo encode($job['job_id']); ?>"><?php echo site_phrase('read_more'); ?></a>
                  </div>
                  <div class="job-listing-job-description">
                    <strong>
                      <?php echo site_phrase('name'); ?> : <?php echo trimString($job['name']); ?><br />
                      <?php echo site_phrase('email'); ?> : <?php echo trimString($job['email']); ?><br />
                      <?php echo site_phrase('phone'); ?> : <?php echo trimString($job['phone']); ?>
                    </strong>
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
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <?php echo esc_output($pagination, 'raw'); ?>
              </div>
            </div>            
            <?php } else { ?>
              <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="job-detail account-no-content-box">
                    <?php echo site_phrase('no_jobs_found'); ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

      </div>

    </section><!-- #account area section ends -->

