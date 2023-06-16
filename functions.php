<?php
/**
 * Eztec functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eztec
 */

if ( ! function_exists( 'eztec_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eztec_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Eztec, use a find and replace
		 * to change 'eztec' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eztec', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'eztec' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'eztec_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'eztec_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eztec_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eztec_content_width', 640 );
}
add_action( 'after_setup_theme', 'eztec_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eztec_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eztec' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'eztec' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'eztec_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eztec_scripts() {

	// STYLES
	wp_enqueue_style( 'eztec-style', get_stylesheet_uri() );

	// SCRIPTS
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.min.js', array('jquery-core'), '20171030', true );
	wp_enqueue_script( 'pages', get_template_directory_uri() . '/js/pages.min.js', array('jquery-core'), '20171128', true );

	// EXCLUIR
	// wp_enqueue_script( 'peterson', get_template_directory_uri() . '/js/peterson.js', array('jquery-core'), '20180312', true );


	// wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.min.js', array(), '20151215', true );
	// wp_enqueue_script( 'eztec-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'eztec-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eztec_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// registro de menus
register_nav_menus( array(
	'footer_menu' => 'Menu do Rodapé',
) );

// define qualidade de JPG para thumbnails
add_filter('jpeg_quality', function($arg){return 70;});




// Desabilita srcset automatico do wordpress
function meks_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'meks_disable_srcset' );


// Registro de variáveis para formulários
// function add_query_var($vars) {
//     $vars[] = 'regiao';
//     return $vars;
// }
// add_filter('query_vars', 'add_query_var');










// Shortcode para abertura de Chat Online via modal
function mi_chat_func( $atts, $content = null ) {
 	$imovel_id = shortcode_atts( array('imovel_id' => '', 'carac' => '', 'chat_id' => ''), $atts );
 	$imovel_code_id = get_field("imovel_id", $imovel_id["imovel_id"]);
 	$is_carac_form = $imovel_id["carac"];
 	$chat_id = $imovel_id["chat_id"];


 	$html = "";


 	$titulo_chat_modal = get_field("chat_modal_titulo",1661);
	$txt_btn_fb = get_field("chat_modal_txt_fb",1661);
	$icon_btn_fb = get_field("chat_modal_icon_fb",1661);
	$txt_btn_google = get_field("chat_modal_txt_google",1661);
	$icon_btn_google = get_field("chat_modal_icon_google",1661);
	$intro_msg_chat = get_field("chat_modal_intro_msg",1661);
	$label_nome_chat = get_field("chat_modal_label_nome",1661);
	$label_email_chat = get_field("chat_modal_label_email",1661);
	$label_tel_chat = get_field("chat_modal_label_telefone",1661);
	$label_imovel_chat = get_field("chat_modal_label_imovel",1661);
	$txt_obrigatorios_chat = get_field("chat_modal_txt_obrigatorios",1661);
	$txt_news_chat = get_field("chat_modal_txt_news",1661);
	$txt_btn_chat = get_field("chat_modal_btn_iniciar",1661);
	$ip = "";
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$chat_action = "https://sgc.eztec.com.br/wcc/UserLoginSubmit.do";
	$dominio = parse_url(get_option('siteurl'), PHP_URL_HOST);
	if ( strcmp($dominio, "eztec.com.br") == 0 ||  strcmp($dominio, "www.eztec.com.br") == 0  ){
		$chat_action = "https://www.eztec.com.br/wcc/UserLoginSubmit.do";
	}
	global $source_print;
	global $content_print;
	global $campaign_print;
	global $medium_print;
	$html .= '
	<div class="modal-chat modal fade" id="modalChat-' . $chat_id . '" tabindex="-1" role="dialog"  >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form name="chatForm-' . $imovel_code_id . '" data-isIntegrado=true id="chatForm' . $imovel_code_id . $is_carac_form . '" method="post" action="' . $chat_action  . '" class="mi-chat-online" target="_blank" rel="noopener">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
					<div class="modal-header flex-column">
						<span class="titulo-contato-geral">' . $titulo_chat_modal . '</span>
						<div class="contato-geral-divisor"></div>
					</div>
					<div class="modal-body">
						<p class="contato-instrucoes">' . $intro_msg_chat . '</p>
						<input name="ip" value="'. $ip . '" id="ip" type="hidden">
						<input name="virtual_obj" id="virtual_obj" type="hidden">
						<input name="idGoogle" value="direto" id="idGoogle" type="hidden">
						<input name="idFacebook" value="direto" id="idFacebook" type="hidden">
						<div class="form-group">
							<label for="nome">' . $label_nome_chat . '</label>
							<input type="text" class="form-control" name="nome" id="nome">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="email">' . $label_email_chat . '</label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
							<div class="form-group col-3 col-sm-2">
								<label for="ddd">' . $label_tel_chat . '</label>
								<input type="text" class="form-control" name="ddd" alt="ddd" id="ddd">
							</div>
							<div class="form-group col-9 col-sm-10 col-md-4">
								<label for="email">&nbsp;</label>
								<input type="text" class="form-control" name="fone" id="fone" alt="fone" >
							</div>
						</div>
						<div class="form-group" id="divEmpre">
							<label for="codempreendimento">' . $label_imovel_chat . '</label>
							<select class="form-control custom-select" name="idEmpreendimento" id="idEmpreendimento">
								<option value="">Selecione</option>';
								$args = array(
									'post_type'  => 'imovel',
									'orderby' => 'title',
									'posts_per_page'   => -1,
									'order'   => 'ASC',
									'meta_query' => array(
							        'relation' => 'OR',
							        array(
							            'key' => 'imovel_status',
							            'value' => '01',
							            'compare' => '='
							        ),
							        array(
							            'key' => 'imovel_status',
							            'value' => '02',
							            'compare' => '='
							        ),
							        array(
							            'key' => 'imovel_status',
							            'value' => '03',
							            'compare' => '='
							        ),
							        array(
							            'key' => 'imovel_status',
							            'value' => '04',
							            'compare' => '='
							        ),
							        array(
							            'key' => 'imovel_status',
							            'value' => '05',
							            'compare' => '='
							        ),
							        array(
							            'key' => 'imovel_status',
							            'value' => '06',
							            'compare' => '='
							        )
							    )
								);
								$imovel_q = new WP_Query( $args );
								if ( $imovel_q->have_posts() ) {
									while ( $imovel_q->have_posts() ) {
										$imovel_q->the_post();
										$imovel_id_value = get_field('imovel_id');
										if ($imovel_code_id == $imovel_id_value){
											$html .= '<option value="' . $imovel_id_value . '" selected="selected">' . get_the_title() . '</option>';
										}
										else{
											$html .= '<option value="' . $imovel_id_value . '">' . get_the_title() . '</option>';
										}
									}
								}
								// Reseta WP_query
								wp_reset_postdata();
							$html .='
							</select>
						</div>
						<div class="form-group">
							<div class="form-check">
								<label class="form-check-label d-flex align-items-center">
									<input class="form-check-input" name="info" value="on" type="checkbox"> ' . $txt_news_chat . '
								</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<div class="form-row">
							<div class="form-group">
								<div class="form-privacidade">
									' .  get_field("msg_privacidade",311) . '
								</div>
							</div>
							<div class="form-group col-12">
								<div class="wrapper-btn-triangle btn-modal">
							    	<button type="submit" class="form-control btn btn-primary" id="btnIniciar">
							    		<div class="wrap-content-btn-contato-geral">
								    	<p class="titulo-btn-contato-geral">' . $txt_btn_chat . '</p>
								    </button>
							    	</a>
							    	<div class="triangle-top-right"></div>
							    </div>
								<button type="submit" style="display: none;" id="btnSubmitChat"></button>
							</div>
						</div>
						<div class="form-group">
							<small class="form-text text-message-required">
								' . $txt_obrigatorios_chat . '
							</small>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>';
	return $html;
}
add_shortcode("mi_chat", "mi_chat_func");






