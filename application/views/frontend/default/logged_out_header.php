<!-- shabab header start -->
      
<!-- get a quote -->
<div class="overlay" id="overlay"></div>
<!-- get a quote Form Panel -->
<div id="slideout" class="slide" >
<div id="contact-tab">
   <a href="#">Open / Close contact form</a>
</div>
<div id="slidecontent">


   <form role="form" id="contactMailForm" action="<?php echo base_url('home/request_quote') ?>" method="post">
      <fieldset>
         <div class="form-group">
            <input type="text" class="form-control" id="inputName" name="inputName" required="" placeholder="Your Name">
         </div>
         <div class="form-group">
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required=""
               placeholder="Email Id">
         </div>
         <div class="form-group">
            <input type="number" class="form-control" id="inputPhone" name="inputPhone" required=""
               placeholder="Telephone">
         </div>

         <div class="form-group">
            <textarea class="form-control" rows="3" id="inputMessage" name="inputMessage" required=""
               placeholder="Message"></textarea>
         </div>
         <button type="submit" class="send-button contact-button">Send</button>
         <button type="reset" class="send-button">Reset</button>

      </fieldset>
   </form>
   <div class="col-xs-12 no-side-pad">
    <p class="mail_response"><?= isset($message) ? $message : ''; ?></p>
</div>
</div>


</div>

	
<script>
  function show_tab(tab){  
  jQuery(tab).parent().animate({right:'0px'}, {queue:false, duration: 500}); // Slide it back in
  jQuery('#overlay').fadeOut('fast'); // fade out the overlay
      jQuery('#contact-tab a').removeClass("active"); // remove active class
      jQuery('#contact-tab').css("display", "block"); // remove active class
      return false; // remove the default link behaviour 
      }
function hide_tab(tab){ 
jQuery(tab).parent().animate({right:'-300px'}, {queue:false, duration: 500}); // Slide it out
      jQuery('#overlay').fadeIn('fast'); // fade in the overlay
      jQuery('#contact-tab a').addClass("active"); // add the active class to the link
      return false; // remove the default link behaviour
      }

  jQuery("#contact-tab").click(function(){
       return (this.tog = !this.tog) ? show_tab(this) : hide_tab(this);
});
/*j(document).ready(function(){
      j(function() {  
    j('#contact-tab').toggle(function() {
      j(this).parent().animate({right:'-300px'}, {queue:false, duration: 500}); // Slide it out
      j('#overlay').fadeIn('fast'); // fade in the overlay
      j('#contact-tab a').addClass("active"); // add the active class to the link
      return false; // remove the default link behaviour
    }, function() {
      j(this).parent().animate({right:'0px'}, {queue:false, duration: 500}); // Slide it back in
      j('#overlay').fadeOut('fast'); // fade out the overlay
      j('#contact-tab a').removeClass("active"); // remove active class
      j('#contact-tab').css("display", "block"); // remove active class
      return false; // remove the default link behaviour
    }).trigger('click');

  });

  });*/
    </script> 
 <!--get a quote-->

<div class="floating-cta">

   <ul class="cta">
      <li class="cta-icon cta-whtsp"><a target="_blank" href="https://wa.me/+971556448331"><i
               class="fab fa-whatsapp"></i></a></li>
      <li class="cta-icon cta-call"><a target="_blank" href="tel:+971556448331"><i class="fa fa-phone"></i></a></li>

   </ul>
