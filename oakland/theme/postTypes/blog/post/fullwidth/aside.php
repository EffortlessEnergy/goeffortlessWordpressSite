<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Post Full Width Aside Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
		<div class="post_img post_img_nomargin">
			<div class="aside">
		<?php 
			if (get_the_content() != '') {
				echo '<h4>' . get_the_content() . '</h4>';
			} else {
				echo '<h4>' . get_the_excerpt() . '</h4>';
			}
		?>
			</div>
		</div>
		<?php cmsms_meta('post', 'post'); ?>
		<div class="cl"></div>
	</header>
	<?php 
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>');
	
	if ($blog_post_tags && get_the_tags()) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'post', 'post');
		
		echo '</footer>';
	}
	?>
</article>