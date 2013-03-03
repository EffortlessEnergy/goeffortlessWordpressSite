<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page Full Width Gallery Post Format Template
 * Created by CMSMasters
 * 
 */


$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC' 
));

$image_width = 1180;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
		cmsms_heading(get_the_ID());
		
		if (sizeof($attachments) > 1) { 
	?>
		<div class="post_img post_img_nomargin">
			<div class="shortcode_slideshow" id="slideshow_<?php the_ID(); ?>">
				<div class="shortcode_slideshow_body">
					<script type="text/javascript">
						jQuery(window).load(function () { 
							jQuery('#slideshow_<?php the_ID(); ?> .shortcode_slideshow_slides').cmsmsResponsiveContentSlider( { 
								sliderWidth : '100%', 
								sliderHeight : 'auto', 
								animationSpeed : 500, 
								animationEffect : 'slide', 
								animationEasing : 'easeInOutExpo', 
								pauseTime : 0, 
								activeSlide : 1, 
								touchControls : true, 
								pauseOnHover : false, 
								arrowNavigation : false, 
								slidesNavigation : true 
							} ); 
						} );
					</script>
					<div class="shortcode_slideshow_container">
						<ul class="shortcode_slideshow_slides responsiveContentSlider">
						<?php foreach ($attachments as $attachment) { ?>
							<li>
								<figure>
									<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;zc=1'; ?>" alt="<?php echo $attachment->post_title; ?>" class="fullwidth" />
								</figure>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php 
		} else if (sizeof($attachments) == 1 && !has_post_thumbnail()) { 
			echo '<div class="post_img">';
			
			foreach ($attachments as $attachment) { 
		?>
			<a class="preloader inBlog" rel="prettyPhoto" href="<?php echo $attachment->guid; ?>" title="<?php cmsms_title(get_the_ID()); ?>">
				<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;zc=1'; ?>" alt="<?php cmsms_title(get_the_ID()); ?>" class="fullwidth" />
			</a>
		<?php 
			}
			
			echo '</div>';
		} else if (has_post_thumbnail()) { 
			echo '<div class="post_img">';
			
			cmsms_thumb(get_the_ID(), $image_width, false, false, 'prettyPhoto', true, true);
			
			echo '</div>';
		}
		
		cmsms_meta();
	?>
		<div class="cl"></div>
	</header>
    <?php cmsms_exc_cont(); ?>
	<footer>
	<?php 
		cmsms_tags(get_the_ID());
		
		cmsms_more(get_the_ID());
    ?>
	</footer>
</article>