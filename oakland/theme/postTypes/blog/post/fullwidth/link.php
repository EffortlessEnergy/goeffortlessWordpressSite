<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Post Full Width Link Post Format Template
 * Created by CMSMasters
 * 
 */


global $blog_post_tags;

$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text here', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
	<header class="entry-header">
		<div class="post_img post_img_nomargin">
			<div class="aside">
				<h3>
					<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo $post_link_text; ?></a>
				</h3>
			</div>
		</div>
		<?php cmsms_meta('post', 'post'); ?>
		<div class="cl"></div>
	</header>
	<div class="entry-content">
    <?php the_content(); ?>
	</div>
	<?php 
	wp_link_pages('before=<div class="subpage_nav"><strong>' . __('Pages', 'cmsmasters') . ':</strong>&link_before= [ &link_after= ] &after=</div>'); 
	
	if ($blog_post_tags && get_the_tags()) { 
		echo '<footer class="entry-meta">';
		
		cmsms_tags(get_the_ID(), 'post', 'post');
		
		echo '</footer>';
	}
	?>
</article>