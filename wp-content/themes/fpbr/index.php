<?php get_template_part('partials/header'); ?>

<div class="preloader">
  <div class="loader js-loader">
    <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/bird@2x.png" width="120">
  </div>
</div>

<a href="#" class="fixed-call hide-for-medium">Give me a Call &nbsp;<i class="fas fa-phone"></i></a>

<div class="flyout-nav">
  <a href="#" class="flyout-nav__close js-nav-toggle">
    <span class="bar"></span>
    <span class="bar"></span>
  </a>
  <div class="row collapse align-middle align-justify">
    <div class="columns">
      <nav class="flyout-nav__menu">
        <ul>
          <li>navigate</li>
          <li><a href="#">About</a></li>
          <li><a href="#">FAITH POPCORN</a></li>
          <li><a href="#">Approach</a></li>
          <li><a href="#">TrendBANK</a></li>
          <li><a href="#">TalentBank</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Call Me</a></li>
        </ul>
      </nav>
    </div>
    <div class="columns medium-27 show-for-medium">
      <div class="event-card text-right">
        <h5 class="event__subheading">this weekend 5/27</h5>
        <h4 class="event__heading">Futurist conference 2018 at Cooper Union </h4>
        <div class="event-card__cta">
          <a href="#" class="btn btn--white btn--small">get tickets</a>
          <a href="#" class="btn btn--white btn--small">learn more</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row news-grid show-for-medium">
    <h3 class="news-grid__heading news-grid__heading--light">what we're watching</h3>
    <div class="news-grid__grid">
      <a class="news-grid__card">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          cashing out
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
      <a class="news-grid__card news-grid__card--purple">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          cashing out
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
    </div>
  </div>
</div>

