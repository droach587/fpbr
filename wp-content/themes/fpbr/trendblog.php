<?php
/**
 * Template Name: Trendblog Landing
 *
*/
 ?>

<?php $altNav = true; ?>
<?php include_once('partials/header.php'); ?>

<?php

?>

<?php
  $featured_image = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full', 'post');
  $suppressMeta = get_field('suppress_article_meta', $post->ID);
?>

<div class="hero hero--short row expanded align-middle" style="background-image: url(<?= $featured_image; ?>);">

  <?php include_once('partials/main-nav.php'); ?>

  <div class="hero__mask hero__mask--alt" style="background-color: <?= get_field('hero_hue', $post->ID); ?>; opacity: .6;"></div>
  <div class="hero__wrapper">
    <div class="hero__headline-container">
      <?php if(get_field('type', $post->ID) == 'case-study'): ?>
        <h4 class="bebas-neue-bold headline__subhead">Case Study</h4>
      <?php endif; ?>
      <?php if(get_field('type', $post->ID) == 'press'): ?>
        <h4 class="bebas-neue-bold headline__subhead">Press</h4>
      <?php endif; ?>
      <?php if(get_field('article_title', $post->ID)): ?>
        <h1 class="bebas-neue-bold headline__headline"><?= get_field('article_title', $post->ID); ?></h1>
      <?php else: ?>
        <h1 class="bebas-neue-bold headline__headline"><?= get_the_title(); ?></h1>
      <?php endif; ?>
    </div>
  </div>

</div>


<div class="news news--inline">
  <div class="row news-grid">
    <div class="news-grid__grid">
      <?php if(!empty(get_all_custom_post('trendblog', 1, 'Upcoming Events'))): ?>
        <?php foreach(get_all_custom_post('trendblog', 1, 'Upcoming Events') as $event): ?>
          <?php
            $featured_image = wp_get_attachment_image_url( get_post_thumbnail_id($event->ID), 'article-thumb', 'post');
            $category = get_the_category($event->ID)[0]->name;
            $date = get_field('event_date', $event->ID);
            $highlight = get_field('event_highlight', $event->ID);
            $title = get_field('event_title', $event->ID);
            $ctas = get_field('event_ctas', $event->ID);
            $color = get_field('block_color', $event->ID);
            $tern_color = ($color == 'default')? false : 'news-grid__card--'.$color;
            $permalink = get_permalink($event->ID);
          ?>
          <a href="<?= $permalink; ?>" class="news-grid__card news-grid__card--xl news-grid__card--full news-grid__card--<?= $tern_color; ?>">
            <div class="news-grid__card-image" style="background-image:url(<?= $featured_image; ?>);"></div>
            <div class="news-grid__card-category">
              <?= $category; ?>
            </div>
            <div class="news-grid__card-headlines">
              <div class="hgroup hgroup--inv text-center">
                <h4 class="hgroup__heading hgroup__heading--med"><?= $highlight; ?> <br /> <?= $title; ?> </h4>
                <div class="hgroup__cta hgroup__cta--flush">
                  <span href="<?= $ctas[0]['cta_url']; ?>" class="btn btn--small btn--white"><?= $ctas[0]['cta_title']; ?></span>
                </div>
              </div>
            </div>
            <div class="news-grid__card-date">
              <p><?= $date; ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php foreach(get_all_custom_post('trendblog', 300, null, null) as $latest): ?>
        <?php
          $featured_image = wp_get_attachment_image_url( get_post_thumbnail_id($latest->ID), 'article-thumb', 'post');
          $category = get_the_category($latest->ID)[0]->name;
          $tag = wp_get_post_tags($latest->ID)[0]->name;
          $short_title = get_field('article_short_title', $latest->ID);
          $handle = get_field('twitter_handle', $latest->ID);
          $tweet_body = get_field('tweet_body', $latest->ID);
          $color = get_field('block_color', $latest->ID);
          $tern_color = ($color == 'default')? false : 'news-grid__card--'.$color;
          $permalink = (strtolower($category) == 'tweets') ? get_field('tweet_url', $latest->ID) : get_permalink($latest->ID);
          $date = (strtolower($category) == 'tweets') ? get_field('tweet_date', $latest->ID) : get_field('article_date', $latest->ID);
        ?>
        <?php if(strtolower($category) != 'upcoming events'): ?>
          <a class="news-grid__card <?= $tern_color; ?>" href="<?= $permalink; ?>">
            <div class="news-grid__card-image" style="background-image:url(<?= $featured_image; ?>);"></div>
            <div class="news-grid__card-category">
              <?php if(strtolower($category) == 'tweets'): ?>
                <?= $handle; ?>
              <?php else: ?>
                <?= $tag; ?>
              <?php endif; ?>
            </div>
            <div class="news-grid__card-headlines">
              <?php if(strtolower($category) == 'tweets'): ?>
                <p>
                  <?= $tweet_body; ?>
                </p>
              <?php else: ?>
                <p>
                  <?= $short_title; ?>
                </p>
              <?php endif; ?>
            </div>
            <div class="news-grid__card-date">
              <p><?= $date; ?></p>
            </div>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>

    </div>
  </div>
</div>




<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4fdfdc277d25eff0"></script>

<?php include_once('partials/footer.php'); ?>
