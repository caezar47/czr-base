<?php

// Функции темы

add_theme_support('post-thumbnails');
add_theme_support('menus');
//add_theme_support('title-tag');
//add_theme_support('admin-bar', array('callback'=>'__return_false'));



remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
//remove_action('wp_head', 'feed_links_extra', 3);
//remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Убирает связь с родительской записью
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Убирает ссылку на следующую запись
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head','wp_syntax_head');
//remove_action('template_redirect', 'rest_output_link_header', 11, 0);
//remove_action('publish_post', 'generic_ping');

remove_filter('the_content', 'wptexturize');
remove_filter('comment_text', 'wptexturize');
remove_filter('single_post_title', 'wptexturize');
remove_filter('the_title', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');

remove_filter('the_content', 'wpautop'); // Отключаем автоформатирование в полном посте
remove_filter('the_excerpt', 'wpautop'); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях


add_filter('rest_enabled', '__return_false');

remove_action('xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action('wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action('template_redirect', 'rest_output_link_header', 11, 0 );
remove_action('auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action('auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action('auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action('auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action('auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter('rest_authentication_errors', 'rest_cookie_check_errors', 100 );
remove_action('init', 'rest_api_init' );
remove_action('rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action('parse_request', 'rest_api_loaded' );
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
remove_action('wp_head', 'wp_oembed_add_discovery_links' );
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'wp_resource_hints', 2 );



function __theme_session_start() { 
	if(!session_id()) {
		session_start(); 
	}
}

function __theme_set_category_for_pages() {
	register_taxonomy(
		'page-category',
		'page',
		array(
			'hierarchical' => true,
			'label' => 'Рубрики страниц',
		)
	);
}

function __theme_set_category_for_attachments() {
	register_taxonomy(
		'attachment-category',
		'attachment',
		array(
			'hierarchical' => true,
			'label' => 'Рубрики файлов',
		)
	);
}

function __theme_query_vars_filter($vars){
	//$vars[] = 'flat_id';
	return $vars;
}

function __theme_add_upload_mimes_filter($mimes){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

function __theme_set_main_query_order($query) {
	if($query->is_main_query()) {
		$query->set('order', 'ASC');
	}
}

function __theme_remove_image_html_attr($html) {
	$html = preg_replace('/(width/height)=\"\d*\"\s', '', $html);
	return $html;
}

function __theme_ru2en($str = '') {
	$str = mb_strtolower($str, 'UTF-8');
	$str=strtr($str, array(
		'а'=>'a',	'б'=>'b',	'в'=>'v',	'г'=>'g',	'д'=>'d',	'е'=>'e',	'ё'=>'yo',	'ж'=>'zh',	'з'=>'z',	'и'=>'i',
		'й'=>'yi',	'к'=>'k',	'л'=>'l',	'м'=>'m',	'н'=>'n',	'о'=>'o',	'п'=>'p',	'р'=>'r',	'с'=>'s',	'т'=>'t',
		'у'=>'u',	'ф'=>'f',	'х'=>'h',	'ц'=>'ts',	'ч'=>'ch',	'ш'=>'sh',	'щ'=>'shch',	'ъ'=>'',	'ы'=>'y',	'ь'=>'',
		'э'=>'e',	'ю'=>'yu',	'я'=>'ya',
		//'А'=>'A',	'Б'=>'B',	'В'=>'V',	'Г'=>'G',	'Д'=>'D',	'Е'=>'E',	'Ё'=>'Yo',	'Ж'=>'Zh',	'З'=>'Z',	'И'=>'I',
		//'Й'=>'Yi',	'К'=>'K',	'Л'=>'L',	'М'=>'M',	'Н'=>'N',	'О'=>'O',	'П'=>'P',	'Р'=>'R',	'С'=>'S',	'Т'=>'T',
		//'У'=>'U',	'Ф'=>'F',	'Х'=>'H',	'Ц'=>'Ts',	'Ч'=>'Ch',	'Ш'=>'Sh',	'Щ'=>'Shch',	'Ъ'=>'',	'Ы'=>'Y',	'Ь'=>'',
		//'Э'=>'E',	'Ю'=>'Yu',	'Я'=>'Ya',
		));
	$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
	$str = trim($str, '-');
	return $str;
}

function __theme_sanitize_file_name($filename) {
	$info = pathinfo($filename);
	$ext = empty($info['extension']) ? '' : '.' . $info['extension'];
	$name = basename($filename, $ext);
	return __theme_ru2en($name) . $ext;
}

/*
function __theme_login_with_email($username) {
	$user = get_user_by('email',$username);
	if(!empty($user->user_login))
		$username = $user->user_login;
	return $username;
}
*/

add_filter('query_vars', '__theme_query_vars_filter');
add_filter('upload_mimes', '__theme_add_upload_mimes_filter');
add_action('init', '__theme_session_start');
add_action('init', '__theme_set_category_for_pages');
add_action('init', '__theme_set_category_for_attachments');
//add_action('wp_authenticate','__theme_login_with_email');
//add_action('pre_get_posts', '__theme_set_main_query_order');
add_filter('post_thumbnail_html', '__theme_remove_image_html_attr', 10);
add_filter('image_send_to_editor', '__theme_remove_image_html_attr', 10);
add_filter('sanitize_file_name', '__theme_sanitize_file_name', 10);



function getAzbnController($config=array()) {
	global $Azbn;
	if(isset($Azbn)) {
		
	} else {
		include('azbn.ru/AzbnController.class.php');
		//include('azbn.ru/AzbnAjax.class.php');
		$Azbn = new AzbnController($config);
	}
}
getAzbnController(array());
$Azbn->setPath(get_bloginfo('template_directory'));

$Azbn->mdl('Imgs')->setImgSizes(array(
	//для новостей
	'493x340' => array(
		'w' => 493,
		'h' => 340,
		'crop' => true,
	),
	//для партнеров
	'232x96' => array(
		'w' => 232,
		'h' => 96,
		'crop' => true,
	),
));

function l($id) {
	return wp_make_link_relative(get_permalink($id));
}

function lcat($id) {
	return wp_make_link_relative(get_category_link($id));
}

function t($id) {
	return get_the_title($id);
}

function phone($str) {
	return preg_replace('/[^0-9]/', '', $str);
}

function getContact($field = '', $post_id = 2) {
	return get_post_meta($post_id, $field, true);
}

function c($post_id) {
	$page_data = get_page($post_id);
	if ($page_data) {
		return apply_filters('the_content', $page_data->post_content);
	} else {
		return false;
	}
}

function d2r($date) {
	$month = array(
		'january' => 'января',
		'february' => 'февраля',
		'march' => 'марта',
		'april' => 'апреля',
		'may' => 'мая',
		'june' => 'июня',
		'july' => 'июля',
		'august' => 'августа',
		'september' => 'сентября',
		'october' => 'октября',
		'november' => 'ноября',
		'december' => 'декабря',
	);
	$days = array(
		'monday' => 'Понедельник',
		'tuesday' => 'Вторник',
		'wednesday' => 'Среда',
		'thursday' => 'Четверг',
		'friday' => 'Пятница',
		'saturday' => 'Суббота',
		'sunday' => 'Воскресенье',
	);
	return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), mb_strtolower($date, 'UTF-8'));
}


function __theme_ed($a = array()) {
	
	$bt = debug_backtrace();
	$bt = $bt[0];
	$dRoot = $_SERVER['DOCUMENT_ROOT'];
	$dRoot = str_replace('/', "\\", $dRoot);
	$bt['file'] = str_replace($dRoot, '', $bt['file']);
	$dRoot = str_replace("\\", '/', $dRoot);
	$bt['file'] = str_replace($dRoot, '', $bt['file']);
	?>
	<div style="background-color:#ffffff;color:#000000;outline:1px green solid;font-size:10px;" >
		<div style="padding:5px 10px;background-color:green;color:#ffffff;font-weight:bold;" >File: <?=$bt['file'];?> [line: <?=$bt['line'];?>]</div>
		<pre style="padding:10px;" ><? print_r($a);?></pre>
	</div>
	<?
	
}

function pagination($wp_query, $pages = '', $range = 10)
{
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '') {
		//global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}
	if(1 != $pages) {
		echo "<div class=\"pagination\"><span>Страница ".$paged." из ".$pages."</span>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>\n";
	}
}


add_action('save_post', '__theme_guid_rewrite', 100);
function __theme_guid_rewrite($id = 0){
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
	if($id = intval($id)){
		global $wpdb;
		$wpdb->update($wpdb->posts, ['guid' => l($id)], ['ID' => $id]);
	}
}


add_action(
	'init', 
	function() {
		
		register_post_type('photo', array(
			'labels' => array(
				'name' => 'Фотографии',
				'singular_name' => 'Фото',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавление',
				'edit_item' => 'Редактирование',
				'new_item' => 'Новый элемент',
				'view_item' => 'Посмотреть',
				'search_items' => 'Найти',
				'not_found' =>	'Не найдено',
				'not_found_in_trash' => 'Не найдено в корзине',
				'parent_item_colon' => '',
				'menu_name' => 'Фотографии'
			),
			'description' => '',
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => false,
			'rest_base' => null,
			'menu_position' => 35,
			'menu_icon' => 'dashicons-format-gallery', // https://developer.wordpress.org/resource/dashicons/
			'capability_type' => 'page',
			//'capabilities' => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap' => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical' => false,
			'supports' => array('title', 'page-attributes', 'thumbnail', 'revisions'), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies' => array('photo_taxonomies'),
			'has_archive' => true,
			'rewrite' => true,
			'query_var' => true,
		));
		
		register_taxonomy('photo_taxonomies', array('photo'), array(
			'labels' => array(
				'name' => _x( 'Категории', 'taxonomy general name' ),
				'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
				'search_items' => __('Найти'),
				'all_items' => __('Все категории'),
				'view_item' => __('Посмотреть'),
				'parent_item' => __('Родитель'),
				'parent_item_colon' => __('Родитель'),
				'edit_item' => __('Редактировать'),
				'update_item' => __('Обновить'),
				'add_new_item' => __('Добавить'),
				'new_item_name' => __('Название'),
				'menu_name' => __('Категории'),
			),
			'hierarchical' => true,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => false,
			'rest_base' => null,
			'rewrite' => array('slug' => 'photos'),
		));
		
	},
	35
);


add_action(
	'init', 
	function() {
		
		register_post_type('azbnform', array(
			'labels' => array(
				'name' => 'Формы и заявки',
				'singular_name' => 'Форма',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавление',
				'edit_item' => 'Редактирование',
				'new_item' => 'Новый элемент',
				'view_item' => 'Посмотреть',
				'search_items' => 'Найти',
				'not_found' =>	'Не найдено',
				'not_found_in_trash' => 'Не найдено в корзине',
				'parent_item_colon' => '',
				'menu_name' => 'Формы и заявки'
			),
			'description' => '',
			'public' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => false,
			'rest_base' => null,
			'menu_position' => 50,
			'menu_icon' => 'dashicons-format-chat', // https://developer.wordpress.org/resource/dashicons/
			'capability_type' => 'page',
			//'capabilities' => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap' => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical' => false,
			'supports' => array('title', 'editor',), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies' => array('azbnform_taxonomies'),
			'has_archive' => true,
			'rewrite' => true,
			'query_var' => true,
		));
		
		register_taxonomy('azbnform_taxonomies', array('azbnform'), array(
			'labels' => array(
				'name' => _x( 'Категории', 'taxonomy general name' ),
				'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
				'search_items' => __('Найти'),
				'all_items' => __('Все категории'),
				'view_item' => __('Посмотреть'),
				'parent_item' => __('Родитель'),
				'parent_item_colon' => __('Родитель'),
				'edit_item' => __('Редактировать'),
				'update_item' => __('Обновить'),
				'add_new_item' => __('Добавить'),
				'new_item_name' => __('Название'),
				'menu_name' => __('Категории'),
			),
			'hierarchical' => true,
			'show_ui' => true,
			'query_var' => true,
			'show_in_rest' => false,
			'rest_base' => null,
			'rewrite' => array('slug' => 'azbnforms'),
		));
		
	},
	50
);

add_action(
	'init', 
	function() {
		
		register_post_type('azbnblock', array(
			'labels' => array(
				'name' => 'Блоки',
				'singular_name' => 'Блок',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавление',
				'edit_item' => 'Редактирование',
				'new_item' => 'Новый элемент',
				'view_item' => 'Посмотреть',
				'search_items' => 'Найти',
				'not_found' =>	'Не найдено',
				'not_found_in_trash' => 'Не найдено в корзине',
				'parent_item_colon' => '',
				'menu_name' => 'Блоки'
			),
			'description' => '',
			'public' => false,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => false,
			'rest_base' => null,
			'menu_position' => 55,
			'menu_icon' => 'dashicons-media-code', // https://developer.wordpress.org/resource/dashicons/
			'capability_type' => 'page',
			//'capabilities' => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap' => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical' => true,
			'supports' => array('title', 'editor','thumbnail','revisions',), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			'taxonomies' => array('azbnblock_taxonomies'),
			'has_archive' => true,
			'rewrite' => true,
			'query_var' => false,
		));
		
		register_taxonomy('azbnblock_taxonomies', array('azbnblock'), array(
			'labels' => array(
				'name' => _x( 'Категории', 'taxonomy general name' ),
				'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
				'search_items' => __('Найти'),
				'all_items' => __('Все категории'),
				'view_item' => __('Посмотреть'),
				'parent_item' => __('Родитель'),
				'parent_item_colon' => __('Родитель'),
				'edit_item' => __('Редактировать'),
				'update_item' => __('Обновить'),
				'add_new_item' => __('Добавить'),
				'new_item_name' => __('Название'),
				'menu_name' => __('Категории'),
			),
			'hierarchical' => true,
			'show_ui' => true,
			'query_var' => false,
			'show_in_rest' => false,
			'rest_base' => null,
			'rewrite' => array('slug' => 'azbnblocks'),
		));
		
	},
	55
);

if(is_admin()){
	include('theme/functions_admin.php');
}