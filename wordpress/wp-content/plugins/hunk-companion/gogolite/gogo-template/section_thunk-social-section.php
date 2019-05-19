<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_social_hide');
if($hide_section == ''|| $hide_section == '0' ){ ?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_social_id','social'));?>" class="thunk-social-section cd-section">
	<div class="container">
		<div class="thunk-social-wrapper wow fadeInUp" data-wow-duration="2.5s"">
      <?php       
            $default= Hunk_Companion_Defaults_Models::instance()->get_social_section_default();
            hunk_companion_social_content('gogo_social_content', $default);
      ?>
    </div><!--........social-wrapper END.........-->
	</div><!--....container END.........-->
</section>
<?php }  