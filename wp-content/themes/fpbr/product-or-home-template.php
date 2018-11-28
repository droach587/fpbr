<?php
/**
 * Template Name: Homepage / Product Page
 *
*/
 ?>

<?php
  $pid = get_the_ID();
  $hp_hero = get_field('homepage_hero', $pid)[0];
  $timeline_heading = get_field('timeline_heading', $pid);
  $timeline_lead = get_field('timeline_lead', $pid);
  $hp_timeline = get_field('homepage_timeline', $pid);
  $timeline_footer_hero = get_field('timeline_footer_hero', $pid);
  $timeline_footer_img = get_field('timeline_footer_image', $pid);
  $timeline_footer_ctas = get_field('timeline_footer_ctas', $pid);
  $timeline_footer_color = get_field('timeline_footer_background_color', $pid);
  $case_studies_hero = get_field('case_studies_hero', $pid);
  $case_studies_sub = get_field('case_studies_subheadline', $pid);
  $case_studies_exc = get_field('case_studies_excerpt', $pid);
  $case_studies_cta = get_field('case_studies_cta', $pid);
  $case_studies_cta_url = get_field('case_studies_cta_url', $pid);
  $case_study_highlights = get_field('case_study_highlighted_clients', $pid);
  $featured_case_studies = get_field('featured_case_studies', $pid);
  $featured_sections = get_field('featured_sections', $pid);
?>

<?php include_once('partials/header.php'); ?>

<div class="hero row expanded align-middle" style="background-image: url(<?= $hp_hero['hero_background_image']; ?>)">

  <div class="hero__zoom" style="background-image: url(<?= $hp_hero['hero_background_image']; ?>)"></div>

  <?php include_once('partials/main-nav.php'); ?>

  <div class="hero__wrapper">
    <div class="hero__headline-container">
      <h2 class="bebas-neue-book headline__subhead"><?= $hp_hero['hero_small_headline']; ?></h2>
      <h1 class="bebas-neue-bold headline__headline"><?= $hp_hero['hero_large_headline']; ?></h1>
      <div class="hero__cta">
        <?php foreach($hp_hero['hero_ctas'] as $cta): ?>
          <?php $text_link = ($cta['text_link'])? 'btn--text' : false; ?>
          <a class="btn <?= $text_link; ?>" href="<?= $cta['cta_url']; ?>"><?= $cta['cta_title']; ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <a href="#timeline" class="js-jumplink hero__arrow-down">
    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
      <path fill="none" fill-rule="evenodd" stroke="#5CAFFD" stroke-linecap="round" stroke-linejoin="round" stroke-width=".5" d="M4 11l5-5-5-5"/>
    </svg>
  </a>

</div>

<div id="timeline" class="timeline">
  <div class="row animated">
    <div class="columns text-center hgroup">
      <h2 class="hgroup__heading"><?= $timeline_heading; ?></h2>
      <p class="hgroup__subheading">
        <?= $timeline_lead; ?>
      </p>
    </div>
  </div>
  <div class="timeline__spine">
    <?php $x=0; foreach($hp_timeline as $timeline): ?>
      <?php $reverse = ($x % 2 == 0) ? 'timeline__spine-row--reverse' : false; ?>
      <div class="timeline__spine-row animated <?= $reverse; ?> row align-justify collapse">
        <div class="columns xsmall-24 large-expand">
          <div class="timeline__spine-date"><?= explode(',', $timeline['timeline_year'])[1]; ?></div>
        </div>
        <div class="columns xsmall-24 large-expand">
          <div class="timeline__spine-event">
            <div class="row">
              <h3 class="timeline__spine-event-title"><?= $timeline['event_title']; ?></h3>
            </div>
            <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse align-middle">
              <div class="columns xsmall-24 large-12"><img src="<?= $timeline['event_image']; ?>" width="100%" /></div>
              <div class="columns xsmall-24 large-12"><p class="lead"><?= $timeline['event_description']; ?></p></div>
            </div>
          </div>
        </div>
      </div>
    <?php $x++; endforeach; ?>
  </div>

  <div class="row expanded timeline__footer" style="background-repeat: no-repeat; background-image: url(<?= $timeline_footer_img; ?>); background-color: <?= $timeline_footer_color; ?>;">
    <div class="columns text-center hgroup">
      <h2 class="hgroup__heading animated"><?= $timeline_footer_hero; ?></h2>
      <div class="hgroup__cta animated">
        <?php foreach($timeline_footer_ctas as $footer_cta): ?>
          <?php $text_button = ($footer_cta['text_link']) ? 'btn--text' : false; ?>
          <a class="btn <?= $text_button; ?>" href="<?= $footer_cta['cta_url']; ?>"><?= $footer_cta['cta_title']; ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>

