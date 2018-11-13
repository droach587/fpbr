<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <?php if(is_front_page()): ?>
    <title><?= get_bloginfo( 'name' ); ?></title>
  <?php else: ?>
    <title><?php wp_title( '|', true, 'right' ); ?><?= get_bloginfo( 'name' ); ?></title>
  <?php endif; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="preloader">
    <div class="loader js-loader">
      <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/bird@2x.png" width="120">
    </div>
  </div>

  <a href="#" class="fixed-call hide-for-medium">Give me a Call &nbsp;<i class="fas fa-phone"></i></a>

  <div class="flyout-nav__mask">
    <div class="flyout-nav">
      <a href="#" class="flyout-nav__close js-nav-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
      <div class="row collapse align-middle align-justify">
        <div class="columns">
          <nav class="flyout-nav__menu">
            <?php wp_nav_menu( array('theme_location' => 'main-navigation') ); ?>
          </nav>
        </div>
        <?php if(!empty(get_all_custom_post('trendblog', 1, 'Upcoming Events'))): ?>
          <?php foreach(get_all_custom_post('trendblog', 1, 'Upcoming Events') as $event): ?>
            <?php
    					$category = get_the_category($event->ID)[0]->name;
    					$date = get_field('event_date', $event->ID);
              $highlight = get_field('event_highlight', $event->ID);
              $title = get_field('event_title', $event->ID);
              $ctas = get_field('event_ctas', $event->ID);
    				?>
            <div class="columns medium-27 show-for-medium">
              <div class="event-card text-right">
                <h5 class="event__subheading"><?= $highlight; ?></h5>
                <h4 class="event__heading"><?= $title; ?></h4>
                <div class="event-card__cta">
                  <?php foreach($ctas as $cta): ?>
                    <a href="<?= $cta['cta_url']; ?>" class="btn btn--white btn--small"><?= $cta['cta_title']; ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <?php if(!empty(get_all_custom_post('trendblog', 2, 'Articles'))): ?>
        <div class="row news-grid show-for-medium">
          <h3 class="news-grid__heading news-grid__heading--light">what we're watching</h3>
          <div class="news-grid__grid">
            <?php foreach(get_all_custom_post('trendblog', 2, 'Articles') as $article): ?>
              <?php
      					$featured_image = wp_get_attachment_image_url( get_post_thumbnail_id($article->ID), 'article-thumb', 'post');
      					$tag = wp_get_post_tags($article->ID)[0]->name;
      					$short_title = get_field('article_short_title', $article->ID);
                $date = get_field('article_date', $article->ID);
                $color = get_field('block_color', $article->ID);
                $tern_color = ($color == 'default')? false : 'news-grid__card--'.$color;
                $permalink = get_permalink($article->ID);
      				?>
              <a class="news-grid__card <?= $tern_color; ?>" href="<?= $permalink; ?>">
                <div class="news-grid__card-image" style="background-image:url(<?= $featured_image; ?>);"></div>
                <div class="news-grid__card-category">
                  <?= $tag; ?>
                </div>
                <div class="news-grid__card-headlines">
                  <p>
                    <?= $short_title; ?>
                  </p>
                </div>
                <div class="news-grid__card-date">
                  <p><?= $date; ?></p>
                </div>
              </a>
            <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
