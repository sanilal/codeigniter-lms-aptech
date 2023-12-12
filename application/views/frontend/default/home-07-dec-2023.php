<section class="home-banner-area" id="home-banner-area">
    <!-- <div class="cropped-home-banner" ></div> -->
    <div class="">
        <div class="row">
            <div class="col position-relative">

                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        <?php $get_latest_banners = $this->crud_model->get_latest_banners(50);
?>
                        <?php $banner_count = 1;
foreach ($get_latest_banners->result_array() as $latest_banner) : ?>

                        <?php $banner = 'uploads/banners/' . $latest_banner['banner']; ?>

                        <?php if (file_exists($banner) && is_file($banner)) :
                        $banner_img=base_url($banner);
                        ?>
                        <?php else : 
                        $banner_img=base_url('uploads/banners/placeholder.png');
                        ?>
                        <?php endif; ?>

                        <div class="carousel-item <?php echo $banner_count == 1 ? 'active' : ''; ?>"
                            style="background: url(<?php echo ($banner_img); ?>);">

                            <div class="carousel-caption">
                                <!--specialfont-->
                                <h2 class="specialfont <?php echo $banner_count%2==0?'even-color':'odd-color';?> ">
                                    <?php echo html_entity_decode($latest_banner['heading']); ?>
                                </h2>
                                <h3 class="<?php echo $banner_count%2==0?'even-color':'odd-color';?>">
                                    <?php echo html_entity_decode($latest_banner['subheading']); ?></h3>
                                <p>
                                    <!--text-uppercase  btn-dark -->
                                    <a class="btn btn-lg anchor-btn"
                                        href="<?php echo $latest_banner['button1_link']; ?>"
                                        role="button"><?php echo $latest_banner['button1_text']; ?></a> <a
                                        class="btn btn-lg anchor-btn"
                                        href="<?php echo $latest_banner['button2_link']; ?>"
                                        role="button"><?php echo $latest_banner['button2_text']; ?></a></p>
                            </div>
                        </div>

                        <?php $banner_count++;
                endforeach; ?>

                    </div>
                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
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




<!-- new start -->



<section role="main" class="starter-container light-gray_bg">
<div class="container-lg">
    <div class="row">
        <div class="col-md">
            <div class="starter-template">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $categories = $this->crud_model->get_categories()->result_array(); ?>
                    <?php $cat_count=0;
                foreach ($categories as $category) : ?>
                    <?php 
                    ?>

                    <li class="nav-item <?php echo $cat_count==0?'active':'';?>">
                        <a class="nav-link text-center" id="<?php echo $category['slug'];?>-tab" data-toggle="tab"
                            href="#<?php echo $category['slug'];?>" role="tab"
                            aria-controls="<?php echo $category['slug'];?>" aria-selected="false">
                            <i class="<?php echo $category['font_awesome_class'];?>"></i>
                            <span class="vc_tta-title-text"><?php echo $category['name'];?></span>
                        </a>
                    </li>
                    <?php $cat_count++;
                endforeach;?>
                </ul>

                <!-- tab content starts here -->
                <div class="tab-content pt-3 pb-3" id="myTabContent">
                    <?php $cat_count=0;
                foreach ($categories as $category) : ?>

                    <!-- content 1 -->
                    <div class="tab-pane fade show <?php echo $cat_count==0?'active':'';?>"
                        id="<?php echo $category['slug'];?>" role="tabpanel"
                        aria-labelledby="<?php echo $category['slug'];?>-tab">
                        <div class="row">
                            <?php 
                    
                    
                    $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                    if(count($sub_categories)>0):
                        foreach ($sub_categories as $sub_category) : ?>


                            <div class="col-lg-4 col-md-6 p-3">
                                <img class="card-img-top"
                                    src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $sub_category['thumbnail']); ?>"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="fw-bold"><?php echo $sub_category['name'];?></h2>
                                    <p><?php echo strip_tags(htmlspecialchars_decode($sub_category['description']));?>
                                    </p>
                                    <a class="fw-bold btn yellow-btn"
                                        href="<?php echo site_url('home/courses?category=' . $sub_category['slug']); ?>">See
                                        More</a>
                                </div>

                            </div>
                            <?php  
                            
                        endforeach;
                    else: echo '<div class="card starter-card col-md-12 p-3"><h3> No Sub Categories Found </h3></div>';
                endif;?>


                        </div>
                    </div>
                    <?php $cat_count++;
            endforeach;?>

                </div>
            </div>
        </div>
    </div>
</div>

