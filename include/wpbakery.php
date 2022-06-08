<?PHP 

	class VcSodaBlockquote extends WPBakeryShortCode {

    function __construct() {
        add_action( 'init', array( $this, 'create_shortcode' ), 999 );            
        add_shortcode( 'vc_soda_blockquote', array( $this, 'render_shortcode' ) );

    }        

    public function create_shortcode() {
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }        

        // Map blockquote with vc_map()
        vc_map( array(
            'name'          => __('Home Boxe', 'sodawebmedia'),
            'base'          => 'vc_soda_blockquote',
            'description'  	=> __( '', 'sodawebmedia' ),
            'category'      => __( 'SodaWebMedia Modules', 'sodawebmedia'),                
            'params' => array(

                array(
                    "type" => "attach_image",
                    "class" => "",
                    "heading" => __( "Select Image", 'sodawebmedia' ),
                    "param_name" => "image",
                    "description" => __( "Add Citiation Link and Source Name", 'sodawebmedia' ),                                                
                ), 
				array(
                    'type'          => 'textfield',
                    'holder'        => 'div',
                    'heading'       => __( 'Heading', 'sodawebmedia' ),
                    'param_name'    => 'heading',
                    'value'         => __( '', 'sodawebmedia' ),
                    'description'   => __( 'Add Author Quote.', 'sodawebmedia' ),
                ),
				array(
                    "type" => "textarea_html",
                    "holder" => "div",
                    "class" => "",                     
                    "heading" => __( "Content", 'sodawebmedia' ),
                    "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
                    "value" => __( "<p>I am test text block. Click edit button to change this text.</p>", 'sodawebmedia' ),
                    "description" => __( "Enter content.", 'sodawebmedia' )
                ),

                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __( "Link", 'sodawebmedia' ),
                    "param_name" => "link",
                    "description" => __( "Add Citiation Link and Source Name", 'sodawebmedia' ),                                                
                ), 
				   

                array(
                    'type'          => 'textfield',
                    'heading'       => __( 'Element ID', 'sodawebmedia' ),
                    'param_name'    => 'element_id',
                    'value'             => __( '', 'sodawebmedia' ),
                    'description'   => __( 'Enter element ID (Note: make sure it is unique and valid).', 'sodawebmedia' ),
                    'group'         => __( 'Extra', 'sodawebmedia'),
                ),

                array(
                    'type'          => 'textfield',
                    'heading'       => __( 'Extra class name', 'sodawebmedia' ),
                    'param_name'    => 'extra_class',
                    'value'             => __( '', 'sodawebmedia' ),
                    'description'   => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sodawebmedia' ),
                    'group'         => __( 'Extra', 'sodawebmedia'),
                ),               
            ),
        ));             

    }

    public function render_shortcode( $atts, $content, $tag ) {
        $atts = (shortcode_atts(array(
            'link'   			=> '',            
			'heading'			=> '',
			'image'				=> '',
            'extra_class'       => '',
            'element_id'        => ''
        ), $atts));


        //Content 
        $content            = wpb_js_remove_wpautop($content, true);
        //$quote_author       = esc_html($atts['quote_author']);

        //Cite Link
            
        $box_url     		= esc_url( $atts['link'] );


		$box_heading		= $atts['heading'];	
		$box_img_id 			= $atts['image'];	 
        //Class and Id
        $extra_class        = esc_attr($atts['extra_class']);
        $element_id         = esc_attr($atts['element_id']);
        
		$box_img_url 		=	wp_get_attachment_url( $box_img_id );

        
		
		$output = '';
        
		$output .= '<div class="overlaybox" ' . $extra_class . ' id="' . $element_id . '">';
		
		$output .= '<a href="'.$box_url.'">';
		$output .= '<div class="overlayimg"><img src="'.$box_img_url.'"> </div>';
		$output .= '<div class="overlaytext"><h3>'.$box_heading.'</h3> '.$content.'</div>';		
		$output .= '</a>';
		$output .= '</div>';
		
		/*$output .= '<div class="blockquote ' . $extra_class . '" id="' . $element_id . '" >';
        $output .= '<blockquote cite="' . $blockquote_url . '">';
        $output .= $content;
        $output .= '<footer>' . $quote_author . ' - <cite><a href="' . $blockquote_url . '">' . $blockquote_title . '</a></cite></footer>';
        $output .= '</blockquote>';
        $output .= '</div>';*/

        return $output;                  

    }

}

new VcSodaBlockquote();
?>