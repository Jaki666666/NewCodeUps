<!-- thanksページ -->
<?php get_header(); ?>

<main>
    <!-- mv -->
    <div class="mv sub-page-mv">
        <picture class="mv__picture">
            <source class="mv__img-sp" srcset="<?php echo get_theme_file_uri('dist/assets/images/common/contact-mv.jpg'); ?>" media="(max-width: 767px)">
            <img class="mv__img-pc" src="<?php echo get_theme_file_uri('dist/assets/images/common/contact-mv-pc.jpg'); ?>" alt="船が通った後に泡立つ海">
        </picture>

        <h2 class="mv__title mv__title--sub-page">Contact</h2>
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
            <img class="content__sub-page-decoration sub-page-decoration sub-page-decoration--700" src="<?php echo get_theme_file_uri('dist/assets/images/common/a-school-of-fish-campaign-sub.png'); ?>" alt="魚群の絵">

            <!-- message -->
            <div class="message thanks-message">
                <p class="message__text">お問い合わせ内容を送信完了しました。</p>
                <p class="message__text">このたびは、お問い合わせ頂き<br class="u-mobile">
                    誠にありがとうございます。<br>
                    お送り頂きました内容を確認の上、<br class="u-mobile">
                    3営業日以内に折り返しご連絡させて頂きます。<br>
                    また、ご記入頂いたメールアドレスへ、<br class="u-mobile">
                    自動返信の確認メールをお送りしております。</p>
            </div>
        </div>
    </div>


</main>

<?php get_footer(); ?>