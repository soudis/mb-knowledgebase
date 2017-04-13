<?php
/*===============
    KBE Search Articles Widget
 ===============*/
 
//========= Custom Knowledgebase Search Widget
add_action( 'widgets_init', 'kbe_links_widgets' );
function kbe_links_widgets() {
    register_widget( 'kbe_links_widgets' );
}

//========= Custom Knowledgebase Search Widget Body
class kbe_links_widgets extends WP_Widget {
    
    //=======> Widget setup
    function __construct() {
        parent::__construct(
            'kbe_links_widgets', // Base ID
            __( 'Knowledgebase Links', 'kbe' ), // Name
            array( 'description' => __('WP Knowledgebase links widget', 'kbe'), 
                  'classname' => 'kbe' ),
            array( 'width' => 300, 'height' => 350, 'id_base' => 'kbe_links_widgets' ) // Args
        );
    }
        
  //=======> How to display the widget on the screen.
    function widget($args, $widgetData) {
        extract($args);
        ?>
        <div class="kbe_widget">
        <?php

            $queried_object = get_queried_object();

            if ( $queried_object ) {
                $post_id = $queried_object->ID;
            }
        if (is_user_logged_in()) {
        ?>
        
            <?php
            if (current_user_can( "publish_posts" ) ) {
            ?>
            <a class="kbe_add_button" title="Neuer Beitrag" href="<?php get_site_url() ?>/wp-admin/post-new.php?post_type=kbe_knowledgebase"><i class="mdf mdf-lg mdf-plus"></i></a>
            <?php
	    }
            if (is_singular() and !is_page() and current_user_can( "edit_posts", $post_id ) ) {
            ?>
            <a class="kbe_edit_button" title="Beitrag Editieren" href="<?php get_site_url() ?>/wp-admin/post.php?action=edit&post=<?php echo $post_id ?>"><i class="mdf mdf-lg mdf-pencil"></i></a>
            <?php
            }

        }
        if (!is_singular() and !is_page()) {
            $cat_link = get_category_feed_link( $post_id );
            ?>
            <a class="kbe_feed_button" title="Link zum RSS Feed" href="<?php echo $post_id; echo $cat_link; ?>"><i class="mdf mdf-lg mdf-rss"></i></a>
            <?php
        }        
            ?>
        </div>
        <?php
        echo $after_widget;
    }
    
}
?>
