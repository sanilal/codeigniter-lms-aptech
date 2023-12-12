<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('add_partner'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'><?php echo get_phrase('add_a_new_partner'); ?></h4>
				<form action="<?php echo site_url('admin/partner/add'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" name="title" id="title" placeholder="<?php echo get_phrase('enter_partner_title'); ?>" required>
					</div>

					<div class="form-group mb-3">
						<label for="logo"><?php echo get_phrase('logo'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<div class="js--image-preview" style="background-image: url('<?php echo base_url('uploads/blog/partner/placeholder.png') ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="logo" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_logo'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="logo" style="visibility:hidden;" type="file" class="image-upload" name="logo" accept="image/*">
								</div>
							</div>
						</div>
					</div>


					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('add_partner'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>