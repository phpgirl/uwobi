<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;

  $style = 'large'; //image style
  if(isset($node->field_images)){
  $imageone = $node->field_images['und'][0]['uri'];
  }else{
  $imageone = '';
  }

  if(!$page){ ?>
  <!--Item-->
  <div class="row">
    <div class="col-md-12">
      <!--Item Blog-->
      <div class="item_blog top wow flipInX animated" data-wow-duration="1.8s">
        <!--img_blog-->
        <div class="img_blog">
          <?php print theme('image_style', array('path' => $imageone, 'style_name' => 'image_318x303', 'attributes'=>array('alt'=>$title))) ?>
          <!--hover_img_blog-->
          <div class="hover_img_blog center">
            <a href="<?php print $node_url; ?>">
              <i class="fa fa-plus"></i>
            </a>
          </div>
          <!--End hover_img_blog-->
        </div>
        <!-- End img_blog-->

        <!-- info blog-->
        <div class="info_blog">
          <!--date_blog-->
          <div class="date_blog">
            <h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
            <ul>
              <li><i class="fa fa-user color-black"></i><a href="<?php print $node_url; ?>"> <?php print strip_tags($name) ?></a></li>
              <li><i class="fa fa-comments color-black"></i><a href="<?php print $node_url; ?>"> <?php print $comment_count.' '.t('Comments') ?> </a></li>
              <li><i class="fa fa-calendar color-black"></i> <?php print format_date($node->created, 'custom', 'l jS F');?></li>
            </ul>
          </div>
          <!--End date_blog-->
          <!--text_blog-->
          <div class="text_blog text-overflow">
            <a href="<?php print $node_url; ?>">
            <?php
              hide($content['links']);
              hide($content['field_tags']);
              hide($content['field_images']);
              hide($content['comments']);
              hide($content['field_categories']);
              print render($content);
            ?>
            </a>
          </div>
          <!--End text_blog-->
        </div>
        <!-- End Info blog-->
      </div>
      <!--End Item Blog-->
    </div>
  </div>
  <!--Item-->
  <?php } else {
  ?>
  <!-- Mini SLide -->
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php
      $i = 0;
      foreach($node->field_images['und'] as $key => $value){
       if ($i == 0) {
        $active = 'active';
      } else {
        $active = '';
      }
      print '<li data-target="#carousel-example-generic" data-slide-to="'.$i.'" class="'.$active.'"></li>';
      $i++;
      }
    ?>
    </ol>
    <div class="carousel-inner">
      <?php
        $i = 0;
        foreach($node->field_images['und'] as $key => $value){
          if ($i == 0) {
            $active = 'active';
          } else {
            $active = '';
          }
          $image_uri  = $node->field_images['und'][$key]['uri'];
          print '<div class="item '.$active.'">'.theme('image_style', array('path' => $image_uri, 'style_name' => 'image_848x415', 'attributes'=>array('alt'=>$title))).'</div>';
          $i++;
          }
      ?>
    </div>

  </div>
  <!-- End Mini SLide -->
  <!-- Info Post -->
  <div class="row">
    <div class="col-md-12 top color-dark-font">
  <?php
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_images']);
    hide($content['comments']);
    hide($content['field_categories']);
    hide($content['field_sidebar_style']);
    print render($content);
  ?>
    </div>
    <!-- End Info Post -->
  </div>
  <?php if (!empty($node->field_tags)) { ?>
  <h3 class="top"><?php print t('Tags') ?></h3>
  <ul class="tags">
    <?php
      foreach($node->field_tags['und'] as $tags) {
        $tid = $tags['taxonomy_term']->tid;
        $name = $tags['taxonomy_term']->name;
        $taxonomy_term_url = drupal_lookup_path('alias', 'taxonomy/term/'.$tid);
        print '<li><a href="'.$taxonomy_term_url.'">'.$name.'</a></li>';
      }
    ?>
  </ul>
    <?php } ?>
    <!-- End main content -->
  <?php print render($content['comments']);?>
  <?php
  }

?>