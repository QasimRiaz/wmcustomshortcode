<?php



class WmCustomShortCode {

	

    private static $initiated = false;

    public static function init() {
		if ( ! self::$initiated ) {
			self::init_hooks();
		}
	}


    /** Activation Hook -- Start -- */
   
    public static function wm_custom_shortcode_plugin_activation() {
		
        update_option("wm_custom_shortcode_status","Activate");
        
	}

    /** Activation Hook -- End -- */


    /** Deactivation Hook -- Start -- */

    public static function wm_custom_shortcode_plugin_deactivation() {


        update_option("wm_custom_shortcode_status","");
        unregister_post_type( 'wm-custom-shortcode' );
        flush_rewrite_rules();
		
	}
   
    /** Deactivation Hook -- End -- */

    /** Register Custom Post Type Shortcode -- Start -- */



    public static function wm_register_shortcode_posttype(){


        $labels = array(
            'name' => _x( 'Shortcode', 'post type general name' ),
            'singular_name' => _x( 'Shortcode', 'post type singular name' ),
            'add_new' => _x( 'Add New', 'Shortcode' ),
            'add_new_item' => __( 'Add New Shortcode' ),
            'edit_item' => __( 'Edit Shortcode' ),
            'new_item' => __( 'New Shortcode' ),
            'all_items' => __( 'All Shortcode' ),
            'view_item' => __( 'View Shortcode' ),
            'search_items' => __( 'Search Shortcode' ),
            'not_found' => __( 'No Shortcode found' ),
            'not_found_in_trash' => __( 'No Shortcode found in the Trash' ),
            'parent_item_colon' => '',
            'menu_name' => 'Shortcode'
        );

        $args = array(
            'labels' => $labels,
            'description' => 'Displays All Shortcode',
            'public' => true,
            'menu_position' => 3,
            'supports' => array( 'title', 'thumbnail' ),
            'has_archive' => true,
            );
        
        register_post_type( 'wm-custom-shortcode', $args );
       
       
    }

     /** Register Custom Post Type Shortcode -- End -- */

    /** Post Type Shortcode Custom Advance Fields  -- Start -- */

    public static function register_custom_acf_fields() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
    
            // ACF Group: People
            acf_add_local_field_group( array (
                'key'      => 'group_details',
                'title'    => 'Details',
                'location' => array (
                    array (
                        array (
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'wm-custom-shortcode',
                        ),
                    ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
            ) );
    
            // Button Label
            acf_add_local_field( array(
                'key'          => 'button_label',
                'label'        => 'Button Label',
                'name'         => 'button_label',
                'type'         => 'text',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => 'Load Form',
                'required'     => 0,
            ) );
    
            // Formidable Form
            acf_add_local_field( array(
                'key'          => 'frm_id',
                'label'        => 'Formidable Forms',
                'name'         => 'frm_id',
                'type'         => 'select',
                'parent'       => 'group_details',
                'instructions' => '',
                'choices' => array(
                    '1' => 'Contact Form',
                    '2' => 'Testing Form',
                ),
                'required'     => 1,
            ) );
    
            // logout
            acf_add_local_field( array(
                'key'          => 'logout',
                'label'        => 'Logout',
                'name'         => 'logout',
                'type'         => 'number',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => 0,
                'required'     => 0,
            ) );

            // trim_start
            acf_add_local_field( array(
                'key'          => 'trim_start',
                'label'        => 'Trim Start',
                'name'         => 'trim_start',
                'type'         => 'number',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => '',
                'required'     => 0,
            ) );

            // trim_end
            acf_add_local_field( array(
                'key'          => 'trim_end',
                'label'        => 'Trim End',
                'name'         => 'trim_end',
                'type'         => 'number',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => '',
                'required'     => 0,
            ) );

            // start_img
            
            acf_add_local_field( array(
                'key'          => 'start_img',
                'label'        => 'Start Img',
                'name'         => 'start_img',
                'type'         => 'url',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => '',
                'required'     => 0,
              ) );
            
            // end_img
            
            acf_add_local_field( array(
                'key'          => 'end_img',
                'label'        => 'End Img',
                'name'         => 'end_img',
                'type'         => 'url',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => '',
                'required'     => 0,
              ) );
                
            // Src
            
            acf_add_local_field( array(
                'key'          => 'src',
                'label'        => 'Src',
                'name'         => 'src',
                'type'         => 'url',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => '',
                'required'     => 0,
              ) );

             // has_cc
            
             acf_add_local_field( array(
                'key'          => 'has_cc',
                'label'        => 'Has Cc',
                'name'         => 'has_cc',
                'type'         => 'true_false',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => 0,
                'conditional_logic' => 0,
                'required'     => 0,
              ) );

             // is_live
            
             acf_add_local_field( array(
                'key'          => 'is_live',
                'label'        => 'Live',
                'name'         => 'is_live',
                'type'         => 'true_false',
                'parent'       => 'group_details',
                'instructions' => '',
                'default_value' => 0,
                'conditional_logic' => 0,
                'required'     => 0,
              ) );
            
        
        }
    }

    /** Post Type Shortcode Custom Advance Fields  -- End -- */


    /** Post Type Shortcode Add Columns Listing Page  -- Start -- */

