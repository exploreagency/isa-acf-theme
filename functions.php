<?php

// This theme uses wp_nav_menu() in one location.
add_theme_support('post-thumbnails');
add_image_size('custom-thumbnail', 300, 200, true);

function mytheme_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'ref' ),
        'footer_menu'  => __( 'Footer Menu', 'ref' ),
        'overview_menu'  => __( 'Overview Menu', 'ref' ),
        'solution_menu'  => __( 'Solution Menu', 'ref' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );


function my_theme_enqueue_scripts() {
    if (is_page(627) || is_page(2246)) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

add_action('wp_enqueue_scripts', 'theme_name_scripts');

add_action('wp_enqueue_scripts', 'prefix_enqueue_scripts');

function prefix_enqueue_scripts() {
    wp_enqueue_script('my-ajax-handle', get_template_directory_uri() . '/js/my-ajax-handle.js', array(), null, true);

    wp_localize_script('my-ajax-handle', 'ajaxurl', admin_url('admin-ajax.php'));
}

function mytheme_enqueue_live_search_script() {
    wp_enqueue_script('mytheme-live-search', get_template_directory_uri() . '/js/live-search.js', array(), null, true);
    wp_localize_script('mytheme-live-search', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_live_search_script');



if( function_exists('acf_add_options_page') ) {

	$parent = acf_add_options_page(array(
		'page_title' 	=> __('Theme Settings','ref'),
		'menu_title'	=> __('Theme Settings','ref'),
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url'      => 'dashicons-products',
		'post_id' => 'theme-general-settings',
		'redirect' 		=> 'main_settings'
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> __('Basic Settings','beqa'),
		'menu_title' 	=> __('Basic Settings','beqa'),
		'menu_slug' 	=> 'main_settings',
		'parent_slug' 	=> $parent['menu_slug'],
		'capability'	=> 'edit_posts',
		'post_id' => 'main_settings',
	));
}

function wpassist_remove_block_library_css()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');


function load_events_by_category() {
    check_ajax_referer('load_events_nonce', 'nonce');

    $category_slug = isset($_POST['category_slug']) ? $_POST['category_slug'] : 'all';
    $paged = isset($_POST['page']) ? $_POST['page'] : 1;

    $args = array(
        'post_type' => 'event',
        'posts_per_page' => 9,
        'paged' => $paged,
        'category_name' => $category_slug,
    );

    $events_query = new WP_Query($args);
    
    $data = array(
        'events' => '',
        'pagination' => ''
    );

    if ($events_query->have_posts()) {
        ob_start();
        while ($events_query->have_posts()) {
            $events_query->the_post();
            get_template_part('template-part/event', 'card');
        }
        $data['events'] = ob_get_clean();

        // Pagination
		$data['pagination'] = paginate_links(array(
			'base'      => add_query_arg('paged','%#%'),
			'format'    => '?paged=%#%',
			'current'   => max(1, $paged),
			'total'     => $events_query->max_num_pages,
			'prev_text' => __('<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.93818 7.3912L11.229 7.39121L11.2291 7.39121L11.3945 7.3912L11.8945 7.39116L11.8944 6.89116L11.8944 6.7258L11.8944 6.72577L11.8944 5.85247L11.8944 5.85244L11.8945 5.68705L11.8945 5.18698L11.3944 5.18702L11.229 5.18703L11.229 5.18703L4.93817 5.18702L6.92666 3.19853L7.04363 3.08157L7.39718 2.72802L7.04363 2.37447L6.92666 2.25751L6.30876 1.6396L6.1918 1.52264L5.83825 1.16909L5.48469 1.52264L5.36773 1.6396L1.18874 5.81859L1.07178 5.93555L0.718229 6.2891L1.07178 6.64266L1.18874 6.75962L5.36775 10.9386L5.48471 11.0556L5.83827 11.4091L6.19182 11.0556L6.30878 10.9386L6.92668 10.3207L7.04364 10.2038L7.39719 9.85022L7.04364 9.49666L6.92668 9.3797L4.93818 7.3912Z" fill="#F2F3F4" stroke="#F2F3F4"/></svg>'),
			'next_text' => __('<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.06182 7.3912L1.77097 7.39121L1.77093 7.39121L1.60552 7.3912L1.10552 7.39116L1.10555 6.89116L1.10556 6.7258L1.10556 6.72577L1.10556 5.85247L1.10556 5.85244L1.10554 5.68705L1.10551 5.18698L1.60558 5.18702L1.77096 5.18703L1.771 5.18703L8.06183 5.18702L6.07334 3.19853L5.95637 3.08157L5.60282 2.72802L5.95637 2.37447L6.07334 2.25751L6.69124 1.6396L6.8082 1.52264L7.16175 1.16909L7.51531 1.52264L7.63227 1.6396L11.8113 5.81859L11.9282 5.93555L12.2818 6.2891L11.9282 6.64266L11.8113 6.75962L7.63225 10.9386L7.51529 11.0556L7.16173 11.4091L6.80818 11.0556L6.69122 10.9386L6.07332 10.3207L5.95636 10.2038L5.60281 9.85022L5.95636 9.49666L6.07332 9.3797L8.06182 7.3912Z" fill="#F2F3F4" stroke="#F2F3F4"/></svg>'),
			'type'      => 'array'
		));
    }

    wp_reset_postdata();
    wp_send_json($data);
}

add_action('wp_ajax_load_events_by_category', 'load_events_by_category');
add_action('wp_ajax_nopriv_load_events_by_category', 'load_events_by_category');


function remove_base_slug( $post_link, $post, $leavename ) {
    $cpt_slugs = array('event', 'news');
  
    if ( in_array($post->post_type, $cpt_slugs) && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    }
  
    return $post_link;
  }
  add_filter( 'post_type_link', 'remove_base_slug', 10, 3 );
  
  
  function check_parse_request( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
  
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'event', 'news', 'page' ) );
    }
  }
  add_action( 'pre_get_posts', 'check_parse_request' );



  function create_topic_taxonomies() {
    register_taxonomy(
      'industry',
      'post',
      array(
        'label' => __( 'Industry' ),
        'rewrite' => array( 'slug' => 'industry' ),
        'hierarchical' => true,
      )
    );
    register_taxonomy(
        'solutions',
        'post',
        array(
            'label' => __( 'Solutions' ),
            'rewrite' => array( 'slug' => 'solutions' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'content_type',
        'post',
        array(
            'label' => __( 'Content type' ),
            'rewrite' => array( 'slug' => 'content_type' ),
            'hierarchical' => true,
        )
    );
  }
  add_action( 'init', 'create_topic_taxonomies' );


add_action('wp_ajax_filter_posts', 'filter_posts_function');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_function');


function filter_posts_function() {
    $filters = isset($_POST['filters']) ? $_POST['filters'] : '';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 9,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );

    $tax_query = array('relation' => 'OR');

    foreach ($filters as $taxonomy => $terms) {
        if (!empty($terms)) {
            $tax_query[] = array(
                'relation' => 'AND',
                array(
                    'taxonomy' => sanitize_title($taxonomy),
                    'field' => 'slug',
                    'terms' => array_map('sanitize_title', $terms),
                    'operator' => 'IN'
                )
            );
        }
    }

    // Добавляем tax_query только если есть фильтры
    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    } else {
        unset($args['tax_query']);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            include(locate_template('template-part/post-card.php'));
        }
    } else {
        echo 'No posts found';
    }

    wp_die();
}

// search 

function my_live_search() {
    $search_query = $_POST['search'];
    $query_args = array(
        's' => $search_query,
        'post_status' => 'publish'
    );
    $search = new WP_Query($query_args);

    if ($search->have_posts()) :
        echo '<ul>';
        while ($search->have_posts()) : $search->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        endwhile;
        echo '</ul>';
    else :
        echo '<div>Nothing found.</div>';
    endif;

    wp_die();
}
add_action('wp_ajax_my_live_search', 'my_live_search');
add_action('wp_ajax_nopriv_my_live_search', 'my_live_search');



?>