<footer class="main-footer">
  <div class="row align-middle align-justify">
    <div class="columns xsmall-24 medium-expand">
      <a href="#"><img width="170" height="auto" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/fpbr-two-line-logo-with-text@2x.png" /></a>
    </div>
    <div class="columns xsmall-24 medium-expand text-left medium-text-right">
      <div class="hgroup hgroup--dark">
        <h4 class="hgroup__heading hgroup__heading--small hgroup__heading--no-pad">The Original Futurist</h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="columns xsmall-24 medium-expand">
      <?php wp_nav_menu( array('theme_location' => 'footer-nav-col-one') ); ?>
    </div>
    <div class="columns xsmall-24 medium-expand">
      <?php wp_nav_menu( array('theme_location' => 'footer-nav-col-two') ); ?>
    </div>
    <div class="columns xsmall-24 medium-expand">
      <?php wp_nav_menu( array('theme_location' => 'footer-nav-col-three') ); ?>
    </div>
    <div class="columns">
      <?php dynamic_sidebar( 'footer_social' ); ?>
    </div>
  </div>
  <div class="row">
    <div class="columns xsmall-24 medium-expand">
      <?php dynamic_sidebar( 'footer_copyright' ); ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
