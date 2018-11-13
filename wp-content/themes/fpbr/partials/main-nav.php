<header class="main-nav <?php if($altNav): ?><?= 'main-nav--alt'; ?><?php endif; ?>">
  <div class="main-nav__inner">
    <h1 class="logo">
      <a href="/" class="inv"><img width="240" height="auto" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/inv-fpbr-two-line-logo-with-text@2x.png" /></a>
      <a href="/" class="ko"><img width="240" height="auto" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/fpbr-two-line-logo-with-text@2x.png" /></a>
    </h1>
    <a href="#" class="main-nav__burger <?php if($altNav): ?><?= 'main-nav__burger--alt'; ?><?php endif; ?> js-nav-toggle">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </a>
    <?php if(!is_front_page()): ?>
      <div class="progress">
        <div class="mask js-progress-inner">
          <div class="inner"></div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</header>
