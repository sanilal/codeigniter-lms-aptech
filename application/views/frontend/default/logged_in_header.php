<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
?>
<!-- shabab header start -->
<header class="header">
              <div class="brand-container">
                <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-3 col-sm-12">
                       <!--  <a class="navbar-brand" href="#">
                          <img src="images/aptech-logo.svg" alt="Aptech Computer training" >
                        </a> -->
                        <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                        <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" >
                      </a>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="top-search d-flex">
                           <form class="d-flex">
                              <input class="form-control" name="query" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                          </form>
                            <ul class="top-contact-info d-flex">
                             <li>
                                <h6 class="text-black"><i class="fa fa-phone"></i><a href="tel:+971503954409" class="text-black">+971 50 395 4409</a> </h6>
                             </li>
                             <li>
                                <h6 class="text-black"><i class="fas fa-envelope"></i><a href="mailto:enquiry@aptech.ae" class="text-black">enquiry@aptech.ae</a> </h6>
                             </li>
                             <li>
                                <h6 class="text-black"><i class="fas fa-clock"></i> <span class="text-black">9 AM to 9 PM</span></h6>
                             </li>
                          </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                      <div class="top-right-container d-flex">
                        <ul class="social-line pull-right">
                           <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a> </li>
                       </ul>
                        <ul class="top-location pull-left">
                           <li><a href="https://www.google.com/maps/place/Aptech+Computer+Education+Institute/@25.2559224,55.2953233,19z/data=!4m12!1m6!3m5!1s0x3e5f433cf1d37647:0xe6d7148762a30968!2sAptech+Computer+Education+Institute!8m2!3d25.2559941!4d55.2957574!3m4!1s0x3e5f433cf1d37647:0xe6d7148762a30968!8m2!3d25.2559941!4d55.2957574" target="_blank"><i class="fas fa-map-marker-alt"></i> Dubai, UAE </a></li>
                           <li><a href="https://www.google.com/maps/place/Aptech+Computer+Training+Institute/@25.3314828,55.3905677,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f5be7f3efc60b:0xb92341de4812ae20!8m2!3d25.3315974!4d55.3926928" target="_blank" rel="noopener"><i class="fas fa-map-marker-alt"></i> Sharjah, UAE </a> </li>
                       </ul>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
   <div class="header-nav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main_navbar">
         <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link <?php if ($page_name == 'home') echo 'active'; ?>" aria-current="page"
                        href="<?php echo site_url(''); ?>">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($page_name == 'about_us') echo 'active'; ?>"
                        href="<?php echo site_url('about-aptech'); ?>">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle <?php if ($page_name == 'courses') echo 'active'; ?>"
                        href="<?php echo site_url('home/courses'); ?>" role="button" data-bs-toggle="dropdown">
                        Courses
                     </a>
                     <?php $header_categories = $this->crud_model->get_categories()->result_array(); ?>
                     <ul class="dropdown-menu">
                        <?php foreach ($header_categories as $header_category) : ?>
                        <?php $header_sub_categories = $this->crud_model->get_sub_categories($header_category['id']); //var_dump($header_sub_categories ) ?>
                        <li class="nav-item dropdown">
                           <a class="dropdown-item <?php echo count($header_sub_categories)>0?'dropdown-toggle':'';?>"
                              href="#" role="button" data-bs-toggle="dropdown">
                              <?php echo($header_category['name']); ?>
                           </a>

                           <?php 
   
   
   
   if(count($header_sub_categories)>0):
      ?>
                           <ul class="dropdown-menu">

                              <?php
      foreach ($header_sub_categories as $header_sub_category) : ?>
                              <?php  
         $header_courses = $this->crud_model->filter_course($header_sub_category["id"], 'all', 'all', 'all', 'all');?>
                              <li class="nav-item dropdown"><a
                                    class="dropdown-item <?php echo count($header_courses)>0?'dropdown-toggle':'';?>"
                                    href="<?php echo site_url('home/courses?category=' . $header_sub_category['slug']); ?>"
                                    role="button"
                                    data-bs-toggle="dropdown"><?php echo ($header_sub_category['name']); ?></a>
                                 <?php //echo'--'.($sub_category['name']).'<br>'; ?>


                                 <?php if(count($header_courses)>0): ?>
                                 <ul class="dropdown-menu">

                                    <?php foreach ($header_courses as $header_course) : ?>
                                    <li class="red-border-bottom">
                                       <a class="dropdown-item"
                                          href="<?php echo site_url('home/course/' . rawurlencode(slugify($header_course['title'])) . '/' . $header_course['id']); ?>">
                                          <?php echo $header_course['title'];?></a> </li>

                                    <?php endforeach; ?>
                                 </ul>
                                 <?php endif; ?>
                                 <?php endforeach;
            else: echo '';
         endif;?>
                              </li>
                           </ul>


                           <?php //$header_cat_count++;
      endforeach;?>

                     </ul>

                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Corporate</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link  <?php if ($page_name == 'whizkid') echo 'active'; ?>"
                        href="<?php echo site_url('multimedia-courses/summer-courses-whizkid-wonder-teens'); ?>">Summer
                        Courses</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link <?php if ($page_name == 'contact') echo 'active'; ?>"
                        href="<?php echo site_url('contact-us'); ?>">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </div>
          </header>
