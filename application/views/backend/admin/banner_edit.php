<div class="row ">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body py-2">
				<h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('edit_banner'); ?>
				</h4>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>


<div class="row ">
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<h4 class='mb-3'><?php echo get_phrase('edit_your_banner'); ?></h4>
				<form action="<?php echo site_url('admin/banner/update/' . $banner['banner_id']); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="title"><?php echo get_phrase('title'); ?></label>
						<input type="text" class="form-control" value="<?php echo $banner['title']; ?>" name="title" id="title" placeholder="<?php echo get_phrase('enter_banner_title'); ?>" required>
					</div>
				


					<div class="form-group mb-3">
						<label for="banner"><?php echo get_phrase('banner'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<?php $banner_image = 'uploads/banners/' . $banner['banner']; ?>
								<?php
								if (file_exists($banner_image) && is_file($banner_image)) :
									$banner_image = base_url($banner_image);
								else :
									$banner_image = base_url('uploads/banners/placeholder.png');
								endif;
								?>
								<div class="js--image-preview" style="background-image: url('<?php echo $banner_image; ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="banner" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_banner'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="banner" style="visibility:hidden;" type="file" class="image-upload" name="banner" accept="image/*">
								</div>
							</div>
						</div>
					</div>
					<?php //var_dump($banner);?>
					<div class="form-group">
						<label for="heading"><?php echo get_phrase('heading'); ?></label>
						<textarea class="form-control" name="heading" id="heading" placeholder="<?php echo get_phrase('enter_banner_heading'); ?>" required><?php echo $banner['heading']; ?></textarea>
						<!-- <input type="text" class="form-control" value="<?php //echo $banner['heading']; ?>" name="heading" id="heading" placeholder="<?php //echo get_phrase('enter_banner_heading'); ?>" required> -->
					</div>


					<div class="form-group">
						<label for="subheading"><?php echo get_phrase('subheading'); ?></label>
						<textarea class="form-control" name="subheading" id="subheading" placeholder="<?php echo get_phrase('enter_banner_subheading'); ?>" required><?php echo $banner['subheading']; ?></textarea>
						<!-- <input type="text" class="form-control" value="<?php //echo $banner['subheading']; ?>" name="subheading" id="subheading" placeholder="<?php //echo get_phrase('enter_banner_subheading'); ?>" required> -->
					</div>

					<div class="form-group">
						<label for="button1_text"><?php echo get_phrase('button1_text'); ?></label>
						<input type="text" class="form-control" value="<?php echo $banner['button1_text']; ?>" name="button1_text" id="button1_text" placeholder="<?php echo get_phrase('enter_button1_text'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button1_link"><?php echo get_phrase('button1_link'); ?></label>
						<input type="url" class="form-control" value="<?php echo $banner['button1_link']; ?>" name="button1_link" id="button1_link" placeholder="<?php echo get_phrase('enter_button1_link'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button2_text"><?php echo get_phrase('button2_text'); ?></label>
						<input type="text" class="form-control" value="<?php echo $banner['button2_text']; ?>" name="button2_text" id="button2_text" placeholder="<?php echo get_phrase('enter_button2_text'); ?>" required>
					</div>

					<div class="form-group">
						<label for="button2_link"><?php echo get_phrase('button2_link'); ?></label>
						<input type="url" class="form-control" value="<?php echo $banner['button2_link']; ?>" name="button2_link" id="button2_link" placeholder="<?php echo get_phrase('enter_button2_link'); ?>" required>
					</div>	

    <h2>jQueryUI color picker without bootstrap</h2>

    <div class="frm-colorpicker">
        

            <div class="input-row">

                Hex Value : <input id="colorpicker-full"
                    class="input-field" type="text" />

            </div>

					<div class="form-group mt-4">
						<button class="btn btn-success" ><?php echo get_phrase('update_banner'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <script>
function divide() {
            var txt;
            txt = document.getElementById('subheading').value;
            var text = txt.split(".");
            var str = text.join('.</br>');
            document.getElementById('subheading').value=str;
			console.log(str);
        }
</script> -->

