<!-- shabab header start -->
      
<!-- get a quote -->
<div class="overlay" id="overlay"></div>
<!-- get a quote Form Panel -->
<div id="slideout" class="slide" >
<div id="contact-tab">
    <a href="#">Open / Close contact form</a>
  </div>
  <div id="slidecontent">
    
        
        <form role="form" id="contactMailForm" method="post" onsubmit="return checkform(this)">
        <fieldset>
        <p>Send a feedback to us</p>
  <div class="form-group">
    <input type="text" class="form-control" id="name" name="name" required="" placeholder="Your Name" >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="co_name" name="co_name" required="" placeholder="Company Name">
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" required="" placeholder="Email Id">
  </div>
  <div class="form-group">
    <input type="number" class="form-control" id="telephone" name="telephone" required="" placeholder="Telephone">
  </div>
  <div class="form-group">
    <select id="project_type" name="project_type" required="" >
        <option value="">Please Choose Type of Project</option>
        <option value="Corporate Website">Corporate Website</option>
        <option value="Content Managed Website">Content Managed Website</option>
        <option value="E-Commerce Website">E-Commerce Website</option>
        <option value="CRM Solutions">CRM Solutions</option>
        <option value="Blog Setup">Blog Setup</option>
        <option value="Flash Website">Flash Website</option>
        <option value="Website Redesign">Website Redesign</option>
        <option value="Logo &amp; Graphic design">Logo &amp; Graphic design</option>
        <option value="Other Custom Requirement">Other Custom Requirement</option>
        <option value="Website Maintenance">Website Maintenance</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="country" name="country" required="" placeholder="Country">
  </div>
  
  <div class="form-group">
    <textarea class="form-control" rows="3"  id="project_desc" name="project_desc" required="" placeholder="Project Description"></textarea>
  </div>
  <button type="submit" class="send-button contact-button">Send</button>
   <button type="reset" class="send-button">Reset</button>           

</fieldset>
</form>
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
<header class="header">
   <div class="brand-container">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3 col-sm-12 sm-navbar-brand">
               <!-- <a class="navbar-brand" href="#"><img src="images/aptech-logo.svg"
alt="Aptech Computer training"></a> -->
               <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#">
                  <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('dark_logo')); ?>" alt="">
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
            </div>
            <div class="col-md-6 col-sm-12">
               <div class="top-search d-flex">
                  <!-- <form class="d-flex">
<input class="form-control" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
</form> -->
                  <form class="d-flex" action="<?php echo site_url('home/search'); ?>" method="get">
                     <input class="form-control" name="query" type="text" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                  </form>
                  <ul class="top-contact-info d-flex">
                     <li>
                        <h6 class="text-black"><i class="fa fa-phone"></i><a href="tel:+971503954409"
                              class="text-black">+971 50 395 4409</a> </h6>
                     </li>
                     <li>
                        <h6 class="text-black"><i class="fas fa-envelope"></i><a href="mailto:enquiry@aptech.ae"
                              class="text-black">enquiry@aptech.ae</a> </h6>
                     </li>
                     <li>
                        <h6 class="text-black"><i class="fas fa-clock"></i> <span class="text-black">9 AM to 9
                              PM</span></h6>
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
                     <li><a href="https://www.google.com/maps/place/Aptech+Computer+Education+Institute/@25.2559224,55.2953233,19z/data=!4m12!1m6!3m5!1s0x3e5f433cf1d37647:0xe6d7148762a30968!2sAptech+Computer+Education+Institute!8m2!3d25.2559941!4d55.2957574!3m4!1s0x3e5f433cf1d37647:0xe6d7148762a30968!8m2!3d25.2559941!4d55.2957574"
                           target="_blank"><i class="fas fa-map-marker-alt"></i> Dubai, UAE </a></li>
                     <li><a href="https://www.google.com/maps/place/Aptech+Computer+Training+Institute/@25.3314828,55.3905677,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f5be7f3efc60b:0xb92341de4812ae20!8m2!3d25.3315974!4d55.3926928"
                           target="_blank" rel="noopener"><i class="fas fa-map-marker-alt"></i> Sharjah, UAE </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php 
// $page_data['courses'] = $courses;
?>
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
         </div>
      </nav>
   </div>
</header>
<!-- shabab header end -->