<!-- shabab header end -->
<section class="menu-area bg-top-header">
  <div class="" >
      <!--bg-top-header-elem-->
  <div class="container-xl">
  <div class="row m-0 p-0">
    <div class="col-9 col-sm-6 col-md-6">
      <ul class="btn-group download-apps float-start p-0"> <!-- btn-group -->
        <li><a class="" href="#" style="color:#fff;">Download Apps</a> </li> <!-- button -->
        <li><a href="#"> <i class="fab fa-apple transparent"></i></a> </li>
        <li> <a href="#"><i class="fab fa-google-play transparent"></i></a></li>
      </ul>
      </div>
      <!-- <div class="col-6"> -->
    <?php /* <div class="col-6 col-sm-6 col-md-3 d-none d-sm-block">
      <ul class="btn-group"> <!-- btn-group -->
        <li><a href="#"><i class="fab fa-facebook-f color-white-fill"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram color-white-fill"></i></a> </li>
        <li> <a href="#"><i class="fab fa-twitter color-white"></i></a></li>
        <li> <a href="#"><i class="fab fa-linkedin-in color-white"></i></a></li>
      </ul>
    </div>*/ ?>
    <div class="col-6 col-sm-6 col-md-2 d-none d-sm-block">
        </div>
      
      <div class="col-3 col-sm-6 col-md-4">
         <div class="btn-group float-sm-end float-end ms-5"><p class="lang-switcher "><a href="#">اَلْعَرَبِيَّةُ</a></p>
    
</div>
        <ul class="btn-group float-sm-end float-end"> <!-- btn-group -->
        <li><a href="#"><i class="fab fa-facebook-f color-white-fill"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram color-white-fill"></i></a> </li>
        <li> <a href="#"><i class="fab fa-twitter color-white"></i></a></li>
        <li> <a href="#"><i class="fab fa-linkedin-in color-white"></i></a></li>
      </ul>
   
  </div>
  
  <!-- </div> -->

</div>
  </div>
</div>
</section>
<a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>

