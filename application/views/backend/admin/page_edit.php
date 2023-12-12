<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('edit_page'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row ">
    <div class="col-md-10">
    	<div class="card">
    		<div class="card-body">
    			<h4 class='mb-3'><?php echo get_phrase('edit_your_page'); ?></h4>
		    	<form action="<?php echo site_url('admin/page/update/'.$page['page_id']); ?>" method="post" enctype="multipart/form-data">
		    		<div class="form-group">
		    			<label for="title"><?php echo get_phrase('title'); ?></label>
		    			<input type="text" class="form-control" value="<?php echo $page['title']; ?>" name="title" id="title" placeholder="<?php echo get_phrase('enter_page_title'); ?>" required>
		    		</div>

		    		<div class="form-group">
		    			<label for="page_category_id"><?php echo get_phrase('category'); ?></label>
		    			<select class="form-control select2" data-toggle="select2" name="page_category_id" id="page_category_id" required>
		    				<option value=""><?php echo get_phrase('select_a_category'); ?></option>
		    				<?php foreach($this->crud_model->get_page_categories()->result_array() as $category): ?>
		    					<option value="<?php echo $category['page_category_id']; ?>" <?php if($category['page_category_id'] == $page['page_category_id'])echo 'selected'; ?>><?php echo $category['title']; ?></option>
		    				<?php endforeach; ?>
		    			</select>
		    		</div>

		    		<div class="form-group">
                        <label for="keywords"><?php echo get_phrase('keywords'); ?></label>
                        <input type="text" class="form-control bootstrap-tag-input" id = "keywords" name="keywords" data-role="tagsinput" style="width: 100%;" value="<?php echo $page['keywords']; ?>" />
                        <small class="text-muted"><?php echo site_phrase('click_the_enter_button_after_writing_your_keyword'); ?></small>
                    </div>

		    		<div class="form-group">
		    			<label for="summernote-basic"><?php echo get_phrase('description'); ?></label>
		    			<textarea name="description" id="summernote-basic"><?php echo htmlspecialchars_decode($page['description']); ?></textarea>
		    		</div>

		    		<div class="form-group mb-3">
						<label for="banner"><?php echo get_phrase('page_banner'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<?php $page_banner = 'uploads/page/banner/'.$page['banner']; ?>
                                <?php
                                	if(file_exists($page_banner) && is_file($page_banner)):
                                		$page_banner = base_url($page_banner);
                                	else:
                                		$page_banner = base_url('uploads/page/banner/placeholder.png');
                                	endif;
                                ?>
								<div class="js--image-preview" style="background-image: url('<?php echo $page_banner; ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="banner" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_banner'); ?> <br> <small>(2000 x 500)</small> </label>
									<input id="banner" style="visibility:hidden;" type="file" class="image-upload" name="banner" accept="image/*">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group mb-3">
						<label for="thumbnail"><?php echo get_phrase('page_thumbnail'); ?></label>
						<div class="wrapper-image-preview" style="margin-left: -6px;">
							<div class="box" style="width: 300px;">
								<?php $page_thumbnail = 'uploads/page/thumbnail/'.$page['thumbnail']; ?>
                                <?php
                                	if(file_exists($page_thumbnail) && is_file($page_thumbnail)):
                                		$page_thumbnail = base_url($page_thumbnail);
                                	else:
                                		$page_thumbnail = base_url('uploads/page/thumbnail/placeholder.png');
                                	endif;
                                ?>
								<div class="js--image-preview" style="background-image: url('<?php echo $page_thumbnail; ?>'); background-color: #F5F5F5; background-size: cover; background-position: center;"></div>
								<div class="upload-options">
									<label for="thumbnail" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('choose_a_thumbnail'); ?> <br> <small>(800 x 500)</small> </label>
									<input id="thumbnail" style="visibility:hidden;" type="file" class="image-upload" name="thumbnail" accept="image/*">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group mt-4">
						<label><?php echo get_phrase('do_you_want_to_mark_it_as_popular'); ?>?</label><br>
						<input type="checkbox" id="is_popular" value="1" name="is_popular" <?php if($page['is_popular'] == 1) echo 'checked'; ?>>
						<label for="is_popular"><?php echo get_phrase('mark_as_popular'); ?></label>
					</div>

					<div class="form-group mt-4">
						<button class="btn btn-success"><?php echo get_phrase('update_page'); ?></button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>
</div>