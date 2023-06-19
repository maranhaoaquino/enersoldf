<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

// carrega os campos personalizados do CMB2
require_once get_template_directory() . '/cmb2/load.php';

// Funções para Limpar o Header
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
//require_once get_template_directory() . '/core/classes/class-shortcodes-menu.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';
// require_once get_template_directory() . '/core/classes/class-post-status.php';
require_once get_template_directory() . '/core/classes/class-term-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since 2.2.0
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since Odin 2.2.10
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 240,
			'flex-height' => true,
		) );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since 2.2.0
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since 2.2.0
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	//custom css
	wp_enqueue_style( 'custom-style', $template_url . '/assets/css/custom.css');

	//Fontawesome
	wp_enqueue_style( 'fontawesome-css', $template_url . '/assets/css/fontawesome.min.css');
	wp_enqueue_script( 'fontawesome-script', $template_url . '/assets/js/fontawesome.min.js', array(), null, false );

	//Owl Css
	wp_enqueue_style( 'owl-css', $template_url . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'owl-theme', $template_url . '/assets/css/owl.theme.carousel.min.css');

	// OWL JS.
	wp_enqueue_script( 'owl-js', $template_url . '/assets/js/libs/owl.carousel.min.js', array( 'jquery-att' ), null, false);

	//xZoom css
	wp_enqueue_style( 'xzoom-css', $template_url . '/assets/css/xzoom.min.css');

	// xZoom js
	wp_enqueue_script( 'xzoom-js', $template_url . '/assets/js/libs/xzoom.min.js', array( 'jquery-att' ), null, false);
	
	// Html5Shiv
	wp_enqueue_script( 'html5shiv', $template_url . '/assets/js/html5.js' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array( 'jquery' ), null, true );

	// Jquery.
	wp_enqueue_script( 'jquery-att', $template_url . '/assets/js/libs/jquery.min.js', array(), null, false );

	// Custom script
	wp_enqueue_script( 'custom-script', $template_url . '/assets/js/custom.js', array(), null, false );
	
	// General scripts.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		// FitVids.
		wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array( 'jquery' ), null, true );

		// Main.
		wp_enqueue_script( 'odin-main', $template_url . '/assets/js/main.js', array( 'jquery' ), null, true );
	} else {
		// Grunt main file with Bootstrap, FitVids and others libs.
		wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array( 'jquery' ), null, true );
	}

	// Grunt watch livereload in the browser.
	// wp_enqueue_script( 'odin-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Query WooCommerce activation
 *
 * @since  2.2.6
 *
 * @return boolean
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * WooCommerce compatibility files.
 */
if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}

/*
* Configurações do tema
*/
require_once get_template_directory() . '/core/classes/class-theme-options.php';

