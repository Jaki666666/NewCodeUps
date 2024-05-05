<!-- voice カテゴリー別ページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/voice-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/voice-mv-pc.jpg" alt="海底を泳ぐ白と黒の縞模様の魚たち">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Voice</h2>
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
            <img class="content__sub-page-decoration sub-page-decoration" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- links -->
            <ul class="links">
                <li class="links__item">
                    <a href="<?php echo esc_url(home_url('/voice')); ?>">ALL</a>
                </li>
                <?php
                $allterms = get_terms('voice_category');
                foreach ($allterms as $allterm) :
                ?>
                    <li class="links__item <?php if ($allterm->slug == $term) : ?> is-active <?php endif; ?>">
                        <a href="<?php echo get_term_link($allterm); ?>">
                            <?php echo $allterm->name; ?>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

            <!-- voice-cards -->
            <div class="content__voice-cards voice-cards">
                <!-- カテゴリー別に記事を表示 -->
                <?php
                $paged = get_query_var('paged');
                $current_term_slug = get_query_var('term'); // 現在のタームのスラッグを取得

                $args = array(
                    'post_type' => 'voice', // カスタム投稿のスラッグ
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'voice_category', // タクソノミースラッグ
                            'field' => 'slug',
                            'terms' => $current_term_slug,
                        ),
                    ),
                );

                $the_query = new WP_Query($args);

                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div class="voice-card">
                            <div class="voice-card__top">
                                <div class="voice-card__information">
                                    <div class="voice-card__information-top">
                                        <p class="voice-card__data"><?php the_field('personal-information'); ?></p>

                                        <?php
                                        // カスタム投稿のIDを取得
                                        $post_id = get_the_ID();

                                        // カテゴリー（ターム）の取得
                                        $terms = get_the_terms($post_id, 'voice_category');

                                        // カテゴリーが存在する場合に処理
                                        if ($terms && !is_wp_error($terms)) : ?>
                                            <p class="voice-card__category">
                                                <?php foreach ($terms as $term) :
                                                    // ターム名やリンクなどの情報を取得
                                                    $term_name = $term->name;
                                                    $term_link = get_term_link($term);

                                                    // ここで取得した情報を span タグ内に表示
                                                    echo  esc_html($term_name);
                                                endforeach; ?>
                                            </p>
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                    <p class="voice-card__title"><?php the_title(); ?></p>
                                </div>

                                <div class="voice-card__animation-img animation-img">
                                    <img class="voice-card__img js-img-animation" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">
                                    <div class="voice-card__bg js-bg-animation"></div>
                                </div>
                            </div>

                            <div class="voice-card__bottom-wrapper">
                                <p class="voice-card__explanation"><?php the_content(); ?></p>
                            </div>
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
            <ul class="content__pagination pagination">
                <?php wp_pagenavi(); ?>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>