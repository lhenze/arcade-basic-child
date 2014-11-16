<?php



function remove_some_widgets(){


	unregister_sidebar( 'sidebar' );

}
//add_action( 'widgets_init', 'remove_some_widgets', 11 );


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'publisher',
    array(
      'labels' => array(
        'name' => __( 'Publishers' ),
        'singular_name' => __( 'Publisher' )
      ),
      'public' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'menu_position' => 20
    )
  );
}

function custom_search_where($where) {
    // put the custom fields into an array
    $customs = array('custom_field1', 'custom_field2', 'custom_field3');

    foreach($customs as $custom) {
  $query .= " OR (";
  $query .= "(m.meta_key = '$custom')";
  $query .= " AND (m.meta_value  LIKE '{$n}{$term}{$n}')";
        $query .= ")";
    }

    $where = " AND ({$query}) AND ($wpdb->posts.post_status = 'publish') ";
    return($where);
}
//add_filter('posts_where', 'custom_search_where');



?>