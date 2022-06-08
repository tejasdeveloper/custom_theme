<?php
/**
 * @package Alpha Channel Group Base Theme
 * @author Alpha Channel Group (www.alphachannelgroup.com)
 */

get_header();

if (has_post_thumbnail( $post->ID ) ){
	//$image 			= 	wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
	$feature_img	=	wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
	$banner_img		= $feature_img[0];
}else{
	$banner_img = get_template_directory_uri()."/images/bodybg.png";
}
?>
	<?php /*?><div class="herowraper">            
        <div class="herohead" style="background-image:url(<?PHP echo $banner_img; ?>);">
            <div class="container">
                <h2 class="hero_title"><?PHP echo  get_the_title( $post->ID ); ?></h2>
            </div>
            <div class="heroheadoverlay"></div>
        </div>
    </div><?php */?>
    <main id="main">	
        <section id="staticcontent" class="staticcontent">
        	<?php /*?><div class="sec_title mb-5">
                <h2><?PHP echo get_the_title();?></h2>               
            </div><?php */?>
            
                <?php /*?><div class="row ">
                 	<div class="col12"><?php */?>
                       	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="post" id="post-<?php the_ID(); ?>">
                                <?php the_content( '<p class="serif">Read the rest of this page &raquo;</p>' ); ?>
                            </div>
                            <?php
                            
                            //ACGTheme::comments();
                        endwhile; endif; ?>
                    <?php /*?></div>
                </div><?php */?>               
            
        </section>    
    </main>
    
    <style>
   	
	/* Blockquote main style */
	.blockquote {
		position: relative;
		font-family: 'Gotham-Light';			
		width:100%;
		/*margin: 80px auto;
		align-self: center;*/
		border: 2px solid #2f85c1;		
		border-radius:20px;
	}
	.blockquote:before{
		font: normal normal normal 14px/1 FontAwesome;
		content:"\f10d";
		position: absolute;
		left: 10px;
		top: 32px;
		font-size: 30px;
		color:#273373;
	}
	/* Blockquote header */
	.blockquote h1 {
		font-family: 'Gotham-Light';
		position: relative; /* for pseudos */
		color: #000;
		font-size: 2.8rem;
		font-weight: normal;
		line-height: 1;
		margin: 0;
		
		padding: 25px;
		font-size: 18px;
		line-height: 26px;
		padding-left: 50px;
		padding-top: 25px;
		padding-bottom: 25px;
	}
	
	/* Blockquote right double quotes */
	.blockquote h1:after {
		content:"";
		position: absolute;
		border: 2px solid #2f85c1;
		border-radius: 0 50px 0 0;
		width: 60px;
		height: 60px;
		bottom: -60px;
		left: 50px;
		border-bottom: none;
		border-left: none;
		z-index: 3; 
	}
	
	.blockquote h1:before {
		content:"";
		position: absolute;
		width: 80px;
		border: 6px solid #fff;
		bottom: -3px;
		left: 50px;
		z-index: 2;
	}
	
	
	
    </style>

<!-- inspired by quote here:https://www.thebump.com/real-answers/questions/how-to-get-my-baby-to-fall-to-sleep-on-his-own -->
  
<?php get_footer(); ?>