</div>
<div class="header-top-wrapper">
   <div class="container">
      <div class="row">
         <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
            <div class="contact-info">
               <ul class="social-line text-center">
                  <li>
                     <a href="<?php echo (get_frontend_settings('top_left_map')); ?>" target="_blank"><i class="fas fa-map-marker-alt"></i><?php echo (get_frontend_settings('top_left_location')); ?>
                     </a>
                  </li>
               </ul> 
            </div>
         </div>
         <div class="col-lg-7 col-md-7 col-sm-4 col-xs-4">
            <div class="marque" role="complementary">
               <div id="custom_html-6" class="widget_text widget_custom_html">
                  <div class="textwidget custom-html-widget">
                     <marquee class="topalert">
                        <?php echo (get_frontend_settings('top_marque')); ?>
                     </marquee>
                  </div>
               </div> 
            </div>
         </div>
         <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 pe-0">
            <div class="arenalogor" role="complementary">
               <div id="custom_html-8" class="widget_text widget_custom_html">
                  <div class="textwidget custom-html-widget">
                     <div class="contact-info">
                        <ul class="social-line text-center">
                           <li>
                              <a href="<?php echo (get_frontend_settings('top_right_map')); ?>" target="_blank" rel="noopener"><i class="fas fa-map-marker-alt"></i><?php echo (get_frontend_settings('top_right_location')); ?>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div> 
            </div>
         </div>
         <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 ps-0">
         <div class="social-links-wrap text-right">
            <div class="social-icon">
               <ul class="list-inline">
                  <li><a href="https://www.facebook.com/aptechuae/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
               </ul>
            </div> 
         </div> 
         </div> 
      </div> 
   </div> 
</div>
<header class="header">
   <div class="brand-container">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12 col-sm-12 sm-navbar-brand">
               <!-- <a class="navbar-brand" href="#"><img src="images/aptech-logo.svg"
alt="Aptech Computer training"></a> -->
               <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                  <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="">
               </a>
               <ul class="top-contact-info d-flex">
                     <li>
                        <h6 class="text-black"><i class="fa fa-phone"></i><a href="tel:<?php echo (get_frontend_settings('top_tel')); ?>"
                              class="text-black"><?php echo (get_frontend_settings('top_tel')); ?></a> </h6>
                     </li>
                     <li>
                        <h6 class="text-black"><i class="fas fa-envelope"></i><a href="mailto:<?php echo (get_frontend_settings('top_email')); ?>"
                              class="text-black"><?php echo (get_frontend_settings('top_email')); ?></a> </h6>
                     </li>
                     <li>
                        <h6 class="text-black"><i class="fas fa-clock"></i> <span class="text-black"><?php echo (get_frontend_settings('top_timing')); ?></span></h6>
                     </li>
                  </ul>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
            </div>
     
         </div>
      </div>
   </div>

   <?php 
// $page_data['courses'] = $courses;
?>
   <div class="header-nav">
     <div class="container"> 
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="main_navbar">
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
                              if($header_sub_category['slug']=='whiz-kids-amp-wonder-teens'){
                                 ?>
                              <li class="red-border-bottom">
                                 <a class="dropdown-item"
                                    href="<?php echo site_url('multimedia-courses/summer-courses-whizkid-wonder-teens'); ?>">Whiz
                                    Kids & Wonder Teens</a>
                              </li>
                              <?php
         }
         else{
            $header_courses = $this->crud_model->filter_course($header_sub_category["id"], 'all', 'all', 'all', 'all');?>
                              <li class="nav-item dropdown"><a
                                    class="dropdown-item <?php echo count($header_courses)>0?'dropdown-toggle':'';?>"
                                    href="<?php echo site_url('home/courses?category=' . $header_sub_category['slug']); ?>"
                                    role="button"
                                    data-bs-toggle="dropdown"><?php echo ($header_sub_category['name']); ?></a>
                                 <?php //var_dump($header_sub_category['slug']whiz-kids-amp-wonder-teens); ?>


                                 <?php if(count($header_courses)>0): ?>
                                 <ul class="dropdown-menu">

                                    <?php foreach ($header_courses as $header_course) : ?>
                                    <li class="red-border-bottom">
                                       <a class="dropdown-item"
                                          href="<?php echo site_url('home/course/' . rawurlencode(slugify($header_course['title'])) . '/' . $header_course['id']); ?>">
                                          <?php echo $header_course['title'];?></a> </li>

                                    <?php endforeach; ?>
                                 </ul>
                                 <?php endif; } ?>

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
            <div class="search-icon"><i class="fas fa-search"></i></div>  
      </nav>
      <div class="search-box-wrap">

<form class="search-form" action="<?php echo site_url('home/search'); ?>" method="get">
                     <input class="form-control" name="query" type="text" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                  </form>
</div>
      <!-- Search box -->
   
          </div>
   </div>
</header>
<!-- shabab header end -->