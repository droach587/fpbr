<?php
/**
 * Template Name: Generic Page or Article
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
  $fullWidth = get_field('full_width', $post->ID);
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

<?php if(!$suppressMeta): ?>
  <?php if(get_field('article_source', $post->ID)[0]['source_image']): ?>
    <div class="attributes">
      <div class="attribute__source">
        <h5 class="bebas-neue-bold">As Seen In:</h5> <img class="inverted-ci" width="120" height="auto" src="<?= get_field('article_source', $post->ID)[0]['source_image']; ?>" />
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>

<?php
  $fname = get_the_author_meta('first_name', $post->post_author);
  $lname = get_the_author_meta('last_name', $post->post_author);
  $avatar = get_wp_user_avatar($post->post_author);
?>

<?php if(!$suppressMeta): ?>
  <div class="row page__row page__row--author align-middle">
    <div class="columns shrink">
      <div class="author__image" style="background-image: url(<?= scrapeImage($avatar); ?>);"></div>
    </div>
    <div class="columns text-left">
      <p>
        By <?= ucfirst($fname); ?> <?= ucfirst($lname); ?> | <?= get_field('article_date', $post->ID); ?> | Read Time: <?= get_field('article_read_time', $post->ID); ?>
      </p>
    </div>
  </div>
<?php endif; ?>


<!-- Article Wrap Row -->
<div class="row align-left">

  <!-- LEFT COL -->
  <?php if($fullWidth): ?>
    <div class="columns xsmall-24">
  <?php else: ?>
    <div class="columns xsmall-24 large-17">
  <?php endif; ?>

    <?php if(!$suppressMeta): ?>
      <div class="row page__row animated">
        <div class="columns show-for-large xsmall-24">
          <h3 class="page__lead"><?= get_field('article_short_title', $post->ID); ?></h3>
          <hr />
        </div>
      </div>
  <?php endif; ?>

    <?php foreach(get_field('content_block', $post->ID) as $block): ?>

      <?php if($block['content_type'] == 'wysiwyg'): ?>
        <div class="row page__row animated">
          <div class="columns xsmall-24">
            <?= $block['wysiwyg']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'text-and-heading'): ?>
        <div class="row page__row animated">
          <div class="columns xsmall-24">
            <h3 class="bebas-neue page__row-heading"><?= $block['text_block'][0]['heading']; ?></h3>
            <?= $block['text_block'][0]['text']; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'testimonial'): ?>
        <?php foreach($block['testimonial'] as $testimonial): ?>
          <div class="row page__row animated">
            <div class="columns xsmall-24">
              <h4 class="bebas-neue page__row-heading">&ldquo; <?= $testimonial['quote']; ?> &rdquo;</h4>
              <p><strong><?= $testimonial['author']; ?></strong> <br /> <?= $testimonial['author_title']; ?>
                <?php if($testimonial['quote_misc']): ?>
                  <br /><small><?= $testimonial['quote_misc']; ?></small>
                <?php endif; ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if($block['content_type'] == 'generic-list'): ?>
          <div class="row page__row animated">
            <div class="columns xsmall-24">
              <ul>
                <?php foreach($block['list_block'] as $list): ?>
                <li>
                  <h5 class="bebas-neue"><?= $list['list_heading']; ?></h5>
                  <p><?= $list['list_text']; ?></p>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'cta-block'): ?>
          <div class="row page__row animated">
            <div class="columns xsmall-24">
              <?php foreach($block['cta_block'] as $cta): ?>
                <a href="<?= $cta['cta_url']; ?>" class="btn"><?= $cta['cta_title']; ?></a>
              <?php endforeach; ?>
            </div>
          </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'image-and-text'): ?>
        <div class="row page__row animated collapsed">
          <?php $x=1; foreach($block['image_and_text_block'] as $img_text): ?>
            <div class="columns xsmall-24 medium-12 large-12 page__row-img">
              <div class="row">
                <div class="columns shrink">
                  <img src="<?= $img_text['image']; ?>" width="180" height="auto" />
                </div>
                <div class="columns">
                  <h4 class="bebas-neue page__row-heading"><?= $img_text['text_heading']; ?></h4>
                  <p><?= $img_text['text']; ?></p>
                </div>
              </div>
            </div>
          <?php $x++; endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'store-item'): ?>
        <div class="row page__row animated collapsed">
          <?php foreach($block['product_block'] as $product): ?>
            <div class="columns xsmall-24 medium-12 large-12 page__row-img">
              <div class="row">
                <div class="columns shrink">
                  <img src="<?= $product['product_image']; ?>" width="180" height="auto" />
                </div>
                <div class="columns">
                  <h4 class="bebas-neue page__row-heading"><?= $product['product_name']; ?></h4>
                  <h5 class="bebas-neue-bold"><?= $product['product_price']; ?></h5>
                  <?php if($product['product_description']): ?>
                    <p><?= substr($product['product_description'], 0, 120); ?><?php if(strlen($product['product_description']) > 120): ?>... <a target="_blank" href="<?= $product['product_url']; ?>">Read more.</a><?php endif; ?></p>
                  <?php endif; ?>
                  <?php if($product['product_misc']): ?>
                    <p><small><?= $product['product_misc']; ?></small></p>
                  <?php endif; ?>
                  <p>
                    <a target="_blank" href="<?= $product['product_url']; ?>" class="btn btn--small"><?= $product['product_cta']; ?></a>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'inline-quote'): ?>
        <div class="multi-use">
          <div class="row align-center animated">
            <div class="columns xsmall-22 text-center">
              <div class="mu__quote">
                <p>
                  <?= $block['inline_quote'][0]['quote']; ?>
                </p>
                <p class="mu__quote-byline">
                  &mdash; <?= $block['inline_quote'][0]['quote_author']; ?>
                  <small><?= $block['inline_quote'][0]['quote_date']; ?></small>
                </p>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if($block['content_type'] == 'newsletter-block'): ?>
        <?php if($block['newsletter_block'][0]['show_block']): ?>
          <div class="row align-middle align-center animated">
            <div class="columns xsmall-24 text-center">
              <div class="newsletter">
                <h3 class="bebas-neue-bold newsletter-heading">Like what you’re reading? SUBSCRIBE TO THE TRENDBLOG</h3>
                <p class="lead bebas-neue-bold">Places and events, as well as new products that reveal how the Future is creeping into the present.</p>
                <a href="<?= $block['newsletter_block'][0]['subscribe_url']; ?>" class="btn">Subscribe</a>
                <img class="bird show-for-medium" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/birdsml.png">
              </div>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>

    <?php endforeach; ?>

  </div>
  <!-- END LEFT COL -->

  <!-- RIGHT COL -->
  <?php if(!$fullWidth): ?>
    <div class="columns large-6 show-for-large">
      <div class="article__trend-menu <?php if($suppressMeta): ?>article__trend-menu--no-border text-center<?php endif; ?>">
        <?php if(!$suppressMeta): ?>
          <?php if(wp_get_post_tags( $post->ID )): ?>
            <h4>Trends in This Article</h4>
            <ul>
              <?php foreach(wp_get_post_tags( $post->ID ) as $tag): ?>
                <li>
                  <a href="/trendbank/<?= $tag->slug; ?>"><?= $tag->name; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        <?php else: ?>
          <?php if(get_field('trend_icon', $post->ID)): ?>
            <img src="<?= get_field('trend_icon', $post->ID); ?>" width="100%" height="auto">
            <h4><?= get_the_title(); ?></h4>
            <p><?= get_field('trend_desc', $post->ID); ?></p>
          <?php endif; ?>
          <?php if(get_field('case_study_image', $post->ID)): ?>
            <img class="inverted-ci" src="<?= get_field('case_study_image', $post->ID); ?>" width="100%" height="auto">
          <?php endif; ?>
          <?php if(get_field('article_image', $post->ID)): ?>
            <p class="bebas-neue">As seen in:</p>
            <img class="inverted-ci" src="<?= get_field('article_image', $post->ID); ?>" width="100%" height="auto">
          <?php endif; ?>
        <?php endif; ?>
        <?php if(strtolower(get_the_title(wp_get_post_parent_id($post->ID ))) == 'about' || strtolower(get_the_title()) == 'about'): ?>
          <h4>About Us</h4>
          <?php wp_nav_menu( array('about-pages-navigation' => 'main-navigation') ); ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
  <!-- END RIGHT COL -->

</div>
<!-- END Article Wrap Row -->

<div class="news">
  <div class="row collapse align-middle align-justify">
    <div class="columns xsmall-24 medium-expand">
      <div class="hgroup hgroup--dark text-center medium-text-left">
        <h2 class="hgroup__heading">The Latest</h2>
      </div>
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

      <?php foreach(get_all_custom_post('trendblog', 5, null, null, $post->ID) as $latest): ?>
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




<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4fdfdc277d25eff0"></script>

<?php include_once('partials/footer.php'); ?>