<div class="case-studies">

  <a href="#" class="case-studies__nav case-studies__nav--prev js-previous-arrow"><i class="far fa-arrow-alt-circle-up"></i></i></a>
  <a href="#" class="case-studies__nav case-studies__nav--next js-next-arrow"><i class="far fa-arrow-alt-circle-down"></i></i></a>

  <div class="case-studies__carousel-wrap js-case-carousel">

    <!-- Carousel -->
    <div class="row align-middle">
      <div class="columns xsmall-24 medium-24 large-12">
        <div class="hgroup hgroup--inv">
          <h3 class="hgroup__heading hgroup__heading--med"><?= $case_studies_hero; ?></h3>
          <p class="lead">
            <?= $case_studies_sub; ?>
          </p>
          <p>
            <?= $case_studies_exc; ?>
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a class="btn btn--white" href="<?= $case_studies_cta_url; ?>"><?= $case_studies_cta; ?></a>
          </div>
        </div>
      </div>
      <div class="columns show-for-large large-12 case-studies__grid">
      <?php $x=1; foreach($case_study_highlights as $cs_highlight): ?>
        <?php if($x == 1): ?>
          <div class="row">
        <?php endif; ?>
          <div class="columns">
            <img src="<?= $cs_highlight['client_logo']; ?>" />
          </div>
        <?php if($x == 3): ?>
          </div>
        <?php endif; ?>
        <?php if($x % 3 == 0 && $x > 3): ?>
          </div>
          <div class="row">
        <?php endif; ?>
      <?php $x++; endforeach; ?>
      </div>
    </div>
    <!-- Carousel -->

    <?php foreach($featured_case_studies as $cs): ?>
      <!-- Carousel -->
      <div class="row align-middle">
        <div class="columns text-center xsmall-24 medium-12">
          <img src="<?= $cs['client_logo']; ?>" width="379" height="auto">
        </div>
        <div class="columns show-for-medium medium-12 case-studies__lead">
          <div class="hgroup hgroup--inv">
            <h3 class="hgroup__heading hgroup__heading--med"><?= $cs['client_name']; ?></h3>
            <p class="lead">
              <?= $cs['subheading']; ?>
            </p>
            <p>
              <?= $cs['short_description']; ?>
            </p>
            <div class="hgroup__cta hgroup__cta--flush">
              <a class="btn btn--white" href="<?= $cs['cta_url']; ?>"><?= $cs['cta']; ?></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Carousel -->
    <?php endforeach; ?>

  </div>

</div>

<div class="news">
  <div class="row collapse align-middle align-justify">
    <div class="columns xsmall-24 medium-expand">
      <div class="hgroup hgroup--dark text-center medium-text-left">
        <h2 class="hgroup__heading">The Latest</h2>
      </div>
    </div>
    <div class="columns xsmall-24 medium-expand text-right">
      <ul class="hgroup__menu">
        <li>
          <a class="btn btn--xsmall" href="#">filter by trend</a>
        </li>
        <li>
          <a class="btn btn--xsmall" href="#">filter by date</a>
        </li>
        <li>
          <a class="btn btn--xsmall" href="#">filter by type</a>
        </li>
      </ul>
    </div>
  </div>
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

      <?php foreach(get_all_custom_post('trendblog', 6) as $latest): ?>
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
  <div class="row">
    <div class="columns text-center">
      <a href="/trendblog" class="btn">See All From The TrendBlog</a>
    </div>
  </div>
</div>

<div class="multi-use">
  <div class="row align-center animated">
    <div class="columns xsmall-20 text-center">
      <?php foreach(get_all_custom_post('faithisms', 1, null, 'rand') as $faithisms): ?>
        <?php
          $quote = get_field('quote', $faithisms->ID);
          $author = get_field('author', $faithisms->ID);
          $date = get_field('date', $faithisms->ID);
        ?>
        <div class="mu__quote">
          <p>
            <?= $quote; ?>
          </p>
          <p class="mu__quote-byline">
            &mdash; <?= $author; ?>
            <small><?= $date; ?></small>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php foreach($featured_sections as $trendSection): ?>
  <div class="trendbank-grid">
    <div class="row align-middle align-justify">
      <div class="columns medium-8">
        <div class="hgroup">
          <h2 class="hgroup__heading" style="color: <?= $trendSection['section_title_color']; ?>"><?= $trendSection['section_title']; ?></h2>
          <p class="hgroup__subheading">
            <?= $trendSection['section_description']; ?>
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a href="<?= $trendSection['section_cta_url']; ?>" class="btn"><?= $trendSection['section_cta']; ?></a>
          </div>
        </div>
      </div>
      <div class="columns text-right animated show-for-medium">
        <img src="<?= $trendSection['section_image']; ?>" width="80%" height="auto">
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php get_template_part('partials/footer'); ?>
