<?php
/**
 * @package WordPress
 */
/*
 */
get_header(); ?>
	
    <?PHP include "slick/slickslider.php"; ?>
   	
    
    
    
    
    <main id="main" class="mainwraper">
    	
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                    <?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>
                </div>
            <?php endwhile; endif; ?>
        
    </main><!-- End #main -->
    
    
<?php get_footer(); ?>