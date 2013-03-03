<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page Full Width Standard Post Format Template
 * Created by CMSMasters
 * 
 */


$image_width = 1180;
$image_height = 665;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
		cmsms_heading(get_the_ID());
		
		if (has_post_thumbnail()) { 
			echo '<div class="post_img">';
			
			cmsms_thumb(get_the_ID(), $image_width, $image_height, true, false, true, true);
			
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