<?php

/***************************/
/**** REGISTER WIDGETS *****/
/***************************/

function register_widget_areas() {

  // Homepage (Top)
  register_sidebar(array(
    'name'          => 'Homepage (Top)',
    'id'            => 'homepage-top',
    'description'   => 'Widgets added here will appear near the top of the Homepage.',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

} add_action( 'widgets_init', 'register_widget_areas' );


/***************************/
/***** CREATE WIDGETS ******/
/***************************/


// Video Feature

class video_feature extends WP_Widget {
  function __construct() {
    parent::__construct(
      'video_feature',
      __('Video Feature'),
      array(
        'description' => __( 'Display a featured video.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $title = get_field('title', 'widget_' . $widget_id);
    $video_description = get_field('video_description', 'widget_' . $widget_id);
    $video_url = get_field('video_url', 'widget_' . $widget_id);
    $background_color = get_field('background_color', 'widget_' . $widget_id);
    $cta_text = get_field('cta_text', 'widget_' . $widget_id);
    $cta_url = get_field('cta_url', 'widget_' . $widget_id);
    preg_match('/src="(.+?)"/', $video_url, $matches);
    $src = $matches[1];
    $params = array(
      'enablejsapi'    => 1,
      'iv_load_policy' => 3,
      'rel'            => 0,
      'modestbranding' => 1,
    );
    $new_src = add_query_arg($params, $src);
    $video_url = str_replace($src, $new_src, $video_url); ?>
    <section class="featured-video-widget content-block gray-bg" id="featvideo">
      <div class="row">
        <div class="large-8 columns">
          <div class="video"><?php echo $video_url; ?></div>
        </div>
        <div class="large-4 columns">
          <h3><?php echo $title; ?></h3>
          <p><?php echo $video_description; ?></p>
          <a class="button darkgray-button outline-button mt30px" href="<?php echo $cta_url; ?>"><?php echo $cta_text; ?></a>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'video_feature' );
});



// Text with CTA

class text_with_cta extends WP_Widget {
  function __construct() {
    parent::__construct(
      'text_with_cta',
      __('Text with CTA'),
      array(
        'description' => __( 'Display text and a call to action.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $title = get_field('title', 'widget_' . $widget_id);
    $description = get_field('description', 'widget_' . $widget_id);
    $cta_text = get_field('cta_text', 'widget_' . $widget_id);
    $cta_url = get_field('cta_url', 'widget_' . $widget_id); ?>
    <section class="content-block-small gray-bg" id="feattext">
      <div class="row">
        <div class="medium-10 medium-push-1 columns tac">
          <?php if ($title) echo '<h4 class="mb15px">'.$title.'</h4>'; ?>
          <?php if ($description) echo '<p>'.$description.'</p>'; ?>
          <?php if ($cta_url && $cta_text) echo '<a class="button white-button outline-button mt25px" href="'.$cta_url.'">'.$cta_text.'</a>'; ?>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'text_with_cta' );
});



// Apply Block

class apply_block extends WP_Widget {
  function __construct() {
    parent::__construct(
      'apply_block',
      __('Apply Block'),
      array(
        'description' => __( 'Display apply block.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $action_cta_heading = get_field('action_cta_heading', 'widget_' . $widget_id);
    $action_cta_body_text = get_field('action_cta_body_text', 'widget_' . $widget_id);
    $button_val = 'action_cta_buttons'; ?>
    <section class="content-block-small clearfix blue-bg" id="applyblock">
      <div class="row">
        <div class="medium-8 medium-push-2 columns tac">
          <h3><?php echo $action_cta_heading; ?></h3>
          <p><?php echo $action_cta_body_text; ?></p>
          <?php include('wp-content/themes/nytedu/partials/buttons-widgets.php'); ?>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'apply_block' );
});


// Financial Aid Callout

class financial_aid_callout extends WP_Widget {
  function __construct() {
    parent::__construct(
      'financial_aid_callout',
      __('Financial Aid Callout'),
      array(
        'description' => __( 'Display Financial Aid Callout.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $callout_size = get_field('fa_callout_size', 'widget_' . $widget_id);
    $heading = get_field('fa_callout_heading', 'widget_' . $widget_id);
    $body_text = get_field('fa_callout_body_text', 'widget_' . $widget_id);
    $cta_1_text = get_field('fa_callout_cta_1_text', 'widget_' . $widget_id);
    $cta_1_url = get_field('fa_callout_cta_1_url', 'widget_' . $widget_id);
    $cta_2_text = get_field('fa_callout_cta_2_text', 'widget_' . $widget_id);
    $cta_2_url = get_field('fa_callout_cta_2_url', 'widget_' . $widget_id);
    if (($heading && $body_text) && ($cta_1_text && $cta_1_url) || ($cta_2_text && $cta_2_url)):
      if ($callout_size == 'small'): ?>
      <section class="fa-callout fa-callout-small content-block-x-small gray-bg">
        <div class="row">
          <div class="medium-8 large-7 columns">
            <div class="fa-callout-text">
              <div class="fa-callout-heading"><?php echo $heading; ?></div>
              <?php echo $body_text; ?>
            </div>
          </div>
          <?php if ($cta_1_text && $cta_1_url || $cta_2_text && $cta_2_url): ?>
          <div class="medium-4 large-5 columns fa-callout-buttons">
            <div class="button-group">
              <?php
              if ($cta_1_text && $cta_1_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_1_url.'">'.$cta_1_text.'</a></span>';
              if ($cta_2_text && $cta_2_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_2_url.'">'.$cta_2_text.'</a></span>'; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php elseif ($callout_size == 'medium'): ?>
      <section class="fa-callout fa-callout-medium content-block-small gray-bg">
        <div class="row">
          <div class="medium-5 columns">
            <h2><?php echo $heading; ?></h2>
            <div class="button-group small-hide">
              <?php
              if ($cta_1_text && $cta_1_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_1_url.'">'.$cta_1_text.'</a></span>';
              if ($cta_2_text && $cta_2_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_2_url.'">'.$cta_2_text.'</a></span>'; ?>
            </div>
          </div>
          <div class="medium-7 columns"><?php echo $body_text; ?></div>
          <div class="columns medium-and-up-hide">
            <div class="button-group">
              <?php
              if ($cta_1_text && $cta_1_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_1_url.'">'.$cta_1_text.'</a></span>';
              if ($cta_2_text && $cta_2_url) echo '<span><a class="button outline-button darkgray-button" href="'.$cta_2_url.'">'.$cta_2_text.'</a></span>'; ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>
    <?php endif; ?>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'financial_aid_callout' );
});



// Four Column Text Block

class four_col_text_block extends WP_Widget {
  function __construct() {
    parent::__construct(
      'four_col_text_block',
      __('Four Column Text Block'),
      array('description' => __( 'Display a four column text block.'))
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $id = get_field('section_id', 'widget_' . $widget_id);
    $heading = get_field('section_heading', 'widget_' . $widget_id);
    $subheading = get_field('section_subheading', 'widget_' . $widget_id);
    if (have_rows('col_content', 'widget_' . $widget_id)): ?>
    <section class="four-col-text-block content-block"<?php if ($id) echo ' id="'.$id.'"'; ?>>
      <?php if ($heading || $subheading): ?>
      <header class="row">
        <div class="large-8 large-push-2 columns tac">
          <?php if ($heading) echo '<h3>'.$heading.'</h3>'; ?>
          <?php if ($subheading) echo '<p>'.$subheading.'</p>'; ?>
        </div>
      </header>
      <?php endif; ?>
      <div class="row">
        <ul class="unstyled-list small-block-1 medium-block-grid-2 large-block-grid-4">
          <?php while (have_rows('col_content', 'widget_' . $widget_id)): the_row();
            $col_heading = get_sub_field('col_content_heading', 'widget_' . $widget_id);
            $col_desc = get_sub_field('col_content_desc', 'widget_' . $widget_id);
            $col_cta_text = get_sub_field('col_content_cta_text', 'widget_' . $widget_id);
            $col_cta_url = get_sub_field('col_content_cta_url', 'widget_' . $widget_id);
          ?>
          <li>
            <h5><?php echo $col_heading; ?></h5>
            <p><?php echo $col_desc; ?></p>
            <a class="button lightgray-button" href="<?php echo $col_cta_url; ?>"><?php echo $col_cta_text; ?></a>
          </li>
          <?php endwhile; ?>
          </ul>
        </div>
      </section>
      <?php endif; ?>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'four_col_text_block' );
});



// More Info block

class more_info_block extends WP_Widget {
  function __construct() {
    parent::__construct(
      'more_info_block',
      __('More Info Block'),
      array(
        'description' => __( 'Display a More Info Block.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $program = get_field('program');
    if (have_rows('more_info_boxes', 'widget_' . $widget_id)):
    echo '<section class="more-info-block content-block tac';
    if ($program && $program->slug == 'summer-academy') echo ' black-bg';
    else if (is_page_template('gapyear-home-template.php')) echo ' lightgray-bg';
    else echo ' black-bg';
    echo '" id="moreinfo">'; ?>
      <div class="row">
        <div class="columns">
          <h3>More Information</h3>
        </div>  
        <div class="columns">
          <ul class="unstyled-list">
            <?php while (have_rows('more_info_boxes', 'widget_' . $widget_id)): the_row();
              $more_info_box_text = get_sub_field('more_info_box_text', 'widget_' . $widget_id);
              $more_info_box_url = get_sub_field('more_info_box_url', 'widget_' . $widget_id);
              $more_info_box_class = get_sub_field('more_info_box_class', 'widget_' . $widget_id);
            ?>
            <li>
              <?php
              echo '<a class="button outline-button';
              if ($program && $program->slug == 'summer-academy') echo ' white-button';
              else if (is_page_template('gapyear-home-template.php')) echo ' darkgray-button';
              else echo ' white-button';
              if ($more_info_box_class) echo ' '.$more_info_box_class;
              echo '" href="'.$more_info_box_url.'">'.$more_info_box_text.'</a>'; ?>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'more_info_block' );
});



// Related Courses

class related_courses extends WP_Widget {
  function __construct() {
    parent::__construct(
      'related_courses',
      __('Related Courses'),
      array(
        'description' => __( 'Display related courses.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $heading = get_field('heading', 'widget_' . $widget_id); ?>
    <section class="course-related-posts content-block-small">
      <?php if ($heading): ?>
      <div class="row mb15px">
        <div class="columns tac">
          <h6><?php echo $heading; ?></h6>
        </div>
      </div>
      <?php endif; ?>
      <div class="row">
        <div class="posts-list columns nopad">
          <ul class="unstyled-list inline-list">
            <?php
            $overriden_num = 0;
            if (have_rows('override_content', 'widget_' . $widget_id)):
            while (have_rows('override_content', 'widget_' . $widget_id)): the_row();
              $overriden_num = get_row_index();
              $content = get_sub_field('content_select');
              $url = get_the_permalink($content->ID);
              $title = get_the_title($content->ID);
              $featured_image = get_field('featured_image', $content->ID);
              $intro_desc = get_field('intro_description', $content->ID);
              $start_date = get_field('event_start_date', $content->ID);
              $end_date = get_field('event_end_date', $content->ID);
              $start_time = str_replace(array('am','pm'),array('a.m.','p.m.'), get_field('event_start_time', $content->ID));
              $end_time = str_replace(array('am','pm'),array('a.m.','p.m.'), get_field('event_end_time', $content->ID));
            ?>
            <li class="medium-6 large-4 columns">
              <div class="hover-scale-shallow">
                <a href="<?php echo $url; ?>">
                  <div class="posts-list-image">
                    <div class="img-block" style="background-image: url('<?php echo $featured_image['sizes']['medium']; ?>');"></div>
                  </div>
                  <?php
                  if ($title) echo '<div class="ellipsis"><h5 data-ellipsis="2">'.$title.'</h5></div>';
                  if ($intro_desc) echo '<div class="ellipsis"><p data-ellipsis="3">'.$intro_desc.'</p></div>';
                  if ($start_date) {
                    echo '<p class="mt10px">' . $start_date;
                    if ($start_time) echo ' | ' .$start_time;
                    echo '</p>';
                  } ?>
                </a>
              </div>
            </li>
            <?php endwhile; endif; ?>
            <?php
            $posts_num = 3 - $overriden_num;
            if ($posts_num != 0):
              $program = get_field('program', 'widget_' . $widget_id);
              $course_id = get_queried_object_id();
              $topic_ids = wp_get_post_terms($course_id, 'topic', array('fields' => 'slugs'));
              $location_ids = wp_get_post_terms($course_id, 'location', array('fields' => 'slugs'));
              $courses = array(
                'post_type'      => 'course',
                'posts_per_page' => $posts_num,
                'post_status'    => 'publish',
                'orderby'        => 'rand',
                'order'          => 'ASC',
                'post__not_in'   => [$course_id],
                'tax_query'      => array(
                  'relation' => 'AND',
                  array(
                    'taxonomy' => 'program',
                    'field'    => 'slug',
                    'terms'    => $program->slug,
                    'operator' => 'IN'
                  ),
                  array(
                    'taxonomy' => 'topic',
                    'field'    => 'slug',
                    'terms'    => $topic_ids,
                    'operator' => 'IN'
                  ),
                  array(
                    'taxonomy' => 'location',
                    'field'    => 'slug',
                    'terms'    => $location_ids,
                    'operator' => 'IN'
                  )
                ),
              );
              $wp_query = new WP_Query($courses);
              if ($wp_query->have_posts()):
              while ($wp_query->have_posts()) : $wp_query->the_post();
                $url = get_the_permalink();
                $title = get_the_title();
                $featured_image = get_field('featured_image');
                $intro_desc = get_field('intro_description');
              ?>
              <li class="medium-6 large-4 columns">
                <div class="hover-scale-shallow">
                  <a href="<?php echo $url; ?>">
                    <div class="posts-list-image">
                      <div class="img-block" style="background-image: url('<?php echo $featured_image['sizes']['medium']; ?>');"></div>
                    </div>
                    <?php
                    if ($title) echo '<div class="ellipsis"><h5 data-ellipsis="2">'.$title.'</h5></div>';
                    if ($intro_desc) echo '<div class="ellipsis"><p data-ellipsis="3">'.$intro_desc.'</p></div>'; ?>
                  </a>
                </div>
              </li>
              <?php endwhile; endif; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'related_courses' );
});


// Summer Academy Locations

class sa_locations extends WP_Widget {
  function __construct() {
    parent::__construct(
      'sa_locations',
      __('Summer Academy Locations'),
      array(
        'description' => __( 'Display Summer Academy locations.')
      )
    );
  }
  public function widget ($args, $instance) {
    $widget_id = $args['widget_id']; ?>
    <section class="course-related-posts content-block-small">
      <div class="row mb15px">
        <div class="columns tac">
          <h6>Locations</h6>
        </div>
      </div>
      <div class="row">
        <div class="posts-list columns nopad">
          <ul class="unstyled-list inline-list">          
            <li class="medium-6 large-4 columns">
              <div class="hover-scale-shallow">
                <a href="/pre-college/summer-academy/online/">
                  <div class="posts-list-image">
                    <div class="img-block" style="background-image: url('/wp-content/uploads/2020/04/Online-scaled-1-750x429.jpg');"></div>
                  </div>
                  <div class="ellipsis"><h5 data-ellipsis="2">Online</h5></div>
                  <div class="ellipsis"><p data-ellipsis="3">No matter where you are, explore your passions and gain insight and guidance from Times journalists and other industry experts.</p></div>
                </a>
              </div>
            </li>
            <li class="medium-6 large-4 columns">
              <div class="hover-scale-shallow">
                <a href="/pre-college/summer-academy/nyc/">
                  <div class="posts-list-image">
                    <div class="img-block" style="background-image: url('/wp-content/uploads/2019/11/Summer-Academy-NYC-750x428.jpg');"></div>
                  </div>
                  <div class="ellipsis"><h5 data-ellipsis="2">New York City</h5></div>
                  <div class="ellipsis"><p data-ellipsis="3">Study with leading thinkers in the cultural, financial and media capital of the world this summer using New York City as your classroom.</p></div>
                </a>
              </div>
            </li>
            <li class="medium-6 large-4 columns">
              <div class="hover-scale-shallow">
                <a href="/pre-college/summer-academy/dc/">
                  <div class="posts-list-image">
                    <div class="img-block" style="background-image: url('/wp-content/uploads/2019/11/Summer-Academy-DC-750x429.jpg');"></div>
                  </div>
                  <div class="ellipsis"><h5 data-ellipsis="2">Washington DC</h5></div>
                  <div class="ellipsis"><p data-ellipsis="3">Live and learn in our nation’s capital and immerse yourself in the center of politics, public policy and social activism.</p></div>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <?php
  }
  public function form ($instance) { ?>&nbsp;<?php }
  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }
}
add_action( 'widgets_init', function(){
  register_widget( 'sa_locations' );
});


?>