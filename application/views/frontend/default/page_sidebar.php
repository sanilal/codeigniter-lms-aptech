<?php
    $popular_categories = $this->crud_model->get_categories_with_page_number(6);
    $latest_pages = $this->crud_model->get_latest_pages(3);
?>
<div style="position: sticky; top: 20px;" class="py-2">
    <h6 class="m-0 px-2 pb-3 fw-700 border-bottom"><?php echo site_phrase('search'); ?></h6>
    <form action="<?php echo site_url('pages'); ?>" method="get" class="w-100">
        <div class="form-floating page-search-box d-flex">
            <input class="form-control page-search-input" value="<?php if(isset($search_string) && !empty($search_string)) echo $search_string; ?>" type="text" id="page_search" placeholder="<?php echo site_phrase('search'); ?>" name="search" onkeyup="show_submit_button(this)" onblur="show_submit_button(this)">
            <button type="submit" id="page_search_button" class="page-search-button" <?php if(!empty($search_string))echo 'style="display: inline-block;"'; ?>><i class="fas fa-search"></i></button>
            <label for="page_search"><?php echo site_phrase('enter_your_search_string'); ?></label>
        </div>
    </form>

    <h6 class="m-0 px-2 pt-5 pb-3 fw-700 border-bottom"><?php echo site_phrase('popular_categories'); ?></h6>
    <div class="list-group">
        <?php foreach($popular_categories as $popular_category): ?>
            <?php $page_category = $this->crud_model->get_page_categories($popular_category['page_category_id'])->row_array(); ?>
            <a href="<?php echo site_url('pages?category='.$page_category['slug']); ?>" class="py-3 px-2 list-group-item-action <?php if(isset($_GET['category']) && $_GET['category'] == $page_category['slug'])echo 'bg-light'; ?>" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"><?php echo $page_category['title']; ?></h6>
                    <?php if($popular_category['page_number'] > 0): ?>
                        <span class="badge bg-primary rounded-pill"><?php echo $popular_category['page_number']; ?></span>
                    <?php endif; ?>
                </div>
                <small class="ellipsis-line-2"><?php echo $page_category['subtitle']; ?></small>
            </a>
        <?php endforeach; ?>
        <a class="text-14px ps-2 my-2 text-muted" href="<?php echo site_url('page/categories'); ?>"><?php echo site_phrase('all_categories'); ?></a>
    </div>

    <h6 class="m-0 px-2 pt-5 pb-3 fw-700 border-bottom"><?php echo site_phrase('latest_pages'); ?></h6>
    <div class="list-group">
        <?php foreach($latest_pages->result_array() as $latest_page): ?>
            <a href="<?php echo site_url('page/details/'.slugify($latest_page['title']).'/'.$latest_page['page_id']); ?>" class="px-2 py-3 bg-transparent list-group-item list-group-item-action">
                <div class="pe-2">
                    <?php $page_banner = 'uploads/page/banner/'.$latest_page['banner']; ?>
                    <?php if(file_exists($page_banner) && is_file($page_banner)): ?>
                        <img src="<?php echo base_url($page_banner); ?>" class="card-img-top" alt="<?php echo $latest_page['title']; ?>">
                    <?php else: ?>
                        <img src="<?php echo base_url('uploads/page/banner/placeholder.png'); ?>" class="card-img-top" alt="<?php echo $latest_page['title']; ?>">
                    <?php endif; ?>
                </div>
                <div>
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="my-1"><?php echo $latest_page['title']; ?></h6>
                    </div>
                    <small class="text-muted ellipsis-line-2"><?php echo strip_tags(htmlspecialchars_decode($latest_page['description'])); ?></small>
                    <p class="mt-2 mb-0 text-12px text-muted"><?php echo get_past_time($latest_page['added_date']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>
        <a class="text-14px ps-2 my-2 text-muted" href="<?php echo site_url('pages'); ?>"><?php echo site_phrase('all_pages'); ?></a>
    </div>
</div>

<script type="text/javascript">
    function show_submit_button(e){
        var search_string = $(e).val();
        if(search_string){
            $('#page_search_button').show();
        }else{
            $('#page_search_button').hide();
        }
    }
</script>