<div class="hero row expanded align-middle">

  <div class="hero__zoom"></div>

  <header class="main-nav">
    <div class="main-nav__inner">
      <h1 class="logo">
        <a href="#"><img width="240" height="auto" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/fpbr-two-line-logo-with-text@2x.png" /></a>
      </h1>
      <a href="#" class="main-nav__burger js-nav-toggle">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </a>
    </div>
  </header>

  <div class="hero__wrapper">
    <div class="hero__headline-container">
      <h2 class="bebas-neue-book headline__subhead">If you knew everything about tomorrow…</h2>
      <h1 class="bebas-neue-bold headline__headline">What would you do differently today?</h1>
      <div class="hero__cta">
        <a class="btn" href="#">Learn More</a>
        <a class="btn btn--text" href="#">Who is Faith Popcorn?</a>
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
      <h2 class="hgroup__heading">Faith Popcorn</h2>
      <p class="hgroup__subheading">
        Noted Futurist, provocative public speaker, and best-selling author, FAITH POPCORN is renowned for her extraordinary ability to position brands and entire corporations to succeed in the quickly evolving landscape of Tomorrow.
      </p>
    </div>
  </div>
  <div class="timeline__spine">
    <!-- timeline__spine-row--reverse -->
    <div class="timeline__spine-row animated row align-justify collapse">
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-date">1994</div>
      </div>
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-event">
          <div class="row">
            <h3 class="timeline__spine-event-title">EVENT TITLE</h3>
          </div>
          <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse">
            <div class="columns xsmall-24 large-12"><img src="http://placehold.it/450x300" width="100%" /></div>
            <div class="columns xsmall-24 large-12"><p class="lead">January 1994, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="timeline__spine-row animated timeline__spine-row--reverse row align-justify collapse">
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-date">1994</div>
      </div>
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-event">
          <div class="row">
            <h3 class="timeline__spine-event-title">EVENT TITLE</h3>
          </div>
          <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse">
            <div class="columns xsmall-24 large-12"><img src="http://placehold.it/450x300" width="100%" /></div>
            <div class="columns xsmall-24 large-12"><p class="lead">January 1994, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="timeline__spine-row animated row align-justify collapse">
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-date">1994</div>
      </div>
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-event">
          <div class="row">
            <h3 class="timeline__spine-event-title">EVENT TITLE</h3>
          </div>
          <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse">
            <div class="columns xsmall-24 large-12"><img src="http://placehold.it/450x300" width="100%" /></div>
            <div class="columns xsmall-24 large-12"><p class="lead">January 1994, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="timeline__spine-row animated row timeline__spine-row--reverse align-justify collapse">
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-date">1994</div>
      </div>
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-event">
          <div class="row">
            <h3 class="timeline__spine-event-title">EVENT TITLE</h3>
          </div>
          <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse">
            <div class="columns xsmall-24 large-12"><img src="http://placehold.it/450x300" width="100%" /></div>
            <div class="columns xsmall-24 large-12"><p class="lead">January 1994, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
          </div>
        </div>
      </div>
    </div>

    <div class="timeline__spine-row animated row align-justify collapse">
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-date">1994</div>
      </div>
      <div class="columns xsmall-24 large-expand">
        <div class="timeline__spine-event">
          <div class="row">
            <h3 class="timeline__spine-event-title">EVENT TITLE</h3>
          </div>
          <div class="row timeline__spine-event-details xsmall-collapse large-uncollapse">
            <div class="columns xsmall-24 large-12"><img src="http://placehold.it/450x300" width="100%" /></div>
            <div class="columns xsmall-24 large-12"><p class="lead">January 1994, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>
          </div>
        </div>
      </div>
      <div class="timeline__spine-row-fade"></div>
    </div>
  </div>

  <div class="row expanded timeline__footer">
    <div class="columns text-center hgroup">
      <h2 class="hgroup__heading animated">The Original Futurist_</h2>
      <div class="hgroup__cta animated">
        <a class="btn">Learn More</a>
        <a class="btn btn--text" href="#">Who is Faith Popcorn?</a>
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
      <div class="columns xsmall-24 medium-12">
        <div class="hgroup hgroup--inv">
          <h3 class="hgroup__heading hgroup__heading--med">Clients + Case Studies</h3>
          <p class="lead">
            Lorem Ipsum Set Dolor
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a class="btn btn--white">Learn More</a>
          </div>
        </div>
      </div>
      <div class="columns show-for-medium medium-12 case-studies__grid">
        <div class="row">
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
        </div>
        <div class="row">
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
        </div>
        <div class="row">
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
          <div class="columns">
            <img src="http://placehold.it/135x100" />
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel -->

    <!-- Carousel -->
    <div class="row align-middle">
      <div class="columns text-center xsmall-24 medium-12">
        <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/unilever@2x.png" width="379" height="auto">
      </div>
      <div class="columns show-for-medium medium-12 case-studies__lead">
        <div class="hgroup hgroup--inv">
          <h3 class="hgroup__heading hgroup__heading--med">Unilever</h3>
          <p class="lead">
            Lorem Ipsum Set Dolor
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a class="btn btn--white">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel -->

    <!-- Carousel -->
    <div class="row align-middle">
      <div class="columns text-center xsmall-24 medium-12">
        <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/unilever@2x.png" width="379" height="auto">
      </div>
      <div class="columns case-studies__lead show-for-medium medium-12">
        <div class="hgroup hgroup--inv">
          <h3 class="hgroup__heading hgroup__heading--med">Unilever</h3>
          <p class="lead">
            Lorem Ipsum Set Dolor
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a class="btn btn--white">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel -->

    <!-- Carousel -->
    <div class="row align-middle">
      <div class="columns text-center xsmall-24 medium-12">
        <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/unilever@2x.png" width="379" height="auto">
      </div>
      <div class="columns show-for-medium case-studies__lead">
        <div class="hgroup hgroup--inv">
          <h3 class="hgroup__heading hgroup__heading--med">Unilever</h3>
          <p class="lead">
            Lorem Ipsum Set Dolor
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
          <div class="hgroup__cta hgroup__cta--flush">
            <a class="btn btn--white">Learn More</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel -->

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
    <div class="news-grid__grid news-grid__card--xl">
      <a class="news-grid__card">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          cashing out
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
      <a class="news-grid__card news-grid__card--xl news-grid__card--purple">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          cashing out
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
      <a class="news-grid__card news-grid__card--xl news-grid__card--full news-grid__card--black">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          upcoming event
        </div>
        <div class="news-grid__card-headlines">
          <div class="hgroup hgroup--inv text-center">
            <h4 class="hgroup__heading hgroup__heading--med">this weekend 5/27 <br /> futurist conference 2018 at Cooper Union </h4>
            <div class="hgroup__cta hgroup__cta--flush">
              <span href="#" class="btn btn--small btn--white">Learn More</span>
            </div>
          </div>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
      <a class="news-grid__card">
        <div class="news-grid__card-image" style="background-image:url(<?= get_template_directory_uri(); ?>/compiled/assets/img/meeting.jpg);"></div>
        <div class="news-grid__card-category">
          cashing out
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>MAY 5 2018</p>
        </div>
      </a>
      <a class="news-grid__card news-grid__card--xl news-grid__card--light-blue">
        <div class="news-grid__card-category">
          @popcornbrains
        </div>
        <div class="news-grid__card-headlines">
          <p>
            Anxiety consumerism–fidget spinners and gravity blankets are taking advantage of you. Time to actually understand and treat mental health.
          </p>
        </div>
        <div class="news-grid__card-date">
          <p>TWEET: MAY 5 2018</p>
        </div>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="columns text-center">
      <a href="#" class="btn btn--small">Load More Articles...</a>
    </div>
  </div>
