<?php 
    get_header();
    while(have_posts()) {
        the_post(); 
        page_banner();?>

  <div class="container container--narrow page-section">

  <?php 
  $the_parent_id = wp_get_post_parent_id( get_the_ID());
   if($the_parent_id > 0 ) { ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($the_parent_id); ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo get_the_title($the_parent_id)?></a> <span class="metabox__main"><?php the_title() ?></span></p>
    </div>
   <?php } ?>

   
    
    <?php 
    $testArray = get_pages(array(
        'child_of'=> get_the_ID()
    ));
    if($the_parent_id || $testArray) { ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($the_parent_id);?>"><?php echo get_the_title($the_parent_id) ?></a></h2>
      <ul class="min-list">
        <?php 
        if($the_parent_id > 0) {
            $findChildrenOf = $the_parent_id;
        } else {
            $findChildrenOf = get_the_ID();
        }
        wp_list_pages(array(
            'title_li' => null,
            'child_of' => $findChildrenOf,
            'sort_column'=> 'menu_order'
        ));
        ?>
      </ul>
    </div>

    <?php } ?>
   
    <div class="generic-content">
       <?php get_search_form(); ?>
    </div>

  </div>


       
    <?php } ?>

<?php get_footer(); ?> 

