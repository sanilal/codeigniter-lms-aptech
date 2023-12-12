<?php $user_details = $this->user_model->get_all_user($page_details['user_id'])->row_array(); ?>
<section class="home-banner-area default-page" id="home-banner-area">
    <!-- <div class="cropped-home-banner" ></div> -->
    <div class="">
        <div class="row">
            <div class="col position-relative">

                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">

                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                      
                            <div class="carousel-item active">
                            <?php $page_banner = 'uploads/page/banner/'.$page_details['banner']; ?>
                        <?php if(file_exists($page_banner) && is_file($page_banner)): ?>
                            <img src="<?php echo base_url($page_banner); ?>" class="card-img-top radius-10" width="100%" alt="<?php echo $page_details['title']; ?>">
                        <?php else: ?>
                            <img src="<?php echo base_url('uploads/page/banner/placeholder.png'); ?>" class="card-img-top radius-10" width="100%" alt="<?php echo $page_details['title']; ?>">
                        <?php endif; ?>
                            <!-- <img src="" alt="" class="img-fluid"> -->
                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    $banner_size = getimagesize("uploads/system/" . get_frontend_settings('banner_image'));
    $banner_ratio = $banner_size[0] / $banner_size[1];
    ?>
    <script type="text/javascript">
      /*   var border_bottom = $('.home-banner-wrap').height() + 242;
        $('.cropped-home-banner').css('border-bottom', border_bottom + 'px solid #f1f7f8');
        mRight = Number("<?php //echo $banner_ratio; ?>") * $('.home-banner-area').outerHeight();
        $('.cropped-home-banner').css('right', (mRight - 65) + 'px'); */
    </script>
</section>
<section class="blank_space p-2 p-md-5"></section>


