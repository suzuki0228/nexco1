<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <!-- ogp start -->
  <meta property="og:url" content="" />
  <meta property="og:type" content="" />
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:site_name" content="" />
  <meta property="og:image" content="" />
  <!-- //ogp end -->
  <?php wp_head(); ?> <!-- これがないと色々な不具合が起きる-->
</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>
  <header class="header">
    <!-- nav-header -->
    <nav id="nav-header" class="nav-header">
      <div class="nav-header__container">
        <img src="<?php echo get_theme_file_uri('img/1.jpg?20220401'); ?>" alt="" class="nav-header__logo-image " />
        <a href="./index.html" class="nav-header__logo">RECRUITING</a>
        <img src="<?php echo get_theme_file_uri('img/2.jpg?20220401'); ?>" alt="" class="nav-header__logo-image-left " />
        <ul class="nav-header__menu">
          <li class="nav-header__menu-item">
            <a href="#top-message" class="nav-header__link">MESSAGE</a>
          </li>
          <li class="nav-header__menu-item">
            <a href="#top-service" class="nav-header__link">SRVICE</a>
          </li>
          <li class="nav-header__menu-item">
            <a href="#top-works" class="nav-header__link">WORKS</a>
          </li>
          <li class="nav-header__menu-item">
            <a href="#top-company" class="nav-header__link">COMPANY</a>
          </li>
          <li class="nav-header__menu-item">
            <a href="#contact-guide" class="nav-header__contact">CONTACT</a>
          </li>
        </ul>
        <div class="nav-header__toggle js-nav-drawer-open">
          <div class="nav-header__toggle-line"></div>
          <div class="nav-header__toggle-line"></div>
          <div class="nav-header__toggle-line"></div>
        </div>
      </div>
    </nav>
    <!-- /nav-header -->
    <nav id="nav-drawer" class="nav-drawer" data-open="false">
      <div class="nav-drawer__container">
        <div class="nav-drawer__menu-button">
          <button id="nav-drawer-close" class="nav-drawer__button-close">
            <div class="nav-drawer__button-close-line"></div>
            <div class="nav-drawer__button-close-line"></div>
          </button>
        </div>
        <ul class="nav-drawer__menu">
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">TOP</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">西日本高速道路エンジニアリング中国を知る</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">プロジェクトを知る</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">先輩社員を知る</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">クロストーク</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">働き方について</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
          <li class="nav-drawer__menu-item">
            <a href="<?php echo esc_url(home_url('/site.local/page')); ?>" class="nav-drawer__link js-nav-drawer-link">
              <span class="nav-drawer__link-main">募集要項</span>
              <span class="nav-drawer__link-sub"></span>
            </a>
          </li>
        </ul>
      </div>
      <div id="nav-drawer-overlay" class="nav-drawer__overlay"></div>
    </nav>
    <!-- nav-pagetop -->
    <nav class="nav-pagetop js-nav-pagetop"></nav>
  </header>