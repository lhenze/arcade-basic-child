<?php
/**
 * Template Name: Music
 *
 * Description: Lists all posts, grouped by category
 **/
	
get_header();
?>

	<div class="container">
		<div class="row">
			<div id="primary" class="col-md-12 hfeed" >
				

<?php
            // get all the categories from the database
            $cats = get_categories(); 
            $menu = wp_get_nav_menu_object("Music");
            $cats = wp_get_nav_menu_items($menu->term_id);

            function handleArticles($str) {
                list($first,$rest) = explode(" ",$str." ",2);
                // the extra space is to prevent "undefined offset" notices
                // on single-word titles
                $validarticles = array("a","an","the");
                if( in_array(strtolower($first),$validarticles)) return $rest.", ".$first;
                return $str;
            }
                // loop through the categries
            foreach ($cats as $cat) {
                    // setup the cateogory ID
                    $cat_id= $cat->object_id;
                     $title = $cat->title;
                    // Make a header for the cateogry
                    echo "<h2>".$cat->title ."</h2>";
                    // create a custom wordpress query
                    $items = query_posts("cat=$cat_id&posts_per_page=500");
                  //  sort($items);
                   // var_dump($items);
                    $cats_html = "<ul>";
                    // start the wordpress loop!
                  
                    usort($items,function($a,$b) {
                        $a = $a->post_title;
                        $b = $b->post_title;
                        return strnatcasecmp(handleArticles($a),handleArticles($b));
            });


                 
                    if (have_posts()) : foreach( $items as $post ) :    setup_postdata($post);  ?>
 
                        <?php 
                       
                        // create our link now that the post is setup ?>

                        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
                       
                   <?php endforeach;

                    endif; // done our wordpress loop. Will start again for each category
                      $cats_html = "</ul>";

                       ?>

                <?php } // done the foreach statement ?>



			</div>
		
		</div>
	</div>

<?php get_footer(); ?>