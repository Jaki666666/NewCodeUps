<!-- priceページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/price-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/price-mv-pc.jpg" alt="水中で下から見た無数の泡">
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
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--700" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- price-lists -->
            <section class="content__price-lists price-lists">
                <div class="price-lists__price-list" id="price-list1">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab.png" alt="くじらの絵">
                        <h3 class="price-lists__title">ライセンス講習</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $licenseDetail = SCF::get('license-detail');
                        foreach ($licenseDetail as $fields) :
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['license-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['license-price']; ?></dd>
                        <?php
                        endforeach; ?>
                    </dl>
                </div>

                <div class="price-lists__price-list" id="price-list2">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab.png" alt="くじらの絵">
                        <h3 class="price-lists__title">体験ダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $experienceDetail = SCF::get('experience-detail');
                        foreach ($experienceDetail as $fields) :
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['experience-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['experience-price']; ?></dd>
                        <?php
                        endforeach; ?>
                    </dl>
                </div>

                <div class="price-lists__price-list" id="price-list3">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab.png" alt="くじらの絵">
                        <h3 class="price-lists__title">ファンダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $funDetail = SCF::get('fun-detail');
                        foreach ($funDetail as $fields) :
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['fun-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['fun-price']; ?></dd>
                        <?php
                        endforeach; ?>
                    </dl>
                </div>

                <div class="price-lists__price-list">
                    <div class="price-lists__title-wrapper">
                        <img class="price-lists__title-img" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/tab.png" alt="くじらの絵">
                        <h3 class="price-lists__title">スペシャルダイビング</h3>
                    </div>

                    <dl class="price-lists__dl">
                        <?php
                        $specialDetail = SCF::get('special-detail');
                        foreach ($specialDetail as $fields) :
                        ?>
                            <dt class="price-lists__dt"><?php echo $fields['special-course']; ?></dt>
                            <dd class="price-lists__dd"><?php echo $fields['special-price']; ?></dd>
                        <?php
                        endforeach; ?>
                    </dl>
                </div>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>