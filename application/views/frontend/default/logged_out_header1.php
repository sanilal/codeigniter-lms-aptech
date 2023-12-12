<section class="menu-area bg-top-header">
  <div class="bg-top-header-elem" >
  <div class="container">
  <div class="row m-0 p-0">
    <div class="col-9 col-sm-6 col-md-6">
      <ul class="btn-group download-apps float-start p-0"> <!-- btn-group -->
        <li><a class="" href="#" style="color:#fff;">Download Apps</a> </li> <!-- button -->
        <li><a href="#"> <i class="fab fa-apple transparent"></i></a> </li>
        <li> <a href="#"><i class="fab fa-google-play transparent"></i></a></li>
      </ul>
      </div>
      <!-- <div class="col-6"> -->
    <div class="col-6 col-sm-6 col-md-3 d-none d-sm-block">
      <ul class="btn-group"> <!-- btn-group -->
        <li><a href="#"><i class="fab fa-facebook-f color-white-fill"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram color-white-fill"></i></a> </li>
        <li> <a href="#"><i class="fab fa-twitter color-white"></i></a></li>
        <li> <a href="#"><i class="fab fa-linkedin-in color-white"></i></a></li>
      </ul>
    </div>
      
    <div class="col-3 col-sm-6 col-md-3">
    <div class="btn-group float-sm-end float-end"><p class="lang-switcher "><a href="#">اَلْعَرَبِيَّةُ</a></p>
    <span class="signin-box-move-desktop-helper"></span>
      <div class="sign-in-box btn-group">

        <a href="<?php echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php echo site_phrase('log_in'); ?></a>

        <a href="<?php echo site_url('home/sign_up'); ?>" class="btn btn-sign-up"><?php echo site_phrase('sign_up'); ?></a>

      </div> 
</div>
  </div>
  
  <!-- </div> -->

</div>
  </div>
</div>
</section>

<section class="menu-area bg-white">
  <div class="container-xl">
    <nav class="navbar navbar-expand-lg bg-white">

    <div class="row m-0 w-100">
        <div class="menu-block">
          <!-- <div class="logo-box">
            <a href="index.htm">
            	<img src="img/logo.png" class="img-fluid">
            </a>
          </div> -->
          <div class="d-flex w-100">
            <nav id='cssmenu'>
              <div id="head-mobile"><h3>Menu</h3></div>
              <div class="button"></div>
              <ul>
                <li class="active"><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url('home/courses'); ?>">COURSES</a></li>
                  <!-- <ul>
                    <li><a href="tiles.htm">Roofing Tiles</a>
                      <ul>
                        <li><a href="elbano.htm">Elbano Type Piccado</a></li>
                      </ul> -->
                    <!-- </li> -->
                    <li><a href="<?php echo site_url('home/instructor_page'); ?>">INSTRUCTORS</a></li>
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

      <a href="<?php //echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php //echo base_url('uploads/system/'.get_frontend_settings1('dark_logo')); ?>" alt="" height="35"></a>

      -->
      <form id="app" action="<?php echo site_url('home/search'); ?>" method="get">
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

      <?php if ($this->session->userdata('admin_login')): ?>
        <div class="instructor-box menu-icon-box ms-auto">
          <div class="icon">
            <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 0px; font-size: 14px; width: max-content; border-radius: 5px; max-height: 40px; line-height: 40px; padding: 0px 10px;"><?php echo site_phrase('administrator'); ?></a>
          </div>
        </div>
      <?php endif; ?>

      <div class="cart-box menu-icon-box" id = "cart_items">
        <?php include 'cart_items.php'; ?>
      </div>

      <?php  include 'menu.php'; ?>
      
      <!-- <span class="signin-box-move-desktop-helper"></span>
      <div class="sign-in-box btn-group">

        <a href="<?php //echo site_url('home/login'); ?>" class="btn btn-sign-in"><?php //echo site_phrase('log_in'); ?></a>

        <a href="<?php //echo site_url('home/sign_up'); ?>" class="btn btn-sign-up"><?php //echo site_phrase('sign_up'); ?></a>

      </div>  -->
      <!--  sign-in-box end-->
    </nav>
  </div>
</section>
