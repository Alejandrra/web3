<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
$portfolio_type = 'masonry';
$hide_section = get_theme_mod( 'gogo_portfolio_hide','1');
if($hide_section == ''|| $hide_section == '0' ){ 
switch ($portfolio_type) {
  case 'masonry':
    $portfolio_type = "masonry";
    break;
  case 'normal':
    $portfolio_type = "fitRows";
    break;
}
  
global $portfolio;
?> 
<input id="ptype" type="text" hidden value="<?php echo esc_attr($portfolio_type); ?>" >
<section id="<?php echo esc_attr(get_theme_mod('gogo_portfolio_id','portfolio'));?>" class="thunk-portfolio thunk-masonry gutter cd-section">
  <div class="container">
    <div class="thunk-content-area">
    <div class="thunk-col-1">
            <div class="thunk-inner-col">
            <div class="index-wrapper">             
              <div class="heading">
                <span class="th-heading-number">
                  <?php echo esc_html('0'.$portfolio); ?>
                </span>
              </div>  
              <div class="heading-border"><span class="vertical-text-border"></span></div>      
              <div class="heading-name">
                <span class="vertical-text wow fadeIn" data-wow-duration="3s">
        <?php 
        if( get_theme_mod( 'gogo_portfolio_name') != ""){
         echo esc_html( get_theme_mod( 'gogo_portfolio_name','') );
        }
        else{
          esc_html_e( 'Our portfolio', 'hunk-companion' );
        }
        ?>  
            </span>
              </div>  
            </div><!--........index-wrapper END.......-->
            </div><!--....thunk-inner-col END.........-->
          </div><!--....col-1 END.........-->
      <div class="thunk-col-2-1">
        <div class="thunk-inner-col">
        <h2 class="short-heading wow fadeInLeft" data-wow-duration="2.5s">
    <?php if( get_theme_mod( 'gogo_portfolio_heading') != ""){
      echo esc_html( get_theme_mod( 'gogo_portfolio_heading',''));
  }
  else{
     esc_html_e( 'Explore some time with our portfolio', 'hunk-companion' );   
  }
  ?>  
  </h2>
  <span class="item-divider"></span>
  <div class="portfolio-wrapper wow fadeInRight" data-wow-duration="2.5s">  
    <?php  
    $perpage_post = get_theme_mod('our_port_default_images',6);
    if(get_theme_mod('our_port_category','')!==''){
          echo hunk_companion_get_category_list($perpage_post); //
    }
     ?>
  <div class="grid-area portfolio-grid thunk-three thunk-gutter">    
  <div class="grid-sizer"></div>
  <div class="gutter-sizer"></div>
 <?php
        $our_port_category = get_theme_mod('our_port_category',0);
        $modal_id = '';
        if(is_array($our_port_category)):
          foreach ($our_port_category as $key => $cat_slug){
          $loop = new WP_Query( array(
          'post_type' => 'portfolio',
          'tax_query' => array(
    array(
      'taxonomy' => 'portfolio-cate',
      'field'    => 'slug',
      'terms'    =>  esc_attr($cat_slug),
    )),
          'posts_per_page' => $perpage_post,
          'paged'          => 1,
          'pagination'     => true,
          'meta_query'     => array(array( 'key' => '_thumbnail_id')),
          ));
          $total_post = $loop->found_posts;    
          if ($loop->have_posts()){
          while ($loop->have_posts()) : $loop->the_post();
          echo'<div class="th-grid-item '.esc_attr($cat_slug).'" lfb-page = "2" totalpost = "'.esc_attr($total_post).'" data-category="transition" data-max-pages="'. esc_attr($loop->max_num_pages).'">';
          $modal_id = get_the_ID();
          ?>
              <div class="thumbnail-img">                
                 <a href="" data-izimodal-open="#modal<?php echo esc_attr($modal_id); ?>" data-izimodal-transitionin="fadeInDown"><?php the_post_thumbnail(); ?></a>
              </div> 
              <div class="thunk-fig-caption">
    <!-- Modal structure -->
<div id="modal<?php echo esc_attr($modal_id); ?>" class="iziModal th-portfolio" data-iziModal-fullscreen="" data-izimodal-group="alerts">
    <!-- Modal content -->
  <div id="open-modal" class="modal-window th-modal-window">
  <button data-izimodal-close="" class="thunk-modal-close"> <?php esc_html_e('&times;','hunk-companion'); ?></button>
  <div class="th-modal-post">
    <div class="th-modal-image">
      <?php the_post_thumbnail(); ?>
    </div>
    <div class="th-modal-description">
      <h2 class="th-modal-title"><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <div class="th-modal-meta">
      <h4 class="th-modal-date"><?php esc_html_e('Date:' ,'hunk-companion'); the_date(); ?></h4>
      <h4 class="client-category"> <?php esc_html_e('Category:' ,'hunk-companion'); the_category( ' ' ); ?></h4>
      </div><!--..........th-modal-description END......-->
    </div><!--..............th-modal-meta END..........-->
  </div><!--..........th-modal-post ENDS............-->
  <div class="th-portfolio-back-button">
  <a href="" data-izimodal-close="" class="type-button th-portfolio-back"><?php esc_html_e('Back to portfolio','hunk-companion'); ?>
  <div class="type-button-overlay"></div>
  </a>
  </div>
  </div><!--...............MODAL-WINDOW END................-->
   </div><!--.............MODAL END.............-->
    <!-- Trigger to open Modal -->
    <a href="" data-izimodal-open="#modal<?php echo esc_attr($modal_id); ?>" data-izimodal-transitionin="fadeInDown"><span class="fa fa-gg"></span></a>
        <h3><?php the_title(); ?></h3>
        </div><!--.........thunk-fig-caption END ...............--> 
            
        </div><!--............th-grid-item END............-->

        <script type="text/javascript">
          jQuery(document).ready(function() {
              jQuery("#modal<?php echo esc_js($modal_id); ?>").iziModal({
                    group: 'alerts',
                    loop: true
                  });
          })
        </script>
       <?php   
        endwhile; } ?>
       <?php } endif; 
          wp_reset_postdata();
        ?> </div><!-- ............portfolio-grid End......... -->
              <button class ="load-more lfb-load-more"><?php esc_html_e('Load More','hunk-companion'); ?></button>
           </div><!--............portfolio-wrapper End.....-->
        </div><!--....thunk-inner-col END.........-->
      </div><!--....thunk-col-2-1 END.........-->
    </div><!--....thunk-content-area END.........-->
  </div><!--....container END.........-->
</section>
<?php }  