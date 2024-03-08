<!-- site-mapページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/site-map-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/site-map-mv-pc.jpg'); ?>" alt="波打ち際から見る夕日">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Site MAP</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb sub-page-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner">
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--site-map" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <!-- nav -->
            <nav class="content__nav nav nav--site-map">
                <div class="nav__left">
                    <div class="nav__first">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
                            </li>

                            <?php
                            $terms = get_terms('campaign_category'); // タクソノミースラッグを指定
                            foreach ($terms as $term) {
                                echo '<li class="nav__item"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                            }
                            ?>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav__second nav-second--site-map">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/information')); ?>">ダイビング情報</a>
                            </li>

                            <li class="nav__item">
                                <a href="<?php echo esc_url(home_url('/information#tab1')); ?>">ライセンス講習</a>
                            </li>

                            <li class="nav__item">
                                <a href="<?php echo esc_url(home_url('/information#tab2')); ?>">ファンダイビング</a>
                            </li>

                            <li class="nav__item">
                                <a href="<?php echo esc_url(home_url('/information#tab3')); ?>">体験ダイビング</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="nav__right">
                    <div class="nav__third">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
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

                    <div class="nav__fourth nav__fourth--site-map">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
                            </li>


                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="nav__br">ポリシー</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/starfish-black.png'); ?>" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/contact')); ?>">お問合せ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- contact -->
    <section class="contact sub-page-contact" id="contact">
        <div class="contact__inner inner">

            <div class="contact__wrapper">
                <div class="contact__first-half">
                    <img class="contact__decoration" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-contact.png'); ?>" alt="魚群の絵">

                    <div class="contact__site-title-wrapper">
                        <img class="contact__site-title" src="<?php echo get_theme_file_uri('dist/assets/images/common/blue-grow.png'); ?>" alt="サイトロゴ">
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
</main>

<?php get_footer(); ?>