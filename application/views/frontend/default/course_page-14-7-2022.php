<?php
$course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
?>
<section class="home-banner-area" id="home-banner-area">
  <!-- <div class="cropped-home-banner" ></div> -->
  <div class="">
    <div class="row">
      <div class="col position-relative">

        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

          <!-- The slideshow/carousel -->
          <div class="carousel-inner">
            <div class="carousel-item active" style="background:url('<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'],'course_banner'); ?>');min-height: 432px;background-position: center;
    background-size: cover;
    background-repeat: no-repeat;">

            </div>


          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
    $banner_size = getimagesize("uploads/system/" . get_frontend_settings('banner_image'));
    $banner_ratio = $banner_size[0] / $banner_size[1];
    ?>
  <script type="text/javascript">
    var border_bottom = $('.home-banner-wrap').height() + 242;
    $('.cropped-home-banner').css('border-bottom', border_bottom + 'px solid #f1f7f8');
    mRight = Number("<?php echo $banner_ratio; ?>") * $('.home-banner-area').outerHeight();
    $('.cropped-home-banner').css('right', (mRight - 65) + 'px');
  </script>
</section>
<section class="blank_space p-2 p-md-5"></section>

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
      <div class="col-lg-9 order-last order-lg-first radius-10 mt-4 bg-white p-30-40 ">
      
                <div class="description-content-wrap description-box ">
                  <div class="description-content">
                  <div class="description-title"><?php echo site_phrase('course_overview'); ?></div>
      <p class="lead">
      <?php echo ellipsis($course_details['short_description'], 200); ?>
</p>
</div>
</div>
     
      
          <div class="description-content coursedetails ">
          <img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id'],'course_image'); ?>"
          alt="" class="img-fluid  w-50  float-start">
                    <?php echo $course_details['description']; ?>
                  </div>

        <div class="course-tabs">
          <!-- <ul class="nav nav-pills pt-4 pb-4 flex-column flex-sm-row">
    <li class="nav-item">
        <a href="#overview" class="nav-link ps-5 pe-5  pt-3 pb-3  active" data-bs-toggle="pill">Overview</a>
    </li>
   
    
</ul> -->
          <div class="tab-content">


            <div class="tab-pane fade show active" id="overview">

              <div class="description-box view-more-parent">
                <div class="view-more" onclick="viewMore(this,'hide')">+ <?php echo site_phrase('view_more'); ?></div>
                <div class="description-title"><?php echo site_phrase('course_overview'); ?></div>
                <div class="description-content-wrap">
                  <div class="description-content">
                    <?php echo $course_details['description']; ?>
                  </div>
                </div>
              </div>

              <h4 class="py-3"><?php echo site_phrase('what_will_i_learn'); ?>?</h4>
              <div class="what-you-get-box">
                <ul class="what-you-get__items">
                  <?php foreach (json_decode($course_details['outcomes']) as $outcome) : ?>
                  <?php if ($outcome != "") : ?>
                  <li><?php echo $outcome; ?></li>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>

              <div class="requirements-box">
                <div class="requirements-title"><?php echo site_phrase('requirements'); ?></div>
                <div class="requirements-content">
                  <ul class="requirements__list">
                    <?php foreach (json_decode($course_details['requirements']) as $requirement) : ?>
                    <?php if ($requirement != "") : ?>
                    <li><?php echo $requirement; ?></li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <!-- Instructor end -->
              <!-- <p>Home tab content ...</p> -->
            </div>


          </div>
        </div>





        <div class="p-4"></div>


        <?php
$url = "https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyCb6_yUSFhe-7RHGkJKRlYyopKTsHZu6BI&placeid=ChIJR3bT8TxDXz4RaAmjYocU1-Y&rating=5";
//$url="https://mybusiness.googleapis.com/v4/accounts/933975433921/locations/ChIJR3bT8TxDXz4RaAmjYocU1-Y/reviews";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec ($ch);
$res        = json_decode($result,true);

//print_r($res);
$reviews    = $res['result']['reviews'];
//var_dump($reviews);

