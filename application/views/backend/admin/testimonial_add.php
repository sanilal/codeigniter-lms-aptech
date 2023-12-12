<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_testimonial'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'><?php echo get_phrase('add_a_new_testimonial'); ?></h4>
				<form action="<?php echo site_url('admin/testimonial/add'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" name="title" id="title" placeholder="<?php echo get_phrase('enter_testimonial_title'); ?>" required>
					</div>

					<div class="form-group">
		    			<label for="summernote-basic"><?php echo get_phrase('description'); ?></label>
		    			<textarea name="description" id="summernote-basic"></textarea>
		    		</div>

					<div class="form-group">
                        <label for="testimonial_author"><?php echo get_phrase('testimonial_author'); ?></label>
                        <input type="text" class="form-control bootstrap-tag-input" id = "testimonial_author" name="testimonial_author"  style="width: 100%;"/>
                    </div>
					<div class="form-group">
                        <label for="testimonial_author_position"><?php echo get_phrase('testimonial_author_position'); ?></label>
                        <input type="text" class="form-control bootstrap-tag-input" id = "testimonial_author_position" name="testimonial_author_position"  style="width: 100%;"/>
                    </div>

		    		
				<?php /*
					<div class="form-group mb-3">
						<label for="testimonial"><?php echo get_phrase('blog_testimonial'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<div class="js--image-preview" style="background-image: url('<?php echo base_url('uploads/blog/testimonial/placeholder.png') ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="testimonial" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_testimonial'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="testimonial" style="visibility:hidden;" type="file" class="image-upload" name="testimonial" accept="image/*">
								</div>
							</div>
						</div>
					</div>
					*/ ?>


					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('add_testimonial'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>