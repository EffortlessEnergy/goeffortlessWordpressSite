<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * Custom Comments Template
 * Created by CMSMasters
 * 
 */


function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<figure class="alignleft">
			<?php echo get_avatar($comment, $size = '55', $default = '<path_to_url>'); ?>
		</figure>
        <div id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="com_box">
				<div class="com_info">
					<span class="fl"><?php echo '<strong>' . get_comment_author_link() . '</strong> ' . __('said', 'cmsmasters'); ?></span>
					<?php edit_comment_link(__('Edit', 'cmsmasters'), '<span class="fr">', '</span>'); ?>
					<div class="cl"></div>
				</div>
            <?php 
                comment_text();
                
                if ($comment->comment_approved == '0') {
                    echo '<p><em>' . __('Your comment is awaiting moderation.', 'cmsmasters') . '</em></p>';
                }
                
                echo '<span class="fl">' . human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ' . __('ago', 'cmsmasters') . '</span>';
				
                comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('Reply', 'cmsmasters'), 'before' => '<span class="fr">', 'after' => '</span>')));
            ?>
                <div class="cl"></div>
            </div>
        </div>
    <?php 
}

?>