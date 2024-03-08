<!-- トップページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv top-mv">
        <?php for ($i = 1; $i <= 4; $i++) : ?>
            <?php
            // sp-image と pc-image のフィールド名
            $sp_image_field = 'sp-image_' . $i;
            $pc_image_field = 'pc-image_' . $i;

            // sp-image の画像のIDを取得
            $sp_image_id = get_field($sp_image_field);

            // pc-image の画像のIDを取得
            $pc_image_id = get_field($pc_image_field);

            // sp-image の画像のURLを取得
            $sp_image_url = wp_get_attachment_image_url($sp_image_id, 'full');

            // pc-image の画像のURLを取得
            $pc_image_url = wp_get_attachment_image_url($pc_image_id, 'full');

            // pc-image の画像のalt属性を取得
            $pc_image_alt = get_post_meta($pc_image_id, '_wp_attachment_image_alt', true);
            ?>

            <picture class="mv__picture">
                <?php if ($sp_image_url) : ?>
                    <source srcset="<?php echo esc_url($sp_image_url); ?>" media="(max-width: 767px)">
                <?php endif; ?>
                <?php if ($pc_image_url) : ?>
                    <img src="<?php echo esc_url($pc_image_url); ?>" alt="<?php echo esc_attr($pc_image_alt); ?>">
                <?php endif; ?>
            </picture>
        <?php endfor; ?>


        <div class="mv__title">
            <h2 class="mv__main-title">Odyssey</h2>
            <p class="mv__sub-title">Dive into Eternal Blue</p>
        </div>
    </div>

    <!-- campaign -->
    <section class="campaign top-campaign" id="campaign">
        <div class="campaign__inner inner">
            <div class="campaign__section-title section-title">
                <p class="section-title__english"><span class="js-initial">C</span><span>ampaign</span></p>
                <h2 class="section-title__japanese">キャンペーン</h2>
            </div>

            <div class="campaign__swiper-btn-wrapper">
                <!-- 前後の矢印 -->
                <div class="campaign__swiper-button-prev swiper-button-prev" id="swiper-button-prev">
                    <span class="campaign__btn-arrow campaign__btn-arrow--prev" id="btn-arrow-prev"></span>
                </div>
                <div class="campaign__swiper-button-next swiper-button-next" id="swiper-button-next">
                    <span class="campaign__btn-arrow campaign__btn-arrow--next" id="btn-arrow-next"></span>
                </div>
            </div>

            <!-- Slider main container -->
            <div class="campaign__swiper swiper js-campaign-swiper">
                <!-- Additional required wrapper -->
                <div class="campaign__swiper-wrapper swiper-wrapper">
                    <!-- Slides -->
                    <?php
                    $campaign_query = new WP_Query(
                        array(
                            'post_type'      => 'campaign', // カスタム投稿タイプの指定
                            'posts_per_page' => 4,
                        )
                    );

                    if ($campaign_query->have_posts()) :
                        while ($campaign_query->have_posts()) :
                            $campaign_query->the_post();
                    ?>
                            <div class="campaign__swiper-slide swiper-slide">
                                <div class="campaign-card">
                                    <?php $thumbID = get_post_thumbnail_id(get_the_ID()); ?>
                                    <?php
                                    // サムネイル画像の取得
                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    // サムネイルのalt属性を取得
                                    $thumbnail_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                    ?>
                                    <img class="campaign-card__img" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($thumbnail_alt); ?>">

                                    <div class="campaign-card__text">
                                        <div class="campaign-card__category-wrapper">
                                            <?php
                                            // カスタム投稿のIDを取得
                                            $post_id = get_the_ID();

                                            // カテゴリー（ターム）の取得
                                            $terms = get_the_terms($post_id, 'campaign_category');

                                            // カテゴリーが存在する場合に処理
                                            if ($terms && !is_wp_error($terms)) {
                                                echo '<p class="campaign-card__category">';
                                                foreach ($terms as $term) {
                                                    // ターム名やリンクなどの情報を取得
                                                    $term_name = $term->name;
                                                    $term_link = get_term_link($term);

                                                    // ここで取得した情報を span タグ内に表示
                                                    echo esc_html($term_name);
                                                }
                                                echo '</p>';
                                            }
                                            ?>
                                        </div>
                                        <p class="campaign-card__title"><?php the_title(); ?></p>
                                        <div class="campaign-card__bottom-wrapper">
                                            <p class="campaign-card__price-text">全部コミコミ(お一人様)</p>
                                            <div class="campaign-card__price">
                                                <p class="campaign-card__normal-price"><?php the_field('normal-price'); ?></p>
                                                <p class="campaign-card__discounted-price"><?php the_field('discounted-price'); ?></p>
                                            </div>
                                        </div>
                                    </div>
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
            </div>

            <!-- セクション内ボタン -->
            <div class="campaign__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('campaign')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </div>
    </section>

    <!-- about us -->
    <section class="about-us top-about-us" id="about-us">
        <div class="about-us__inner inner">
            <img class="about-us__decoration" src="<?php echo get_theme_file_uri('dist/assets/images/common/coral.png'); ?>" alt="サンゴの絵">

            <div class="about-us__section-title section-title">
                <p class="section-title__english"><span class="js-initial">A</span><span>bout us</span></p>
                <h2 class="section-title__japanese">私たちについて</h2>
            </div>

            <div class="about-us__content">
                <div class="about-us__img-wrapper">
                    <img src="<?php echo get_theme_file_uri('dist/assets/images/common/about-us-img-right-pc.jpg'); ?>" alt="水中を漂う白いクラゲ">
                </div>

                <div class="about-us__text">
                    <p class="about-us__slogan">Memories<br>
                        in the Sea</p>

                    <div class="about-us__text-bottom">
                        <p class="about-us__explanation">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>

                        <!-- セクション内ボタン -->
                        <div class="about-us__btn-wrapper">
                            <a class="btn" href="<?php echo esc_url(home_url('/about-us')); ?>">
                                <span class="btn__text">View more</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- information -->
    <section class="information top-information" id="information">
        <div class="information__inner inner">
            <div class="information__section-title section-title">
                <p class="section-title__english"><span class="js-initial">I</span><span>nformation</span></p>
                <h2 class="section-title__japanese">ダイビング情報</h2>
            </div>

            <div class="information__content">
                <div class="swiper js-information-swiper">
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                            <?php
                            // 画像の ID を取得
                            $image_id = get_field('information-image_' . $i);

                            // 画像が存在するかチェックし、存在する場合は URL と alt 属性を取得
                            if ($image_id) :
                                $image_url = wp_get_attachment_image_url($image_id, 'full');
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            ?>
                                <div class="swiper-slide">
                                    <img class="information__img" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="information__text">
                    <p class="information__text-title">ライセンス講習</p>
                    <p class="information__explanation">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
                        正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>

                    <!-- セクション内ボタン -->
                    <div class="information__btn-wrapper">
                        <a class="btn" href="<?php echo esc_url(home_url('/information')); ?>">
                            <span class="btn__text">View more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog -->
    <section class="blog top-blog" id="blog">
        <div class="blog__inner inner">
            <img class="blog__decoration" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-blog.png'); ?>" alt="魚群の絵">

            <div class="blog__section-title section-title">
                <p class="section-title__english"><span class="js-initial">B</span><span>log</span></p>
                <h2 class="section-title__japanese">ブログ</h2>
            </div>

            <div class="blog__blog-cards blog-cards">
                <?php
                $blog_query = new WP_Query(
                    array(
                        'post_type'      => 'post', // 通常の投稿タイプの指定
                        'posts_per_page' => 3
                    )
                );                

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) :
                        $blog_query->the_post();
                ?>
                        <div class="blog-card">
                            <a href="<?php the_permalink(); ?>">
                                <img class="blog-card__img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)); ?>">

                                <div class="blog-card__text">
                                    <time class="blog-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                                    <p class="blog-card__title"><?php the_title(); ?></p>
                                    <div class="blog-card__bottom-wrapper">
                                        <p class="blog-card__explanation"><?php the_excerpt(); ?></p>
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

            <!-- セクション内ボタン -->
            <div class="blog__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('/blog')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </div>
    </section>

    <!-- voice -->
    <section class="voice top-voice" id="voice">
        <div class="voice__inner inner">
            <img class="voice__decoration-fish" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-voice.png'); ?>" alt="魚群の絵">

            <div class="voice__section-title section-title">
                <p class="section-title__english"><span class="js-initial">V</span><span>oice</span></p>
                <h2 class="section-title__japanese">お客様の声</h2>
            </div>

            <div class="voice__voice-cards voice-cards">
                <img class="voice-cards__decoration-seahorse" src="<?php echo get_theme_file_uri('dist/assets/images/common/seahorse.jpg'); ?>" alt="タツノオトシゴの絵">

                <?php
                $voice_query = new WP_Query(
                    array(
                        'post_type'      => 'voice', // カスタム投稿タイプの指定
                        'posts_per_page' => 2
                    )
                );

                if ($voice_query->have_posts()) :
                    while ($voice_query->have_posts()) :
                        $voice_query->the_post();
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
                                <p class="voice-card__explanation"><?php the_excerpt(); ?></p>
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

            <!-- セクション内ボタン -->
            <div class="voice__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('/voice')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </div>
    </section>

    <!-- price -->
    <section class="price top-price" id="price">
        <div class="price__inner inner">
            <img class="price__decoration" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-price.png'); ?>" alt="魚群の絵">

            <div class="price__section-title section-title">
                <p class="section-title__english"><span class="js-initial">P</span><span>rice</span></p>
                <h2 class="section-title__japanese">料金一覧</h2>
            </div>

            <div class="price__content">
                <div class="price__animation-img animation-img">
                    <picture class="price__picture">
                        <source srcset="<?php echo get_theme_file_uri('dist/assets/images/common/price.jpg'); ?>" media="(max-width: 767.5px)">
                        <img id="price-animation-img" src="<?php echo get_theme_file_uri('dist/assets/images/common/price-pc.jpg'); ?>" alt="光が差す中水面に向かって泳ぐダイバー">
                    </picture>

                    <div class="price__bg" id="price-bg-animation"></div>
                </div>

                <div class="price__text">
                    <p class="price__list-title">ライセンス講習</p>
                    <dl class="price__list">
                        <?php
                        $licenseDetail = SCF::get('license-detail', 186);
                        foreach ($licenseDetail as $fields) {
                        ?>
                            <dt class="price__course"><?php echo $fields['license-course']; ?></dt>
                            <dd class="price__price"><?php echo $fields['license-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>

                    <p class="price__list-title">体験ダイビング</p>
                    <dl class="price__list">
                        <?php
                        $experienceDetail = SCF::get('experience-detail', 186);
                        foreach ($experienceDetail as $fields) {
                        ?>
                            <dt class="price__course"><?php echo $fields['experience-course']; ?></dt>
                            <dd class="price__price"><?php echo $fields['experience-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>

                    <p class="price__list-title">ファンダイビング</p>
                    <dl class="price__list">
                        <?php
                        $funDetail = SCF::get('fun-detail', 186);
                        foreach ($funDetail as $fields) {
                        ?>
                            <dt class="price__course"><?php echo $fields['fun-course']; ?></dt>
                            <dd class="price__price"><?php echo $fields['fun-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>

                    <p class="price__list-title">スペシャルダイビング</p>
                    <dl class="price__list">
                        <?php
                        $specialDetail = SCF::get('special-detail', 186);
                        foreach ($specialDetail as $fields) {
                        ?>
                            <dt class="price__course"><?php echo $fields['special-course']; ?></dt>
                            <dd class="price__price"><?php echo $fields['special-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>
                </div>
            </div>

            <!-- セクション内ボタン -->
            <div class="price__btn-wrapper">
                <a class="btn" href="<?php echo esc_url(home_url('/price')); ?>">
                    <span class="btn__text">View more</span>
                </a>
            </div>
        </div>
    </section>

    <!-- contact -->
    <section class="contact top-contact" id="contact">
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