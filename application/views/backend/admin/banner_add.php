<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_banner'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'><?php echo get_phrase('add_a_new_banner'); ?></h4>
				<form action="<?php echo site_url('admin/banner/add'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" name="title" id="title" placeholder="<?php echo get_phrase('enter_banner_title'); ?>" required>
					</div>

					<div class="form-group mb-3">
						<label for="banner"><?php echo get_phrase('blog_banner'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<div class="js--image-preview" style="background-image: url('<?php echo base_url('uploads/blog/banner/placeholder.png') ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="banner" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_banner'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="banner" style="visibility:hidden;" type="file" class="image-upload" name="banner" accept="image/*">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="heading"><?php echo get_phrase('heading'); ?></label>
						<textarea class="form-control" name="heading" id="heading" placeholder="<?php echo get_phrase('enter_banner_heading'); ?>" required></textarea>
						<!-- <input type="text" class="form-control" value="<?php //echo $banner['heading']; ?>" name="heading" id="heading" placeholder="<?php //echo get_phrase('enter_banner_heading'); ?>" required> -->
					</div>


					<div class="form-group">
						<label for="subheading"><?php echo get_phrase('subheading'); ?></label>
						<textarea class="form-control" name="subheading" id="subheading" placeholder="<?php echo get_phrase('enter_banner_subheading'); ?>" required></textarea>
						<!-- <input type="text" class="form-control" value="<?php //echo $banner['subheading']; ?>" name="subheading" id="subheading" placeholder="<?php //echo get_phrase('enter_banner_subheading'); ?>" required> -->
					</div>

					<div class="form-group">
						<label for="button1_text"><?php echo get_phrase('button1_text'); ?></label>
						<input type="text" class="form-control" name="button1_text" id="button1_text" placeholder="<?php echo get_phrase('enter_button1_text'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button1_link"><?php echo get_phrase('button1_link'); ?></label>
						<input type="url" class="form-control"  name="button1_link" id="button1_link" placeholder="<?php echo get_phrase('enter_button1_link'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button2_text"><?php echo get_phrase('button2_text'); ?></label>
						<input type="text" class="form-control" name="button2_text" id="button2_text" placeholder="<?php echo get_phrase('enter_button2_text'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button2_link"><?php echo get_phrase('button2_link'); ?></label>
						<input type="url" class="form-control" name="button2_link" id="button2_link" placeholder="<?php echo get_phrase('enter_button2_link'); ?>" required>
					</div>	


					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('add_banner'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>