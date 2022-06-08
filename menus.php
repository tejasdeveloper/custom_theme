<?php
function acg_wp_list_pages($args) {
	$echo = false;
	if ( ! is_array($args)) {
		$pairs = explode("&", $args);
		unset($args);
		foreach($pairs as $k=>$v) {
			$pair = explode("=", $v);
			$args[$pair[0]] = $pair[1];
		}
	}
	
	if ( ! isset($args["echo"]) || $args["echo"]!=0) {
		$args["echo"]=0;
		$echo = true;
	}
	
	if (isset($args["image"]) || isset($args["useimages"]) || isset($args["image_dir"])) {
		acg_image_menu($args);
		return;
	}
	
	if (empty($args['walker'])) {
		$args['walker'] = new acg_classify_menu;
	}
	
	// Change here to get the nav menu...
	// Function to clean up the standard wp_nav_menu returned values
	$str = wp_nav_menu($args);
	$pos = stripos($str, "<li") + 1;
	$pos = stripos($str, "class=", $pos) + 7;
	$str = substr($str, 0, $pos) . 'first_page ' . substr($str, $pos);
	$str = str_replace(array("\n", "\r", "\t"), "", $str);
	// Strip out the ul container
	$pos = stripos($str, "<ul");
	if ($pos!==false) {
		$end = stripos($str, ">", $pos);
		$str = substr($str, 0, $pos) . substr($str, $end+1);
		$pos = strripos($str, "</ul>");
		$str = substr($str, 0, $pos) . substr($str, $pos+5);
	}
	// Strip out the div container
	$pos = stripos($str, "<div");
	if ($pos!==false) {
		$end = stripos($str, ">", $pos);
		$str = substr($str, 0, $pos) . substr($str, $end+1);
		$pos = strripos($str, "</div>");
		$str = substr($str, 0, $pos) . substr($str, $pos+6);
	}
	if ($echo) {
		echo $str;
	} else {
		return $str;
	}
}
class acg_classify_menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args = Array(), $id = 0) {
		global $wp_query;
		$args = (array)$args;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = 'menu-' . strtolower(preg_replace('/[^\da-z]/i', '-', $item->title));
		
		//echo "<Div>";
		//print_r($item);
		//echo "</Div>";
		if( in_array('menu-item-has-children', $classes)) {
		 	$classes[] = "drop-down";
		}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
		
		
		
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
		$prepend = '';
		$append = '';
		
		$item_output = $args['before'];
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args['link_before'] . $prepend . apply_filters( 'the_title', $item->title, $item->ID ) . $append;
		$item_output .= $args['link_after'];
		$item_output .= '</a>';
		$item_output .= $args['after'];
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function start_lvl(&$output, $depth = 0, $args = array()) {
    	$indent = str_repeat("\t", $depth);
    	$output .= "\n$indent<ul class=\"nav-dropdown\">\n";
  	}
}
