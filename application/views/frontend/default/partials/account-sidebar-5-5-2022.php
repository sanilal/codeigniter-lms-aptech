<ul>
	<li>
		<a href="<?php echo base_url(); ?>candidate" <?php echo acActive($page, 'resumes'); ?>>
			<?php if (setting('enable-multiple-resume') == 'yes') { ?>
			<i class="fa fa-file"></i> <?php echo site_phrase('my_resumes'); ?>
			<?php } else { ?>
			<i class="fa fa-file"></i> <?php echo site_phrase('my_resume'); ?>
			<?php } ?>
		</a>
	</li>
	<li>
		<a href="<?php echo base_url(); ?>candidate/job-applications" <?php echo acActive($page, 'applications'); ?>>
			<i class="fa fa-check"></i> <?php echo site_phrase('job_applications'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo base_url(); ?>candidate/job-favorites" <?php echo acActive($page, 'favorites'); ?>>
			<i class="fa fa-heart"></i> <?php echo site_phrase('favorite_jobs'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo base_url(); ?>candidate/job-referred" <?php echo acActive($page, 'referred'); ?>>
			<i class="fa fa-user-plus"></i> <?php echo site_phrase('referred_jobs'); ?>
		</a>
	</li>
	<li>
		<a href="<?php echo base_url(); ?>candidate/quizes" <?php echo acActive($page, 'quizes'); ?>>
			<i class="fa fa-list"></i> <?php echo site_phrase('quizes'); ?>
		</a>
	</li>
	<!-- <li>
		<a href="<?php //echo base_url(); ?>candidate/profile" <?php //echo acActive($page, 'profile'); ?>>
			<i class="fa fa-user"></i> <?php //echo site_phrase('profile'); ?>
		</a>
	</li>
	<li>
		<a href="<?php //echo base_url(); ?>candidate/password" <?php //echo acActive($page, 'password'); ?>>
			<i class="fa fa-key"></i> <?php //echo site_phrase('password'); ?>
		</a>
	</li>
	<li>
		<a href="<?php// echo base_url(); ?>blogs">
			<i class="fas fa-blog"></i> <?php //echo site_phrase('news_announcements'); ?>
		</a>
	</li>-->
	<li>
		<a href="<?php echo base_url(); ?>jobs">
			<i class="fa fa-briefcase"></i> <?php echo site_phrase('jobs'); ?>
		</a>
	</li> 
	<li>
		<a href="<?php echo base_url(); ?>login/logout">
			<i class="fas fa-sign-out-alt"></i> <?php echo site_phrase('logout'); ?>
		</a>
	</li>
</ul>