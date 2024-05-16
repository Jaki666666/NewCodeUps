<!-- faqページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/faq-mv.jpg" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/faq-mv-pc.jpg" alt="渦巻く波">
        </picture>

        <h2 class="mv__title mv__title--sub-page">FAQ</h2>
    </div>

    <!-- パンくずリスト -->
    <div class="bread-crumb sub-page-bread-crumb">
        <div class="bread-crumb__inner inner">
            <?php bcn_display(); ?>
        </div>
    </div>

    <!-- コンテンツ部分 -->
    <div class="content sub-page-content">
        <div class="content__inner inner inner--700">
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--700" src="<?php echo get_theme_file_uri(''); ?>/dist/assets/images/common/a-school-of-fish-campaign-sub.png" alt="魚群の絵">

            <!-- question-list -->
            <div class="question-list faq-question-list">
                <?php
                $faq = SCF::get('faq');
                foreach ($faq as $fields):
                ?>
                    <div class="question-list__accordion">
                        <p class="question-list__title is-active"><?php echo $fields['question']; ?></p>
                        <p class="question-list__explanation is-active">
                            <?php echo $fields['answer']; ?>
                        </p>
                    </div>
                <?php
                endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>