<section class="menu-area bg-white">
  <div class="container-xl">
    <nav class="navbar navbar-expand-lg bg-white">

    <div class="row m-0 w-dynamic-md-100">
        <div class="menu-block ps-lg-4">
          <!-- <div class="logo-box">
            <a href="index.htm">
            	<img src="img/logo.png" class="img-fluid">
            </a>
          </div> -->
          <div class="d-block">
          <div class="row m-0 p-0 d-lg-none" style="background: #0c0910;">
                                 <div class="col-6 col-sm-6 col-md-6">
                                      <ul class="mobile-header-buttons ps-4" >
                <li ><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                </div>
                </ul>
                <div class="col-6 col-sm-6 col-md-6">
      <ul class="btn-group-mobile"> <!-- btn-group -->
        <li><a href="#"><i class="fab fa-facebook-f color-white-fill"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram color-white-fill"></i></a> </li>
        <li> <a href="#"><i class="fab fa-twitter color-white"></i></a></li>
        <li> <a href="#"><i class="fab fa-linkedin-in color-white"></i></a></li>
      </ul>
      </div> 
                     </div> 
                
            

            <?php //include 'menu.php'; ?>
            <nav id='cssmenu'>
              <div id="head-mobile"><h3>Menu</h3></div>
              <div class="button"></div>
              <ul>
                <li class="active">
                    <a href="<?php echo site_url(); ?>">Home</a></li>
                <li>
                    <a href="<?php echo site_url('home/courses'); ?>">COURSES</a></li>
                  <!-- <ul>
                    <li><a href="tiles.htm">Roofing Tiles</a>
                      <ul>
                        <li><a href="elbano.htm">Elbano Type Piccado</a></li>
                      </ul> -->
                    <!-- </li> -->
                    <li><a href="<?php //echo site_url('home/instructors'); ?>#">INSTRUCTORS</a></li>
                      <!-- <ul>
                        <li><a href="master-cop.htm">Master Coppo</a></li>
                      </ul> -->
                    <!-- </li> -->
                    <li><a href="#">TESTIMONIALS</a></li>

                  <!-- </ul> -->
                <!-- </li> -->
                <li><a href="#">PRICING</a></li>
                <!-- <li><a href="projects.htm">Our Projects</a></li> -->
                <li><a href="#">CONTACT</a></li>
                <li class="d-lg-none"><a class="radius-bottom-10 py-3" href="<?php echo site_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('log_out'); ?></a></li>
              </ul> 
            </nav>
            <?php //include 'menu.php'; ?> 
    
            <!-- <div class="quote-btn">
              <a href="">
                get a quote <img src="" class="img-fluid pl-1"></a>
            </div> -->
          </div>
        </div> 
      </div> 

      <!-- <ul class="mobile-header-buttons">
        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav"><?php //echo site_url('menu'); ?><span></span></a></li>
        <li><a class="mobile-search-trigger" href="#mobile-search"><?php //echo site_url('search'); ?><span></span></a></li>
      </ul>

      <a href="<?php //echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php //echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>

      -->
      <form id="app" action="<?php echo site_url('home/search'); ?>" method="get" class="ms-auto">
<label :data-state="state" for="search">
  <input type="text" placeholder="<?php echo site_phrase('search_for_courses'); ?>" @click="state = 'opan'" @blur="state='close'"/>
  <i class="fa fa-search" @click="" aria-hidden="true"></i>
