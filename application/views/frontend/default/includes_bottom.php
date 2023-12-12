<script src="<?php echo base_url() . 'assets/frontend/default/js/vendor/modernizr-3.5.0.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/vendor/jquery-3.2.1.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/popper.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/bootstrap.min.js'; ?>"></script>

<?php if ($page_name == "home" || $page_name == "instructor_page") : ?>
	<script src="<?php echo base_url() . 'assets/frontend/default/js/slick.min.js'; ?>"></script>
	<script src="<?php echo base_url() . 'assets/frontend/default/js/jquery.webui-popover.min.js'; ?>"></script>
<?php endif; ?>

<?php if ($page_name == "user_profile") : ?>
	<script src="<?php echo base_url() . 'assets/frontend/default/js/tinymce.min.js'; ?>"></script>
<?php endif; ?>

<script src="<?php echo base_url() . 'assets/frontend/default/js/main.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/jquery.form.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/js/jQuery.tagify.js'; ?>"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
	</script>

<?php endif; ?>

<?php if ($this->session->flashdata('error_message') != "") : ?>

	<script type="text/javascript">
		toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
	</script>

<?php endif; ?>

<?php if ($this->session->flashdata('info_message') != "") : ?>

	<script type="text/javascript">
		toastr.info('<?php echo $this->session->flashdata("info_message"); ?>');
	</script>

<?php endif; ?>
<script type="text/javascript">
	$(function () {
      $('[data-bs-toggle="tooltip"]').tooltip()
    });
    if($('.tagify').height()){
    	$('.tagify').tagify();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script src="<?php echo base_url('assets/frontend/default/js/menu.js'); ?>"></script>
<!-- search -->
<script>
var app = new Vue({
el: '#app',
data:{
state: "close"
}
});
</script>
	
	
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
<script src="<?php echo base_url(); ?>assets/frontend/default/js/jquery-ui.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.1/masonry.pkgd.js"></script>	

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.js"></script>
<script>

//Initialize Masonry inside Bootstrap 3 Tab component 

(function( $ ) {

var $container = $('.masonry-container');
$container.imagesLoaded( function () {
$container.masonry({
columnWidth: '.starter-card',
itemSelector: '.starter-card'
});
});

//Reinitialize masonry inside each panel after the relative tab link is clicked - 
$('a[data-toggle=tab]').each(function () {
var $this = $(this);

$this.on('shown.bs.tab', function () {

$container.imagesLoaded( function () {
$container.masonry({
columnWidth: '.starter-card',
itemSelector: '.starter-card'
});
});

}); //end shown
});  //end each

$('a[data-toggle="tab"]').on('shown.bs.tab', function(event) {
$(this).closest('.nav').find('.active').removeClass('active');
$(event.target).parent().addClass('active');

/* $container.imagesLoaded( function () {
$container.masonry({
columnWidth: '.starter-card',
itemSelector: '.starter-card'
});
}); */
}).first().trigger('shown.bs.tab');

})(jQuery);


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
<script>
$(".carousel").swipe({
                swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                    if (direction == 'left') $(this).carousel('next');
                    if (direction == 'right') $(this).carousel('prev');
                },
                allowPageScroll: "vertical" 
            });
</script>


							<?php /*	<script src="<?php echo base_url(); ?>assets/frontend/default/js/dropify.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/bar-rating.min.js"></script>

								<script src="<?php echo base_url(); ?>assets/frontend/default/plugins/iCheck/iCheck.js"></script>
								  <!-- JS Language Variables file -->
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/lang.js"></script>
								<!-- Files For Functionalities -->
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/app.js"></script>
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/account.js"></script>
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/general.js"></script>
  <script src="<?php echo base_url(); ?>assets/frontend/default/js/dot_menu.js"></script>
*/ ?>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
   </script> -->
 <script src="<?php echo base_url(); ?>assets/frontend/default/js/custom.js"></script> 
   <script>
      new bootnavbar();
   </script>
