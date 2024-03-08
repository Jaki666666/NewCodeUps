  <!-- footer -->
  <footer class="footer top-footer">
    <div class="footer__inner inner">
      <div class="footer__top">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img class="footer__site-title" src="<?php echo get_theme_file_uri('dist/assets/images/common/blue-grow.png'); ?>" alt="サイトロゴ">
        </a>

        <div class="footer__socialmedia-icons">
          <a href="https://www.facebook.com/?locale=ja_JP" target=”_blank”>
            <img class="footer__facebook-icon" src="<?php echo get_theme_file_uri('dist/assets/images/common/FacebookLogo.png'); ?>" alt="フェイスブックのロゴ">
          </a>
          <a href="https://www.instagram.com/" target=”_blank”>
            <img class="footer__instagram-icon" src="<?php echo get_theme_file_uri('dist/assets/images/common/InstagramLogo.png'); ?>" alt="インスタグラムのロゴ">
          </a>
        </div>
      </div>

      <nav class="footer__nav nav">
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

      <small class="footer__copyright">Copyright © 2021 - <?php echo wp_date("Y"); ?> Blue Grow All Rights Reserved.</small>
    </div>
  </footer>

  <!-- ページトップボタン -->
  <div class="top-btn" id="top-btn">
    <div class="top-btn__wrapper top-btn__wrapper--front" id="top-btn__wrapper--front">
      <img src="<?php echo get_theme_file_uri('dist/assets/images/common/diver2.png'); ?>" alt="ダイバーの絵">
      <p class="top-btn__text top-btn__text--front">TOP</p>
    </div>

    <div class="top-btn__wrapper top-btn__wrapper--back" id="top-btn__wrapper--back">
      <img src="<?php echo get_theme_file_uri('dist/assets/images/common/diver.png'); ?>" alt="ダイバーの絵">
      <p class="top-btn__text top-btn__text--back">TOP</p>
    </div>
  </div>
  <?php wp_footer(); ?>
  </body>

  </html>