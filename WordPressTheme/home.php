<!-- blogページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-mv-pc.jpg" alt="海底にいるダイバーとサメ">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Blog</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb sub-page-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- blog-list -->
    <div class="blog-list sub-page-content">
        <div class="blog-list__inner inner">
            <img class="blog-list__sub-page-decoration sub-page-decoration sub-page-decoration--blog" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <div class="blog-list__first">
                <div class="blog-list__blog-cards blog-cards blog-cards--blog">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                    ?>
                            <div class="blog-card">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="blog-card__img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                                    <div class="blog-card__text">
                                        <time class="blog-card__date" datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('Y-m-d H:i'); ?></time>
                                        <p class="blog-card__title"><?php the_title(); ?></p>
                                        <div class="blog-card__bottom-wrapper">
                                            <p class="blog-card__explanation">
                                                <?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                        endwhile;
                        // メインのクエリをリセット
                        wp_reset_postdata();
                    else: ?>
                        <!-- 記事が存在しない場合の処理 -->
                        <p>記事がありません。</p>
                    <?php
                    endif;
                    ?>
                </div>

                <!-- ページネーション -->
                <div class="content__pagination pagination">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>

            <!-- sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>


