<!-- site-mapページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/site-map-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/site-map-mv-pc.jpg" alt="波打ち際から見る夕日">
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
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--site-map" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- nav -->
            <nav class="content__nav nav nav--site-map">
                <div class="nav__left">
                    <div class="nav__first">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/campaign')); ?>">キャンペーン</a>
                            </li>

                            <?php
                            $terms = get_terms('campaign_category'); // タクソノミースラッグを指定
                            foreach ($terms as $term) : ?>
                                <li class="nav__item"><a href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?></a></li>
                            <?php
                            endforeach;
                            ?>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/about-us')); ?>">私たちについて</a>
                            </li>
                        </ul>
                    </div>

                    <div class="nav__second nav-second--site-map">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
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
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/blog')); ?>">ブログ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="nav__right">
                    <div class="nav__third">
                        <ul class="nav__items">
                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/voice')); ?>">お客様の声</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
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
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/faq')); ?>">よくある質問</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/sitemap')); ?>">サイトマップ</a>
                            </li>


                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/privacypolicy')); ?>">プライバシー<br class="nav__br">ポリシー</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">利用規約</a>
                            </li>

                            <li class="nav__item nav__item--page-link">
                                <img class="nav__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/starfish-black.png" alt="ヒトデの絵">
                                <a href="<?php echo esc_url(home_url('/contact')); ?>">お問合せ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</main>

<?php get_footer(); ?>