if (!function_exists( 'odin_theme_settings' ) ){
	$settings = new Odin_Theme_Options(
        'odin-settings', // Slug/ID of the Settings Page (Required)
        'Configurações do Tema', // Settings page name (Required)
        'manage_options' // Page capability (Optional) [default is manage_options]
    );

	$settings->set_tabs(
        array(
            array(
                'id' => 'odin_general',
                'title' => __( 'Configurações Gerais', 'odin' ),
            ),
			array(
                'id' => 'odin_contact',
                'title' => __( 'Configurações de Contato', 'odin' )
			),
            array(
                'id' => 'odin_colors',
                'title' => __( 'Cores do Tema', 'odin' )
			),
			array(
                'id' => 'odin_fonts',
                'title' => __( 'Tamanho das Fonts', 'odin' )
			),
        )
    );

	$settings->set_fields(
		array(
			'odin_contact_fields_section' => array(
				'tab'   => 'odin_contact',
				'title' => __( 'Configurações de Contato', 'odin' ),
				'fields' => array(
                    array(
						'id'          => 'odin_whatsapp',
						'label'       => __( 'Whatsapp', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( '(dd)99999-9999' )
						),
						'description' => __( 'Número do whatsapp do botão', 'odin' ),
					),
					array(
						'id'          => 'odin_telefone',
						'label'       => __( 'Telefone', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( '(dd)99999-9999' )
						),
						'description' => __( 'Número de telefone', 'odin' ),
					),
					array(
						'id'          => 'odin_email',
						'label'       => __( 'E-mail', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( 'exemplo@exemplo.com' ),
							'type' => 'email'
						),
						'description' => __( 'E-mail principal para aparecer no rodapé', 'odin' ), // Opcional
					),
					array(
						'id'          => 'odin_endereco',
						'label'       => __( 'Endereço Completo', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( 'Rua x, Bairro Y, Cidade-UF' ),
						),
						'description' => __( 'Escreva seu endereço completo', 'odin' ), // Opcional
					),
					array(
						'id'          => 'odin_instagram',
						'label'       => __( 'Instagram', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( 'https://www.instagram.com/perfil/' )
						),
						'description' => __( 'Link do perfil no Instagram', 'odin' ),
					),
					array(
						'id'          => 'odin_facebook',
						'label'       => __( 'Facebook', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( 'https://www.facebook.com/Pagina-facebook' )
						),
						'description' => __( 'Link da pagina no Facebook', 'odin' ),
					),
					array(
						'id'          => 'odin_linkedin',
						'label'       => __( 'Linkedin', 'odin' ),
						'type'        => 'text',
						'attributes'  => array(
							'placeholder' => __( 'https://www.linkedin.com/perfil-linkedin/' )
						),
						'description' => __( 'Link do perfil no LinkedIn', 'odin' ),
					),
				)
			),
			'odin_colors_fields_section' => array(
				'tab'   => 'odin_colors',
				'title' => __( 'Cores do tema', 'odin' ),
				'fields' => array(
                    array(
                        'id'          => 'background_color',
                        'label'       => __( 'Background Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#f4f4f4',
                        'description' => __( 'Cor do fundo do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'background_header_color',
                        'label'       => __( 'Background Header Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#263882',
                        'description' => __( 'Cor do fundo do header', 'odin' ),
                    ),
					array(
                        'id'          => 'background_footer_color',
                        'label'       => __( 'Background Footer Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#263882',
                        'description' => __( 'Cor do fundo do header', 'odin' ),
                    ),
					array(
                        'id'          => 'primary_color',
                        'label'       => __( 'Primary Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#263882',
                        'description' => __( 'Cor primaria do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'primary_bold_color',
                        'label'       => __( 'Primary Color Bold', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#162870',
                        'description' => __( 'Cor primaria escura do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'primary_light_color',
                        'label'       => __( 'Primary Color Light', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#00479B',
                        'description' => __( 'Cor primaria clara do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'secondary_color',
                        'label'       => __( 'Secondary Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#fec208',
                        'description' => __( 'Cor secundaria do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'secondary_bold_color',
                        'label'       => __( 'Secondary Color Bold', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#FE9F03',
                        'description' => __( 'Cor secundaria escura do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'secondary_light_color',
                        'label'       => __( 'Secondary Color Light', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#FDD453',
                        'description' => __( 'Cor secundaria clara do tema', 'odin' ),
                    ),
					array(
                        'id'          => 'title_color',
                        'label'       => __( 'Title Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#000000',
                        'description' => __( 'Cor dos titulos', 'odin' ),
                    ),
					array(
                        'id'          => 'text_color',
                        'label'       => __( 'Text Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#000000',
                        'description' => __( 'Cor dos textos', 'odin' ),
                    ),
					array(
                        'id'          => 'link_color',
                        'label'       => __( 'Link Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#000000',
                        'description' => __( 'Cor dos Links', 'odin' ),
                    ),
					array(
                        'id'          => 'link_hover_color',
                        'label'       => __( 'Link Hover Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#000000',
                        'description' => __( 'Cor dos Links Clicados', 'odin' ),
                    ),
					array(
                        'id'          => 'link_contrast_color',
                        'label'       => __( 'Link Contrast Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#ffffff',
                        'description' => __( 'Cor dos Links em fundo colorido', 'odin' ),
                    ),
					array(
                        'id'          => 'link_contrast_hover_color',
                        'label'       => __( 'Link Hover Color', 'odin' ),
                        'type'        => 'color',
                        'default'     => '#cccccc',
                        'description' => __( 'Cor dos Links Clicados em fundo colorido', 'odin' ),
                    ),
				)
			),
			'odin_fonts_fields_section' => array(
				'tab'   => 'odin_fonts',
				'title' => __( 'Tamanho das Fonts', 'odin' ),
				'fields' => array(
					array(
						'id'          => 'font_base',
						'label'       => __( 'Tamanho da fonte dos textos', 'odin' ),
						'type'        => 'text',
						'default'     => '16',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h1',
						'label'       => __( 'Tamanho do Titulo H1', 'odin' ),
						'type'        => 'text',
						'default'     => '40',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h2',
						'label'       => __( 'Tamanho do Titulo H2', 'odin' ),
						'type'        => 'text',
						'default'     => '36',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h3',
						'label'       => __( 'Tamanho do Titulo H3', 'odin' ),
						'type'        => 'text',
						'default'     => '32',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h4',
						'label'       => __( 'Tamanho do Titulo H4', 'odin' ),
						'type'        => 'text',
						'default'     => '28',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h5',
						'label'       => __( 'Tamanho do Titulo H5', 'odin' ),
						'type'        => 'text',
						'default'     => '24',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_title_h6',
						'label'       => __( 'Tamanho do Titulo H6', 'odin' ),
						'type'        => 'text',
						'default'     => '20',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_small',
						'label'       => __( 'Tamanho do Small', 'odin' ),
						'type'        => 'text',
						'default'     => '14',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
					array(
						'id'          => 'font_large',
						'label'       => __( 'Tamanho do Large', 'odin' ),
						'type'        => 'text',
						'default'     => '18',
						'description' => __( 'Tamanho em px.', 'odin' ),
					),
				)
			)
		)
	);
}

/*
* Custom Post Type Servicos
*/
function odin_servico_cpt() {
    $servico = new Odin_Post_Type(
        'Servico', // Nome (Singular) do Post Type.
        'servico' // Slug do Post Type.
    );

    $servico->set_labels(
        array(
            'menu_name' => __( 'Serviços', 'odin' )
        )
    );

    $servico->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon' => 'dashicons-businessman'
        )
    );
}

add_action( 'init', 'odin_servico_cpt', 1 );

function odin_servico_taxonomy() {
    $servico = new Odin_Taxonomy(
        'Categoria', // Nome (Singular) da nova Taxonomia.
        'categoria-servico', // Slug do Taxonomia.
        'servico' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $servico->set_labels(
        array(
            'menu_name' => __( 'Categorias', 'odin' )
        )
    );

    $servico->set_arguments(
        array(
            'hierarchical' => false,
			'default_term' => [
				'name' => 'Todos os serviços',
				'slug' => 'todos-servicos',
				'description' => 'Todos os serviços'
			]
        )
    );
}

add_action( 'init', 'odin_servico_taxonomy', 1 );

/** 
 * Custom post type Produtos
*/

function odin_catalogo_cpt() {
    $catalogo = new Odin_Post_Type(
        'Produto', // Nome (Singular) do Post Type.
        'produto' // Slug do Post Type.
    );

    $catalogo->set_labels(
        array(
            'menu_name' => __( 'Catalogo de Produtos', 'odin' )
        )
    );

    $catalogo->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon' => 'dashicons-store'
        )
    );
}

add_action( 'init', 'odin_catalogo_cpt', 1 );

function odin_catalogo_taxonomy() {
    $catalogo = new Odin_Taxonomy(
        'Categoria', // Nome (Singular) da nova Taxonomia.
        'categoria-produtos', // Slug do Taxonomia.
        'produto' // Nome do tipo de conteúdo que a taxonomia irá fazer parte.
    );

    $catalogo->set_labels(
        array(
            'menu_name' => __( 'Categorias', 'odin' )
        )
    );

    $catalogo->set_arguments(
        array(
            'hierarchical' => false,
			'default_term' => [
				'name' => 'Todos os produtos',
				'slug' => 'todos-produtos',
				'description' => 'Todos os produtos inseridos no catalogo'
			]
		)
    );
}

add_action( 'init', 'odin_catalogo_taxonomy', 1 );

/**
 * Formulario de contato
 */

function odin_contact_form() {
	$form = new Odin_Contact_Form(
        'form_id',
        'contato@enersolardf.com',
        array('gleddavi33@gmail.com'),
    );

	$form->set_fields(
		array(
			array(
				'fields' => array(
					array(
						'id'          => 'sender_name',
						'label'       => array(
							'text'  => __( 'Nome', 'odin' ),
							'class' => 'input-contact-form'
						),
						'type'        => 'text',
						'required'    => true,
						'attributes'  => array(
							'placeholder' => __( 'Digite o seu nome' )
						)
					),
					array(
						'id'          => 'sender_email', // Obrigatório
						'label'       => array(
							'text'  => __( 'E-mail', 'odin' ), // Obrigatório
							'class' => 'input-contact-form'
						),
						'type'        => 'email', // Obrigatório
						'required'    => true, // Opcional (bool)
						'attributes'  => array( // Opcional (html input elements)
							'placeholder' => __( 'Digite o seu e-mail!' )
						),
					),
					array(
						'id'          => 'sender_telefone', // Obrigatório
						'label'       => array(
							'text'  => __( 'Whatsapp', 'odin' ), // Obrigatório
							'class' => 'input-contact-form'
						),
						'type'        => 'text', // Obrigatório
						'required'    => true, // Opcional (bool)
						'attributes'  => array( // Opcional (html input elements)
							'placeholder' => __( 'Digite seu número do whatsapp' )
						),
					),
				)
			)
		)
	);

	$form->set_subject( __( 'Formulario de contato: Gostaria de um orçamento [sender_name] <[sender_email]>', 'odin' ) );

	$form->set_reply_to( 'sender_email' );

    return $form;
}

add_action( 'init', array( odin_contact_form(), 'init' ), 1 );

function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );