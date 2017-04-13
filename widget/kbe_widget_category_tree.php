<?php
/*===============
    KBE Category Widget
 ===============*/
 
//========= Custom Knowledgebase Category Widget
add_action( 'widgets_init', 'kbe_category_tree_widgets' );
function kbe_category_tree_widgets() {
    register_widget( 'kbe_Cat_Widget_Tree' );
}

//========= Custom Knowledgebase Category Widget Body
class kbe_Cat_Widget_Tree extends WP_Widget {
	
    function __construct() {
        parent::__construct(
            'kbe_category_tree_widget', // Base ID
            __( 'Knowledgebase Category Tree', 'kbe' ), // Name
            array( 'description' => __('WP Knowledgebase category widget to show categories on the site as a tree', 'kbe'), 
                    'classname' => 'kbe' ), // Args
            array( 'width' => 300, 'height' => 350, 'id_base' => 'kbe_category_tree_widget' )
        );
    }

            

	
     //=======> How to display the widget on the screen.
    function widget($args, $widgetData) {
        extract($args);
		
        //Our variables from the widget settings.
        $kbe_widget_cat_title = $widgetData['txtKbeCatHeading'];
        $kbe_widget_cat_count = $widgetData['txtKbeCatCount'];
    function printCategories($parentCategory){
        $kbe_cat_args = array(
            'number'    =>  $kbe_widget_cat_count,
            'taxonomy'  =>  'kbe_taxonomy',
            'orderby'   =>  'terms_order',
            'order'     =>  'ASC',
            'parent'    =>  $parentCategory
        );
        
        $kbe_cats = get_categories($kbe_cat_args);

        echo "<ol>";
            foreach($kbe_cats as $kbe_taxonomy){
                echo "<li>"
                        .'<label class="kbe_tree_label" for="c'.$kbe_taxonomy->term_id.'" />'
                        .'<input type="checkbox" id="c'.$kbe_taxonomy->term_id.'" />'
                        ."<a href=".get_term_link($kbe_taxonomy->slug, 'kbe_taxonomy')." title=".sprintf( __( "View all posts in %s" ), $kbe_taxonomy->name ).">"
                            .$kbe_taxonomy->name.
                         "</a>";
                printCategories($kbe_taxonomy->term_id);
                echo "</li>";
            }
        echo "</ol>";
    }
		
        //=======> widget body
        echo $before_widget;
        echo '<div class="kbe_widget">';
        
            if ($kbe_widget_cat_title){
                echo '<h2>'.$kbe_widget_cat_title.'</h2>';
            }

            $parsed_url = parse_url($_SERVER['REQUEST_URI']);
            $url_path = explode('/',$parsed_url['path']);
            $url_path_length=count($url_path);
            $tax_query = null;
            if ($url_path[2] == 'knowledgebase_category') {
                $term_id = get_term_by   ('slug', $url_path[3], KBE_POST_TAXONOMY)->term_id;
            }
            echo "<ol id='kbe_cat_tree'>";
            printCategories(0);
            echo "</ol>";
        
        echo "</div>";
        echo $after_widget;
    }
	
    //Update the widget 
    function update($new_widgetData, $old_widgetData) {
        $widgetData = $old_widgetData;
		
        //Strip tags from title and name to remove HTML 
        $widgetData['txtKbeCatHeading'] = $new_widgetData['txtKbeCatHeading'];
        $widgetData['txtKbeCatCount'] = $new_widgetData['txtKbeCatCount'];
        $widgetData['txtKbeCatDepth'] = $new_widgetData['txtKbeCatDepth'];
		
        return $widgetData;
    }
    function form($widgetData) {
        //Set up some default widget settings.
        $widgetData = wp_parse_args((array) $widgetData);
?>
        <p>
            <label for="<?php echo $this->get_field_id('txtKbeCatHeading'); ?>"><?php _e('Category Title:','kbe') ?></label>
            <input id="<?php echo $this->get_field_id('txtKbeCatHeading'); ?>" name="<?php echo $this->get_field_name('txtKbeCatHeading'); ?>" value="<?php echo $widgetData['txtKbeCatHeading']; ?>" style="width:275px;" />
        </p>    
        <p>
            <label for="<?php echo $this->get_field_id('txtKbeCatCount'); ?>"><?php _e('Catgory Quantity:','kbe'); ?></label>
            <input id="<?php echo $this->get_field_id('txtKbeCatCount'); ?>" name="<?php echo $this->get_field_name('txtKbeCatCount'); ?>" value="<?php echo $widgetData['txtKbeCatCount']; ?>" style="width:275px;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('txtKbeCatDepth'); ?>"><?php _e('Catgory Tree Depth:','kbe'); ?></label>
            <input id="<?php echo $this->get_field_id('txtKbeCatDepth'); ?>" name="<?php echo $this->get_field_name('txtKbeCatDepth'); ?>" value="<?php echo $widgetData['txtKbeCatDepth']; ?>" style="width:275px;" />
        </p>        
<?php
    }
}
?>