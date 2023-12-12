<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'] . ' ' . $admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard') echo 'active'; ?>">
			<a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>

		<?php if (has_permission('course')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit' || $page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' || $page_name == 'coupons' || $page_name == 'coupon_add' || $page_name == 'coupon_edit' || $page_name == 'add_bundle' || $page_name == 'manage_course_bundle' || $page_name == 'edit_bundle' || $page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit' || $page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' || $page_name == 'coupons' || $page_name == 'coupon_add' || $page_name == 'coupon_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-archive"></i>
					<span> <?php echo get_phrase('courses'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('course')) : ?>
						<li class="<?php if ($page_name == 'courses' || $page_name == 'course_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/courses'); ?>"><?php echo get_phrase('manage_courses'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('course')) : ?>
						<li class="<?php if ($page_name == 'course_add') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/course_form/add_course'); ?>"><?php echo get_phrase('add_new_course'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (has_permission('category')) : ?>
						<li class="<?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('course_category'); ?></a>
						</li>
					<?php endif; ?>
					<?php if (has_permission('coupon')) : ?>
						<li class="<?php if ($page_name == 'coupons' || $page_name == 'coupon_add' || $page_name == 'coupon_edit') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/coupons'); ?>">
								<?php echo get_phrase('coupons'); ?>
							</a>
						</li>
					<?php endif; ?>

					<?php if (addon_status('course_bundle')) : ?>
						<li class="side-nav-item">
							<a href="javascript: void(0);" aria-expanded="false"><?php echo get_phrase('course_bundle'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'add_bundle') echo 'active'; ?>">
									<a href="<?php echo site_url('addons/bundle/add_bundle_form'); ?>"><?php echo get_phrase('add_new_bundle'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'manage_course_bundle') echo 'active'; ?>">
									<a href="<?php echo site_url('addons/bundle/manage_bundle'); ?>"><?php echo get_phrase('manage_bundle'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
									<a href="<?php echo site_url('addons/bundle/subscription_report/active'); ?>"><?php echo get_phrase('subscription_report'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (addon_status('ebook')) : ?>
	        <li class="side-nav-item">
	            <a href="javascript: void(0);"
	                class="side-nav-link <?php if ($page_name == 'all_ebooks' || $page_name == 'add_ebook' || $page_name == 'ebook_edit') : ?> active <?php endif; ?>">
	                <i class="dripicons-document"></i>
	                <span> <?php echo get_phrase('ebook'); ?> </span>
	                <span class="menu-arrow"></span>
	            </a>
	            <ul class="side-nav-second-level <?php if ($page_name == 'ebook_edit') echo 'in'; ?>" aria-expanded="false">
	                <li class="<?php if ($page_name == 'all_ebooks' || $page_name == 'ebook_edit') echo 'active'; ?>">
	                    <a
	                        href="<?php echo site_url('addons/ebook_manager/ebook'); ?>"><?php echo get_phrase('all_ebooks'); ?></a>
	                </li>
	                <li class="<?php if ($page_name == 'add_ebook') echo 'active'; ?>">
	                    <a
	                        href="<?php echo site_url('ebook_manager/add_ebook'); ?>"><?php echo get_phrase('add_ebook'); ?></a>
	                </li>
	                <li class="<?php if ($page_name == 'ebook_payment_history') echo 'active'; ?>">
	                    <a href="javascript: void(0);"
	                        class="<?php if ($page_name == 'admin_revenue' || $page_name == 'instructor_revenue') : ?> active <?php endif; ?>"
	                        aria-expanded="false"><?php echo get_phrase('payment_history'); ?>
	                        <span class="menu-arrow"></span>
	                    </a>

	                    <ul class="side-nav-third-level" aria-expanded="false">
	                        <li
	                            class="<?php if ($page_name == 'admin_revenue'): ?> active <?php endif; ?>">
	                            <a href="<?php echo site_url('addons/ebook_manager/payment_history/admin_revenue'); ?>"><?php echo get_phrase('admin_revenue'); ?></a>
	                        </li>
	                        <li class="<?php if ($page_name == 'instructor_revenue') echo 'active'; ?>">
	                            <a
	                                href="<?php echo site_url('addons/ebook_manager/payment_history/instructor_revenue'); ?>"><?php echo get_phrase('instructor_revenue'); ?></a>
	                        </li>
	                    </ul>
	                </li>

	                <li class="<?php if ($page_name == 'ebook_category') echo 'active'; ?>">
	                    <a
	                        href="<?php echo site_url('addons/ebook_manager/ebook_category'); ?>"><?php echo get_phrase('category'); ?></a>
	                </li>
	            </ul>
	        </li>
	    <?php endif; ?>

		<?php if (has_permission('enrolment')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
					<i class="dripicons-network-3"></i>
					<span> <?php echo get_phrase('enrolment'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'enrol_history') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/enrol_history'); ?>"><?php echo get_phrase('enrol_history'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'enrol_student') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/enrol_student'); ?>"><?php echo get_phrase('enrol_a_student'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('revenue')) : ?>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'admin_revenue' || $page_name == 'instructor_revenue' || $page_name == 'invoice') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('report'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'admin_revenue') echo 'active'; ?>"> <a href="<?php echo site_url('admin/admin_revenue'); ?>"><?php echo get_phrase('admin_revenue'); ?></a> </li>
					<?php if (get_settings('allow_instructor') == 1) : ?>
						<li class="<?php if ($page_name == 'instructor_revenue') echo 'active'; ?>">
							<a href="<?php echo site_url('admin/instructor_revenue'); ?>">
								<?php echo get_phrase('instructor_revenue'); ?>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('user')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission' || $page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'instructor_payout' || $page_name == 'instructor_settings' || $page_name == 'application_list' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('users'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<?php if (has_permission('admins')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" class="<?php if ($page_name == 'admins' || $page_name == 'admin_add' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>" aria-expanded="false"><?php echo get_phrase('admins'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>">
									<a href="<?php echo site_url('admin/admins'); ?>" class="<?php if ($page_name == 'admins' || $page_name == 'admin_edit' || $page_name == 'admin_permission') : ?> active <?php endif; ?>"><?php echo get_phrase('manage_admins'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'admin_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/admin_form/add_admin_form'); ?>"><?php echo get_phrase('add_new_admin'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>
					<?php if (has_permission('company')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'companies' || $page_name == 'company_edit') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" aria-expanded="false" class="<?php if ($page_name == 'companies' || $page_name == 'company_edit') : ?> active <?php endif; ?>">
								<?php echo get_phrase('companies'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'companies' || $page_name == 'company_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/companies'); ?>"><?php echo get_phrase('manage_companies'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'company_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/company_form/add_company_form'); ?>"><?php echo get_phrase('add_new_company'); ?></a>
								</li>
								
								
							</ul>
						</li>
					<?php endif; ?>

					<?php if (has_permission('instructor')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" aria-expanded="false" class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') : ?> active <?php endif; ?>">
								<?php echo get_phrase('instructors'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructors'); ?>"><?php echo get_phrase('manage_instructors'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'instructor_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>"><?php echo get_phrase('add_new_instructor'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'instructor_payout') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructor_payout'); ?>">
										<?php echo get_phrase('instructor_payout'); ?>
										<span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payouts()->num_rows(); ?></span>
									</a>
								</li>
								<li class="<?php if ($page_name == 'instructor_settings') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructor_settings'); ?>"><?php echo get_phrase('instructor_settings'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'application_list') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/instructor_application'); ?>">
										<?php echo get_phrase('applications'); ?>
										<span class="badge badge-danger-lighten"><?php echo $this->user_model->get_pending_applications()->num_rows(); ?></span>
									</a>
								</li>
							</ul>
						</li>
					<?php endif; ?>

					<?php if (has_permission('student')) : ?>
						<li class="side-nav-item <?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>">
							<a href="javascript: void(0);" aria-expanded="false" class="<?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') : ?> active <?php endif; ?>"><?php echo get_phrase('students'); ?>
								<span class="menu-arrow"></span>
							</a>
							<ul class="side-nav-third-level" aria-expanded="false">
								<li class="<?php if ($page_name == 'users' || $page_name == 'user_edit') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/users'); ?>"><?php echo get_phrase('manage_students'); ?></a>
								</li>
								<li class="<?php if ($page_name == 'user_add') echo 'active'; ?>">
									<a href="<?php echo site_url('admin/user_form/add_user_form'); ?>"><?php echo get_phrase('add_new_student'); ?></a>
								</li>
							</ul>
						</li>
					<?php endif; ?>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (addon_status('offline_payment')) : ?>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'offline_payment_pending' || $page_name == 'offline_payment_approve' || $page_name == 'offline_payment_suspended') : ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('offline_payment'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'offline_payment_pending') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/pending'); ?>">
							<?php echo get_phrase('pending_request'); ?>
							<span class="badge badge-danger-lighten badge-pill float-right"><?php echo get_pending_offline_payment(); ?></span></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'offline_payment_approve') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/approve'); ?>"><?php echo get_phrase('accepted_request'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'offline_payment_suspended') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/offline_payment/suspended'); ?>"><?php echo get_phrase('suspended_request'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('messaging')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/message'); ?>" class="side-nav-link <?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read') echo 'active'; ?>">
					<i class="dripicons-message"></i>
					<span><?php echo get_phrase('message'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php if (has_permission('banner')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/banner'); ?>" class="side-nav-link <?php if ($page_name == 'banner' || $page_name == 'banner_add' || $page_name == 'banner_edit') echo 'active'; ?>">
					<i class="dripicons-photo-group"></i>
					<span><?php echo get_phrase('banner'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php if (has_permission('testimonial')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/testimonial'); ?>" class="side-nav-link <?php if ($page_name == 'testimonial' || $page_name == 'testimonial_add' || $page_name == 'testimonial_edit') echo 'active'; ?>">
					<i class="dripicons-photo-group"></i>
					<span><?php echo get_phrase('testimonial'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php if (has_permission('partner')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/partner'); ?>" class="side-nav-link <?php if ($page_name == 'partner' || $page_name == 'partner_add' || $page_name == 'partner_edit') echo 'active'; ?>">
					<i class="dripicons-photo-group"></i>
					<span><?php echo get_phrase('partner'); ?></span>
				</a>
			</li>
		<?php endif; ?>


		<?php if (has_permission('blog')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'blog_category' || $page_name == 'blog_settings') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'blog' || $page_name == 'blog_add' || $page_name == 'blog_edit' || $page_name == 'blog_category' || $page_name == 'blog_settings' || $page_name == 'instructors_pending_blog') : ?> active <?php endif; ?>">
					<i class="dripicons-blog"></i>
					<span> <?php echo get_phrase('blog'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'blog') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog'); ?>"><?php echo get_phrase('all_blogs'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'instructors_pending_blog') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/instructors_pending_blog'); ?>"><?php echo get_phrase('pending_blog'); ?> <span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_instructors_pending_blog()->num_rows(); ?></span></a>
					</li>

					<li class="<?php if ($page_name == 'blog_category') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog_category'); ?>"><?php echo get_phrase('blog_category'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'blog_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/blog_settings'); ?>"><?php echo get_phrase('blog_settings'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('page')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'page' || $page_name == 'page_add' || $page_name == 'page_edit' || $page_name == 'page_category' || $page_name == 'page_settings') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'page' || $page_name == 'page_add' || $page_name == 'page_edit' || $page_name == 'page_category' || $page_name == 'page_settings' || $page_name == 'instructors_pending_page') : ?> active <?php endif; ?>">
					<i class="dripicons-page"></i>
					<span> <?php echo get_phrase('page'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'page') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/page'); ?>"><?php echo get_phrase('all_pages'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'instructors_pending_page') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/instructors_pending_page'); ?>"><?php echo get_phrase('pending_page'); ?> <span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_instructors_pending_page()->num_rows(); ?></span></a>
					</li>

					<li class="<?php if ($page_name == 'page_category') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/page_category'); ?>"><?php echo get_phrase('page_category'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'page_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/page_settings'); ?>"><?php echo get_phrase('page_settings'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>


		<?php if (addon_status('customer_support')) : ?>
			<li class="side-nav-item <?php if ($page_name == 'tickets' || $page_name == 'support_category' || $page_name == 'support_macro' || $page_name == 'create_ticket') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-help"></i>
					<span> <?php echo get_phrase('customer_support'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'tickets') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/tickets/opened'); ?>"><?php echo get_phrase('ticket_list'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'support_category') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/get_support_categories'); ?>"><?php echo get_phrase('support_category'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'support_macro') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/get_support_macros'); ?>"><?php echo get_phrase('macro'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'create_ticket') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/customer_support/create_support_ticket'); ?>"><?php echo get_phrase('create_ticket'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<?php if (has_permission('addon')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/addon'); ?>" class="side-nav-link <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addons') : ?> active <?php endif; ?>">
					<i class="dripicons-graph-pie"></i>
					<span><?php echo get_phrase('addons'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php if (has_permission('theme')) : ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('admin/theme_settings'); ?>" class="side-nav-link <?php if ($page_name == 'theme_settings') echo 'active'; ?>">
					<i class="dripicons-brush"></i>
					<span><?php echo get_phrase('themes'); ?></span>
				</a>
			</li>
		<?php endif; ?>

		<?php if (has_permission('settings')) : ?>
			<li class="side-nav-item  <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'manage_language' || $page_name == 'about' || $page_name == 'themes') : ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-toggles"></i>
					<span> <?php echo get_phrase('settings'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class="<?php if ($page_name == 'system_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
					</li>

					<li class="<?php if ($page_name == 'frontend_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/frontend_settings'); ?>"><?php echo get_phrase('website_settings'); ?></a>
					</li>

					<?php if (addon_status('certificate')) : ?>
						<li class="<?php if ($page_name == 'certificate_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/certificate/settings'); ?>"><?php echo get_phrase('certificate_settings'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (addon_status('amazon-s3')) : ?>
						<li class="<?php if ($page_name == 's3_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/amazons3/settings'); ?>"><?php echo get_phrase('s3_settings'); ?></a>
						</li>
					<?php endif; ?>

					<?php if (addon_status('live-class')) : ?>
						<li class="<?php if ($page_name == 'live_class_settings') echo 'active'; ?>">
							<a href="<?php echo site_url('addons/liveclass/settings'); ?>"><?php echo get_phrase('live_class_settings'); ?></a>
						</li>
					<?php endif; ?>

					<li class="<?php if ($page_name == 'payment_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'manage_language') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'smtp_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'social_login') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/social_login_settings'); ?>"><?php echo get_phrase('social_login'); ?></a>
					</li>
					<li class="<?php if ($page_name == 'about') echo 'active'; ?>">
						<a href="<?php echo site_url('admin/about'); ?>"><?php echo get_phrase('about'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<li class="side-nav-item <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/manage_profile'); ?>" class="side-nav-link">
				<i class="dripicons-user"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>
		<?php if (has_permission('job')) : ?>
			<?php //if (is_root_admin($admin_id)) : ?>
		<li class="side-nav-item"> <?php //strtolower($this->session->userdata('role');?>
			<a href="<?php echo site_url() . 'admin/job-board'; ?>" class="side-nav-link">
				<i class="dripicons-document-edit"></i>
				<span><?php echo get_phrase('job_board'); ?></span>
			</a>
		</li>
		<li class="side-nav-item"> <?php //strtolower($this->session->userdata('role');?>
			<a href="<?php echo site_url() . 'admin/jobs'; ?>" class="side-nav-link">
				<i class="icon dripicons-briefcase"></i>
				<span><?php echo get_phrase('jobs'); ?></span>
			</a>
		</li>
		<li class="side-nav-item"> <?php //strtolower($this->session->userdata('role');?>
			<a href="<?php echo site_url() . 'admin/departments'; ?>" class="side-nav-link">
				<i class="icon dripicons-user-group"></i>
				<span><?php echo get_phrase('departments'); ?></span>
			</a>
		</li>
		<li class="side-nav-item"> <?php //strtolower($this->session->userdata('role');?>
			<a href="<?php echo site_url() . 'admin/traits'; ?>" class="side-nav-link">
				<i class="icon dripicons-user-group"></i>
				<span><?php echo get_phrase('traits'); ?></span>
			</a>
		</li>
		<?php //endif;  ?>
		<?php endif;  ?>
		<?php /*
		<li class="side-nav-item"> <?php //strtolower($this->session->userdata('role');?>
			<a href="<?php echo site_url() . 'admin/job-filters'; ?>" class="side-nav-link">
				<i class="icon dripicons-briefcase"></i>
				<span><?php echo get_phrase('job_filters'); ?></span>
			</a>
		</li>*/ ?>
	</ul>
</div>