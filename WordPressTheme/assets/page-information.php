<!-- informationページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">

        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/information-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/information-mv-pc.jpg'); ?>" alt="珊瑚礁に光が差している様子">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Information</h2>
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

            <!-- information-list -->
            <div class="content__information-list information-list">
                <!-- タブ -->
                <ul class="information-list__tab tab">
                    <li class="tab__item is-active" id="tab1" data-id="#tab1">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab.png'); ?>" alt="くじらの絵">
                        <p class="tab__text">ライセンス<br class="u-mobile">講習</p>
                    </li>
                    <li class="tab__item" id="tab2">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab2.png'); ?>" alt="くじらの絵">
                        <p class="tab__text">ファン<br class="u-mobile">ダイビング</p>
                    </li>
                    <li class="tab__item" id="tab3">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri('dist/assets/images/common/tab3.png'); ?>" alt="魚の絵">
                        <p class="tab__text">体験<br class="u-mobile">ダイビング</p>
                    </li>
                </ul>

                <div class="information-list__information-cards information-cards">
                    <div class="information-cards__information-card information-card" data-content="1">
                        <div class="information-card__wrapper">
                            <div class="information-card__text">
                                <p class="information-card__title">ライセンス講習</p>
                                <div class="information-card__bottom-wrapper">
                                    <p class="information-card__explanation">
                                        泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                                    </p>
                                </div>
                            </div>

                            <img class="information-card__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/information5.jpg'); ?>" alt="水面から水中を見る2人のダイバー">
                        </div>
                    </div>

                    <div class="information-cards__information-card information-card js-hide" data-content="2">
                        <div class="information-card__wrapper">
                            <div class="information-card__text">
                                <p class="information-card__title">ファンダイビング</p>
                                <div class="information-card__bottom-wrapper">
                                    <p class="information-card__explanation">
                                        ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                                    </p>
                                </div>
                            </div>

                            <img class="information-card__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/information6.jpg'); ?>" alt="魚たちと浅瀬を泳ぐダイバー">
                        </div>
                    </div>

                    <div class="information-cards__information-card information-card js-hide" data-content="3">
                        <div class="information-card__wrapper">
                            <div class="information-card__text">
                                <p class="information-card__title">体験ダイビング</p>
                                <div class="information-card__bottom-wrapper">
                                    <p class="information-card__explanation">
                                        ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                                    </p>
                                </div>
                            </div>

                            <img class="information-card__img" src="<?php echo get_theme_file_uri('dist/assets/images/common/gallery3.jpg'); ?>" alt="海底を泳ぐ複数人のダイバー">
                        </div>
                    </div>
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