</div>

<div class="multi-use">
  <div class="row align-right animated">
    <div class="columns xsmall-20 text-left">
      <div class="mu__quote">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus semper faucibus lorem, quis consectetur pulvinar a. Suspendisse hendrerit.
        </p>
        <p class="mu__quote-byline">
          &mdash; FAITH POPCORN
          <small>June, 2018</small>
        </p>
      </div>
    </div>
  </div>
</div>


<div class="trendbank-grid">
  <div class="trendbank-grid__bg"></div>
  <div class="trendbank-grid__bird"><img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/bird@2x.png" width="163" height="auto" /></div>
  <div class="row medium-collapse align-middle align-justify">
    <div class="columns medium-10">
      <div class="hgroup">
        <h2 class="hgroup__heading"><span class="nobold">TREND</span>BANK</h2>
        <p class="hgroup__subheading">
          Our Foundation is a System of <strong>17 Global Trends</strong> that explain and predict the shifting trajectory of Culture.
        </p>
        <div class="hgroup__cta hgroup__cta--flush">
          <a href="#" class="btn">Learn More</a>
        </div>
      </div>
    </div>
    <div class="columns text-right animated show-for-medium">
      <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/trend-grid@2x.png" width="80%" height="auto">
    </div>
  </div>
</div>

<div class="talentbank-grid">
  <div class="row medium-collapse align-middle align-justify">
    <div class="columns xsmall-24 medium-10">
      <div class="hgroup hgroup--dark">
        <h2 class="hgroup__heading"><span class="nobold">TALENT</span>BANK</h2>
        <p class="hgroup__subheading">
          A collection of <strong>10,000</strong> of the world’s most brilliant minds.
        </p>
        <div class="hgroup__cta hgroup__cta--flush">
          <a href="#" class="btn">Learn More</a>
        </div>
      </div>
    </div>
    <div class="columns animated show-for-medium">
      <img src="<?= get_template_directory_uri(); ?>/compiled/assets/img/talentbank@2x.png" width="1136" height="auto" />
    </div>
  </div>
</div>

<footer class="main-footer">
  <div class="row align-middle align-justify">
    <div class="columns xsmall-24 medium-expand">
      <a href="#"><img width="170" height="auto" src="<?= get_template_directory_uri(); ?>/compiled/assets/img/fpbr-two-line-logo-with-text@2x.png" /></a>
    </div>
    <div class="columns xsmall-24 medium-expand text-left medium-text-right">
      <div class="hgroup hgroup--dark">
        <h4 class="hgroup__heading hgroup__heading--small hgroup__heading--no-pad">The Original Futurist_</h4>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="columns xsmall-24 medium-expand">
      <ul>
        <li>
          <a href="#">About</a>
        </li>
        <li>
          <a href="#">Faith Popcorn</a>
        </li>
        <li>
          <a href="#">Approach</a>
        </li>
      </ul>
    </div>
    <div class="columns xsmall-24 medium-expand">
      <ul>
        <li>
          <a href="#">Trend<strong>Bank</strong></a>
        </li>
        <li>
          <a href="#">Case Studies</a>
        </li>
        <li>
          <a href="#">Trend<strong>Blog</strong></a>
        </li>
      </ul>
    </div>
    <div class="columns xsmall-24 medium-expand">
      <ul>
        <li>
          <a href="#">Press</a>
        </li>
        <li>
          <a href="#">Talent<strong>Bank</strong></a>
        </li>
        <li>
          <a href="#">Store</a>
        </li>
      </ul>
    </div>
    <div class="columns">
      <ul>
        <li>
          Contact Us:
        </li>
        <li>
          <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="columns xsmall-24 medium-expand">
      <div class="hgroup hgroup--dark">
        <h4 class="hgroup__heading hgroup__heading--small hgroup__heading--light"><small>2018 Faith Popcorn's</small> <br /><strong>BRAIN</strong>RESERVE</h4>
        <p>
          <small>All rights reserved. <a href="#">Privacy</a> | <a href="#">Legal</a></small>
        </p>
      </div>
    </div>
  </div>
</footer>

<?php get_template_part('partials/footer'); ?>
