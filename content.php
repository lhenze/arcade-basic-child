<?php
/**
 * The default template for displaying content
 *
 * Used for both single and front-page/index/archive/search.
 *
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
  <?php
		// Display a thumbnail if one exists and not on single post
		bavotasan_display_post_thumbnail();  ?>
  <?php get_template_part( 'content', 'header' ); ?>
  <div class="entry-content description clearfix">
    <?php
				$a = get_field('Audio');
				if (!empty($a)) :
					$g = "guid";
				  ?>
         <div class="audio"> <?php echo do_shortcode("[audio mp3=" . $a->$g . "]"); ?></div>
        <?php endif; ?>

        
    <?php
			if ( is_singular() && ! is_front_page() ) {
				//echo "singular";
			    the_content( __( 'Read more', 'arcade') );

                $y = get_field('Year');
      if (!empty($y)) : ?>
        <div class="entry_cf"><span class="cf-label">Year:</span>
        <div class="cf-value">
        <?php the_field('Year');  ?>
        </div>
        </div>
      <?php endif; ?>
    <?php 
  $d = get_field('Duration');
  if (!empty($d)) : ?>
    <div class="entry_cf"><span class="cf-label">Duration:</span>
      <div class="cf-value">
        <?php the_field('Duration');  ?>
      </div>
    </div>
    <?php endif; ?>
    <?php 
$i = get_field('Instrumentation');
if (!empty($i)) : ?>
    <div class="entry_cf"><span class="cf-label">Instrumentation:</span>
      <div class="cf-value">
        <?php the_field('Instrumentation');  ?>
      </div>
    </div>
    <?php endif; ?>

    <?php 
$pu = get_field('purchase_url');
if (!empty($pu)) : ?>
    <div class="entry_cf"><span class="cf-label"><a href="<?php the_field('purchase_url'); ?>">Purchase</a></span></div>
    <?php endif; ?>
    <?php 
$i = get_field('purchase_comments');
if (!empty($i)) : ?>
    <div class="entry_cf">
      <div class="cf-value">
        <?php the_field('purchase_comments');  ?>
      </div>
    </div>
    <?php endif; ?>
    

    <?php get_template_part( 'content', 'footer' );?>


    <?php
    //////////   Archives listings teasers 
    /////////
    /////////
			} else {
				//	echo "not singular";
				the_excerpt();
              $y = get_field('Year');
      if (!empty($y)) : ?>
        <div class="entry_cf"><span class="cf-label">Year:</span>
        <div class="cf-value">
        <?php the_field('Year');  ?>
        </div>
        </div>
      <?php endif; ?>
    <?php 
  $d = get_field('Duration');
  if (!empty($d)) : ?>
    <div class="entry_cf"><span class="cf-label">Duration:</span>
      <div class="cf-value">
        <?php the_field('Duration');  ?>
      </div>
    </div>
    <?php endif; ?>
    <?php 
$i = get_field('Instrumentation');
if (!empty($i)) : ?>
    <div class="entry_cf"><span class="cf-label">Instrumentation:</span>
      <div class="cf-value">
        <?php the_field('Instrumentation');  ?>
      </div>
    </div>
    <?php endif; ?>

        <?php 
$pu = get_field('purchase_url');
if (!empty($pu)) : ?>
    <div class="entry_cf"><span class="cf-label"><a href="<?php the_field('purchase_url'); ?>">Purchase</a></span></div>
    <?php endif; ?>
    <?php 
$i = get_field('purchase_comments');
if (!empty($i)) : ?>
    <div class="entry_cf">
      <div class="cf-value">
        <?php the_field('purchase_comments');  ?>
      </div>
    </div>
    <?php endif; ?>

}
		

  

  </div>

</article>
<!-- #post-<?php the_ID(); ?> -->