</label>
</form>
<span> | </span>

      <!-- <form class="inline-form me-auto" action="<?php //echo site_url('home/search'); ?>" method="get">
        <div class="input-group search-box mobile-search">
          <input type="text" name = 'query' class="form-control" placeholder="<?php //echo site_phrase('search_for_courses'); ?>">
          <div class="input-group-append">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form> -->
       

      <?php /* if ($this->session->userdata('admin_login')): ?>
        <div class="instructor-box menu-icon-box ms-auto">
          <div class="icon">
            <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('administrator'); ?></a>
          </div>
        </div>
      <?php endif; */ ?>

      <div class="cart-box menu-icon-box" id = "cart_items">
        <?php include 'cart_items.php'; ?>
      </div>
      

      <?php  include 'menu.php'; ?>

      <div class="user-box menu-icon-box">
                <div class="icon">
                    <a href="javascript::">
                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="dropdown user-dropdown corner-triangle top-right radius-10">
                    <ul class="user-dropdown-menu radius-10">

                        <li class="dropdown-user-info">
                            <a href="javascript:;" class="radius-top-10">
                                <div class="clearfix">
                                    <div class="user-image float-start">
                                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            <span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                            <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>
                                        </div>
                                        <div class="user-email">
                                            <span class="email"><?php echo $user_details['email']; ?></span>
                                            <span class="welcome"><?php echo site_phrase("welcome_back"); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        

                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>"><i class="far fa-gem"></i><?php echo site_phrase('my_courses'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="far fa-heart"></i><?php echo site_phrase('my_wishlist'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>"><i class="far fa-envelope"></i><?php echo site_phrase('my_messages'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i><?php echo site_phrase('purchase_history'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i><?php echo site_phrase('user_profile'); ?></a></li>

                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('jobs/listing'); ?>"><i class="fas fa-search"></i><?php echo site_phrase('search_job'); ?></a></li>

                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('candidate/job-applications'); ?>"><i class="fas fa-briefcase"></i><?php echo site_phrase('job_portal'); ?></a></li>
                        
                        <?php if (addon_status('customer_support')) : ?>
                            <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><i class="fas fa-life-ring"></i><?php echo site_phrase('support'); ?></a></li>
                        <?php endif; ?>

                        <li class="dropdown-user-logout user-dropdown-menu-item radius-bottom-10"><a class="radius-bottom-10 py-3" href="<?php echo site_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('log_out'); ?></a></li>
                    </ul>
                </div>
            </div>
    <span class="signin-box-move-desktop-helper"></span>
      <div class="sign-in-box btn-group d-none">

        <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php echo site_phrase('log_in'); ?></a>

        <a href="<?php echo site_url('home/sign_up'); ?>" class="btn btn-sign-up"><?php echo site_phrase('sign_up'); ?></a>

      </div>
       <?php if (get_settings('allow_instructor') == 1) : ?>
                <div class="instructor-box menu-icon-box ms-md-4">
                    <div class="icon">
                        <a href="<?php echo site_url('user'); ?>" style="border: 1px solid transparent; margin: 0px;     padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;"><?php echo site_phrase('instructor'); ?></a>
                    </div>
                </div>
            <?php endif; ?>
      
      <!-- <span class="signin-box-move-desktop-helper"></span>
      <div class="sign-in-box btn-group">

        <a href="<?php //echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php //echo site_phrase('log_in'); ?></a>

        <a href="<?php //echo site_url('home/sign_up'); ?>" class="btn btn-sign-up"><?php //echo site_phrase('sign_up'); ?></a>

      </div>  -->
      <!--  sign-in-box end-->
    </nav>
  </div>
</section>

<?php /*
<section class="menu-area bg-white">
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg navbar-light">

            <ul class="mobile-header-buttons">
                <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
            </ul>

            <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                <img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="35">
            </a>

            <?php include 'menu.php'; ?>


            <form class="inline-form" action="<?php echo site_url('home/search'); ?>" method="get" style="width: 100%;">
                <div class="input-group search-box mobile-search">
                    <input type="text" name='query' class="form-control" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
                    <div class="input-group-append">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <?php if (get_settings('allow_instructor') == 1) : ?>
                <div class="instructor-box menu-icon-box ms-md-4">
                    <div class="icon">
                        <a href="<?php echo site_url('user'); ?>" style="border: 1px solid transparent; margin: 0px;     padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;"><?php echo site_phrase('instructor'); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="instructor-box menu-icon-box">
                <div class="icon">
                    <a href="<?php echo site_url('home/my_courses'); ?>" style="border: 1px solid transparent; margin: 0px;     padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;"><?php echo site_phrase('my_courses'); ?></a>
                </div>
            </div>

            <div class="wishlist-box menu-icon-box" id="wishlist_items">
                <?php include 'wishlist_items.php'; ?>
            </div>

            <div class="cart-box menu-icon-box" id="cart_items">
                <?php include 'cart_items.php'; ?>
            </div>



            <div class="user-box menu-icon-box">
                <div class="icon">
                    <a href="javascript::">
                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="dropdown user-dropdown corner-triangle top-right radius-10">
                    <ul class="user-dropdown-menu radius-10">

                        <li class="dropdown-user-info">
                            <a href="javascript:;" class="radius-top-10">
                                <div class="clearfix">
                                    <div class="user-image float-start">
                                        <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="">
                                    </div>
                                    <div class="user-details">
                                        <div class="user-name">
                                            <span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                            <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>
                                        </div>
                                        <div class="user-email">
                                            <span class="email"><?php echo $user_details['email']; ?></span>
                                            <span class="welcome"><?php echo site_phrase("welcome_back"); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>"><i class="far fa-gem"></i><?php echo site_phrase('my_courses'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="far fa-heart"></i><?php echo site_phrase('my_wishlist'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>"><i class="far fa-envelope"></i><?php echo site_phrase('my_messages'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i><?php echo site_phrase('purchase_history'); ?></a></li>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i><?php echo site_phrase('user_profile'); ?></a></li>

                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('jobs/listing'); ?>"><i class="fas fa-search"></i><?php echo site_phrase('search_job'); ?></a></li>
                        
                        <?php if (addon_status('customer_support')) : ?>
                            <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><i class="fas fa-life-ring"></i><?php echo site_phrase('support'); ?></a></li>
                        <?php endif; ?>

                        <li class="dropdown-user-logout user-dropdown-menu-item radius-bottom-10"><a class="radius-bottom-10 py-3" href="<?php echo site_url('login/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('log_out'); ?></a></li>
                    </ul>
                </div>
            </div>



            <span class="signin-box-move-desktop-helper"></span>
            <div class="sign-in-box btn-group d-none">

                <button type="button" class="btn btn-sign-in" data-toggle="modal" data-target="#signInModal">Log In</button>

                <button type="button" class="btn btn-sign-up" data-toggle="modal" data-target="#signUpModal">Sign Up</button>

            </div> <!--  sign-in-box end -->


        </nav>
    </div>
</section>
*/ ?>