<?php
	
function sme_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}
add_action('wp_enqueue_scripts', 'sme_scripts');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function register_my_menus() {
  register_nav_menus(
    array(
      'hoofd_menu' => __( 'Hoofd Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

acf_add_options_page( array(

'page_title' 	=> 'Algemene opties',
'menu_title' 	=> 'Algemene opties',
'menu_slug' 	=> 'options',
'capability' 	=> 'edit_posts', 
'icon_url' => 'dashicons-universal-access-alt',
'position' => 3

) );

function arphabet_widgets_init() {	
		
		register_sidebar( array(
			'name'          => 'Footer een',
			'id'            => 'footer_een',
			'before_widget' => '<div class="footer_een">',
			'after_widget'  => '</div>',
		) );
		
		register_sidebar( array(
			'name'          => 'Footer twee',
			'id'            => 'footer_twee',
			'before_widget' => '<div class="footer_twee">',
			'after_widget'  => '</div>',
		) );	
		
		register_sidebar( array(
			'name'          => 'Footer drie',
			'id'            => 'footer_drie',
			'before_widget' => '<div class="footer_drie">',
			'after_widget'  => '</div>',
		) );		
}

add_action( 'widgets_init', 'arphabet_widgets_init' );

function new_excerpt_more( $more ) {
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}
?>