<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php if ( is_home() || is_front_page()) { echo get_bloginfo('name') . ' | Home ' . wp_title(); }else { echo wp_title();} ?></title> 
  <?php wp_head(); ?>
  
</head>
<body <?php body_class(); ?>>

<div class="topbar">
	<div class="container">
    	<div class="row">
        	<div class="topemail">
            	<a href="mailto:dreamjobsc2020@gmail.com" class="">
                <i class="fa-solid fa-envelope"></i> info@amaveroimmigration.com</a>
            </div>
            <div class="topphone">
            	<a class="" href="tel:+16827723274"><i class="fa-solid fa-phone"></i> +1 222-333-4444</a>
            </div>
        </div>
    </div>
</div>

<header id="header">	
    <div class="headertop">
    	<div class="container">
            <div class="row">
                <div class="header-logo">
                    <h1 class="text-light"><a href="<?php echo SITE_URL; ?>"><img src="<?PHP  echo TEMPLATE_URL;?>/images/amavero-immigration-logo.png" class="img-fluid"/></a></h1>  
                </div>
                <div class="header-menu">
                    <nav class="nav-menu">
                        <ul>         	   
                            <?php echo acg_wp_list_pages('theme_location=primary&title_li=&depth=3&echo=0'); ?>       
                        </ul>
                    </nav><!-- .nav-menu --> 
                </div>
                     
            </div>
        </div>
    </div>    
    
</header>
<div style="clear:both;"></div>