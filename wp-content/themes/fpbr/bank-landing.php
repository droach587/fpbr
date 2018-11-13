<?php
/**
 * Template Name: Bank Landing
 *
*/
 ?>

 <?php $altNav = true; ?>
 <?php include_once('partials/header.php'); ?>

 <?php
  $hero = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full', 'post');
  $showHero = (strpos($hero, 'default.png') !== false) ? false : 'background-image: url('.$hero.');';
 ?>


 <div class="hero hero--short row expanded align-middle" style="<?= $showHero; ?> <?php if(get_field('hero_hue', $post->ID)): ?>background-color:<?= get_field('hero_hue', $post->ID); ?>;<?php endif; ?>">

   <?php include_once('partials/main-nav.php'); ?>

   <div class="hero__wrapper">
     <div class="hero__headline-container">
       <h1 class="bebas-neue-bold headline__headline"><?= get_the_title(); ?></h1>
       <h2 class="bebas-neue-book headline__subhead"><?= get_field('subtitle', $post->ID); ?></h2>
     </div>
   </div>

 </div>

 <div class="row page-intro page-intro--depth animated">
   <div class="columns xsmall-24 large-24">
     <?= get_field('overview', $post->ID); ?>
     <a href="#" class="btn btn--small tuck-btn js-untuck hidden"></a>
   </div>
 </div>

 <div class="trend-grid">

   <!-- Row -->
   <div class="row expanded align-justify">

     <!-- Card -->
     <div class="columns xsmall-24 medium-24 large-8 columns--intro animated" style="background-color: <?= get_field('intro_card', $post->ID)[0]['card_color']; ?>;">
       <div class="row expanded align-middle">
         <div class="">
           <h2 class="trend-text bebas-neue-book"><?= get_field('intro_card', $post->ID)[0]['card_title']; ?></h2>
           <h4 class="trend-text bebas-neue"><?= get_field('intro_card', $post->ID)[0]['card_excerpt']; ?></h4>
           <?php if(!empty(get_field('intro_card', $post->ID)[0]['card_cta'])): ?>
            <a href="<?= get_field('intro_card', $post->ID)[0]['card_cta_url']; ?>" class="btn btn--white btn--small"><?= get_field('intro_card', $post->ID)[0]['card_cta']; ?></a>
           <?php endif; ?>
         </div>
       </div>
     </div>
     <!-- Card -->

     <?php foreach(get_field('cards', $post->ID) as $cardID): ?>

       <?php
        $id = $cardID['post_obj'];
        $title = get_the_title($id);
        $type = get_field('type', $id);
        $featured_image = wp_get_attachment_image_url( get_post_thumbnail_id($id), 'full', 'post');
       ?>

       <?php if($type == 'trendbank'): ?>
         <!-- Card -->
         <div class="columns xsmall-24 medium-24 large-8 flip-card animated">
           <div class="row expanded align-middle flip-card-inner">
             <div class="flip-card-front">
               <h2 class="trend-text bebas-neue-bold" style="color: <?= get_field('block_hue', $id); ?>;"><?= $title; ?></h2>
               <p class="trend-desc lead bebas-neue-bold">
                 <?= get_field('trend_desc', $id); ?>
               </p>
             </div>
             <div class="flip-card-back text-center" style="background-image: url(<?= $featured_image; ?>);">
               <div class="back__hue" style="background-color: <?= get_field('block_hue', $id); ?>; opacity: .5;"></div>
               <h2><img src="<?= get_field('trend_icon', $id); ?>" width="120" height="auto" /></h2>
               <h4 class="trend-text bebas-neue-bold"><?= $title; ?></h4>
               <a href="<?= get_field('cta_url', $id); ?>" class="btn btn--white btn--small"><?= get_field('cta', $id); ?></a>
             </div>
           </div>
         </div>
         <!-- Card -->
       <?php endif; ?>

       <?php if($type == 'talentbank'): ?>
         <!-- Card -->
         <div class="columns xsmall-24 medium-24 large-8 flip-card no-flip animated">
           <div class="row expanded align-middle flip-card-inner">
             <div class="flip-card-static" style="background-image: url(<?= $featured_image; ?>);">
               <div class="back__hue"></div>
               <h2 class="trend-text bebas-neue-bold"><?= $title; ?></h2>
               <p class="trend-desc trend-desc--white lead bebas-neue-bold">
                 <?= get_field('talent_title', $id); ?>
               </p>
               <a href="<?= get_field('cta_url', $id); ?>" class="btn btn--white btn--small"><?= get_field('cta', $id); ?></a>
             </div>
           </div>
         </div>
         <!-- Card -->
       <?php endif; ?>

       <?php if($type == 'case-study'): ?>
         <!-- Card -->
         <div class="columns xsmall-24 medium-24 large-8 flip-card no-flip animated">
           <div class="row expanded align-middle flip-card-inner">
             <div class="flip-card-static" style="background-color: <?= get_field('block_hue', $id); ?>; background-image: url(<?= get_field('case_study_image', $id); ?>);">
               <div class="back__hue"></div>
               <h2 class="trend-text bebas-neue-bold"><?= $title; ?></h2>
               <a href="<?= get_post_permalink($id); ?>" class="btn btn--white btn--small">Read More</a>
             </div>
           </div>
         </div>
         <!-- Card -->
       <?php endif; ?>

       <?php if($type == 'press'): ?>
         <!-- Card -->
         <div class="columns xsmall-24 medium-24 large-8 flip-card no-flip animated">
           <div class="row expanded align-middle flip-card-inner">
             <div class="flip-card-static" style="background-color: <?= get_field('block_hue', $id); ?>; background-image: url(<?= get_field('article_image', $id); ?>);">
               <div class="back__hue"></div>
               <h3 class="trend-text bebas-neue-bold"><?= get_field('article_title', $id); ?></h3>
               <p class="trend-desc trend-desc--white lead bebas-neue-bold">
                 <?= get_field('article_short_desc', $id); ?>
               </p>
               <a href="<?= get_post_permalink($id); ?>" class="btn btn--white btn--small">Read More</a>
             </div>
           </div>
         </div>
         <!-- Card -->
       <?php endif; ?>

   <?php endforeach; ?>

   </div>
   <!-- Row -->


 </div>





 <?php include_once('partials/footer.php'); ?>
