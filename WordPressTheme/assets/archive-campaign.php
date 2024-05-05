<!-- campaignページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/campaign-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/campaign-mv-pc.jpg" alt="海底を泳ぐ4匹のエイ">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Campaign</h2>
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
                <li class="links__item is-active">
                    <a href="<?php echo esc_url(home_url('/campaign')); ?>">ALL</a>
                </li>
                <?php
                $allterms = get_terms('campaign_category');
                foreach ($allterms as $allterm) :
                ?>
                    <li class="links__item <?php if ($allterm->slug == $term): ?> is-active <?php endif; ?>">
                        <a href="<?php echo get_term_link($allterm); ?>">
                            <?php echo $allterm->name; ?>
                        </a>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

            <!-- campaign-cards -->
            <div class="content__campaign-cards campaign-cards">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <div class="campaign-cards__campaign-card campaign-card">
                            <img class="campaign-card__img campaign-card__img--campaign-list" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                            <div class="campaign-card__text campaign-card__text--campaign-list">
                                <div class="campaign-card__category-wrapper">
                                    <?php
                                    // カスタム投稿のIDを取得
                                    $post_id = get_the_ID();

                                    // カテゴリー（ターム）の取得
                                    $terms = get_the_terms($post_id, 'campaign_category');

                                    // カテゴリーが存在する場合に処理
                                    if ($terms && !is_wp_error($terms)) : ?>
                                        <p class="campaign-card__category">
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
                                <p class="campaign-card__title campaign-card__title--campaign-list"><?php the_title(); ?></p>
                                <p class="campaign-card__price-text campaign-card__price-text--campaign-list">全部コミコミ(お一人様)</p>

                                <div class="campaign-card__price">
                                    <p class="campaign-card__normal-price campaign-card__normal-price--campaign-list"><?php the_field('normal-price'); ?></p>
                                    <p class="campaign-card__discounted-price campaign-card__discounted-price--campaign-list"><?php the_field('discounted-price'); ?>
                                    </p>
                                </div>

                                <?php $content_string = get_the_content();

                                $content_string = str_replace('<p', '<p class="u-desktop" ', $content_string);

                                echo $content_string; ?>

                                <p class="campaign-card__period u-desktop"><?php the_field('campaign-period'); ?></p>

                                <p class="campaign-card__contact u-desktop">ご予約・お問合せはコチラ</p>

                                <div class="campaign-card__btn-wrapper u-desktop">
                                    <a class="btn" href="<?php echo esc_url(home_url('/contact')); ?>">
                                        <span class="btn__text">Contact us</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    // メインのクエリをリセット
                    wp_reset_postdata();
                else : ?>
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
    </div>
</main>

<?php get_footer(); ?>

