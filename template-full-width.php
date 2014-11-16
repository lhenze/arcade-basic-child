<?php
/**
 * Template Name: Full width
 *
 * Description: A full width page template that will display 4 posts in a block without any sidebars
 **/
	
get_header();
?>

	<div class="container">
		<div class="row">
			<div id="primary" class="col-md-12 hfeed" >
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-content description clearfix">
						    <?php the_content( __( 'Read more', 'arcade') ); ?>
					    </div><!-- .entry-content -->

					    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
					
				endwhile;
				?>
			</div>
		
		</div>
	</div>

<?php get_footer(); ?>