<!-- privacy-policyページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/site-map-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/site-map-mv-pc.jpg" alt="波打ち際から見る夕日">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Privacy Policy</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb sub-page-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner inner--800">
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--800 sub-page-decoration--privacy-policy" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <section class="content__privacy-policy privacy-policy">
                <?php the_content(); ?>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>