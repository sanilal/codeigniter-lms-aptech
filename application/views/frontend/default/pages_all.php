<section class="mt-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 g-4">
                    <div class="col-12 d-flex">
                        <div class="text-end pt-1 w-100">
                            <?php if(isset($search_string) || isset($_GET['category'])):
                                echo site_phrase('total').' '.$total_rows.' '.site_phrase('results');
                            else:
                                echo site_phrase('total').' '.$total_rows.' '.site_phrase('pages');
                            endif; ?>
                        </div>
                    </div>
                    <?php foreach($pages->result_array() as $page): ?>
                        <?php $user_details = $this->user_model->get_all_user($page['user_id'])->row_array(); ?>
                        <div class="col">
                            <div class="card radius-10">
                                <?php $page_thumbnail = 'uploads/page/thumbnail/'.$page['thumbnail']; ?>
                                <?php if(file_exists($page_thumbnail) && is_file($page_thumbnail)): ?>
                                    <img src="<?php echo base_url($page_thumbnail); ?>" class="card-img-top radius-top-10" alt="<?php echo $page['title']; ?>">
                                <?php else: ?>
                                    <img src="<?php echo base_url('uploads/page/thumbnail/placeholder.png'); ?>" class="card-img-top radius-top-10" alt="<?php echo $page['title']; ?>">
                                <?php endif; ?>
                                <div class="card-body pt-4">
                                    <p class="card-text">
                                        <small class="text-muted"><?php echo site_phrase('created_by'); ?> - <a href="<?php echo site_url('home/instructor_page/'.$page['user_id']); ?>"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></a></small>
                                    </p>
                                    <h5 class="card-title"><a href="<?php echo site_url('page/details/'.slugify($page['title']).'/'.$page['page_id']); ?>"><?php echo $page['title']; ?></a></h5>
                                    <p class="card-text ellipsis-line-3">
                                        <?php echo strip_tags(htmlspecialchars_decode($page['description'])); ?>
                                    </p>
                                    
                                    <a class="fw-600" href="<?php echo site_url('page/details/'.slugify($page['title']).'/'.$page['page_id']); ?>"><?php echo site_phrase('more_details'); ?></a>
                                    
                                    <p class="card-text mt-2 mb-0">
                                        <small class="text-muted text-12px"><?php echo site_phrase('published'); ?> - <?php echo get_past_time($page['added_date']); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if(!$total_rows): ?>
                        <div class="col-md-12 py-5 my-5 text-center">
                            <h5 class="text-muted"><?php echo site_phrase('no_data_found'); ?>!</h5>
                            <p class="text-13px text-muted"><?php echo site_phrase('search_again_with_something_else'); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-12">
                        <div class="col-12">
                            <nav><?php echo $this->pagination->create_links(); ?></nav>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-lg-3 py-3 radius-10 bg-white">
                <?php include "page_sidebar.php"; ?>
            </div>
        </div>
    </div>
</section>