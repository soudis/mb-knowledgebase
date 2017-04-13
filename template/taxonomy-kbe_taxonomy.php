<?php
    get_header('knowledgebase');
    
    // load the style and script
    wp_enqueue_style ( 'kbe_theme_style' );
    if( KBE_SEARCH_SETTING == 1 ){
        wp_enqueue_script( 'kbe_live_search' );
    }
    
    // Classes For main content div
    if(KBE_SIDEBAR_INNER == 0) {
        $kbe_content_class = 'class="kbe_content_full"';
    } elseif(KBE_SIDEBAR_INNER == 1) {
        $kbe_content_class = 'class="kbe_content_right"';
    } elseif(KBE_SIDEBAR_INNER == 2) {
        $kbe_content_class = 'class="kbe_content_left"';
    }
    
    // Classes For sidebar div
    if(KBE_SIDEBAR_INNER == 0) {
        $kbe_sidebar_class = 'kbe_aside_none';
    } elseif(KBE_SIDEBAR_INNER == 1) {
        $kbe_sidebar_class = 'kbe_aside_left';
    } elseif(KBE_SIDEBAR_INNER == 2) {
        $kbe_sidebar_class = 'kbe_aside_right';
    }
    
    // Query for Category
    $kbe_cat_slug = get_queried_object()->slug;
    $kbe_cat_name = get_queried_object()->name;
    // EDIT
    $kbe_cat_id = get_queried_object()->term_id;    
    
    $kbe_tax_post_args = array(
        'post_type' => KBE_POST_TYPE,
        'posts_per_page' => 999,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => KBE_POST_TAXONOMY,
                'field' => 'slug',
                'terms' => $kbe_cat_slug,
	           	'include_children' => false 
            )
        )
    );
    $kbe_tax_post_qry = new WP_Query($kbe_tax_post_args);
?>
<div id="kbe_container">
    <!--Breadcrum <?php echo $kbe_cat_slug ?>-->
    <?php
        if(KBE_BREADCRUMBS_SETTING == 1){
    ?>
            <div class="kbe_breadcrum">
                <?php echo kbe_breadcrumbs(); ?>
            </div>
    <?php
        }
    ?>
    <!--/Breadcrum-->
        
    <!--search field-->
    <?php
        if(KBE_SEARCH_SETTING == 1){
            kbe_search_form_cat($kbe_cat_id);
        }
    ?>
    <!--/search field-->
        
    <!--content kbe_taxonomy-->
    <div id="kbe_content" <?php echo $kbe_content_class; ?>>
        <!--leftcol--> 
        <div class="kbe_leftcol">

            <!--<articles>-->
            <div class="kbe_articles">
                <h2><strong><?php echo $kbe_cat_name; ?></strong></h2>

                <ul>
            <?php
                if($kbe_tax_post_qry->have_posts()) :
                    while($kbe_tax_post_qry->have_posts()) :
                        $kbe_tax_post_qry->the_post();
            ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
            <?php
                    endwhile;
                endif;
            ?>
                </ul>


            <?php
            function printChildCategories($parent_id, $level){
                    $kbe_child_cat_args = array(
                                            'orderby'       => 'term_order', 
                                            'order'         => 'ASC',
                                            'parent'        => $parent_id,
                                            'hide_empty'    => true, 
                                        );

                    $kbe_child_terms = get_terms(KBE_POST_TAXONOMY, $kbe_child_cat_args);    
                    foreach($kbe_child_terms as $kbe_child_term){
                            $kbe_child_term_id = $kbe_child_term->term_id;
                            $kbe_child_term_slug = $kbe_child_term->slug;
                            $kbe_child_term_name = $kbe_child_term->name; 
            ?>
               <h<?php echo $level+3; ?>> <!-- <?php echo $kbe_child_term_slug ?> -->  
                                <span><span class="kbe_category_collapse"></span>   
                                <span class="kbe_category_collapse_all"></span></span>                                   
                                <a href="<?php echo get_term_link($kbe_child_term_slug, 'kbe_taxonomy') ?>">
                                    <?php echo $kbe_child_term_name; ?>
                                </a>  
               </h<?php echo $level+3; ?>><div class="kbe_category_panel" style="display:none">
                            <ul class="kbe_child_article_list">
                        <?php
                            $kbe_child_post_args = array(
                                                        'post_type' => KBE_POST_TYPE,
                                                        'posts_per_page' => 999,
                                                        'orderby' => 'date',
                                                        'order' => 'DESC',
                                                        'tax_query' => array(
                                                                array(
                                                                        'taxonomy' => KBE_POST_TAXONOMY,
                                                                        'field' => 'term_id',
                                                                        'terms' => $kbe_child_term_id,
                                                                        'include_children' => false
                                                                )
                                                        )
                                                );
                            $kbe_child_post_qry = new WP_Query($kbe_child_post_args);
                            if($kbe_child_post_qry->have_posts()) :
                                while($kbe_child_post_qry->have_posts()) :
                                    $kbe_child_post_qry->the_post();
                        ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </li>
                        <?php
                                endwhile;
                            endif;
                        printChildCategories($kbe_child_term_id, $level+1);
                        ?>
                        </ul></div>
                    
            <?php
                       
                    }
            }
            printChildCategories($kbe_cat_id, 0);
            ?>



            </div>
        </div>
        <!--/leftcol-->

    </div>
    <!--/content-->
    
    <!--aside-->
    <div class="kbe_aside <?php echo $kbe_sidebar_class; ?>">
    <?php
        if((KBE_SIDEBAR_INNER == 2) || (KBE_SIDEBAR_INNER == 1)){
            dynamic_sidebar('kbe_cat_widget');
        }
    ?>
    </div>
    <!--/aside-->
    
</div>
<?php
    get_footer('knowledgebase');
?>