// Função para paginação (original paginate_links())
function eztec_paginate_links( $args = '' ) {
	global $wp_query, $wp_rewrite;

	// Setting up default values based on the current URL.
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$url_parts    = explode( '?', $pagenum_link );

	// Get max pages and current page out of the current query, if available.
	$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
	$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

	// Append the format placeholder to the base URL.
	$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

	// URL base depends on permalink settings.
	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	$defaults = array(
		'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
		'format' => $format, // ?page=%#% : %#% is replaced by the page number
		'total' => $total,
		'current' => $current,
		'show_all' => false,
		'prev_next' => true,
		'prev_text' => __('&laquo; Previous'),
		'next_text' => __('Next &raquo;'),
		'end_size' => 1,
		'mid_size' => 2,
		'type' => 'plain',
		'add_args' => array(), // array of query args to add
		'add_fragment' => '',
		'before_page_number' => '',
		'after_page_number' => ''
	);

	$args = wp_parse_args( $args, $defaults );

	if ( ! is_array( $args['add_args'] ) ) {
		$args['add_args'] = array();
	}

	// Merge additional query vars found in the original URL into 'add_args' array.
	if ( isset( $url_parts[1] ) ) {
		// Find the format argument.
		$format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
		$format_query = isset( $format[1] ) ? $format[1] : '';
		wp_parse_str( $format_query, $format_args );

		// Find the query args of the requested URL.
		wp_parse_str( $url_parts[1], $url_query_args );

		// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
		foreach ( $format_args as $format_arg => $format_arg_value ) {
			unset( $url_query_args[ $format_arg ] );
		}

		$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
	}

	// Who knows what else people pass in $args
	$total = (int) $args['total'];
	if ( $total < 2 ) {
		return;
	}
	$current  = (int) $args['current'];
	$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
	if ( $end_size < 1 ) {
		$end_size = 1;
	}
	$mid_size = (int) $args['mid_size'];
	if ( $mid_size < 0 ) {
		$mid_size = 2;
	}
	$add_args = $args['add_args'];
	$r = '';
	$page_links = array();
	$dots = false;

	if ( $args['prev_next'] && $current && 1 < $current ) :
		$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current - 1, $link );
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $args['add_fragment'];

		/**
		 * Filters the paginated links for the given archive pages.
		 *
		 * @since 3.0.0
		 *
		 * @param string $link The paginated link URL.
		 */
		$page_links[] = '<a rel="prev" class="prev page-link" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
	endif;
	for ( $n = 1; $n <= $total; $n++ ) :
		if ( $n == $current ) :
			$page_links[] = "<span class='page-link current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
			$dots = true;
		else :
			if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
				$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
				$link = str_replace( '%#%', $n, $link );
				if ( $add_args )
					$link = add_query_arg( $add_args, $link );
				$link .= $args['add_fragment'];

				/** This filter is documented in wp-includes/general-template.php */
				$page_links[] = "<li class=\"page-item\"><a rel='canonical' class='page-link' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a></li>";
				$dots = true;
			elseif ( $dots && ! $args['show_all'] ) :
				$page_links[] = '<span class="page-link dots">' . __( '&hellip;' ) . '</span>';
				$dots = false;
			endif;
		endif;
	endfor;
	if ( $args['prev_next'] && $current && $current < $total ) :
		$link = str_replace( '%_%', $args['format'], $args['base'] );
		$link = str_replace( '%#%', $current + 1, $link );
		if ( $add_args )
			$link = add_query_arg( $add_args, $link );
		$link .= $args['add_fragment'];

		/** This filter is documented in wp-includes/general-template.php */
		$page_links[] = '<a rel="next" class="next page-link" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
	endif;
	switch ( $args['type'] ) {
		case 'array' :
			return $page_links;

		case 'list' :
			$r .= "<ul class='page-numbers'>\n\t<li>";
			$r .= join("</li>\n\t<li>", $page_links);
			$r .= "</li>\n</ul>\n";
			break;

		default :
			$r = join("\n", $page_links);
			break;
	}
	return $r;
}




