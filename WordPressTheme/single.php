<!-- blog詳細ページ -->
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
                <div class="blog-detail">
                    <time class="blog-detail__date" datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('Y-m-d H:i'); ?></time>

                    <h2 class="blog-detail__category"><?php the_title(); ?></h2>

                    <?php if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            the_content();
                        endwhile;
                    endif; ?>

                    <div class="blog-detail__arrows">
                        <?php
                        // 現在の投稿の前後にある記事を取得
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();

                        // 前の記事がある場合は、リンクを表示
                        if ($prev_post) :
                            $prev_post_url = get_permalink($prev_post->ID); ?>
                            <div class="blog-detail__prev"><a href="<?php echo esc_url($prev_post_url) ?>"></a></div>
                        <?php
                        endif;

                        // 次の記事がある場合は、リンクを表示
                        if ($next_post) :
                            $next_post_url = get_permalink($next_post->ID); ?>
                            <div class="blog-detail__next"><a href="<?php echo esc_url($next_post_url) ?>"></a></div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
