<?php get_header(); ?>

<main>
    <!-- パンくずリスト -->
    <div class="bread-crumb bread-crumb--404 page404-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner">
            <div class="content__error-message error-message">
                <img src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/whale-404.png" alt="くじらの絵">

                <p class="error-message__number">404</p>
                <p class="error-message__apology">申し訳ありません。<br>
                    お探しのページが見つかりません。</p>

                <div class="error-message__btn-wrapper">
                    <a class="btn btn--404" href="<?php echo esc_url(home_url('/')); ?>">
                        <span class="btn__text btn__text--404">Page TOP</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>