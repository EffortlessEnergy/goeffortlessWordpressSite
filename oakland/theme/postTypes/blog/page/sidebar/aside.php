<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page with Sidebar Aside Post Format Template
 * Created by CMSMasters
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post_img post_img_nomargin">
			<div class="aside">
		<?php 
			if (has_excerpt()) {
				echo '<h4>' . get_the_excerpt() . '</h4>';
			} else {
				global $more;
				
				$more = 0;
				
				echo '<h4>' . get_the_content('') . '</h4>';
			}
		?>
			</div>
		</div>
		<?php cmsms_meta(); ?>
		<div class="cl"></div>
	</header>
</article>