</section>
<!-- /.container -->
<!-- <section class="it-career" aria-hidden="true" style="background: #fafafa url(<?php echo base_url('uploads/system/'. get_frontend_settings('surveybg')); ?>) !important;">
    <div class="container">
        <div class="row">
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper"><h2 class="vc_custom_heading"><?php echo (get_frontend_settings('career_survey')); ?></h2>
                        <div class="wpb_text_column wpb_content_element ">
                            <div class="wpb_wrapper">
                                <p class="m-b0"><?php echo (get_frontend_settings('career_survey_text')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-sm-6">
                <div class="vc_column-inner"><div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p><a class="site-button pull-right m-t15" href="<?php echo (get_frontend_settings('career_survey_url')); ?>"><?php echo (get_frontend_settings('career_survey_btn')); ?></a></p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <div class="wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner"><div class="wpb_wrapper"></div></div>
        </div>
        </div>
    </div>
</section> -->
<!-- new end -->

<!-- Blog -->

<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if(get_frontend_settings('blog_visibility_on_the_home_page') && $latest_blogs->num_rows() > 0): ?>
    <section class="section-blog pt-5">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h4 class="fw-700 w-100 text-center pt-2 mb-4">
                        <span class="header-underline-2"><?php echo site_phrase('latest_blogs'); ?></span>
                    </h4>
                </div>
                <?php foreach($latest_blogs->result_array() as $latest_blog): ?>
                    <?php $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array(); ?>

                    <div class="col-md-6 col-lg-4">
                        <a href="<?php echo site_url('blog/details/'.slugify($latest_blog['title']).'/'.$latest_blog['blog_id']); ?>">
                            <div class="card-blog">
                                <?php
                                    $blog_thumbnail = 'uploads/blog/thumbnail/'.$latest_blog['thumbnail'];
                                    if(!file_exists($blog_thumbnail) || !is_file($blog_thumbnail)):
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif;
                                ?>
                                <div class="card-blog-body">
                                    <div class="blog-thumbnail" style="background-image: url('<?php echo $blog_thumbnail; ?>');"></div>
                                    <div class="blog-placeholder">
                                    <h5 class="cart-blog-title">
                                        <?php
                                        $title = $latest_blog['title'];

                                        // Check if the title length is greater than 50 characters
                                        if (strlen($title) > 50) {
                                            // If yes, echo the first 50 characters followed by ellipsis
                                            echo substr($title, 0, 50) . '...';
                                        } else {
                                            // If not, echo the entire title
                                            echo $title;
                                        }
                                        ?>
                                    </h5>
                                          <div class="blog-excerpt">  <?php 
                                            $description = htmlspecialchars_decode(strip_tags($latest_blog['description']), ENT_QUOTES);
                                            
                                            
                                            if (strlen($description) > 50) {
                                                // If yes, echo the first 50 characters followed by ellipsis
                                                echo substr($description, 0, 150) . '...';
                                            } else {
                                                // If not, echo the entire title
                                                echo $description;
                                            }
                                            ?></div>
                                        <div class="d-flex justify-content-end">
                                            <!-- <div class="blog-info border-end">
                                                <?php // echo get_past_time($latest_blog['added_date']); ?>
                                            </div> -->
                                            <!-- <div class="blog-info">
                                                <?php // echo site_phrase('by'); ?>  <?php // echo site_url('home/instructor_page/'.$latest_blog['user_id']); ?> <?php // echo $user_details['first_name'].' '.$user_details['last_name']; ?>
                                            </div> -->
                                            <!-- <div class="blog-info blog-cat">
                                                <?php // echo $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row('title'); ?>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="col-12 mt-5 text-center">
                    <a class="float-none btn btn-outline-secondary px-3 fw-600" href="<?php echo site_url('blogs'); ?>"><?php echo site_phrase('view_all'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Blog Ends -->
<section class=" gray-bg mb-5 pt-5">
    <div class="container-lg">

        <div class="row justify-content-center">


            <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); 
            //var_dump($top_10_categories);?>
            <?php foreach ($top_10_categories as $top_10_category) : ?>
            <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array();
                ?>


            <div class="col-md-6 col-lg-4 col-xl-4 mb-3 ps-5 pe-5 p-sm-2">
                <div class="card-container">
                    <img src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category_details['thumbnail']); ?>"
                        alt="Notebook" style="width:100%;">
                    <div class="content text-center">
                        <h3><a href="<?php echo site_url('home/courses?category=' . $category_details['slug']); ?>">
                                <?php echo $category_details['name']; ?></a></h3>
                        <p><?php echo 'Over ' . $top_10_category['course_number'] . ' ' . site_phrase('courses'); ?></p>
                    </div>
                </div>

            </div>


            <?php endforeach; ?>


        </div>
</section>

