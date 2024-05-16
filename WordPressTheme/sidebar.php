<!-- sidebar -->
<div class="sidebar">
    <div class="sidebar__inner">
        <!-- 人気記事 -->
        <section class="sidebar__articles articles">
            <!-- セクションタイトル -->
            <div class="sidebar-title">
                <div class="sidebar-title__inner">
                    <img class="sidebar-title__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-list4.png" alt="くじらの絵">
                    <h2 class="sidebar-title__text">人気記事</h2>
                </div>

                <div class="sidebar-title__bg"></div>
            </div>

            <div class="articles__cards">
                <?php
                setPostViews(get_the_ID());
                $args = array(
                    'post_type' => 'post', // 通常の投稿タイプ
                    'posts_per_page' => 3,
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC'
                );

                $popular_query = new WP_Query($args);

                if ($popular_query->have_posts()) :
                    while ($popular_query->have_posts()) : $popular_query->the_post();
                ?>
                        <div class="articles__card">
                            <a href="<?php the_permalink(); ?>">
                                <img class="articles__card-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                                <div class="articles__card-text">
                                    <time class="articles__date" datetime="<?php the_time('Y-m-d H:i'); ?>"><?php the_time('Y-m-d H:i'); ?></time>
                                    <p class="articles__card-title"><?php the_title(); ?></p>
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
        </section>

        <!-- 口コミ -->
        <section class="sidebar__review review">
            <!-- セクションタイトル -->
            <div class="sidebar-title">
                <div class="sidebar-title__inner">
                    <img class="sidebar-title__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-list4.png" alt="くじらの絵">
                    <h2 class="sidebar-title__text">口コミ</h2>
                </div>

                <div class="sidebar-title__bg"></div>
            </div>

            <?php
            // カスタムクエリを作成
            $custom_query = new WP_Query(
                array(
                    'post_type'      => 'voice', // カスタム投稿タイプの指定
                    'posts_per_page' => 1
                )
            );

            if ($custom_query->have_posts()) :
                while ($custom_query->have_posts()) :
                    $custom_query->the_post();
            ?>
                    <div class="review__item">
                        <img class="review__item-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                        <p class="review__data"><?php the_field('personal-information'); ?></p>
                        <p class="review__title"><?php the_title(); ?></p>
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

            <!-- セクション内ボタン -->
            <div class="review__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('/voice')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </section>

        <!-- キャンペーン -->
        <section class="sidebar__blog-campaign blog-campaign">
            <!-- セクションタイトル -->
            <div class="sidebar-title">
                <div class="sidebar-title__inner">
                    <img class="sidebar-title__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-list4.png" alt="くじらの絵">
                    <h2 class="sidebar-title__text">キャンペーン</h2>
                </div>

                <div class="sidebar-title__bg"></div>
            </div>

            <?php
            $campaign_query = new WP_Query(
                array(
                    'post_type'      => 'campaign', // カスタム投稿タイプの指定
                    'posts_per_page' => 2
                )
            );

            if ($campaign_query->have_posts()) :
                $first_post = true; // 最初の投稿かどうかを判定する変数を初期化
                while ($campaign_query->have_posts()) :
                    $campaign_query->the_post();
            ?>
                    <div class="blog-campaign__card<?php echo $first_post ? ' blog-campaign__card--first' : ''; ?>">
                        <img class="blog-campaign__card-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                        <div class="blog-campaign__card-text">
                            <p class="blog-campaign__card-title"><?php the_title(); ?></p>
                            <p class="blog-campaign__price-text">全部コミコミ(お一人様)</p>

                            <div class="blog-campaign__price">
                                <p class="blog-campaign__normal-price"><?php the_field('normal-price'); ?></p>
                                <p class="blog-campaign__discounted-price"><?php the_field('discounted-price'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                    // 最初の投稿だった場合、変数を false に設定して次のループに備える
                    if ($first_post) :
                        $first_post = false;
                    endif;
                endwhile;
                // メインのクエリをリセット
                wp_reset_postdata();
            else: ?>
                <!-- 記事が存在しない場合の処理 -->
                <p>記事がありません。</p>
            <?php
            endif;
            ?>

            <!-- セクション内ボタン -->
            <div class="blog-campaign__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('/campaign')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </section>

        <!-- アーカイブ -->
        <section class="sidebar__archive">
            <!-- セクションタイトル -->
            <div class="sidebar-title">
                <div class="sidebar-title__inner">
                    <img class="sidebar-title__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/blog-list4.png" alt="くじらの絵">
                    <h2 class="sidebar-title__text">アーカイブ</h2>
                </div>

                <div class="sidebar-title__bg"></div>
            </div>

            <?php
            // 今月の年と月を取得
            $current_year = date('Y');
            $current_month = date('m');

            // 年ごとにループ
            for ($year = $current_year; $year >= 2022; $year--) : // 2022年から現在までの年を表示
                // その年の記事があるかどうかをチェック
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'date_query' => array(
                        array(
                            'year' => $year,
                            'month' => 12, // その年の12月をチェック
                            'compare' => '<=' // 以前の日付も含める
                        )
                    )
                );
                $query = new WP_Query($args);

                // 記事がある場合のみ表示
                if ($query->have_posts()) :
                    // 年の開始タグを出力
                    if ($year < $current_year) : ?>
                        <div class="sidebar__accordion sidebar__accordion--not-first accordion">
                            <div class="accordion__title">
                                <span></span>
                                <p class="accordion__year"><?php echo $year; ?></p>
                            </div>
                        <?php else : ?>
                            <div class="sidebar__accordion accordion">
                                <div class="accordion__title">
                                    <span></span>
                                    <p class="accordion__year"><?php echo $year; ?></p>
                                </div>
                            <?php endif; ?>

                            <!-- 月ごとにループ -->
                            <ul class="accordion__items">
                                <?php
                                for ($month = 12; $month >= 1; $month--) : // 12から1までの月を表示
                                    // その月の記事があるかどうかをチェック
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 1,
                                        'date_query' => array(
                                            array(
                                                'year' => $year,
                                                'month' => $month,
                                            )
                                        )
                                    );
                                    $query = new WP_Query($args);

                                    // 記事がある場合のみリンクを出力
                                    if ($query->have_posts()) :
                                        // ページの URL を生成
                                        $archive_url = esc_url(get_month_link($year, $month));

                                        // リンクのテキストを生成
                                        $month_text = date('n', mktime(0, 0, 0, $month, 1, $year)) . '月'; // 月の数値から日本語の月名を取得
                                ?>
                                        <li class="accordion__item">
                                            <a href="<?php echo $archive_url; ?>">
                                                <span></span>
                                                <p class="accordion__month"><?php echo $month_text; ?></p>
                                            </a>
                                        </li>
                                <?php endif;
                                endfor; ?>
                            </ul>
                            </div>
                            <!-- 月のリストを閉じる -->
                    <?php
                endif;
            endfor;
                    ?>
        </section>
    </div>
</div>