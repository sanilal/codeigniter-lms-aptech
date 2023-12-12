  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix front-intro-section">
    <div class="container">
      <div class="intro-img">
      </div>
      <div class="intro-info">
        <h2>
          <span>
            <?php echo site_phrase('account'); ?> > <?php echo esc_output($quiz['title'], 'html');  ?> 
            <?php echo esc_output(($detail['job_title'] ? ' : '.$detail['job_title'] : ''), 'html'); ?>
          </span>
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
                    <span class="account-box-heading-text">
                      <?php echo esc_output($quiz['title'], 'html'); ?> 
                      <?php echo esc_output($detail['job_title'] ? ' : '.$detail['job_title'] : '', 'html'); ?>
                    </span>
                    <span class="account-box-heading-line"></span>
                  </p>
                  <p class="quiz-attempt-info">
                    <span class="quiz-attempt-info-question-counter">
                      <?php echo site_phrase('total'); ?> <?php echo esc_output($detail['total_questions'], 'html'); ?> 
                      <?php echo site_phrase('questions'); ?>
                    </span>
                    <span class="quiz-attempt-info-timer">
                      <?php echo site_phrase('max_time'); ?> : 
                      <?php echo esc_output($detail['allowed_time'], 'html'); ?> <?php echo site_phrase('minutes'); ?>
                    </span>
                  </p>
                  <p class="quiz-attempt-description">
                    <?php echo esc_output($quiz['description'], 'html'); ?>
                  </p>
                  <?php echo form_open(base_url().'candidate/quiz-attempt', array('method' => 'post', 'class' => 'form')); ?>
                  <input type="hidden" name="quiz" value="<?php echo encode($detail['candidate_quiz_id']); ?>">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="form-group form-group-account">
                          <button type="submit" class="btn btn-success" title="Save" id="quiz_start_form_button">
                            <?php echo site_phrase('start_quiz'); ?>
                          </button>
                          <br /><br />
                          <strong><?php echo site_phrase('note_once_started'); ?></strong>
                        </div>
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

    </section><!-- #account area section ends -->

  </main>

  <?php //include(VIEW_ROOT.'/front/layout/footer.php'); ?>