<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
$hide_section = get_theme_mod( 'gogo_pricing_hide','');
if($hide_section == ''|| $hide_section == '0' ){ 
$if_slidercheck = get_theme_mod('gogo_pricing_slider','');
if ($if_slidercheck ) {
	$if_slidercheck = 'owl-carousel';
	
}
else{
	 $if_slidercheck = 'no-slider';
}
global $pricing;
?>
<section id="<?php echo esc_attr(get_theme_mod('gogo_pricing_id','pricing')); ?>" class="thunk-pricing cd-section">
	<div class="container">
		<div class="thunk-content-area pricing-content-area">
			<div class="thunk-col-1">
						<div class="thunk-inner-col">
							<div class="index-wrapper">
							<div class="heading">
								<span class="th-heading-number">
									<?php echo esc_html('0'.$pricing); ?>
								</span>
							</div>	
							<div class="heading-border"><span class="vertical-text-border"></span></div>			
							<div class="heading-name">
								<span class="vertical-text wow fadeIn" data-wow-duration="3s"><?php 
				if( get_theme_mod( 'gogo_pricing_name') != ""){
	 			echo esc_html(get_theme_mod( 'gogo_pricing_name',''));
				}
				else{
				esc_html_e('Pricing and Plans','hunk-companion');		
				}
				?>	</span>
							</div>	
						</div><!--........index-wrapper END.......-->
						</div><!--....thunk-inner-col END.........-->
					</div><!--....col-1 END.........-->
			<div class="thunk-col-2-1">
				<div class="thunk-inner-col">
				<h2 class="short-heading wow fadeInLeft" data-wow-duration="2.5s">
	<?php if( get_theme_mod( 'gogo_pricing_heading') != ""){
	 echo esc_html( get_theme_mod( 'gogo_pricing_heading','') );
	}
	else{
	 esc_html_e( 'Let us make a bond with your needs.', 'hunk-companion' );		
	}
	?>		
				</h2>
				<span class="item-divider"></span>
			<div class="pricing-wrapper">
			<div class="pricing-box thunk-three <?php echo esc_attr($if_slidercheck); ?> wow fadeInRight" data-wow-duration="2.5s">
		<?php       
            $default= Hunk_Companion_Defaults_Models::instance()->get_pricing_default();
            hunk_companion_pricing_content('gogo_pricing_content', $default);
		?>		
		</div><!--........pricing-box END.....-->
			<h2 class="pricing-subheading pricing-t-c wow fadeInUp" data-wow-duration="2.5s">
		<?php if( get_theme_mod( 'gogo_pricing_t_c') != ""){
	 echo esc_html( get_theme_mod( 'gogo_pricing_t_c',''));
	}
	else{
esc_html_e( '15 DAYS MONEY BACK GUARANTEE. NO QUESTIONS ASKED.', 'hunk-companion' );
	}
	?>
			</h2>
			</div><!--............pricing-wrapper END..........-->
		</div><!--..........thunk-inner-col END.........-->
	</div><!--..........thunk-col-2-1 END.........-->
</section>
<?php }  