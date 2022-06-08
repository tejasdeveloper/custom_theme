<div class="homeslickslide">
    <?PHP 
	
	$slideargs = array(
					'post_type' => 'slickslider',		
				);
	$slidequery = new WP_Query( $slideargs );
	if ( $slidequery->have_posts() ) {
		$i = 0;
		while ( $slidequery->have_posts() ) {$slidequery->the_post();
			
			$slideimage 	= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );			
			$slideimgarr[] 	= $slideimage[0];
			
			$slidedetail 	= get_field("description",$post->ID);
			$shopnow 		= get_field("shop_button_link",$post->ID);
	?>    
    	<div class="slide slidebg_<?PHP echo $i; ?>" data-title="<?PHP echo get_the_title() ;?>" style="background-image:<?PHP echo $slideimage[0];?>">
        	<div class="slidedetail">
            	<div class="slidecaption">
                	<h5><?PHP echo get_the_title() ;?></h5>
                	<p><?PHP echo $slidedetail;?></p>
                    <a class="slideshopnow" href="<?PHP echo $shopnow;?>">Read more</a>
                </div>
                
            </div>
        	
        </div>
  <?PHP $i++;}
    } 
	
	?>
    </div>
    <?PHP 
	echo "<style>";
  	foreach($slideimgarr as $key => $slideimg){
		
		echo ".slidebg_".$key."{ background-image:url(".$slideimg.")}  ";
	}
	echo "</style>";
	?>
    