<?php
function my_setup()
{
  add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
  add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
  add_theme_support('title-tag'); // タイトルタグ自動生成
  add_theme_support(
    'html5',
    array( // HTML5でマークアップ
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action('after_setup_theme', 'my_setup');
/* CSSとJavaScriptの読み込み */
function my_script_init()
{ // WordPress提供のjquery.jsを読み込まない
  wp_deregister_script('jquery');
  // jQueryの読み込み
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1", true);
  // Google Fonts(2つ以上ある場合は1つずつ書く)
  wp_enqueue_style('NotoSans', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');
  wp_enqueue_style('Lexend', '//fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500&display=swap');
  // micromodal
  wp_enqueue_script('micromodal', '//unpkg.com/micromodal/dist/micromodal.min.js', "", "1.0.1", false);
  // google maps
  wp_enqueue_script('map', '//maps.googleapis.com/maps/api/js?key=APIキーを入れます', "", "1.0.1", false);
  // slick
  wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', "", "1.0.1", true);
  wp_enqueue_style('slick',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', "", "1.0.1", false);
  wp_enqueue_style('slick-theme',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.0.1', false);
  // swiper
  wp_enqueue_script('swiper', '//unpkg.com/swiper@8/swiper-bundle.min.js', "", "1.0.1", true);
  wp_enqueue_style('swiper', '//unpkg.com/swiper@8/swiper-bundle.min.css', "", "1.0.1", false);
  // 自作jsファイルの読み込み
  wp_enqueue_script('main', get_template_directory_uri() . '/js/script.js?20220401', array('jquery'), '1.0.1', true);
  // 自作cssファイルの読み込み
  wp_enqueue_style('style-name', get_template_directory_uri() . '/css/style.css?20210616', array(), '1.0.1', false);
}
add_action('wp_enqueue_scripts', 'my_script_init');
//記事表示時の整形無効
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
// ビジュアルエディタ(TinyMCE)の整形無効
add_filter(
  'tiny_mce_before_init',
  function ($init_array) {
    global $allowedposttags;
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['valid_children']          = '+a[' . implode('|', array_keys($allowedposttags)) . ']';
    $init_array['indent']                  = true;
    $init_array['wpautop']                 = false;
    $init_array['force_p_newlines']        = false;
    return $init_array;
  }
);
// This theme uses wp_nav_menu() in one location.
register_nav_menus(
  array(
    'menu-1' => esc_html__('Primary', 'header-create-vol1'),
    'header' => 'ヘッダーメニュー',
    'footer' => 'フッターメニュー',
    'drawer' => 'ドロワーメニュー',
  )
);

//以下のコードが追記したコードです。
register_nav_menus(
  array(
    'sub-menu' => esc_html__('サブメニュー', 'header-create-vol1'),
  )
);
add_action('after_setup_theme', 'register_menu');
function register_menu()
{
  register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}
/* カスタムロゴの機能を追加します */
function add_custom_logo_support()
{
  add_theme_support('custom-logo', array(
    'height'               => 100, // 推奨されるロゴの高さ 100px
    'width'                => 400, // 推奨されるロゴの幅 400px
    'flex-height'          => true, // 動的な高さを許可する
    'flex-width'           => true, // 動的な幅を許可する
    'header-text'          => array('site-title'), // 'site-title'というクラスの要素を非表示にする
    'unlink-homepage-logo' => true, // 訪問者がページにいるときにはホームページにリンクしない
  ));
}
add_action('after_setup_theme', 'add_custom_logo_support');

function my_nav_menu_id($menu_id)
{
  // liタグのidを削除
  $id = NULL;
  return $id;
}
add_filter('nav_menu_item_id', 'my_nav_menu_id');

function my_nav_menu_class($classes, $item)
{
  // 管理画面からメニューにclassを設定した場合
  if ($classes[0]) {
    // 管理画面から設定したclass以外を削除
    array_splice($classes, 1);
  } else {
    // 上記以外の場合は、すべてのclassを削除
    $classes = [];
  }

  // 現在のページのliタグの場合
  if ($item->current == true) {
    // classの値にcurrentを付与
    $classes[] = 'current';
  }

  return $classes;
}
add_filter('nav_menu_css_class', 'my_nav_menu_class', 10, 2);


add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
function add_class_on_link($item_output, $item)
{
  return preg_replace('/(<a.*?)/', '$1' . " class='nav-header__link'", $item_output);
}