<section class="course-carousel-area p-5 p-sm-3">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="course-carousel-title sec-title mb-4"><?php echo site_phrase('top_courses'); ?></h3>
                <!-- page loader -->
                <div class="animated-loader">
                    <div class="spinner-border text-secondary" role="status"></div>
                </div>


                <div class="col-12  text-end">
                    <a class="btn yellow-btn mb-3 mr-1" href="#carouselExampleIndicators2" role="button"
                        data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="btn yellow-btn mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide top-course-carousel"
                        data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php $top_course_count = 1;
                    $limit_count=5;
                    $top_courses = $this->crud_model->get_top_courses()->result_array();
                    $cart_items = $this->session->userdata('cart_items');
                    foreach ($top_courses as $top_course) : ?>
                                    <?php //echo $top_course_count; 
                        if ($top_course_count % $limit_count == 0) { 
                            $top_course_count = 1;?>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <?php } ?>
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">

                                        <div class="card">
                                            <div class="card-img-header">
                                                <div class="row">
                                                    <div class="offset-md-10 col-md-2 text-start">
                                                        <a class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($top_course['id'])) echo 'active'; ?>"
                                                            title="Add to wishlist" onclick="handleWishList(this)"
                                                            id="<?php echo $top_course['id']; ?>"><i
                                                                class="fas fa-heart"></i></a>
                                                        <!-- <i class="far fa-heart"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="img-cnt" style=" position: relative;
                            text-align: center;
                            color: white;">
                                                <img class="img-fluid"
                                                    src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>">
                                                <!-- card img header -->

                                                <!-- card img footer -->
                                                <div class="card-img-footer">



                                                    <div class="row">
                                                        <div class="offset-md-2 col-md-10 text-start">
                                                            <?php if ($top_course['multi_instructor']) :
                                $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                                $margin = 0;
                                foreach ($instructor_details as $key => $instructor_detail) {
                                    echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name'];
                                }
                                else :
                                    $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array();
                                    //var_dump($user_details);
                                    echo $user_details['first_name'] . ' ' . $user_details['last_name'];
                                endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="floating-user d-inline-block">
                                                                <?php if ($top_course['multi_instructor']) :
                                    $instructor_details = $this->user_model->get_multi_instructor_details_with_csv($top_course['user_id']);
                                    $margin = 0;
                                    foreach ($instructor_details as $key => $instructor_detail) { ?>
                                                                <img style="margin-left: <?php echo $margin; ?>px;"
                                                                    class="position-absolute"
                                                                    src="<?php echo $this->user_model->get_user_image_url($instructor_detail['id']); ?>"
                                                                    width="30px" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="<?php echo $instructor_detail['first_name'] . ' ' . $instructor_detail['last_name']; ?>"
                                                                    onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $instructor_detail['id']); ?>');">
                                                                <?php $margin = $margin + 17; ?>
                                                                <?php } ?>
                                                                <?php else : ?>
                                                                <?php $user_details = $this->user_model->get_all_user($top_course['user_id'])->row_array(); ?>
                                                                <img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>"
                                                                    width="30px" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    title="<?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>"
                                                                    onclick="return check_action(this,'<?php echo site_url('home/instructor_page/' . $user_details['id']); ?>');">
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="rating d-inline-block">
                                                                <?php
                                            $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                                            $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                                            if ($number_of_ratings > 0) {
                                                $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                            } else {
                                                $average_ceil_rating = 0;
                                            }
                                            for ($i = 1; $i < 6; $i++) : ?>
                                                                <?php if ($i <= $average_ceil_rating) : ?>
                                                                <i class="fas fa-star filled"></i>
                                                                <?php else : ?>
                                                                <i class="far fa-star"></i>
                                                                <?php endif; ?>
                                                                <?php endfor; ?>/<span
                                                                    class="text-dark text-12px text-white ms-2 d-inline-block">(<?php echo $number_of_ratings . ' ' . site_phrase('reviews'); ?>)</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- card header end -->
                                            <div class="card-body">
                                                <a
                                                    href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>">
                                                    <h4 class="card-title">
                                                        <?php echo word_limiter($top_course['title'],5); ?></h4>
                                                </a>
                                                <p class="card-text">
                                                    <!-- word_limiter -->

                                                    <?php echo character_limiter($top_course['short_description'], 140); ?>
                                                </p>


                                            </div>

                                            <div class="card-footer border-top border-bottom">
                                                <div class="row">
                                                    <?php /*
                                                    <div class="col-6 col-md-7">
                                                        <p class="student-count text-left d-inline-block float-start">
                                                            <?php $student_count = $this->crud_model->get_student_count_by_course($top_course['id']);
                                                      
                                                        ?>

                                                    <i
                                                        class="fas fa-users"></i>&nbsp;&nbsp;<b><?php echo $student_count['student_count']; ?></b>
                                                    Student
                                                    </p>
                                                </div> */ ?>
                                                <div class="col-12">
                                                    <a class="anchor-btn-cnt">Read More</a>
                                                    <?php /* if ($top_course['is_free_course'] == 1) : ?>
                                                    <p class="price text-right d-inline-block float-end">
                                                        <?php echo site_phrase('free'); ?></p>
                                                    <?php else : ?>

                                                    <p class="price text-right d-inline-block float-end">
                                                        <?php echo currency($top_course['price']); ?></p>

                                                    <?php endif; */ ?>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>



                                <?php $top_course_count++;
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

