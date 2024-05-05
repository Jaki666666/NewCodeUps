<?php
function enqueue_custom_scripts_and_styles()
{
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Noto+Sans+JP:wght@400;500;700&display=swap');

    // Custom CSS
    wp_enqueue_style('custom-css', get_theme_file_uri('WordPressTheme/assets/css/style.css'));

    // jQuery
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true);

    // GSAP
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
    wp_enqueue_script('gsap-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), null, true);

    // Swiper
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);

    // Custom JavaScript
    wp_enqueue_script('custom-js', get_theme_file_uri('WordPressTheme/assets/js/script.js'), array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles');

// 通常投稿でアイキャッチ画像を設定できるようにする
function my_setup()
{
    add_theme_support('post-thumbnails'); /* アイキャッチ */
}
add_action('after_setup_theme', 'my_setup');

//	カスタム投稿タイプで「抜粋」を入力可に
add_post_type_support('voice', 'excerpt');

// campaignの投稿数
function campaign_archive_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('campaign')) {
        $query->set('posts_per_page', 4); // ここに表示したい投稿数を指定します
    }
}
add_action('pre_get_posts', 'campaign_archive_posts_per_page');

// campaignカテゴリー別ページの投稿数
function campaign_category_posts_per_page($query)
{
    // カテゴリーページでのメインクエリであるかを確認
    if (!is_admin() && $query->is_main_query() && is_tax('campaign_category')) {
        $query->set('posts_per_page', 4); // ここに表示したい投稿数を指定します
    }
}
add_action('pre_get_posts', 'campaign_category_posts_per_page');


// blogの投稿数
function blog_archive_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('blog')) {
        $query->set('posts_per_page', 10); // ここに表示したい投稿数を指定します
    }
}
add_action('pre_get_posts', 'blog_archive_posts_per_page');

// voiceの投稿数
function custom_post_type_archive_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('voice')) {
        $query->set('posts_per_page', 6); // ここに表示したい投稿数を指定します
    }
}
add_action('pre_get_posts', 'custom_post_type_archive_posts_per_page');

// voiceカテゴリー別ページの投稿数
function voice_category_posts_per_page($query)
{
    // カテゴリーページでのメインクエリであるかを確認
    if (!is_admin() && $query->is_main_query() && is_tax('voice_category')) {
        $query->set('posts_per_page', 6); // ここに表示したい投稿数を指定します
    }
}
add_action('pre_get_posts', 'voice_category_posts_per_page');


// 閲覧数をカウントするための関数
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        add_post_meta($postID, $count_key, $count, true);
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// カウントされた閲覧数を取得する関数
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    return $count;
}

// 404ページの時だけbodyタグに特定のクラス名を付与
function add_404_body_class($classes)
{
    if (is_404()) {
        $classes[] = 'page404-body';
    }
    return $classes;
}
add_filter('body_class', 'add_404_body_class');

// campaignの抜粋文の設定
function campaign_change_excerpt_length( $length ) {
    // 現在の投稿の投稿タイプを取得
    $post_type = get_post_type();

    // 現在の投稿が通常投稿タイプであるかを確認
    if ( 'campaign' === $post_type ) {
        return 72; // 通常投稿の抜粋の長さを 72 文字に設定
    } else {
        return $length; // それ以外の場合は既定の抜粋の長さを使用
    }
}
add_filter( 'excerpt_length', 'campaign_change_excerpt_length', 999 );


// blogの抜粋文の設定
function blog_change_excerpt_length( $length ) {
    // 現在の投稿の投稿タイプを取得
    $post_type = get_post_type();

    // 現在の投稿が通常投稿タイプであるかを確認
    if ( 'post' === $post_type ) {
        return 94; // 通常投稿の抜粋の長さを 94 文字に設定
    } else {
        return $length; // それ以外の場合は既定の抜粋の長さを使用
    }
}
add_filter( 'excerpt_length', 'blog_change_excerpt_length', 999 );

// voiceの抜粋文の設定
function voice_change_excerpt_length( $length ) {
    // 現在の投稿の投稿タイプを取得
    $post_type = get_post_type();

    // 現在の投稿が 'voice' カスタム投稿タイプであるかを確認
    if ( 'voice' === $post_type ) {
        return 196; // 'voice' カスタム投稿タイプの場合は抜粋の長さを 196 文字に設定
    } else {
        return $length; // それ以外の場合は既定の抜粋の長さを使用
    }
}
add_filter( 'excerpt_length', 'voice_change_excerpt_length', 999 );

function my_unregister_taxonomies()
{
    global $wp_taxonomies;
 
    /*
     * 投稿機能から「カテゴリー」を削除
     */
    if (!empty($wp_taxonomies['category']->object_type)) {
        foreach ($wp_taxonomies['category']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['category']->object_type[$i]);
            }
        }
    }
 
    /*
     * 投稿機能から「タグ」を削除
     */
    if (!empty($wp_taxonomies['post_tag']->object_type)) {
        foreach ($wp_taxonomies['post_tag']->object_type as $i => $object_type) {
            if ($object_type == 'post') {
                unset($wp_taxonomies['post_tag']->object_type[$i]);
            }
        }
    }
 
    return true;
}
add_action('init', 'my_unregister_taxonomies');



