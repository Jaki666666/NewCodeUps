<!-- priceページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/price-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/price-mv-pc.jpg'); ?>" alt="水中で下から見た無数の泡">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Price</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb bread-crumb--price">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner inner--700">
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--700" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <!-- price-lists -->
            <section class="content__price-lists price-lists">
                <div class="price-lists__price-list" id="price-list1">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab.png'); ?>" alt="くじらの絵">
                        <h3 class="price-lists__title">ライセンス講習</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $licenseDetail = SCF::get('license-detail');
                        foreach ($licenseDetail as $fields) {
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['license-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['license-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>
                </div>

                <div class="price-lists__price-list" id="price-list2">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab.png'); ?>" alt="くじらの絵">
                        <h3 class="price-lists__title">体験ダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $experienceDetail = SCF::get('experience-detail');
                        foreach ($experienceDetail as $fields) {
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['experience-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['experience-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>
                </div>

                <div class="price-lists__price-list" id="price-list3">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab.png'); ?>" alt="くじらの絵">
                        <h3 class="price-lists__title">ファンダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $funDetail = SCF::get('fun-detail');
                        foreach ($funDetail as $fields) {
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['fun-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['fun-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>
                </div>

                <div class="price-lists__price-list">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab.png'); ?>" alt="くじらの絵">
                        <h3 class="price-lists__title">スペシャルダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $specialDetail = SCF::get('special-detail');
                        foreach ($specialDetail as $fields) {
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['special-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['special-price']; ?></dd>
                        <?php
                        } ?>
                    </dl>
                </div>
            </section>
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