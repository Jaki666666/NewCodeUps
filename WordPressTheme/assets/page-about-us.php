<!-- about usページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/aboutus-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/aboutus-mv-pc.jpg" alt="水中でこちらを見るダイバー4人">
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
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--about-us" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- about-us -->
            <div class="content__about-us about-us">
                <div class="about-us__content about-us__content--about-us">
                    <div class="about-us__img-wrapper about-us__img-wrapper--about-us">
                        <img src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/about-us-img-right-pc.jpg" alt="水中を漂う白いクラゲ">
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
                <img class="gallery__decoration u-desktop" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-contact.png" alt="魚群の絵">

                <div class="gallery__section-title section-title">
                    <p class="section-title__english"><span class="js-initial">G</span><span>allery</span></p>
                    <h2 class="section-title__japanese">フォト</h2>
                </div>

                <ul class="gallery__items">
                    <?php
                    $imgs = SCF::get('gallery');
                    foreach ($imgs as $img):
                        // 画像のIDを取得
                        $image_id = $img['gallery-image'];
                        // 画像のURLとalt属性を取得
                        $image_data = wp_get_attachment_image_src($image_id, 'full');
                        // 画像が取得できた場合は表示
                        if ($image_data) :
                            $image_url = $image_data[0];
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                    ?>
                            <li class="gallery__item">
                                <img class="js-gallery-img" src="<?php echo esc_url($image_url) ?>" alt="<?php echo esc_attr($image_alt) ?>">
                            </li>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </ul>
            </section>

            <!-- gallery画像のモーダル時の背景 -->
            <div class="modal" id="modal"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>