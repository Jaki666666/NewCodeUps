<!-- informationページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/information-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/information-mv-pc.jpg" alt="珊瑚礁に光が差している様子">
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
            <img class="content__sub-page-decoration sub-page-decoration" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- information-list -->
            <div class="content__information-list information-list">
                <!-- タブ -->
                <ul class="information-list__tab tab">
                    <li class="tab__item is-active" id="tab1" data-id="#tab1">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab.png" alt="くじらの絵">
                        <p class="tab__text">ライセンス<br class="u-mobile">講習</p>
                    </li>
                    <li class="tab__item" id="tab2">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab2.png" alt="くじらの絵">
                        <p class="tab__text">ファン<br class="u-mobile">ダイビング</p>
                    </li>
                    <li class="tab__item" id="tab3">
                        <img class="tab__img u-desktop" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab3.png" alt="魚の絵">
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

                            <img class="information-card__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/information5.jpg" alt="水面から水中を見る2人のダイバー">
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

                            <img class="information-card__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/information6.jpg" alt="魚たちと浅瀬を泳ぐダイバー">
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

                            <img class="information-card__img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/gallery3.jpg" alt="海底を泳ぐ複数人のダイバー">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>