<footer class="footer-area d-print-none bg-gray mt-5 pt-5">
  <div class="container-xl">
    <div class="row mb-3">
 
      <div class="col-12 col-sm-9 col-md-9 col-lg-9 text-md-start  text-center">
        <h5 class="text-arkan-yellow mb-3"><?php echo site_phrase('featured_links'); ?></h5>
        <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
        <ul class="list-unstyled text-small footer-nav">
          <?php $top_10_categories = $this->crud_model->get_top_categories(18, 'sub_category_id'); ?>
          <?php  foreach($top_10_categories as $top_10_category): ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
            <li class="mb-2">
            <i class="fa fa-angle-right"></i><a class="link-light footer-hover-link" href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>">
                <?php echo $category_details['name']; ?>
                <!-- <span class="fw-700 text-end">(<?php //echo $top_10_category['course_number']; ?>)</span> -->
              </a>
            </li>
          <?php endforeach; ?>
        
        </ul>
        </div>
   
        </div>
        
      </div>
      <div class="col-12 col-sm-3 col-md-3 col-lg-3 text-md-start  text-center">
        <h5 class="text-arkan-yellow mb-3"><?php echo site_phrase('information'); ?></h5>
        <div class="info ">
                <div class="social-information"> <i class="fas fa-map-marker-alt"></i>
                    <p class="">702, Al Tawhidi II
Near Sharaf DG Metro Station Exit 1,
Bur Dubai, Dubai, UAE</p>

                </div>
              <div class="social-information">    <i class="fas fa-map-marker-alt"></i>
                    <p class="">M3, HSBC Bank Buillding,
King Faisal Street,
Sharjah, UAE</p>
</div>
                <div class="social-information"><i class="fas fa-phone fa-flip-horizontal"></i>
                    <p class="">+971 5 564 48331</p>
                </div>
                <div class="social-information"> <i class="fas fa-envelope"></i>
                    <p class="">enquiry@aptech.ae</p>
                </div>
                
            </div>

        <!-- <ul class="list-unstyled">

<li>
<h4>Site Office</h4>
<div class="icon"><i class="fa fa-map-marker"></i></div>
<div class="info">
<p>Al Quoz 4, Warehouse 1 <br>St 26, Dubai, UAE</p>
</div>
</li>
<li>
<div class="icon"><i class="fa fa-phone"></i></div>
<div class="info">
<p><a href="tel:+97143333878">+971 4 3333 878</a> </p>
</div>
<div class="icon"><i class="fa fa-whatsapp"></i></div>
<div class="info">
<p><a href="tel:+971506657330">+971 50 6657 330</a></p>
</div>
</li>
<li>
<div class="icon"><i class="fa fa-envelope"></i></div>
<div class="info">
<p>wecare@prolineuae.com
</p>
</div>
</li>
</ul> -->
        <?php /*
        <ul class="list-unstyled text-small">
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('blog'); ?>"><?php echo site_phrase('blog'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/sign_up'); ?>"><?php echo site_phrase('sign_up'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/login'); ?>"><?php echo site_phrase('login'); ?></a></li>
        </ul>
        */ ?>
      </div>
      <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-3 text-md-start  text-center mb-3">
      <h5 class="text-arkan-yellow mb-3"><?php echo site_phrase('instagram'); ?></h5>
      <div class="insta-widget">
  <div
  loading="lazy"
  data-mc-src="c5104947-701c-4eee-bd04-d1d7a361f236#instagram"></div>
        
<script 
  src="https://cdn2.woxo.tech/a.js#62bab32fac60e60021e08f72" 
  async data-usrc>
</script>
</div>
      <?php /*<div class="insta-widget">
      <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-578d355b-e965-4923-9b06-800baad9475c"></div>
      </div>
      <script>
        $( document ).ready(function() {
          $('.eapps-link').hide();
});
       
//$('.eapps-instagram-feed-container').next('a').remove();
      </script> */ ?>

        <?php /*
        <h5 class="text-white mb-3"><?php echo site_phrase('help'); ?></h5>
        <ul class="list-unstyled text-small">
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/about_us'); ?>"><?php echo site_phrase('about_us'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/terms_and_condition'); ?>"><?php echo site_phrase('terms_and_condition'); ?></a></li>
          <li class="mb-2"><a class="link-light footer-hover-link" href="<?php echo site_url('home/refund_policy'); ?>"><?php echo site_phrase('refund_policy'); ?></a></li>
        </ul>
        */ ?>
      </div> -->
      
    </div>
  </div>
  <section class="border-top">
    <div class="container-xl">
      <div class="row mt-3 py-1">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3 text-white text-13px">
          &copy; 2022 <?php echo get_settings('system_name'); ?>, <?php echo site_phrase('all_rights_reserved'); ?>
        </div>

        <div class="col-6 col-sm-6 col-md-3 d-none d-md-block"></div>
        <div class="col-6 col-sm-6 col-md-3 d-none d-md-block"></div>
        <div class="col-6 col-sm-6 col-md-3 text-center text-md-start text-white text-13px">
            Powered by: <a href="https://www.iconceptme.com/" style="color: #ffc107;">Iconcepts LLC</a>
         <?php /* <select class="language_selector" onchange="switch_language(this.value)">
            <?php
             $languages = $this->crud_model->get_all_languages();
             foreach ($languages as $language): ?>
                <?php if (trim($language) != ""): ?>
                    <option value="<?php echo strtolower($language); ?>" <?php if ($this->session->userdata('language') == $language): ?>selected<?php endif; ?>><?php echo ucwords($language);?></option>
                <?php endif; ?>
            <?php endforeach; ?>
          </select> */ ?>
        </div>
      </div>
    </div>
  </section>
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e9d867469e9320caac57242/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
    function switch_language(language) {
        $.ajax({
            url: '<?php echo site_url('home/site_language'); ?>',
            type: 'post',
            data: {language : language},
            success: function(response) {
                setTimeout(function(){ location.reload(); }, 500);
            }
        });
    }
</script>



<!-- PAYMENT MODAL -->
<!-- Modal -->
<?php
$paypal_info = json_decode(get_settings('paypal'), true);
$stripe_info = json_decode(get_settings('stripe_keys'), true);
if ($paypal_info[0]['active'] == 0) {
  $paypal_status = 'disabled';
}else {
  $paypal_status = '';
}
if ($stripe_info[0]['active'] == 0) {
  $stripe_status = 'disabled';
}else {
  $stripe_status = '';
}
?>

<!-- Modal -->
<div class="modal fade multi-step" id="EditRatingModal" tabindex="-1" role="dialog" aria-hidden="true" reset-on-close="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content edit-rating-modal">
      <div class="modal-header">
        <h5 class="modal-title step-1" data-step="1"><?php echo site_phrase('step').' 1'; ?></h5>
        <h5 class="modal-title step-2" data-step="2"><?php echo site_phrase('step').' 2'; ?></h5>
        <h5 class="m-progress-stats modal-title">
          &nbsp;of&nbsp;<span class="m-progress-total"></span>
        </h5>

        <button type="button" class="close" data-bs-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="m-progress-bar-wrapper">
        <div class="m-progress-bar">
        </div>
      </div>
      <div class="modal-body step step-1">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="modal-rating-box">
                <h4 class="rating-title"><?php echo site_phrase('how_would_you_rate_this_course_overall'); ?>?</h4>
                <fieldset class="your-rating">

                  <input type="radio" id="star5" name="rating" value="5" />
                  <label class = "full" for="star5"></label>

                  <!-- <input type="radio" id="star4half" name="rating" value="4 and a half" />
                  <label class="half" for="star4half"></label> -->

                  <input type="radio" id="star4" name="rating" value="4" />
                  <label class = "full" for="star4"></label>

                  <!-- <input type="radio" id="star3half" name="rating" value="3 and a half" />
                  <label class="half" for="star3half"></label> -->

                  <input type="radio" id="star3" name="rating" value="3" />
                  <label class = "full" for="star3"></label>

                  <!-- <input type="radio" id="star2half" name="rating" value="2 and a half" />
                  <label class="half" for="star2half"></label> -->

                  <input type="radio" id="star2" name="rating" value="2" />
                  <label class = "full" for="star2"></label>

                  <!-- <input type="radio" id="star1half" name="rating" value="1 and a half" />
                  <label class="half" for="star1half"></label> -->

                  <input type="radio" id="star1" name="rating" value="1" />
                  <label class = "full" for="star1"></label>

                  <!-- <input type="radio" id="starhalf" name="rating" value="half" />
                  <label class="half" for="starhalf"></label> -->

                </fieldset>
              </div>
            </div>
            <div class="col-md-6">
              <div class="modal-course-preview-box">
                <div class="card">
                  <img class="card-img-top img-fluid" id = "course_thumbnail_1" alt="">
                  <div class="card-body">
                    <h5 class="card-title" class = "course_title_for_rating" id = "course_title_1"></h5>
                    <p class="card-text" id = "instructor_details">

                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-body step step-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="modal-rating-comment-box">
                <h4 class="rating-title"><?php echo site_phrase('write_a_public_review'); ?></h4>
                <textarea id = "review_of_a_course" name = "review_of_a_course" placeholder="<?php echo site_phrase('describe_your_experience_what_you_got_out_of_the_course_and_other_helpful_highlights').'. '.site_phrase('what_did_the_instructor_do_well_and_what_could_use_some_improvement') ?>?" maxlength="65000" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="modal-course-preview-box">
                <div class="card">
                  <img class="card-img-top img-fluid" id = "course_thumbnail_2" alt="">
                  <div class="card-body">
                    <h5 class="card-title" class = "course_title_for_rating" id = "course_title_2"></h5>
                    <p class="card-text">
                      -
                      <?php
                      $admin_details = $this->user_model->get_admin_details()->row_array();
                      echo $admin_details['first_name'].' '.$admin_details['last_name'];
                      ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="course_id" id = "course_id_for_rating" value="">
      <div class="modal-footer">
        <button type="button" class="btn btn-primary next step step-1" data-step="1" onclick="sendEvent(2)"><?php echo site_phrase('next'); ?></button>
        <button type="button" class="btn btn-primary previous step step-2 mr-auto" data-step="2" onclick="sendEvent(1)"><?php echo site_phrase('previous'); ?></button>
        <button type="button" class="btn btn-primary publish step step-2" onclick="publishRating($('#course_id_for_rating').val())" id = ""><?php echo site_phrase('publish'); ?></button>
      </div>
    </div>
  </div>
</div><!-- Modal -->

  <!-- Top Modal -->
  <div class="modal fade in" id="modal-default" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header resume-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title resume-modal-title">Refer Job</h4>
      </div>
      <div class="modal-body-container">
      </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div>
  </div> 