<section class="mt-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                	<?php /*<div class="col-md-12">
                		<p class="text-muted w-100">
                            <small class="text-muted"><?php echo site_phrase('published'); ?> - <?php echo get_past_time($page_details['added_date']); ?></small>
                        </p>
                		<?php $page_banner = 'uploads/page/banner/'.$page_details['banner']; ?>
                        <?php if(file_exists($page_banner) && is_file($page_banner)): ?>
                            <img src="<?php echo base_url($page_banner); ?>" class="card-img-top radius-10" width="100%" alt="<?php echo $page_details['title']; ?>">
                        <?php else: ?>
                            <img src="<?php echo base_url('uploads/page/banner/placeholder.png'); ?>" class="card-img-top radius-10" width="100%" alt="<?php echo $page_details['title']; ?>">
                        <?php endif; ?>
                	</div>*/ ?>

                	<div class="col-md-12">
                		<h1 class="display-6 mt-4"><?php echo $page_details['title']; ?></h1>
                	</div>

                	<div class="col-md-12 py-3 page_content">
                		<?php echo htmlspecialchars_decode($page_details['description']); ?>
                	</div>

                   <?php /*

                	<div class="col-md-12">
                		<h4 class="mt-4 mb-3 fw-300"><?php echo site_phrase('created_by'); ?></h4>
						<div class="row justify-content-center">
							<div class="col-md-3 top-instructor-img w-sm-100">
								<a href="<?php echo site_url('home/instructor_page/'.$user_details['id']); ?>">
									<img src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>" width="100%">
								</a>
							</div>
							<div class="col-md-9 top-instructor-details text-center text-md-start">
								<h4 class="mb-1 fw-600 v"><a class="text-decoration-none" href="<?php echo site_url('home/instructor_page/'.$user_details['id']); ?>"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></a></h4>
								<p class="fw-500 text-14px w-100"><?php echo $user_details['title']; ?></p>

								<div class="description ellipsis-line-3 text-15px">
									<?php echo $user_details['biography']; ?>
								</div>
								<p class="mt-4">
									<a href="<?php echo site_url('home/instructor_page/'.$page_details['user_id']); ?>"><?php echo site_phrase('view_profile'); ?></a>
								</p>
							</div>
						</div>
                	</div>

                    <div class="col-md-12 pt-4">
                        <?php $page_comments = $this->crud_model->get_page_comments_by_page_id($page_details['page_id']); ?>
                        <div class="row mt-4 mb-3">
                            <div class="col-md-6">
                                <h4 class="fw-300"><?php echo site_phrase('comments'); ?> (<?php echo $page_comments->num_rows() ?>)</h4>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary" onclick="$('#add_your_comment').toggle();"><i class="fas fa-plus"></i> <?php echo site_phrase('add_your_comment'); ?></button>
                            </div>
                        </div>

                        <div class="w-100 d-hidden mt-3" id="add_your_comment">
                            <form action="<?php echo site_url('page/add_page_comment/'.$page_details['page_id']); ?>" method="post">
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="<?php echo site_phrase('enter_your_reply'); ?>" name="comment"></textarea>
                                    <input type="hidden" name="parent_id" value="">
                                </div>
                                <div class="form-group my-3">
                                    <button type="submit" class="btn red py-2 radius-10"><?php echo site_phrase('publish'); ?></button>
                                </div>
                            </form>
                        </div>




                        <?php foreach($page_comments->result_array() as $page_comment): ?>
                            <?php $commenter_details = $this->user_model->get_all_user($page_comment['user_id'])->row_array(); ?>
                            <div class="callout callout-light d-block d-md-flex mt-4 mb-4">
                                <div class="w-auto px-2">
                                    <img width="50px" src="<?php echo $this->user_model->get_user_image_url($commenter_details['id']); ?>" alt="<?php echo $commenter_details['first_name'].' '.$commenter_details['last_name']; ?>">
                                </div>
                                <div class="w-auto px-2">
                                    <h6 class=""><?php echo $commenter_details['first_name'].' '.$commenter_details['last_name']; ?></h6>
                                    <div class="w-100 text-15px"><?php echo nl2br($page_comment['comment']); ?></div>
                                    <div class="w-100 text-13px text-muted mt-2 d-flex">
                                        <?php if($page_comment['updated_date'] > 0): ?>
                                            <span class="d-inline-block me-2"><i class="far fa-clock"></i> <?php echo site_phrase('updated').' '.get_past_time($page_comment['updated_date']); ?></span>
                                        <?php else: ?>
                                            <span class="d-inline-block me-2"><i class="far fa-clock"></i> <?php echo get_past_time($page_comment['added_date']); ?></span>
                                        <?php endif; ?>

                                        <a class="mx-2" href="javascript:;" onclick="$('#comment_add<?php echo $page_comment['page_comment_id']; ?>').toggle(); $('#comment_edit<?php echo $page_comment['page_comment_id']; ?>').hide();"><i class="fas fa-reply"></i></a>

                                        <?php if($this->session->userdata('user_id') == $page_comment['user_id'] || $this->session->userdata('admin_login') == true): ?>
                                            <a class="mx-2" href="javascript:;" onclick="$('#comment_edit<?php echo $page_comment['page_comment_id']; ?>').toggle(); $('#comment_add<?php echo $page_comment['page_comment_id']; ?>').hide();"><i class="far fa-edit"></i></a>
                                            <a class="mx-2" onclick="confirm_modal('<?php echo site_url('page/delete_comment/'.$page_comment['page_comment_id'].'/'.$page_details['page_id']); ?>')" href="javascript:;"><i class="far fa-trash-alt"></i></a>
                                        <?php endif; ?>
                                    </div>

                                    <!--Comment Edit form-->
                                    <div class="w-100 d-hidden mt-3" id="comment_edit<?php echo $page_comment['page_comment_id']; ?>">
                                        <form action="<?php echo site_url('page/update_page_comment/'.$page_comment['page_comment_id']); ?>" method="post">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" placeholder="<?php echo site_phrase('edit_your_reply'); ?>" name="comment"><?php echo $page_comment['comment']; ?></textarea>
                                            </div>
                                            <div class="form-group my-3">
                                                <button type="submit" class="btn red py-2 radius-10"><?php echo site_phrase('save_changes'); ?></button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Reply form -->
                                    <div class="w-100 d-hidden mt-3" id="comment_add<?php echo $page_comment['page_comment_id']; ?>">
                                        <form action="<?php echo site_url('page/add_page_comment/'.$page_details['page_id']); ?>" method="post">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" placeholder="<?php echo site_phrase('enter_your_reply'); ?>" name="comment"></textarea>
                                                <input type="hidden" name="parent_id" value="<?php echo $page_comment['page_comment_id']; ?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <button type="submit" class="btn red py-2 radius-10"><?php echo site_phrase('publish'); ?></button>
                                            </div>
                                        </form>
                                    </div>


                                    <!--Child comment-->
                                    <?php foreach($this->crud_model->get_page_comments_by_parent_id($page_comment['page_comment_id'])->result_array() as $child_comment): ?>
                                        <?php $child_commenter_details = $this->user_model->get_all_user($child_comment['user_id'])->row_array(); ?>
                                        <div class="d-block d-md-flex mt-4">
                                            <div class="w-auto px-2">
                                                <img width="50px" src="<?php echo $this->user_model->get_user_image_url($child_commenter_details['id']); ?>" alt="<?php echo $child_commenter_details['first_name'].' '.$child_commenter_details['last_name']; ?>">
                                            </div>
                                            <div class="w-auto px-2">
                                                <h6 class=""><?php echo $child_commenter_details['first_name'].' '.$child_commenter_details['last_name']; ?></h6>
                                                <div class="w- text-15px"><?php echo nl2br($child_comment['comment']) ?></div>

                                                <div class="w-100 text-13px text-muted mt-2 d-flex">
                                                    <?php if($child_comment['updated_date'] > 0): ?>
                                                        <span class="d-inline-block me-2"><i class="far fa-clock"></i> <?php echo site_phrase('updated').' '.get_past_time($child_comment['updated_date']); ?></span>
                                                    <?php else: ?>
                                                        <span class="d-inline-block me-2"><i class="far fa-clock"></i> <?php echo get_past_time($child_comment['added_date']); ?></span>
                                                    <?php endif; ?>

                                                    <?php if($this->session->userdata('user_id') == $child_comment['user_id'] || $this->session->userdata('admin_login') == true): ?>
                                                        <a class="mx-2" onclick="confirm_modal('<?php echo site_url('page/delete_comment/'.$child_comment['page_comment_id'].'/'.$page_details['page_id']); ?>')" href="javascript:;"><i class="far fa-trash-alt"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    */ ?>
                </div>
            </div>
                
            <?php /* <div class="col-lg-3 py-3 radius-10 bg-white">
                <?php include "page_sidebar.php"; ?>
            </div>*/ ?>
        </div>
    </div>
</section>