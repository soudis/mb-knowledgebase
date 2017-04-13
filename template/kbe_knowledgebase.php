<?php
    /*=========
    Template Name: KBE
    =========*/
    get_header('knowledgebase');
    
    // load the style and script
    wp_enqueue_style ( 'kbe_theme_style' );
    if( KBE_SEARCH_SETTING == 1 ){
        wp_enqueue_script( 'kbe_live_search' );
    }
    
    // Classes For main content div
    if(KBE_SIDEBAR_HOME == 0) {
        $kbe_content_class = 'class="kbe_content_full"';
    } elseif(KBE_SIDEBAR_HOME == 1) {
        $kbe_content_class = 'class="kbe_content_right"';
    } elseif(KBE_SIDEBAR_HOME == 2) {
        $kbe_content_class = 'class="kbe_content_left"';
    }
    
    // Classes For sidebar div
    if(KBE_SIDEBAR_HOME == 0) {
        $kbe_sidebar_class = 'kbe_aside_none';
    } elseif(KBE_SIDEBAR_HOME == 1) {
        $kbe_sidebar_class = 'kbe_aside_left';
    } elseif(KBE_SIDEBAR_HOME == 2) {
        $kbe_sidebar_class = 'kbe_aside_right';
    }
?>
<div id="kbe_container">
    <!--Breadcrum-->
<!--
    <?php
        if(KBE_BREADCRUMBS_SETTING == 1){
    ?>
            <div class="kbe_breadcrum">
                <?php echo kbe_breadcrumbs(); ?>
            </div>
    <?php
        }
    ?>
-->
    <!--/Breadcrum-->
    
    <!--search field-->
    <?php
        if(KBE_SEARCH_SETTING == 1){
            kbe_search_form();
        }
    ?>

    <!--/search field-->
<?php
  $start_page = get_post(4);
?>

    <!--content-->
    <div id="kbe_content" <?php echo $kbe_content_class; ?>>
        <!--Content Body-->
        <div class="kbe_leftcol" >
                <h1><?php echo $start_page->post_title(); ?></h1>
            <?php 
                echo $start_page->post_content();
            ?>
        </div>
        <!--/Content Body-->

    </div>

   <!--aside-->
    <div class="kbe_aside <?php echo $kbe_sidebar_class; ?>">
    <?php
        if((KBE_SIDEBAR_HOME == 2) || (KBE_SIDEBAR_HOME == 1)){
            dynamic_sidebar('kbe_cat_widget');
        }
    ?>
    </div>
    <!--/aside-->
    
</div>
<?php get_footer('knowledgebase'); ?>

