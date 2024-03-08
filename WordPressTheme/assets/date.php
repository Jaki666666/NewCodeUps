<!-- 月別ページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">

        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/blog-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/blog-mv-pc.jpg'); ?>" alt="海底にいるダイバーとサメ">
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
            <img class="blog-list__sub-page-decoration sub-page-decoration sub-page-decoration--blog" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <div class="blog-list__first">
                <div class="blog-list__blog-cards blog-cards blog-cards--blog">
                    <?php
                    if (have_posts()) : // メインループを確認する

                        while (have_posts()) : // メインループ内で記事があるかどうかを確認する
                            the_post(); // 現在の記事のデータをセットアップする
                    ?>
                            <div class="blog-card">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="blog-card__img" src="<?php the_post_thumbnail_url('full'); ?>" alt="">

                                    <div class="blog-card__text">
                                        <time class="blog-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
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
                    else :
                        // 記事が存在しない場合の処理
                        echo '記事がありません。';
                    endif;
                    ?>
                </div>

                <!-- ページネーション -->
                <div class="content__pagination pagination">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>

            <!-- sidebar -->
            <div class="sidebar">
                <div class="sidebar__inner">
                    <!-- 人気記事 -->
                    <section class="sidebar__articles articles">
                        <!-- セクションタイトル -->
                        <div class="sidebar-title">
                            <div class="sidebar-title__inner">
                                <img class="sidebar-title__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/blog-list4.png'); ?>" alt="くじらの絵">
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
                                                <time class="articles__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                                                <p class="articles__card-title"><?php the_title(); ?></p>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                // 記事が存在しない場合の処理
                                echo '記事がありません。';
                            endif;
                            ?>
                        </div>
                    </section>

                    <!-- 口コミ -->
                    <section class="sidebar__review review">
                        <!-- セクションタイトル -->
                        <div class="sidebar-title">
                            <div class="sidebar-title__inner">
                                <img class="sidebar-title__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/blog-list4.png'); ?>" alt="くじらの絵">
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
                                    <img class="review__item-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="">

                                    <p class="review__data"><?php the_field('personal-information'); ?></p>
                                    <p class="review__title"><?php the_title(); ?></p>
                                </div>

                        <?php
                            endwhile;

                            // メインのクエリをリセット
                            wp_reset_postdata();
                        else :
                            // 記事が存在しない場合の処理
                            echo '記事がありません。';
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
                                <img class="sidebar-title__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/blog-list4.png'); ?>" alt="くじらの絵">
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
                                    <img class="blog-campaign__card-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="水面スレスレを泳ぐダイバー">

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
                                if ($first_post) {
                                    $first_post = false;
                                }
                            endwhile;

                            // メインのクエリをリセット
                            wp_reset_postdata();
                        else :
                            // 記事が存在しない場合の処理
                            echo '記事がありません。';
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
                    <section class="sidebar__archive archive">
                        <!-- セクションタイトル -->
                        <div class="sidebar-title">
                            <div class="sidebar-title__inner">
                                <img class="sidebar-title__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/blog-list4.png'); ?>" alt="くじらの絵">
                                <h2 class="sidebar-title__text">アーカイブ</h2>
                            </div>

                            <div class="sidebar-title__bg"></div>
                        </div>

                        <?php
                        // 今月の年と月を取得
                        $current_year = date('Y');
                        $current_month = date('m');

                        // 年ごとにループ
                        for ($year = $current_year; $year >= 2022; $year--) { // 2022年から現在までの年を表示

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
                            if ($query->have_posts()) {
                                // 年の開始タグを出力
                                if ($year < $current_year) {
                                    echo '<div class="sidebar__accordion sidebar__accordion--not-first accordion">
                            <div class="accordion__title">
                                <span></span>
                                <p class="accordion__year">' . $year . '</p>
                            </div>';
                                } else {
                                    echo '<div class="sidebar__accordion accordion">
                            <div class="accordion__title">
                                <span></span>
                                <p class="accordion__year">' . $year . '</p>
                            </div>';
                                }

                                // 月ごとにループ
                                echo '<ul class="accordion__items">';
                                for ($month = 12; $month >= 1; $month--) { // 12から1までの月を表示

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
                                    if ($query->have_posts()) {
                                        // ページの URL を生成
                                        $archive_url = get_month_link($year, $month);

                                        // リンクのテキストを生成
                                        $month_text = date('n', mktime(0, 0, 0, $month, 1, $year)) . '月'; // 月の数値から日本語の月名を取得

                                        // リンクを出力
                                        echo '<li class="accordion__item">
                                <a href="' . esc_url($archive_url) . '">
                                    <span></span>
                                    <p class="accordion__month">' . $month_text . '</p>
                                </a>
                            </li>';
                                    }
                                }
                                echo '</ul>
                    </div>'; // 月のリストを閉じる
                            }
                        }
                        ?>
                    </section>
                </div>
            </div>
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
                            <p class="contact__dayーoff">定休日:毎週火曜日</p>
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