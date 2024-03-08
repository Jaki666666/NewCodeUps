<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="robots" content="noindex" />
  <?php if (is_404()) : ?>
    <meta http-equiv="refresh" url=<?php echo esc_url(home_url("")); ?>>
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
  <!-- header-->
  <header class="header" id="header">
    <!-- ローディング画面 -->
    <div class="loading" id="loading">
      <div class="loading__title">
        <h2 class="loading__main-title">Odyssey</h2>
        <p class="loading__sub-title">Dive into Eternal Blue</p>
      </div>
    </div>

    <?php
    // フロントページの場合にのみローディング画面を表示
    if (is_front_page()) {
      echo '<style>.loading { display: block; }</style>';
    } else {
      echo '<style>.loading { display: none; }</style>';
    }
    ?>

    <div class="loading-second" id="loading-second">
      <div class="loading-second__top"></div>
      <img src="<?php echo get_theme_file_uri('dist/assets/images/common/wave.png'); ?>" alt="波の絵">
    </div>

    <?php
    // フロントページの場合にのみローディング画面を表示
    if (is_front_page()) {
      echo '<style>.loading-second { display: block; }</style>';
    } else {
      echo '<style>.loading-second { display: none; }</style>';
    }
    ?>

    <div class="header__inner">
      <h1 class="header__title">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img src="<?php echo get_theme_file_uri('dist/assets/images/common/blue-grow.png'); ?>" alt="サイトロゴ">
        </a>
      </h1>

      <nav class="header__nav">
        <ul class="header__items">
          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/campaign')); ?>">
              <span class="header__link header__link--english js-splitText">Campaign</span>
              <span class="header__link header__link--japanese js-splitText">キャンペーン</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/about-us')); ?>">
              <span class="header__link header__link--english js-splitText">About us</span>
              <span class="header__link header__link--japanese js-splitText">私たちについて</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/information')); ?>">
              <span class="header__link header__link--english js-splitText">Information</span>
              <span class="header__link header__link--japanese js-splitText">ダイビング情報</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/blog')); ?>">
              <span class="header__link header__link--english js-splitText">Blog</span>
              <span class="header__link header__link--japanese js-splitText">ブログ</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/voice')); ?>">
              <span class="header__link header__link--english js-splitText">Voice</span>
              <span class="header__link header__link--japanese js-splitText">お客様の声</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/price')); ?>">
              <span class="header__link header__link--english js-splitText">Price</span>
              <span class="header__link header__link--japanese js-splitText">料金一覧</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/faq')); ?>">
              <span class="header__link header__link--english js-splitText">FAQ</span>
              <span class="header__link header__link--japanese js-splitText">よくある質問</span>
            </a>
          </li>

          <li class="header__item">
            <a href="<?php echo esc_url(home_url('/contact')); ?>">
              <span class="header__link header__link--english js-splitText">Contact</span>
              <span class="header__link header__link--japanese js-splitText">お問合せ</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- ハンバーガーメニュー -->
      <div class="header__hamburger hamburger" id="hamburger">
        <span class="hamburger__line hamburger__line--first"></span>
        <span class="hamburger__line hamburger__line--second"></span>
        <span class="hamburger__line hamburger__line--third"></span>
      </div>

      <!-- ドロワーメニュー -->
      <div class="header__drawer drawer" id="drawer">
        <div class="drawer__inner inner">
          <nav class="drawer__nav nav">
            <div class="nav__left">
              <div class="nav__first">
                <ul class="nav__items">
                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
                  </li>

                  <?php
                  $terms = get_terms('campaign_category'); // タクソノミースラッグを指定
                  foreach ($terms as $term) {
                    echo '<li class="nav__item"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                  }
                  ?>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
                  </li>
                </ul>
              </div>

              <div class="nav__second">
                <ul class="nav__items">
                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
                  </li>

                  <li class="nav__item">
                    <a class="js-information-link" href="<?php echo esc_url(home_url('/information#tab1')); ?>">ライセンス講習</a>
                  </li>

                  <li class="nav__item">
                    <a class="js-information-link" href="<?php echo esc_url(home_url('/information#tab2')); ?>">ファンダイビング</a>
                  </li>

                  <li class="nav__item">
                    <a class="js-information-link" href="<?php echo esc_url(home_url('/information#tab3')); ?>">体験ダイビング</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="nav__right">
              <div class="nav__third">
                <ul class="nav__items">
                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/price')); ?>">料金一覧</a>
                  </li>

                  <li class="nav__item">
                    <a href="<?php echo esc_url(home_url('/price#price-list1')); ?>">ライセンス講習</a>
                  </li>

                  <li class="nav__item">
                    <a href="<?php echo esc_url(home_url('/price#price-list2')); ?>">体験ダイビング</a>
                  </li>

                  <li class="nav__item">
                    <a href="<?php echo esc_url(home_url('/price#price-list3')); ?>">ファンダイビング</a>
                  </li>
                </ul>
              </div>

              <div class="nav__fourth">
                <ul class="nav__items">
                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="nav__br">ポリシー</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
                  </li>

                  <li class="nav__item nav__item--page-link">
                    <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish.png'); ?>" alt="ヒトデの絵">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>">お問合せ</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>