// Adiciona rel="prev" e rel-next para paginação mobile
add_filter('next_posts_link_attributes', 'get_next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'get_previous_posts_link_attributes');

if (!function_exists('get_next_posts_link_attributes')){
	function get_next_posts_link_attributes($attr){
		$attr = 'rel="next"';
		return $attr;
	}
}
if (!function_exists('get_previous_posts_link_attributes')){
	function get_previous_posts_link_attributes($attr){
		$attr = 'rel="prev"';
		return $attr;
	}
}




// Adiciona resumos para páginas
add_post_type_support( 'page', 'excerpt' );



// Remove limite de resultados para página de busca simples:
function myprefix_search_posts_per_page($query) {
    if ( $query->is_search ) {
        $query->set( 'posts_per_page', '-1' );
    }
    return $query;
}
add_filter( 'pre_get_posts','myprefix_search_posts_per_page' );




// Registro de thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );

    // Galeria de produto: original 820x480
    	add_image_size( '545x319', 545, 319, true);
	    add_image_size( '737x431', 737, 431, true);
	    add_image_size( '795x466', 795, 466, true);

	// Persona - Produto: original 2560x742
    	add_image_size( '575x166', 575, 166, true);
	    add_image_size( '767x222', 767, 222, true);
	    add_image_size( '991x287', 991, 287, true);
	    add_image_size( '1199x347', 1199, 347, true);

	// Blog - Posts: original 1280x839
    	add_image_size( '400x262', 400, 262, true);
	    add_image_size( '820x537', 820, 537, true);
	    add_image_size( '610x400', 610, 400, true);
}



// Para estilizar dashboard
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .acf-flexible-content .values .layout{
    	background-color: #f1f0bf !important;
    }
    .acf-flexible-content .values .layout .acf-flexible-content .values .layout{
    	background-color: #e4e372 !important;
    }
  </style>';
}



// Registra API do Google
function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyByFt6FP95RkG1yrZqel57Yfff22kfVHWs');
}

add_action('acf/init', 'my_acf_init');





// Remove admin toolbar do frontend
add_filter('show_admin_bar', '__return_false');


// Remove editor das páginas
add_action( 'init', 'my_custom_init' );
function my_custom_init() {
	remove_post_type_support( 'page', 'editor' );
}



/** Integração api para aplicativo */
$home_url = get_home_url();
if($home_url == "https://www.eztec.com.br"){
	require_once('inc/api.php');
}

 












