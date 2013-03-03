<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page Full Width Quote Post Format Template
 * Created by CMSMasters
 * 
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="post_img post_img_nomargin">
			<div class="aside">
				<blockquote>
			<?php 
				if (has_excerpt()) {
					echo '<p>' . get_the_excerpt() . '</p>';
				} else {
					echo '<p>' . __('Enter post excerpt', 'cmsmasters') . '</p>';
				}
			?>
				</blockquote>
			</div>
		</div>
		<?php cmsms_meta(); ?>
		<div class="cl"></div>
	</header>
	<div class="entry-content">
    <?php
    if (get_the_content() != '') {
        global $more;

        $more = 0;

        the_content('');
    }
    ?>
	</div>
</article>