<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Slider Template
 * Created by CMSMasters
 * 
 */


$slider_active = get_post_meta(get_the_ID(), 'slidertools_active', true);
$slidertools_slider_id = get_post_meta(get_the_ID(), 'slidertools_slider_id', true);

$sliderManager = new cmsmsSliderManager;
$sliderOptions = $sliderManager->getSlider($slidertools_slider_id);

?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cmsmsResponsiveSlider-1.0.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function () { 
		var w = 1220, 
			h = 500;
		
		if (jQuery(window).width() >= 1006 && jQuery(window).width() < 1348) { 
			w = 980;
			h = 400;
		} else if (jQuery(window).width() >= 740 && jQuery(window).width() < 1006) { 
			w = 740;
			h = 300;
		} else if (jQuery(window).width() >= 462 && jQuery(window).width() < 740) { 
			w = 460;
			h = 185;
		} else if (jQuery(window).width() < 462) { 
			w = 300;
			h = 120;
		}
		
		jQuery('#slider').cmsmsResponsiveSlider( { 
			sliderWidth : w, 
			sliderHeight : h, 
			animationSpeed : <?php echo ($sliderOptions['slider']['slider_animation'] != '') ? (int) ($sliderOptions['slider']['slider_animation'] * 1000) : '500'; ?>, 
			animationEffect : '<?php echo ($sliderOptions['slider']['slider_effect'] != '') ? $sliderOptions['slider']['slider_effect'] : 'fade'; ?>', 
			animationEasing : '<?php echo ($sliderOptions['slider']['slider_easing'] != '') ? $sliderOptions['slider']['slider_easing'] : 'easeInOutExpo'; ?>', 
			pauseTime : <?php echo ($sliderOptions['slider']['slider_pause'] != '') ? (int) ($sliderOptions['slider']['slider_pause'] * 1000) : '5000'; ?>, 
			activeSlide : <?php echo ($sliderOptions['slider']['active_slide'] != '') ? $sliderOptions['slider']['active_slide'] : '1'; ?>, 
			buttonControls : <?php echo ($sliderOptions['slider']['button_controls'] == 'true') ? 'true' : 'false'; ?>, 
			touchControls : <?php echo ($sliderOptions['slider']['touch_controls'] == 'true') ? 'true' : 'false'; ?>, 
			pauseOnHover : <?php echo ($sliderOptions['slider']['pause_on_hover'] == 'true') ? 'true' : 'false'; ?>, 
			showCaptions : <?php echo ($sliderOptions['slider']['slides_caption'] == 'true') ? 'true' : 'false'; ?>, 
			arrowNavigation : <?php echo ($sliderOptions['slider']['arrow_navigation'] == 'true') ? 'true' : 'false'; ?>, 
			arrowNavigationHover : <?php echo ($sliderOptions['slider']['arrow_navigation_hover'] == 'true') ? 'true' : 'false'; ?>, 
			slidesNavigation : <?php echo ($sliderOptions['slider']['slides_navigation'] == 'true') ? 'true' : 'false'; ?>, 
			slidesNavigationHover : <?php echo ($sliderOptions['slider']['slides_navigation_hover'] == 'true') ? 'true' : 'false'; ?>, 
			showTimer : <?php echo ($sliderOptions['slider']['slider_timer'] == 'true') ? 'true' : 'false'; ?>, 
			timerHover : <?php echo ($sliderOptions['slider']['slider_timer_hover'] == 'true') ? 'true' : 'false'; ?> 
		} ); 
	} );
</script>
<?php cmsmasters_slider(array('slider_id' => $slidertools_slider_id)); ?>