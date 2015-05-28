<!-- Comment item //-->
<div class="comments top">
<?php
  if($picture){
  print $picture;
  }  else {
  print '<img src="'.base_path().path_to_theme().'/images/avatar_small.png" alt="Default User Picture" />';
  }
?>
  <div class="comment_body text-overflow color-font-black">
    <h4>
      <?php print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?>
      <span> <?php print t('on'); ?> <?php print format_date($comment->created, 'custom', 'F d, Y'); ?>, <?php print t('at'); ?> <?php print format_date($comment->created, 'custom', 'H:ia'); ?></span>
      <?php print strip_tags(render($content['links']),'<a>'); ?> <i class="fa fa-level-up"></i>
    </h4>
    <p><?php hide($content['links']); print render($content) ?></p>
  </div>
</div>
<div class="divider_dark"></div>
