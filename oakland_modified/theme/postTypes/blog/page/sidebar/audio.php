<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Blog Page with Sidebar Audio Post Format Template
 * Created by CMSMasters
 * 
 */


$post_audio_link = explode(',', str_replace(' ', '', get_post_meta(get_the_ID(), 'post_audio_link', true)));

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php 
		cmsms_heading(get_the_ID());
		
		if ($post_audio_link[0] != '') {
			echo '<div class="post_img post_img_nomargin">';
			
			foreach ($post_audio_link as $post_audio) {
				$link = explode(':', $post_audio, 2);
				
				$audio_link[$link[0]] = $link[1];
			}
			
			echo cmsmastersSingleAudioPlayer($audio_link) . 
			'</div>';
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