<!-- contact -->
<section class="contact sub-page-contact" id="contact">
  <div class="contact__inner inner">

    <div class="contact__wrapper">
      <div class="contact__first-half">
        <img class="contact__decoration" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-contact.png" alt="魚群の絵">

        <div class="contact__site-title-wrapper">
          <img class="contact__site-title" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blue-grow.png" alt="サイトロゴ">
        </div>

        <div class="contact__information">
          <div class="contact__information-text">
            <p class="contact__address">沖縄県那覇市1-1</p>
            <p class="contact__phone-number">TEL:0120-000-0000</p>
            <p class="contact__opening-hours">営業時間:8:30-19:00</p>
            <p class="contact__day-off">定休日:毎週火曜日</p>
          </div>

          <div class="contact__map-wrapper">
            <iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d28635.43254523145!2d127.66045352449882!3d26.215244582433137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5rKW57iE55yM6YKj6KaH5biCMS0x!5e0!3m2!1sja!2sjp!4v1697657779060!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>

      <div class="contact__second-half">
        <div class="contact__section-title section-title">
          <p class="section-title__english section-title__english--contact">C<span>ontact</span></p>
          <h2 class="section-title__japanese section-title__japanese--contact">お問合せ</h2>
        </div>

        <p class="contact__explanation">ご予約・お問合せはコチラ</p>

        <!-- セクション内ボタン -->
        <div class="contact__btn-wrapper">
          <a class="btn" href="<?php echo esc_url(home_url('/contact')); ?>">
            <span class="btn__text">Contact us</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>   

<?php
if (!is_page(array('contact', 'thanks')) && !is_404()) :?> 
  <style>.contact { display: block; }</style>
  <?php else: ?> 
  <style>.contact { display: none; }</style>
  <?php endif; ?>

<!-- footer -->
<footer class="footer top-footer">
  <div class="footer__inner inner">
    <div class="footer__top">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img class="footer__site-title" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blue-grow.png" alt="サイトロゴ">
      </a>

      <div class="footer__socialmedia-icons">
        <a href="https://www.facebook.com/?locale=ja_JP" target=”_blank”>
          <img class="footer__facebook-icon" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/FacebookLogo.png" alt="フェイスブックのロゴ">
        </a>
        <a href="https://www.instagram.com/" target=”_blank”>
          <img class="footer__instagram-icon" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/InstagramLogo.png" alt="インスタグラムのロゴ">
        </a>
      </div>
    </div>

    <nav class="footer__nav nav">
      <div class="nav__left">
        <div class="nav__first">
          <ul class="nav__items">
            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
            </li>

            <?php
            $terms = get_terms('campaign_category'); // タクソノミースラッグを指定
            foreach ($terms as $term) :?>
            <li class="nav__item"><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
            <?php endforeach; ?>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
            </li>
          </ul>
        </div>

        <div class="nav__second">
          <ul class="nav__items">
            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
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
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="nav__right">
        <div class="nav__third">
          <ul class="nav__items">
            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
            </li>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
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
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
            </li>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
            </li>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="nav__br">ポリシー</a>
            </li>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
              <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
            </li>

            <li class="nav__item nav__item--page-link">
              <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish.png" alt="ヒトデの絵">
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
    <img src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/diver2.png" alt="ダイバーの絵">
    <p class="top-btn__text top-btn__text--front">TOP</p>
  </div>

  <div class="top-btn__wrapper top-btn__wrapper--back" id="top-btn__wrapper--back">
    <img src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/diver.png" alt="ダイバーの絵">
    <p class="top-btn__text top-btn__text--back">TOP</p>
  </div>
</div>
<?php wp_footer(); ?>
</body>

</html>