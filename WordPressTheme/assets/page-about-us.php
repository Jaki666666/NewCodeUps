<!-- about usページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/aboutus-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/aboutus-mv-pc.jpg'); ?>" alt="水中でこちらを見るダイバー4人">
        </picture>

        <h2 class="mv__title mv__title--sub-page">About us</h2>
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
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--about-us" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <!-- about-us -->
            <div class="content__about-us about-us">
                <div class="about-us__content about-us__content--about-us">
                    <div class="about-us__img-wrapper about-us__img-wrapper--about-us">
                        <img src="<?php echo get_theme_file_uri('dist/assets/images/common/about-us-img-right-pc.jpg'); ?>" alt="水中を漂う白いクラゲ">
                    </div>

                    <div class="about-us__text about-us__text--about-us">
                        <p class="about-us__slogan about-us__slogan--about-us">Memories<br>
                            in the Sea</p>

                        <div class="about-us__text-bottom about-us__text-bottom--about-us">
                            <p class="about-us__explanation">
                                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- gallery -->
            <section class="gallery about-us-gallery">
                <img class="gallery__decoration u-desktop" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-contact.png'); ?>" alt="魚群の絵">

                <div class="gallery__section-title section-title">
                    <p class="section-title__english"><span class="js-initial">G</span><span>allery</span></p>
                    <h2 class="section-title__japanese">フォト</h2>
                </div>

                <ul class="gallery__items">
                    <?php
                    $imgs = SCF::get('gallery');
                    foreach ($imgs as $img) {
                        // 画像のIDを取得
                        $image_id = $img['gallery-image'];
                        // 画像のURLとalt属性を取得
                        $image_data = wp_get_attachment_image_src($image_id, 'full');
                        // 画像が取得できた場合は表示
                        if ($image_data) {
                            $image_url = $image_data[0];
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    ?>
                            <li class="gallery__item">
                                <?php echo '<img class="js-gallery-img" src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">'; ?>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

            </section>

            <!-- gallery画像のモーダル時の背景 -->
            <div class="modal" id="modal"></div>
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