<!-- new start -->
<!-- <div class="row justify-content-center"> -->
<!-- design : https://www.screencast.com/t/cGptu0FF8v  -->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if($top_instructor_ids){ ?>
<section class="featured-instructor gray-bg p-5 p-sm-3">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <h3 class="sec-title mb-5"><?php echo site_phrase('featured_instructor'); ?></h3>
            </div>
        </div>

        <div class="row justify-content-center flex-column flex-md-row align-items-center justify-content-md-start">
            <!-- <div class="container-fluid">  -->
            <div class="owl-carousel-parent ">
                <div class="instructor-carousel owl-carousel">

                    <?php foreach ($top_instructor_ids as $top_instructor_id) : ?>
                    <?php $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array(); ?>
                    <div class="item">
                        <a class="text-decoration-none"
                            href="<?php echo site_url('home/instructor_page/' . $top_instructor['id']); ?>">
                            <div class="owl_img">
                                <img src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>"
                                    alt="Instructor Image">
                            </div>
                            <div class="text">
                                <h2><?php echo $top_instructor['first_name'] . ' ' . $top_instructor['last_name']; ?>
                                </h2>
                                <p><?php echo ellipsis($top_instructor['title'], 60); ?></p>
                            </div>
                        </a>
                    </div>


                    <?php endforeach; ?>

                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>

<?php } ?>

<!-- </div> -->
<!-- new end -->






<script type="text/javascript">
    function handleWishList(elem) {
        $.ajax({
            url: '<?php echo site_url('
            home / handleWishList '); ?>',
            type: 'POST',
            data: {
                course_id: elem.id
            },
            success: function (response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                } else {
                    if ($(elem).hasClass('active')) {
                        $(elem).removeClass('active')
                    } else {
                        $(elem).addClass('active')
                    }
                    $('#wishlist_items').html(response);
                }
            }
        });
    }

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
                if ($(elem).hasClass('addedToCart')) {
                    $('.big-cart-button-' + elem.id).removeClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('add_to_cart'); ?>");
                } else {
                    $('.big-cart-button-' + elem.id).addClass('addedToCart')
                    $('.big-cart-button-' + elem.id).text("<?php echo site_phrase('added_to_cart'); ?>");
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

    function handleEnrolledButton() {
        $.ajax({
            url: '<?php echo site_url('
            home / isLoggedIn '); ?>',
            success: function (response) {
                if (!response) {
                    window.location.replace("<?php echo site_url('login'); ?>");
                }
            }
        });
    }
    $(document).ready(function () {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() >= 840) {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'horizontal',
                    delay: {
                        show: 500,
                        hide: null
                    },
                    width: 330
                });
            } else {
                $('a.has-popover').webuiPopover({
                    trigger: 'hover',
                    animation: 'pop',
                    placement: 'vertical',
                    delay: {
                        show: 100,
                        hide: null
                    },
                    width: 335
                });
            }
        }
        if ($(".course-carousel")[0]) {
            $(".course-carousel").slick({
                dots: false,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                swipe: false,
                touchMove: false,
                responsive: [{
                        breakpoint: 840,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        },
                    },
                    {
                        breakpoint: 620,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        }
        if ($(".top-istructor-slick")[0]) {
            $(".top-istructor-slick").slick({
                dots: false
            });
        }
    });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"> </script>
<script>
    /*  for more info : http://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html */

    var owl = $(".instructor-carousel");
    owl.owlCarousel(

        {
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            items: 4,
            loop: true,
            center: false,
            rewind: false,

            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 15,
            stagePadding: 10,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.owl-carousel-parent .custom-nav',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                992: {
                    items: 1,
                    nav: true,
                    loop: false
                },
                1280: {
                    items: 4,
                    nav: true,
                    loop: false
                }

            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab',
            autoHeight: false,
            lazyLoad: false

        }
    );
</script>

<script>
    /*  for more info : http://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html */

    var owl2 = $(".association-carousel");
    owl2.owlCarousel(

        {
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            items: 6,
            loop: true,
            center: false,
            rewind: false,

            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 15,
            stagePadding: 10,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.assoc-carousel-parent .custom-nav',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                480: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                992: {
                    items: 3,
                    nav: true,
                    loop: false
                },
                1200: {
                    items: 6,
                    nav: true,
                    loop: false
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab',
            autoHeight: false,
            lazyLoad: false

        }
    );
</script>

<script>
    //$(document).ready(function() {
    $('.flexslider').flexslider({
        animation: "fade",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
    // });
</script>