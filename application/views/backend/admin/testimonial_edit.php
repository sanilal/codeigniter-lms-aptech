<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('edit_testimonial'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'><?php echo get_phrase('edit_your_testimonial'); ?></h4>
				<form action="<?php echo site_url('admin/testimonial/update/' . $testimonial['testimonial_id']); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" value="<?php echo $testimonial['title']; ?>" name="title" id="title" placeholder="<?php echo get_phrase('enter_testimonial_title'); ?>" required>
					</div>

					<div class="form-group">
		    			<label for="summernote-basic"><?php echo get_phrase('description'); ?></label>
		    			<textarea name="description" id="summernote-basic"><?php echo htmlspecialchars_decode($testimonial['description']); ?></textarea>
		    		</div>

					<div class="form-group">
						<label for="title"><?php echo get_phrase('testimonial_author'); ?></label>
						<input type="text" class="form-control" value="<?php echo $testimonial['author']; ?>" name="testimonial_author" id="testimonial_author" placeholder="<?php echo get_phrase('enter_testimonial_autor'); ?>" required>
					</div>

					<div class="form-group">
						<label for="title"><?php echo get_phrase('testimonial_position'); ?></label>
						<input type="text" class="form-control" value="<?php echo $testimonial['position']; ?>" name="testimonial_author_position" id="testimonial_author_position" placeholder="<?php echo get_phrase('enter_testimonial_author_position'); ?>" required>
					</div>



					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('update_testimonial'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>