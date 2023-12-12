<form id="resume-form" class="download-resume-form" method="POST" 
  action="<?php echo base_url(); ?>admin/candidates/resume-download">
 <!--  <input type="hidden" name="csrf_token" value="<?php //echo $this->security->get_csrf_hash(); ?>"> -->
  <input type="hidden" name="ids" value="<?php echo esc_output($resume_id); ?>">
  <button type="submit" class="btn btn-primary"><?php echo site_phrase('download'); ?></button>
</form>

<?php if ($resume_file) { ?>
<a href="<?php echo candidateThumb($resume_file); ?>" title="Download" class="btn btn-primary">
  <?php echo site_phrase('download'); ?> File
</a>
<?php } ?>
<br /><br />
<?php if ($resume) { ?>
<table>
  <tr>
    <td>
        <?php //echo $resume['image'];?>
      <img src="<?php echo $resume['image']?candidateThumb($resume['image'].'.jpg'):base_url().'uploads/user_image/placeholder.png'; ?>" height="70" 
         />
    </td>
    <td>
      <h2 class="job-board-resume-section-title">
        <?php echo esc_output($resume['first_name'].' '.$resume['last_name'], 'html'); ?>
      </h2>
      <p>
        <?php 
          echo esc_output(($resume['email'] ? $resume['email'] : '') 
              . ($resume['phone1'] ? ", ".$resume['phone1'] : '')
              . ($resume['phone2'] ? ", ".$resume['phone2'] : '')
              . ($resume['address'] ? "<br /> ".$resume['address'] : '')
              . ($resume['city'] ? ", ".$resume['city'] : '')
              . ($resume['state'] ? ", ".$resume['state'] : '')
              . ($resume['country'] ? ", ".$resume['country'] : ''), 'raw')
        ; ?>
      </p>
    </td>
  </tr>
</table>
<h2 class="job-board-resume-section-title"><?php echo site_phrase('objective'); ?></h2>
<p><?php echo esc_output($resume['objective'], 'html'); ?></p>
<h2 class="job-board-resume-section-title"><?php echo site_phrase('job_experiences'); ?></h2>
<?php if ($resume['experiences']) { ?>
<div class="circles-content-element circles-list">
  <ol>
  <?php foreach ($resume['experiences'] as $experience) { ?>
    <li>
    <p class="job-board-resume-job-title"><?php echo esc_output($experience['title'], 'html'); ?> - <?php echo esc_output($experience['company'], 'html'); ?></p>
    <p class="job-board-resume-job-duration">
      (<?php echo timeFormat($experience['from']); ?> - <?php echo timeFormat($experience['to']); ?>)
    </p>
    <p class="job-board-resume-job-description"><?php echo esc_output($experience['description'], 'html'); ?></p>
    </li>
  <?php } ?>
  </ol>
</div>
<?php } else { ?>
  <p><?php echo site_phrase('there_are_no_experiences'); ?></p>
<?php } ?>

<h2 class="job-board-resume-section-title"><?php echo site_phrase('qualifications'); ?></h2>
<?php if ($resume['qualifications']) { ?>
<div class="circles-content-element circles-list">
  <ol>
  <?php foreach ($resume['qualifications'] as $qualification) { ?>
    <li>
    <p class="job-board-resume-job-title"><?php echo esc_output($qualification['title'], 'html'); ?> - <?php echo esc_output($qualification['institution'], 'html'); ?></p>
    <p class="job-board-resume-job-duration">
      (<?php echo timeFormat(esc_output($qualification['from'], 'html')); ?> - <?php echo timeFormat(esc_output($qualification['to'], 'html')); ?>)
    </p>
    <p class="job-board-resume-job-description">
      <?php echo esc_output($qualification['marks'], 'html'); ?> Out of <?php echo esc_output($qualification['out_of'], 'html'); ?>
    </p>
    </li>
  <?php } ?>
  </ol>
</div>
<?php } else { ?>
  <p><?php echo site_phrase('there_are_no_qualifications'); ?></p>
<?php } ?>

<h2 class="job-board-resume-section-title"><?php echo site_phrase('languages'); ?></h2>
<?php if ($resume['languages']) { ?>
<div class="circles-content-element circles-list">
  <ol>
  <?php foreach ($resume['languages'] as $language) { ?>
    <li>
    <p class="job-board-resume-job-title"><?php echo esc_output($language['title'], 'html'); ?> (<?php echo esc_output($language['proficiency'], 'html'); ?>)</p>
    </li>
  <?php } ?>
  </ol>
</div>
<?php } else { ?>
  <p><?php echo site_phrase('there_are_no_languages'); ?></p>
<?php } ?>

<h2 class="job-board-resume-section-title"><?php echo site_phrase('achievements'); ?></h2>
<?php if ($resume['achievements']) { ?>
<div class="circles-content-element circles-list">
  <ol>
  <?php foreach ($resume['achievements'] as $achievement) { ?>
    <li>
    <p class="job-board-resume-job-title"><?php echo esc_output($achievement['title'], 'html'); ?> (<?php echo esc_output($achievement['type'], 'html'); ?>)</p>
    <?php if ($achievement['date']) { ?>
    <p class="job-board-resume-job-duration">
      (<?php echo esc_output($achievement['date'], 'html'); ?>)
    </p>
    <?php } ?>
    <?php if ($achievement['link']) { ?>
    <p class="job-board-resume-job-duration">
      (<?php echo esc_output($achievement['link'], 'html'); ?>)
    </p>
    <?php } ?>
    <p class="job-board-resume-job-description">
      <?php echo esc_output($achievement['description'], 'html'); ?>
    </p>
    </li>
  <?php } ?>
  </ol>
</div>
<?php } else { ?>
  <p><?php echo site_phrase('there_are_no_achievements'); ?></p>
<?php } ?>

<h2 class="job-board-resume-section-title"><?php echo site_phrase('references'); ?></h2>
<?php if ($resume['references']) { ?>
<div class="circles-content-element circles-list">
  <ol>
  <?php foreach ($resume['references'] as $reference) { ?>
    <li>
    <p class="job-board-resume-job-title"><?php echo esc_output($reference['title'], 'html'); ?> (<?php echo esc_output($reference['relation'], 'html'); ?>)</p>
    <?php if ($reference['company']) { ?>
    <p class="job-board-resume-job-duration">
      (<?php echo esc_output($reference['company'], 'html'); ?>)
    </p>
    <?php } ?>
    <?php if ($reference['phone']) { ?>
    <p class="job-board-resume-job-duration">
      (<?php echo esc_output($reference['phone'], 'html'); ?>)
    </p>
    <?php } ?>
    <p class="job-board-resume-job-duration">
      (<?php echo esc_output($reference['email'], 'html'); ?>)
    </p>
    </li>
  <?php } ?>
  </ol>
</div>
<?php } else { ?>
  <p><?php echo site_phrase('there_are_no_references'); ?></p>
<?php } ?>

<?php } else { ?>
  <p>No Resume Found</p>
<?php } ?>