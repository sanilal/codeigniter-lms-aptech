<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
?>
<section class="category-header-area"
  style="
background-size: cover;
background-repeat: no-repeat;
background-position-x: right;background-image: url(<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'],'course_banner'); ?>);">
  <!-- image-placeholder-1 -->
  <div class="" style=""></div>
  <div class="breadcrumb-container text-center align-middle" style="content: '';
background-color: rgba(0,0,0,.5);
/* position: absolute; */
top: 0;
left: 0;
bottom: 0;
right: 0;
width: 100%;">
    <h3><?php echo $course_details['title']; ?></h3>
    <nav aria-label="breadcrumb" class="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item display-6">
          <a href="<?php echo site_url('home'); ?>">
            <?php echo site_phrase('home'); ?>
          </a>
        </li>
        <?php //print_r($course_details['title']); ?>
        <!-- fw-bold -->
        <li class="breadcrumb-item active text-light display-6 ">
          <?php echo $course_details['title']; ?>
        </li>
      </ol>
    </nav>
  </div>
</section>


<section class="p-2 p-md-5 pb-4"></section>

<style>
  .lead {
    margin-bottom: 20px;
    font-size: 16px;
    font-weight: 300;
    line-height: 1.4;
  }
</style>
<section class="course-content-area bg-gray">
  <div class="container">
    <div class="row">
      <!-- p-30-40 -->
      <div class="col-lg-8 order-last order-lg-first radius-10 mt-4 bg-white px-3 py-2">

        <div class="description-content-wrap description-box ">
          <div class="description-content">
            <div class="description-title"><?php echo mb_convert_case(site_phrase('course_overview'), MB_CASE_TITLE, "UTF-8"); ?></div>
            <p class="lead">
              <?php echo $course_details['short_description']; ?>
            </p>
          </div>
        </div>
        
        <div class="description-content coursedetails ">

          <div class="row">
            <div class="col-12 col-lg-6">
              <img
                src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'],'course_image'); ?>"
                alt="" class="img-fluid">
            </div>
            <?php if (count(json_decode($course_details['description'])) > 0) : ?>
            <?php
            $row_count= 0;
            $hr_count= 1;
            $hr_limit=4;
          foreach (json_decode($course_details['description']) as $description) : ?>
            <?php echo $hr_count==2 && $row_count==1?'<hr>':'';?>


            <div class=" col-12 py-2 <?php echo $hr_count==1?'col-lg-6 ':'col-lg-12 course-content ';?>">
              <h3><?php echo mb_convert_case($description->title, MB_CASE_TITLE, "UTF-8"); ?></h3>


              <div class="content"><?php echo $description->desc; ?></div>
            </div>
            <?php  if($hr_count%$hr_limit==0 && $hr_count!=1):
             echo'<hr>';
             $hr_limit=4;
             $hr_count= 1 ;
              endif;?>

            <?php $hr_count++; $row_count++; endforeach;  endif;
            ?>
            <span class="py-3"></p>
            <hr>
            <?php if($course_details['notes']) {?>
            <h3> Notes:</h3>
            <p class="p-3">
            <?php  echo $course_details['notes']; ?>
            </p>
            <?php } ?>
    
    
          </div>

          <hr>
          

        </div>

    




  <div class="p-4"></div>


  <?php
            $url = "https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyCb6_yUSFhe-7RHGkJKRlYyopKTsHZu6BI&placeid=ChIJR3bT8TxDXz4RaAmjYocU1-Y&rating=5";
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec ($ch);
            $res        = json_decode($result,true);
            
            print_r($res);
            $reviews    = $res['result']['reviews'];
            
            ?>



  </div>



  <div class="col-lg-4 order-first order-lg-last">
    <div class="course-sidebar natural">
      <?php if ($course_details['video_url'] != "") : ?>
      <div class="preview-video-box">
        <a data-bs-toggle="modal" data-bs-target="#CoursePreviewModal">
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt=""
            class="w-100">
          <span class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
          <span class="play-btn"></span>
        </a>
      </div>
      <?php endif; ?>
      <div class="course-sidebar-text-box">

        <!-- <div class="price text-center">
          <h2><?php // echo site_phrase('get_enrolled'); ?></h2>


        </div> -->



        <div class="buy-btns mb-4">
          <!-- <a href="<?php // echo site_url('contact-us'); ?>" class="btn btn-buy-now"
            onclick="()"><?php // echo site_phrase('enroll_now'); ?></a> -->
        </div>
        
        <!-- mod end previous_result------------------------------------------------------------------------------------------------------------------------>

        <div class="sction-title-wrapper sidebarclasses text-center ">
          <h2 style="" class="section-title "></h2>
          <div class="sub-title" style="">
            <p></p>
            <!-- <h3 style="text-align: center;">Enquire Now</h3> -->
            <div class="box course-form" id="booker">
              <!-- specialfont -->
              <h3 class="">Enquire Now</h3>
              <img class="size-full wp-image-4399 aligncenter entered lazyloaded"
                src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'],'course_icon'); ?>"
                alt="Learn Adobe Photoshop" width="200" height="200">
              <form role="form" id="frmenquiry" name="frmenquiry" action="<?php echo base_url('pages/course_contact') ?>"
                method="post">
                
                <div class="row">
                  <div class="col-lg-12">
                    <div class="wrap-input100 validate-input">
                      <span class="label-input100">Your name:</span>
                      <input type="text" class="input100" id="inputName" name="inputName"
                        value="<?php echo set_value('inputName',$this->form_data->inputName); ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="wrap-input100 validate-input">
                      <span class="label-input100">Email address:</span>
                      <input type="text" class="input100" id="inputEmail" name="inputEmail"
                        value="<?php echo set_value('inputEmail',$this->form_data->inputEmail); ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="wrap-input100 validate-input">
                      <span class="label-input100">Phone number:</span>
                      <input type="text" class="input100" id="inputPhone" name="inputPhone" required
                        value="<?php echo set_value('inputPhone',$this->form_data->inputPhone); ?>" required>
                    </div>
                  </div>
                <div class="col-lg-12">
                  <div class="wrap-input100 validate-input">
                    <span class="label-input100">Message:</span>
                    <textarea class="input100" rows="3" id="inputMessage" name="inputMessage"
                      required><?php print set_value('inputMessage',$this->form_data->inputMessage); ?></textarea>
                      <input type="hidden" name="inputCourseTitle" value ="<?php echo $course_details['title']; ?>"/>

                      <input type="hidden" name="course_slug" value="<?php echo $this->uri->segment(3); ?>">
<input type="hidden" name="course_id" value="<?php echo $this->uri->segment(4); ?>">

                  </div>
                </div>
                <div class="msg-error" style="color:red;"></div>
                <div class="g-recaptcha" data-sitekey="6LcYbZEUAAAAAM-UQj_J9QedWO8_4bM5DylLsr7B" id="recaptcha"
                  style="margin-top: 1em;"></div>
                <button type="submit" class="send-button button-01">Send Now</button>
                <div class="col-xs-12 no-side-pad">
    <?php if (isset($message) && !empty($message)): ?>
        <p class=" <?php echo strpos($message, 'successfully') !== false ? 'alert-success' : 'alert-danger'; ?>">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>
</div>

              </form>
            </div>
          </div>
        </div>

        <hr>
        <h2><?php echo site_phrase('our_google_reviews'); ?></h2>
        <hr>
        <!-- ---- review -->
        <div id="google-business-reviews-rating" class="google-business-reviews-rating gmbrr">
          <h2 class="heading"><span class="icon"><img
                src="<?php echo base_url(); ?>uploads/user_image/348399ecbd433e33121cb252cd6da8af.jpg"
                alt="Aptech Icon"></span><?php echo $res['result']['name'];?>
          </h2>
          <p class="vicinity"><?php echo $res['result']['vicinity'];?></p>
          <p class="rating"><span class="number"><?php echo $res['result']['rating'];?></span> <span
              class="all-stars animate"><span class="star"></span><span class="star"></span><span
                class="star"></span><span class="star"></span><span class="star split-40-60"></span></span> <a
              href="https://search.google.com/local/reviews?placeid=ChIJR3bT8TxDXz4RaAmjYocU1-Y" target="_blank"
              rel="nofollow" class="count"><?php echo $res['result']['user_ratings_total'];?> reviews</a></p>
          <ul class="listing">
            <?php foreach ($reviews as $review_key => $review_value) {
                //print_r($review_value);
                ?>
            <li class="rating-5" data-index="0">
              <span class="author-avatar">
                <a href="<?php echo $review_value['author_url'];?>" target="_blank" rel="nofollow">
                  <img src="<?php echo $review_value['profile_photo_url'];?>" alt="Avatar">
                </a></span>
              <span class="review-meta">
                <span class="author-name"><a href="<?php echo $review_value['author_url'];?>" target="_blank"
                    rel="nofollow"><?php echo $review_value['author_name'];?></a></span>
                <span class="rating"><?php for ($i=0; $i < $review_value['rating']; $i++) { 
                  # code...
                  echo ' ★';
                }
                ?></span>
                <span class="relative-time-description"> <?php //echo  $review_value['time'];?>
                  <?php echo  $review_value['relative_time_description'];?></span>
              </span>

              <div class="text text-excerpt">
                <?php //echo  $review_value['text'];
                
                $string = $review_value['text'];
                $limit = 120;
                $length = strlen($string);
                if($length > $limit){
                  $firsthalf = substr($string, 0, $limit); //parameters are string, start int, end int, so 0 would be the first character and the last character would be 2 in this case
                  
                  if($last_char==' '){
                    $secondhalf = substr($string, $limit, $length - 1);
                  }
                  else{
                    $last_space_first_half= (int)strrpos($firsthalf,' ');
                    $last_read_pos=(int)$limit-(int)$last_space_first_half;
                    $last_pos_to_read=(int)$limit-(int)$last_read_pos;
                    $firsthalf = substr($string, 0, $last_space_first_half); 
                    $secondhalf = substr($string, $last_pos_to_read, $length - 1);
                  }
                  ?> <span class="review-snippet"><?php echo $firsthalf; ?></span>
                <span class="moretext"><?php echo $secondhalf; ?> </span>
                <span class="ellipsis">...</span><a class="moreless-button" href="javascript:void(0);">Read more</a>
                <?php
                } else {
                  ?> <span class="review-full-text"><?php echo $secondhalf; ?></span>
                <?php
                } 
                ?>

              </div>

            </li>
            <?php
              }
              
              
              
              ?>



          </ul>
          <p class="attribution"><span class="powered-by-google" title="Powered by Google"></span></p>
        </div>

        <hr>
      </div>



    </div>
  </div>
  </div>
  </div>
  </div>
</section>
<section class="course-carousel-area course-content-area bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 order-last order-lg-first radius-10 mt-4 0-bg-gray p-0 ">

        <!-- page loader -->
        <div class="animated-loader">
          <div class="spinner-border text-secondary" role="status"></div>
        </div>
        <!-- text-end -->

        <div class="col-12 bg-white related-course-heading mb-3">
          <div class="float-start">
            <h4 class="mt-1"><?php echo site_phrase('other_related_courses'); ?></h4>
          </div>

          <div class="float-end ">
            <a class="btn yellow-btn mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a class="btn yellow-btn mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12">
          <div id="carouselExampleIndicators2" class="carousel slide top-course-carousel" data-ride="carousel">

            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <?php
              $this->db->limit(5);
              $other_realted_courses = $this->crud_model->get_courses($course_details['category_id'], $course_details['sub_category_id'])->result_array();
              ?>

                  <?php $other_realted_courses_count = 1;
              foreach ($other_realted_courses as $other_realted_course) : ?>
                  <?php //echo $top_course_count; 
                if ($other_realted_courses_count % 4 == 0) { ?>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <?php } ?>
                  <div class="col-md-4 mb-4">
                    <div class="content">
                      <a
                        href="<?php echo site_url('home/course/' . rawurlencode(slugify($other_realted_course['title'])) . '/' . $other_realted_course['id']); ?>">
                        <div class="content-overlay"></div>
                        <img class="img-fluid content-image"
                          src="<?php echo $this->crud_model->get_course_thumbnail_url($other_realted_course['id']); ?>">
                        <div class="content-details fadeIn-bottom">
                          <h5 class="content-title"><?php echo $other_realted_course['title']; ?></h5>
                          <p class="content-text">
                            <?php if ($other_realted_course['is_free_course'] == 1) : ?>
                            <span class="item-price mt-4 mt-md-0">
                              <span class="current-price"><?php echo site_phrase('free'); ?></span>
                            </span>
                            <?php else : ?>
                            <?php if ($other_realted_course['discount_flag'] == 1) : ?>
                            <span class="item-price mt-4 mt-md-0">
                              <span
                                class="original-price text-danger"><s><?php echo currency($other_realted_course['price']); ?></s></span>
                              <span
                                class="current-price"><?php echo currency($other_realted_course['discounted_price']); ?></span>
                            </span>
                            <?php else : ?>
                            <span class="item-price mt-4 mt-md-0">
                              <span class="current-price"><?php echo currency($other_realted_course['price']); ?></span>
                            </span>
                            <?php endif; ?>
                            <?php endif; ?>
                          </p>
                        </div>
                        <div class="side-price">
                          <?php if ($other_realted_course['is_free_course'] == 1) : ?>
                          <span class="item-price mt-4 mt-md-0 ">
                            <span class="current-price"><?php echo site_phrase('free'); ?></span>
                          </span>
                          <?php else : ?>
                          <?php if ($other_realted_course['discount_flag'] == 1) : ?>
                          <span class="item-price mt-4 mt-md-0">
                            <span
                              class="current-price"><?php echo currency($other_realted_course['discounted_price']); ?></span>
                          </span>
                          <?php else : ?>
                          <span class="item-price mt-4 mt-md-0">
                            <span class="current-price"><?php echo currency($other_realted_course['price']); ?></span>
                          </span>
                          <?php endif; ?>
                          <?php endif; ?>
                        </div>

                      </a>
                    </div>
                  </div>



                  <?php $other_realted_courses_count++;
                                endforeach; ?>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<?php if ($course_details['video_url'] != "") :
                                  $provider = "";
                                  $video_details = array();
                                  if ($course_details['course_overview_provider'] == "html5") {
                                    $provider = 'html5';
                                  } else {
                                    $video_details = $this->video_model->getVideoDetails($course_details['video_url']);
                                    $provider = $video_details['provider'];
                                  }
                                  ?>
<div class="modal fade" id="CoursePreviewModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true"
  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content course-preview-modal">
      <div class="modal-header">
        <h5 class="modal-title">
          <span><?php echo site_phrase('course_preview') ?>:</span><?php echo $course_details['title']; ?></h5>
        <button type="button" class="close" data-bs-dismiss="modal" onclick="pausePreview()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="course-preview-video-wrap">
          <div class="embed-responsive embed-responsive-16by9">
            <?php if (strtolower(strtolower($provider)) == 'youtube') : ?>
            <!------------- PLYR.IO ------------>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">

            <div class="plyr__video-embed" id="player">
              <iframe height="500"
                src="<?php echo $course_details['video_url']; ?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                allowfullscreen allowtransparency allow="autoplay"></iframe>
            </div>

            <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
            <script>
              const player = new Plyr('#player');
            </script>
            <!------------- PLYR.IO ------------>
            <?php elseif (strtolower($provider) == 'vimeo') : ?>
            <!------------- PLYR.IO ------------>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">
            <div class="plyr__video-embed" id="player">
              <iframe height="500"
                src="https://player.vimeo.com/video/<?php echo $video_details['video_id']; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                allowfullscreen allowtransparency allow="autoplay"></iframe>
            </div>

            <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
            <script>
              const player = new Plyr('#player');
            </script>
            <!------------- PLYR.IO ------------>
            <?php else : ?>
            <!------------- PLYR.IO ------------>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/global/plyr/plyr.css">
            <video poster="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>"
              id="player" playsinline controls>
              <?php if (get_video_extension($course_details['video_url']) == 'mp4') : ?>
              <source src="<?php echo $course_details['video_url']; ?>" type="video/mp4">
              <?php elseif (get_video_extension($course_details['video_url']) == 'webm') : ?>
              <source src="<?php echo $course_details['video_url']; ?>" type="video/webm">
              <?php else : ?>
              <h4><?php site_phrase('video_url_is_not_supported'); ?></h4>
              <?php endif; ?>
            </video>

            <style media="screen">
              .plyr__video-wrapper {
                height: 450px;
              }
            </style>

            <script src="<?php echo base_url(); ?>assets/global/plyr/plyr.js"></script>
            <script>
              const player = new Plyr('#player');
            </script>
            <!------------- PLYR.IO ------------>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- Modal -->

<style media="screen">
  .embed-responsive-16by9::before {
    padding-top: 0px;
  }
</style>
<script type="text/javascript">
  function handleCartItems(elem) {
    url1 = '<?php echo site_url('
    home / handleCartItems '); ?>';
    url2 = '<?php echo site_url('
    home / refreshWishList '); ?>';
    $.ajax({
      url: url1,
      type: 'POST',
      data: {
        course_id: elem.id
      },
      success: function (response) {
        $('#cart_items').html(response);
        if ($(elem).hasClass('active')) {
          $(elem).removeClass('active')
          $(elem).text("<?php echo site_phrase('add_to_cart'); ?>");
        } else {
          $(elem).addClass('active');
          $(elem).addClass('active');
          $(elem).text("<?php echo site_phrase('added_to_cart'); ?>");
        }
        $.ajax({
          url: url2,
          type: 'POST',
          success: function (response) {
            $('#wishlist_items').html(response);
          }
        });
      }
    });
  }

  function handleBuyNow(elem) {

    url1 = '<?php echo site_url('
    home / handleCartItemForBuyNowButton '); ?>';
    url2 = '<?php echo site_url('
    home / refreshWishList '); ?>';
    urlToRedirect = '<?php echo site_url('
    home / shopping_cart '); ?>';
    var explodedArray = elem.id.split("_");
    var course_id = explodedArray[1];

    $.ajax({
      url: url1,
      type: 'POST',
      data: {
        course_id: course_id
      },
      success: function (response) {
        $('#cart_items').html(response);
        $.ajax({
          url: url2,
          type: 'POST',
          success: function (response) {
            $('#wishlist_items').html(response);
            toastr.success('<?php echo site_phrase('
              please_wait ') . '....
              '; ?>');
            setTimeout(
              function () {
                window.location.replace(urlToRedirect);
              }, 1000);
          }
        });
      }
    });
  }

  function handleEnrolledButton() {
    $.ajax({
      url: '<?php echo site_url('
      home / isLoggedIn ? url_history = '.base64_encode(current_url())); ?>',
      success : function (response) {
        if (!response) {
          window.location.replace("<?php echo site_url('login'); ?>");
        }
      }
    });
  }

  function handleAddToWishlist(elem) {
    $.ajax({
      url: '<?php echo site_url('
      home / isLoggedIn ? url_history = '.base64_encode(current_url())); ?>',
      success : function (response) {
        if (!response) {
          window.location.replace("<?php echo site_url('login'); ?>");
        } else {
          $.ajax({
            url: '<?php echo site_url('
            home / handleWishList '); ?>',
            type: 'POST',
            data: {
              course_id: elem.id
            },
            success: function (response) {
              if ($(elem).hasClass('active')) {
                $(elem).removeClass('active');
                $(elem).text("<?php echo site_phrase('add_to_wishlist'); ?>");
              } else {
                $(elem).addClass('active');
                $(elem).text("<?php echo site_phrase('added_to_wishlist'); ?>");
              }
              $('#wishlist_items').html(response);
            }
          });
        }
      }
    });
  }

  function pausePreview() {
    player.pause();
  }

  $('.course-compare').click(function (e) {
    e.preventDefault()
    var redirect_to = $(this).attr('redirect_to');
    window.location.replace(redirect_to);
  });

  function go_course_playing_page(course_id, lesson_id) {
    var course_playing_url = "<?php echo site_url('home/lesson/'.slugify($course_details['title'])); ?>/" + course_id +
      '/' + lesson_id;

    $.ajax({
      url: '<?php echo site_url('
      home / go_course_playing_page / '); ?>' + course_id,
      type: 'POST',
      success: function (response) {
        if (response == 1) {
          window.location.replace(course_playing_url);
        }
      }
    });
  }
</script>