    public static function wm_custom_post_type_listing_columns( $columns ) {
  
        $columns['shortcode'] = __( 'ShortCode', 'ShortCode' );
      
        return $columns;

    }


    /** Post Type Shortcode Add Columns Listing Page  -- End -- */

    /** Post Type Shortcode Columns value on listing page  -- Start -- */


    public static function wm_custom_shortcode_column_value( $column, $post_id ) {
        

       
        switch ( $column ) {
     
            
            case 'shortcode'   :
            echo "[wm-custom-shortcode id='".$post_id."']";
            break;
     
        }
    }


    /** Post Type Shortcode Columns value on listing page  -- Start -- */
    
    
    /** Register Shortcode  -- Start -- */

    public static function wm_custom_shortcode( $atts ) {
        
        $getTheShortcodeObject = get_post_meta($atts['id']);
        
        $shortcodeDetails['Button Label'] = $getTheShortcodeObject['button_label'][0];
        $shortcodeDetails['Form ID']      = $getTheShortcodeObject['frm_id'][0];
        $shortcodeDetails['Logout']       = $getTheShortcodeObject['logout'][0];
        $shortcodeDetails['Trim Start']   = $getTheShortcodeObject['trim_start'][0];
        $shortcodeDetails['Trim End']     = $getTheShortcodeObject['trim_end'][0];
        $shortcodeDetails['Start Img']    = $getTheShortcodeObject['start_img'][0];
        $shortcodeDetails['End Img']      = $getTheShortcodeObject['end_img'][0];
        $shortcodeDetails['Src']          = $getTheShortcodeObject['src'][0];
        $shortcodeDetails['Has Cc']       = $getTheShortcodeObject['has_cc'][0];
        $shortcodeDetails['Is Live']      = $getTheShortcodeObject['is_live'][0];

        $shortcodeHtml = "[formidable id='".$getTheShortcodeObject['frm_id'][0]."' title=true description=true]";

        return "<script>console.log(".json_encode($shortcodeDetails).")</script><div class='row'><div class='wmshortcodediv'><button class='btn btn-info' onclick='gettheformload(".$atts['id'].")'>".$getTheShortcodeObject['button_label'][0]."</button>".do_shortcode($shortcodeHtml)."</div></div>";
       
    }


    /** Register Shortcode  -- End -- */


    /** Click On button Load Form from formidable  -- Start -- */

    public static function wm_custom_shortcode_loadfrm() {
        
        


        $getTheShortcodeObject = get_post_meta($_POST['postid']);

       
        $getCurrentUserID = get_current_user_id();
        $currentDateAndTime = date("d-m-Y h:i:s A");
        $getUserLastload  = get_user_meta($getCurrentUserID,"_lastloadformrequest",true);
        

        $shortcodeDetails['Button Label'] = $getTheShortcodeObject['button_label'][0];
        $shortcodeDetails['Form ID']      = $getTheShortcodeObject['frm_id'][0];
        $shortcodeDetails['Logout']       = $getTheShortcodeObject['logout'][0];
        $shortcodeDetails['Trim Start']   = $getTheShortcodeObject['trim_start'][0];
        $shortcodeDetails['Trim End']     = $getTheShortcodeObject['trim_end'][0];
        $shortcodeDetails['Start Img']    = $getTheShortcodeObject['start_img'][0];
        $shortcodeDetails['End Img']      = $getTheShortcodeObject['end_img'][0];
        $shortcodeDetails['Src']          = $getTheShortcodeObject['src'][0];
        $shortcodeDetails['Has Cc']       = $getTheShortcodeObject['has_cc'][0];
        $shortcodeDetails['Is Live']      = $getTheShortcodeObject['is_live'][0];

       
        
        if(empty($getUserLastload)){

            $responce['message'] = "success";
           
            update_user_meta($getCurrentUserID,"_lastloadformrequest",$currentDateAndTime);

        }else{

           
            $currentdatetime = new Datetime($currentDateAndTime);
            $secondDateandtime = new Datetime($getUserLastload);


            $diff = $secondDateandtime->diff($currentdatetime);

            $hours = $diff->h;
            $hours = $hours + ($diff->days*24);

            if($hours >= 12){

                $responce['message'] = "success";
                $responce['time'] = $hours;
                update_user_meta($getCurrentUserID,"_lastloadformrequest",$currentDateAndTime);
                

            }else{

                $responce['message'] = "failed";
                $responce['time'] = $hours;
            }


        }
       
        $responce['shortcodedetails'] = $shortcodeDetails;

       echo json_encode($responce);
       wp_die();
      
    }


    /** Click On button Load Form from formidable  -- End -- */
    
    
    public static function wmcustomcode_formidable_class( $form ) {
       
        echo 'wmshortcodeformidable';
        
    }

    /** Plugin dependencies   -- Start -- */

    private static function init_hooks() {
        
		self::$initiated = true;
        
        add_filter( 'manage_wm-custom-shortcode_posts_columns', array( 'WmCustomShortCode', 'wm_custom_post_type_listing_columns' ) );
        
       
        wp_register_script( 'wmcushortcode.js', plugin_dir_url( __FILE__ ) . '_inc/js/wmcushortcode.js', array(), WMCUSTOMSHORTCODE_VERSION );
		wp_enqueue_script( 'wmcushortcode.js');


    }
    
    /** Plugin dependencies   -- End -- */

}