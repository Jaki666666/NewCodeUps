<!-- voiceページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/voice-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/voice-mv-pc.jpg'); ?>" alt="海底を泳ぐ白と黒の縞模様の魚たち">
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
            <img class="content__sub-page-decoration sub-page-decoration" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <!-- links -->
            <ul class="links">
                <li class="links__item is-active">
                    <a href="<?php echo esc_url(home_url('/voice')); ?>">ALL</a>
                </li>
                <?php
                $allterms = get_terms('voice_category');
                foreach ($allterms as $allterm) :
                ?>
                    <li <?php echo 'class="links__item"'; ?>><a href="<?php echo get_term_link($allterm); ?>" class="<?php if ($allterm->slug == $term) {
                                                                                                                            echo ' class="is-active"';
                                                                                                                        } ?>">
                            <?php echo $allterm->name; ?>
                        </a></li>
                <?php
                endforeach;
                ?>
            </ul>

            <!-- voice-cards -->
            <div class="content__voice-cards voice-cards">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
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
                                        if ($terms && !is_wp_error($terms)) {
                                            echo '<p class="voice-card__category">';
                                            foreach ($terms as $term) {
                                                // ターム名やリンクなどの情報を取得
                                                $term_name = $term->name;
                                                $term_link = get_term_link($term);

                                                // ここで取得した情報を span タグ内に表示
                                                echo  esc_html($term_name);
                                            }
                                            echo '</p>';
                                        }
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
                else :
                    // 記事が存在しない場合の処理
                    echo '記事がありません。';
                endif;
                ?>
            </div>

            <!-- ページネーション -->
            <ul class="content__pagination pagination">
                <?php wp_pagenavi(); ?>
            </ul>
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
                            <p class="contact__day-off">定休日:毎週火曜日</p>
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