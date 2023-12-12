  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2><span><?php echo lang('page_posts'); ?></span></h2>
      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Content Section
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row mt-10">
          <div class="col-md-9 col-lg-9 col-sm-12">
            <div class="row">
              <?php if ($pages) { ?>
              <?php foreach ($pages as $page) { ?>
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="page-listing">
                  <p class="page-listing-heading">
                    <span class="page-listing-heading-text">
                      <a href="<?php echo base_url(); ?>page/<?php echo encode($page['page_id']); ?>">
                      <?php echo trimString($page['title'], 50); ?>
                      </a>
                    </span>
                    <span class="page-listing-heading-line"></span>
                  </p>
                  <div class="page-listing-page-description">
                    <?php echo trimString($page['description'], 500); ?>
                    <a href="<?php echo base_url(); ?>page/<?php echo encode($page['page_id']); ?>"><?php echo lang('read_more'); ?></a>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php } else { ?>
              <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="page-listing">
                  <p class="page-listing-heading">
                    <?php echo lang('no_post_found'); ?>!
                  </p>
                </div>
              </div>                
              <?php } ?>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12">
              <?php echo esc_output($pagination, 'raw'); ?>
            </div>
          </div>

          <div class="col-lg-3">
            <?php include(VIEW_ROOT.'/front/partials/page-sidebar.php'); ?>
          </div>
        </div>

      </div>

    </section><!-- #account area section ends -->

  </main>

  <?php include(VIEW_ROOT.'/front/layout/footer.php'); ?>