// $cid ='ChIJR3bT8TxDXz4RaAmjYocU1-Y'; //CID of a place can be genrated from https://pleper.com/index.php?do=tools&sdo=cid_converter
//   $api_key        = 'AIzaSyCb6_yUSFhe-7RHGkJKRlYyopKTsHZu6BI';
// //execute curl
// $url = 'https://maps.googleapis.com/maps/api/place/details/json?cid='.$cid.'&key='.$api_key.'';
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, false);
// $data = curl_exec($ch);
// curl_close($ch);

// $arrayData = json_decode($data, true); // json object to array conversion
// $result = $arrayData['result'];

// $total_users    = $result['user_ratings_total']; // display total number of users who rated
// $overall_rating = $result['rating']; // display total average rating
// $reviews        = $result['reviews'];   //holds information like author_name, author_url, language, profile_photo_url, rating, relative_time_description, text, time */
// var_dump($result);
?>



      </div>



      <div class="col-lg-3 order-first order-lg-last">
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
            <div class="price text-center">
              <h2><?php echo site_phrase('get_enrolled'); ?></h2>


            </div>



            <div class="buy-btns mb-4">
              <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-buy-now"
                onclick="()"><?php echo site_phrase('enroll_now'); ?></a>
            </div>

 <!-- ---- review -->
            <div id="google-business-reviews-rating" class="google-business-reviews-rating gmbrr">
              <h2 class="heading"><span class="icon"><img
                    src="<?php echo base_url(); ?>uploads/system/c4a39d2dae0a618f4ff46d348b9eedb7.png" alt="Aptech Icon"></span><?php echo $res['result']['name'];?>
              </h2>
              <p class="vicinity"><?php echo $res['result']['vicinity'];?></p>
              <p class="rating"><span class="number"><?php echo $res['result']['rating'];?></span> <span class="all-stars animate"><span
                    class="star"></span><span class="star"></span><span class="star"></span><span
                    class="star"></span><span class="star split-40-60"></span></span> <a
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
                    <span class="relative-time-description"> <?php //echo  $review_value['time'];?> <?php echo  $review_value['relative_time_description'];?></span>
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
                   <!--  <span class="review-snippet">
                      What could I say about MONA that hasn't been said already. If you had to sum it up in one word it
                      would be EDGY. Went again for about the sixth time last weekend. Living in Hobart the locals tend
                      to take it for granted. I think I was</span>
                    <a href="#google-business-reviews-rating" class="review-more-link">… More</a>
                    <span class="review-full-text"> the only local there. The exhibitions are still engaging and my
                      favourite is still the engine oil pool, which was one of the original pieces back when it opened
                      10 years ago. Need I say it, well worth a visit.</span> -->
                      <!-- <span class="moretext">
      Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef brisket ball tip short ribs. 
    </span> -->
                    </div>
                   
                </li>
                <?php
  }



  ?>

                <!-- <li class="rating-5" data-index="1">
			<span class="author-avatar"><a href="https://www.google.com/maps/contrib/103603818048433749510/reviews" target="_blank" rel="nofollow"><img src="https://lh3.googleusercontent.com/a-/AOh14Gjus3fs935GIOwGjsLbwGGosAOljHJR7s5ZnkmV8Q=s128-c0x00000000-cc-rp-mo" alt="Avatar"></a></span>
			<span class="review-meta">
				<span class="author-name"><a href="https://www.google.com/maps/contrib/103603818048433749510/reviews" target="_blank" rel="nofollow">Francisco Xosé Presas Basalo</a></span>
				<span class="rating">★★★★★</span>
				<span class="relative-time-description">7 months ago</span>
			</span>
			<div class="text text-excerpt"><span class="review-snippet">A must see when in Hobart. The largest privately own art museum in the Southern Hemisphere. I did the extra exhibition named the Divine Comedy and I totally recommend the extra cost. The rest of the museum was also amazing. We spend there</span> <a href="#google-business-reviews-rating" class="review-more-link">… More</a><span class="review-full-text"> the whole day. Go early in the morning to get the most out of it.</span></div>
		</li>
		<li class="rating-5" data-index="2">
			<span class="author-avatar"><a href="https://www.google.com/maps/contrib/110506046020153969779/reviews" target="_blank" rel="nofollow"><img src="https://lh3.googleusercontent.com/a-/AOh14GhA9qOhcg6l3jUIDSDdISbDV9goXldmISQoqmzQQY8=s128-c0x00000000-cc-rp-mo-ba5" alt="Avatar"></a></span>
			<span class="review-meta">
				<span class="author-name"><a href="https://www.google.com/maps/contrib/110506046020153969779/reviews" target="_blank" rel="nofollow">Ashwin Masarkar</a></span>
				<span class="rating">★★★★★</span>
				<span class="relative-time-description">2 weeks ago</span>
			</span>
			<div class="text text-excerpt"><span class="review-snippet">MONA is the mother of all museums in Tasmania. If you are visiting Hobart, you must spare a day for this multilevel gigantic museum. Enough to see and lot to admire. However, I personally feel there are certain sections, which I'd</span> <a href="#google-business-reviews-rating" class="review-more-link">… More</a><span class="review-full-text"> not prefer my kids to see. If you are visiting with your kids, you might want to consider that as well. Except that you will have a joyous adventurous ride in David Walsh's universe.</span></div>
		</li>
		<li class="rating-5" data-index="3">
			<span class="author-avatar"><a href="https://www.google.com/maps/contrib/114594223357558395511/reviews" target="_blank" rel="nofollow"><img src="https://lh3.googleusercontent.com/a/AATXAJxzZZez8WdoWd3mxkTdtrn3wMZj8uMBlzzuPx1ZCQ=s128-c0x00000000-cc-rp-mo-ba4" alt="Avatar"></a></span>
			<span class="review-meta">
				<span class="author-name"><a href="https://www.google.com/maps/contrib/114594223357558395511/reviews" target="_blank" rel="nofollow">Ross C</a></span>
				<span class="rating">★★★★★</span>
				<span class="relative-time-description">5 months ago</span>
			</span>
			<div class="text text-excerpt"><span class="review-snippet">The best museum I have ever been to. (including the Parisian ones!)<br>
				The exhibits and the sheer scope of the place make this a brilliant experience. The outside grounds are fantastically preserved and offer some great views of the surrounding</span> <a href="#google-business-reviews-rating" class="review-more-link">… More</a><span class="review-full-text"> areas.<br>
				The restaurants and cafes within the museum are your typical affair of nice exterior but pricey interior if you ever dare to eat at one.<br>
				Absolute blast of an experience that will be the highlight of anyone's trip to Hobart.</span></div>
		</li>
		<li class="rating-5" data-index="4">
			<span class="author-avatar"><a href="https://www.google.com/maps/contrib/110549341720889471857/reviews" target="_blank" rel="nofollow"><img src="https://lh3.googleusercontent.com/a/AATXAJwetAFJ2WjtoZJD7w3xY5jgAHWvOZc6GzETsG_8=s128-c0x00000000-cc-rp-mo-ba4" alt="Avatar"></a></span>
			<span class="review-meta">
				<span class="author-name"><a href="https://www.google.com/maps/contrib/110549341720889471857/reviews" target="_blank" rel="nofollow">Arosh Gunawardena</a></span>
				<span class="rating">★★★★★</span>
				<span class="relative-time-description">a year ago</span>
			</span>
			<div class="text text-excerpt"><span class="review-snippet">I always leave here a little bit confused but never regretful I came to check out the current exhibition. MONA is a must do Tasmanian/Hobart experience and you won't regret it. My photos don't do it justice as when compared to</span> <a href="#google-business-reviews-rating" class="review-more-link">… More</a><span class="review-full-text"> real life experience when you're there. Definitely check it out and it's a reasonable experience!</span></div>
		</li> -->
              </ul>
              <p class="attribution"><span class="powered-by-google" title="Powered by Google"></span></p>
            </div>


            <!-- mod end previous_result------------------------------------------------------------------------------------------------------------------------>



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
                                    // $top_courses = $this->crud_model->get_top_courses()->result_array();
                                    // $cart_items = $this->session->userdata('cart_items');
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
                        <!-- <img class="content-image" src="https://images.unsplash.com/photo-1433360405326-e50f909805b3?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&w=1080&fit=max&s=359e8e12304ffa04a38627a157fc3362"> -->
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