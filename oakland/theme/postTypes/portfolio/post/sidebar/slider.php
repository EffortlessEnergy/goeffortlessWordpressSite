<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Portfolio Project with Sidebar Slider Project Format Template
 * Created by CMSMasters
 * 
 */


global $portfolio_post_tags;

$project_tags = get_the_terms(get_the_ID(), 'pt-tags');

$attachments =& get_children(array(
	'post_type' => 'attachment', 
	'post_mime_type' => 'image', 
	'post_parent' => get_the_ID(), 
	'orderby' => 'menu_order', 
	'order' => 'ASC' 
));

$image_width = 760;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('format-slider', 'project')); ?>>
<?php 
	echo '<header class="entry-header">' . 
		'<h2 class="entry-title">' . cmsms_title(get_the_ID(), false) . '</h2>';
	
	cmsms_meta('project', 'post', get_the_ID(), 'pt-sort-categ');
	
	echo '</header>';
	
	if (sizeof($attachments) > 1) {
?>
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
							<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;h=' . $image_height . '&amp;zc=1'; ?>" alt="<?php echo $attachment->post_title; ?>" class="fullwidth" />
						</figure>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
	</div>
    <?php 
	} elseif (sizeof($attachments) == 1) { 
		foreach ($attachments as $attachment) { 
	?>
        <figure>
			<a class="preloader inBlog" rel="prettyPhoto" href="<?php echo $attachment->guid; ?>" title="<?php echo $attachment->post_title; ?>">
				<img src="<?php echo get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $image_width . '&amp;zc=1'; ?>" alt="<?php cmsms_title(get_the_ID()); ?>" class="fullwidth" />
			</a>
		</figure>
	<?php 
		}
	} elseif (has_post_thumbnail()) { 
		cmsms_thumb(get_the_ID(), $image_width, false, false, 'prettyPhoto', true, true);
	}
	
	echo '<div class="cl"></div>' . 
	'<br />' . 
	'<div class="entry-content">';
	
    the_content();
	
	echo '</div>';
	
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>'); 
	
	if ($portfolio_post_tags && $project_tags) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'project', 'post', 'sidebar', 'pt-tags');
		
		echo '</footer>';
	}
?>
</article>