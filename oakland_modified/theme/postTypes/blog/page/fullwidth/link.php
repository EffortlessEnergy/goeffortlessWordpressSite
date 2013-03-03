<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page Full Width Link Post Format Template
 * Created by CMSMasters
 * 
 */


$post_link_text = get_post_meta(get_the_ID(), 'post_link_text', true);
$post_link_link = get_post_meta(get_the_ID(), 'post_link_link', true);

if ($post_link_text == '') {
    $post_link_text = __('Enter link text', 'cmsmasters');
}

if ($post_link_link == '') {
    $post_link_link = '#';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post_img post_img_nomargin">
			<div class="aside">
				<h3>
					<a href="<?php echo $post_link_link; ?>" target="_blank"><?php echo $post_link_text; ?></a>
				</h3>
			</div>
		</div>
		<?php cmsms_meta(); ?>
		<div class="cl"></div>
	</header>
	<?php cmsms_exc_cont(); ?>
</article>