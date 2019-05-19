<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_video_ribbon_hide');
if($hide_section == ''|| $hide_section == '0' ){ ?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_video_ribbon_id','video'));?>" class="thunk-video-ribbon cd-section">
	<div class="container">
	<div class="video-window">
		<!-- Trigger to open Modal -->
<a href="#" data-izimodal-open="#video-modal" data-izimodal-transitionin="fadeInDown" class="thunk-modal-open" ><i class="fa fa-play"></i></a>
		<h4 class="wow fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_video_ribbon_heading') != ""){
	 	echo esc_html(get_theme_mod( 'gogo_video_ribbon_heading','')); 
	}
	else{
		esc_html_e('Unique, Best, Adaptable.','hunk-companion');		
	}
	?>
		</h4>
		
		<p class="wow fadeInRight" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_video_ribbon_subheading') != ""){
	 		echo esc_html(get_theme_mod( 'gogo_video_ribbon_subheading','')); 
	}
	else{
		esc_html_e('We provide services to assure your needs 100%.','hunk-companion');		
	}
	?>
		</p>
	</div><!--...........video-window...........-->
	<!-- Modal structure -->
<div id="video-modal"data-iziModal-fullscreen="true"  data-iziModal-title=" "  data-iziModal-subtitle=" "  data-iziModal-icon="icon-home" data-izimodal-iframeURL="<?php echo esc_url(get_theme_mod('gogo_video_ribbon_url','https://www.youtube.com/embed/Un4ItkiZ6Tw',''));?>" >
</div>
	</div><!--.........CONTAINER END..............-->
</section>
<?php }  