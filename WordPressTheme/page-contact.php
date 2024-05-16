<!-- contactページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/contact-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/contact-mv-pc.jpg" alt="船が通った後に泡立つ海">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Contact</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb sub-page-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner inner--700">
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--700 sub-page-decoration--contact" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- form -->
            <?php echo do_shortcode('[contact-form-7 id="cbdc0dc" title="コンタクトフォーム"]'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>