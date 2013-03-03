<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.1
 * 
 * Template Functions
 * Created by CMSMasters
 * 
 */


/* Get Posts Thumbnail Function */
function cmsms_thumb($cmsms_id, $w = 760, $h = 430, $link = true, $rel = false, $preload = true, $blog = false, $slide = false, $show = true, $fullwidth = true) {
	if ($show) { 
		echo (($slide) ? '<li>' : '<figure>') . 
			'<a href="' . (($link) ? get_permalink() : get_image_path_array($cmsms_id)) . '"' . (($preload) ? ' class="preloader' . (($blog) ? ' inBlog' : '') . '"' : '') . (($rel) ? ' rel="' . $rel . '"' : '') . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
				'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1" alt="' . cmsms_title($cmsms_id, false) . '"' . (($fullwidth) ? ' class="fullwidth"' : '') . ' />' . 
			'</a>' . 
		(($slide) ? '</li>' : '</figure>');
	} else {
		return (($slide) ? '<li>' : '<figure>') . 
			'<a href="' . (($link) ? get_permalink() : get_image_path_array($cmsms_id)) . '"' . (($preload) ? ' class="preloader' . (($blog) ? ' inBlog' : '') . '"' : '') . (($rel) ? ' rel="' . $rel . '"' : '') . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
				'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1" alt="' . cmsms_title($cmsms_id, false) . '"' . (($fullwidth) ? ' class="fullwidth"' : '') . ' />' . 
			'</a>' . 
		(($slide) ? '</li>' : '</figure>');
	}
}



/* Get Posts Small Thumbnail Function */
function cmsms_thumb_small($cmsms_id, $type = 'post', $w = 70, $h = 70) {
	if ($type == 'post') { // Post type - blog
		if (get_post_format()) {
			if (get_post_format() == 'image' || get_post_format() == 'gallery') {
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => $cmsms_id, 
					'orderby' => 'menu_order', 
					'order' => 'ASC'
				));
				
				if (has_post_thumbnail()) {
					echo '<td style="padding-right:20px; vertical-align:top;">' . 
						'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
							'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
						'</a>' . 
					'</td>';
				} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
					foreach ($attachments as $attachment) { 
						if (!$counter && $counter = true) {
							echo '<td style="padding-right:20px; vertical-align:top;">' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
								'</a>' . 
							'</td>';
						}
					}
				} else {
					if (get_post_format() == 'gallery') {
						echo '<td style="padding-right:20px; vertical-align:top;">' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-' . get_post_format() . '.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
							'</a>' . 
						'</td>';
					} else {
						echo '<td style="padding-right:20px; vertical-align:top;">' . 
							'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
								'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-placeholder.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
							'</a>' . 
						'</td>';
					}
				}
			} else {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-' . get_post_format() . '.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			}
		} else {
			if (has_post_thumbnail()) {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			} else {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-placeholder.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			}
		}
	} elseif ($type == 'portfolio') { // Post type - portfolio
		$project_format = get_post_meta($cmsms_id, 'pt_format', true);
		
		if ($project_format) {
			if ($project_format == 'slider' || $project_format == 'album') {
				$attachments =& get_children(array(
					'post_type' => 'attachment', 
					'post_mime_type' => 'image', 
					'post_parent' => $cmsms_id, 
					'orderby' => 'menu_order', 
					'order' => 'ASC'
				));
				
				if (has_post_thumbnail()) {
					echo '<td style="padding-right:20px; vertical-align:top;">' . 
						'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
							'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
						'</a>' . 
					'</td>';
				} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
					foreach ($attachments as $attachment) { 
						if (!$counter && $counter = true) {
							echo '<td style="padding-right:20px; vertical-align:top;">' . 
								'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
									'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path_attachments($attachment->guid) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
								'</a>' . 
							'</td>';
						}
					}
				} else {
					echo '<td style="padding-right:20px; vertical-align:top;">' . 
						'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
							'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-placeholder.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
						'</a>' . 
					'</td>';
				}
			} else {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-' . $project_format . '.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			}
		} else {
			if (has_post_thumbnail()) {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_image_path($cmsms_id) . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			} else {
				echo '<td style="padding-right:20px; vertical-align:top;">' . 
					'<a href="' . get_permalink() . '"' . ' title="' . cmsms_title($cmsms_id, false) . '">' . 
						'<img src="' . get_template_directory_uri() . '/theme/classes/timthumb.php?src=' . get_template_directory_uri() . '/images/PF-placeholder.jpg&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1' . '" alt="' . cmsms_title($cmsms_id, false) . '" style="display:block;" />' . 
					'</a>' . 
				'</td>';
			}
		}
	}
}



/* Get Posts Title Function */
function cmsms_title($cmsms_id, $show = true) {
    $headingtools_active = get_post_meta($cmsms_id, 'headingtools_active', true);
    $headingtools_title = get_post_meta($cmsms_id, 'headingtools_title', true);
    
    if ($show) {
        if ($headingtools_active == 'custom' && $headingtools_title != '') {
            echo $headingtools_title;
        } else {
            echo esc_attr(get_the_title($cmsms_id) ? get_the_title($cmsms_id) : $cmsms_id);
        } 
    } else {
        if ($headingtools_active == 'custom' && $headingtools_title != '') {
            return $headingtools_title;
        } else {
            return esc_attr(get_the_title($cmsms_id) ? get_the_title($cmsms_id) : $cmsms_id);
        } 
    }
}



/* Get Posts Heading Function */
function cmsms_heading($cmsms_id, $type = 'post', $layout = 'sidebar', $show = true, $tag = 'h2') {
	if ($type == 'post') { // Post type - blog
		if ($show) { 
			echo '<' . $tag . ' class="entry-title">' . 
				'<a href="' . get_permalink() . '">' . cmsms_title($cmsms_id, false) . '</a>' . 
			'</' . $tag . '>';
		} else { 
			return '<' . $tag . ' class="entry-title">' . 
				'<a href="' . get_permalink() . '">' . cmsms_title($cmsms_id, false) . '</a>' . 
			'</' . $tag . '>';
		}
	} elseif ($type == 'project') { // Post type - portfolio
		global $selected_numbercolumns_sidebar, 
			$selected_numbercolumns_full, 
			$portfolio_page_sidebar_one_title, 
			$portfolio_page_sidebar_two_title, 
			$portfolio_page_sidebar_three_title, 
			$portfolio_page_full_one_title, 
			$portfolio_page_full_two_title, 
			$portfolio_page_full_three_title, 
			$portfolio_page_full_four_title;
		
		if ( 
			($selected_numbercolumns_sidebar == 'one_block' && $portfolio_page_sidebar_one_title && $layout == 'sidebar') || 
			($selected_numbercolumns_full == 'one_block' && $portfolio_page_full_one_title && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'two_blocks' && $portfolio_page_full_two_title && $layout == 'fullwidth') 
		) { // Sidebar one column, fullwidth one column, fullwidth two columns
			echo '<h3 class="entry-title">' . 
				'<a href="' . get_permalink() . '">' . cmsms_title($cmsms_id, false) . '</a>' . 
			'</h3>';
		} elseif ( 
			($selected_numbercolumns_sidebar == 'two_blocks' && $portfolio_page_sidebar_two_title && $layout == 'sidebar') || 
			($selected_numbercolumns_sidebar == 'three_blocks' && $portfolio_page_sidebar_three_title && $layout == 'sidebar') || 
			($selected_numbercolumns_full == 'three_blocks' && $portfolio_page_full_three_title && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'four_blocks' && $portfolio_page_full_four_title && $layout == 'fullwidth') 
		) { // Sidebar two columns, sidebar three columns, fullwidth three columns, fullwidth four columns
			echo '<h6 class="entry-title">' . 
				'<a href="' . get_permalink() . '">' . cmsms_title($cmsms_id, false) . '</a>' . 
			'</h6>';
		}
	}
}



/* Get Posts Content/Excerpt Function */
function cmsms_exc_cont($type = 'post', $layout = 'sidebar') {
	if ($type == 'post') { // Post type - blog
		echo '<div class="entry-content">';
		
		if (has_excerpt()) {
			the_excerpt();
		} else {
			global $more;
			
			$more = 0;
			
			the_content('');
		}
		
		echo '</div>';
	} elseif ($type == 'project') { // Post type - portfolio
		global $selected_numbercolumns_sidebar, 
			$selected_numbercolumns_full, 
			$portfolio_page_sidebar_one_descr, 
			$portfolio_page_sidebar_two_descr, 
			$portfolio_page_sidebar_three_descr, 
			$portfolio_page_full_one_descr, 
			$portfolio_page_full_two_descr, 
			$portfolio_page_full_three_descr, 
			$portfolio_page_full_four_descr;
		
		if ( 
			($selected_numbercolumns_sidebar == 'one_block' && $portfolio_page_sidebar_one_descr && $layout == 'sidebar') || 
			($selected_numbercolumns_sidebar == 'two_blocks' && $portfolio_page_sidebar_two_descr && $layout == 'sidebar') || 
			($selected_numbercolumns_sidebar == 'three_blocks' && $portfolio_page_sidebar_three_descr && $layout == 'sidebar') || 
			($selected_numbercolumns_full == 'one_block' && $portfolio_page_full_one_descr && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'two_blocks' && $portfolio_page_full_two_descr && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'three_blocks' && $portfolio_page_full_three_descr && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'four_blocks' && $portfolio_page_full_four_descr && $layout == 'fullwidth') 
		) { // Sidebar one column, sidebar two columns, sidebar three columns, fullwidth one column, fullwidth two columns, fullwidth three columns, fullwidth four columns
			echo '<div class="entry-content">';
			
			if (has_excerpt()) {
				the_excerpt();
			} else {
				global $more;
				
				$more = 0;
				
				the_content('');
			}
			
			echo '</div>';
		}
	}
}



/* Get Posts Metadata Function */
function cmsms_meta($content_type = 'post', $type = 'page', $cmsms_id = 0, $taxonomy = '', $layout = 'fullwidth') {
	if ($content_type == 'post') { // Post type - blog
		if ($type == 'post') { // Template type - post
			global $blog_post_date, 
				$blog_post_categs, 
				$blog_post_author, 
				$blog_post_comments;
			
			if ($blog_post_date || ($blog_post_categs && get_the_category()) || $blog_post_author || $blog_post_comments) {
				echo '<div class="entry-meta post_img_bot">' . 
					'<div class="post_img_bot_inner">';
				
				if ($blog_post_comments) {
					comments_popup_link(__('No Comments', 'cmsmasters'), '1', '%', 'comments_number', __('Comments Off', 'cmsmasters'));
				}
				
				if ($blog_post_date) {
					$y = get_the_time('Y');
					$m = get_the_time('m');
					$d = get_the_time('d');
					
					echo '<abbr class="published" title="' . get_the_time('d/m/y') . '"><a href="' . get_day_link($y, $m, $d) . '">' . get_the_time('d') . '</a>/<a href="' . get_month_link($y, $m) . '">' . get_the_time('m') . '</a>/<a href="' . get_year_link($y) . '">' . get_the_time('y') . '</a></abbr>';
				}

				if ($blog_post_author || ($blog_post_categs && get_the_category())) {
					echo '<div class="post_info">';
					
					if ($blog_post_author) {
						echo '<span class="user_name">';
						
						the_author_posts_link();
						
						echo '</span>';
					}
					
					if ($blog_post_categs && get_the_category()) {
						echo '<span class="category_name">';
						
						the_category(' ');
						
						echo '</span>';
					}
					
					echo '</div>';
				}
				
				echo '</div>' . 
				'</div>';
			}
		} elseif ($type == 'page') { // Template type - page
			global $blog_page_date, 
				$blog_page_categs, 
				$blog_page_author, 
				$blog_page_comments;
			
			if ($blog_page_date || ($blog_page_categs && get_the_category()) || $blog_page_author || $blog_page_comments) {
				echo '<div class="entry-meta post_img_bot">' . 
					'<div class="post_img_bot_inner">';
				
				if ($blog_page_comments) {
					comments_popup_link(__('No Comments', 'cmsmasters'), '1', '%', 'comments_number', __('Comments Off', 'cmsmasters'));
				}
				
				if ($blog_page_date) {
					$y = get_the_time('Y');
					$m = get_the_time('m');
					$d = get_the_time('d');
					
					echo '<abbr class="published" title="' . get_the_time('d/m/y') . '"><a href="' . get_day_link($y, $m, $d) . '">' . get_the_time('d') . '</a>/<a href="' . get_month_link($y, $m) . '">' . get_the_time('m') . '</a>/<a href="' . get_year_link($y) . '">' . get_the_time('y') . '</a></abbr>';
				}

				if ($blog_page_author || ($blog_page_categs && get_the_category())) {
					echo '<div class="post_info">';
					
					if ($blog_page_author) {
						echo '<span class="user_name">';
						
						the_author_posts_link();
						
						echo '</span>';
					}
					
					if ($blog_page_categs && get_the_category()) {
						echo '<span class="category_name">';
						
						the_category(' ');
						
						echo '</span>';
					}
					
					echo '</div>';
				}
				
				echo '</div>' . 
				'</div>';
			}
		}
	} elseif ($content_type == 'project') { // Post type - portfolio
		if ($type == 'post') { // Template type - post
			global $portfolio_post_date, 
				$portfolio_post_categs, 
				$portfolio_post_author, 
				$portfolio_post_comments;
			
			if ($portfolio_post_date || ($portfolio_post_categs && get_the_terms($cmsms_id, $taxonomy)) || $portfolio_post_author || $portfolio_post_comments) {
				echo '<div class="entry-meta">' . 
					'<div class="project_meta">';
				
				if ($portfolio_post_comments) {
					comments_popup_link(__('No Comments', 'cmsmasters'), '1', '%', 'comments_number', __('Comments Off', 'cmsmasters'));
				}
				
				if ($portfolio_post_date) {
					echo '<abbr class="published" title="' . get_the_time('d/m/y') . '">' . get_the_time('d/m/y') . '</abbr>';
				}
				
				if ($portfolio_post_author || ($portfolio_post_categs && get_the_terms($cmsms_id, $taxonomy))) {
					echo '<div class="post_info">';
					
					if ($portfolio_post_author) {
						echo '<span class="user_name">' . 
						'<span>' . get_the_author() . '</span>' . 
						'</span>';
					}
					
					if ($portfolio_post_categs && get_the_terms($cmsms_id, $taxonomy)) {
						echo get_the_term_list($cmsms_id, $taxonomy, '<span class="category_name">', '', '</span>');
					}
					
					echo '</div>';
				}
				
				echo '</div>' . 
				'</div>';
			}
		} elseif ($type == 'page') { // Template type - page
			global $selected_numbercolumns_sidebar, 
				$selected_numbercolumns_full, 
				$portfolio_page_sidebar_one_categs, 
				$portfolio_page_sidebar_two_categs, 
				$portfolio_page_sidebar_three_categs, 
				$portfolio_page_full_one_categs, 
				$portfolio_page_full_two_categs, 
				$portfolio_page_full_three_categs, 
				$portfolio_page_full_four_categs;
			
			echo '<footer class="entry-meta">';
			
			if ( 
				($selected_numbercolumns_sidebar == 'one_block' && $portfolio_page_sidebar_one_categs && $layout == 'sidebar' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_sidebar == 'two_blocks' && $portfolio_page_sidebar_two_categs && $layout == 'sidebar' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_sidebar == 'three_blocks' && $portfolio_page_sidebar_three_categs && $layout == 'sidebar' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_full == 'one_block' && $portfolio_page_full_one_categs && $layout == 'fullwidth' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_full == 'two_blocks' && $portfolio_page_full_two_categs && $layout == 'fullwidth' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_full == 'three_blocks' && $portfolio_page_full_three_categs && $layout == 'fullwidth' && get_the_terms($cmsms_id, $taxonomy)) || 
				($selected_numbercolumns_full == 'four_blocks' && $portfolio_page_full_four_categs && $layout == 'fullwidth' && get_the_terms($cmsms_id, $taxonomy)) 
			) { 
				echo get_the_term_list($cmsms_id, $taxonomy, '<div class="post_category">', ', ', '</div>');
			}
			
			echo '<span class="meta-date">' . get_the_time('YmdHis') . '</span>' . 
			'</footer>';
		}
	}
}



/* Get Posts Tags Function */
function cmsms_tags($cmsms_id, $type = 'post', $page_type = 'page', $layout = 'sidebar', $taxonomy = '') {
	if ($type == 'post') { // Post type - blog
		if ($page_type == 'page') { 
			global $blog_page_tags;
			
			if ($blog_page_tags && get_the_tags()) { 
				echo '<ul class="tags">';
				
				foreach (get_the_tags() as $tagone) { 
					echo '<li><a href="' . get_tag_link($tagone->term_id) . '">' . $tagone->name . '</a></li>';
				}
				
				echo '</ul>';
			}
		} else if ($page_type == 'post') { 
			global $blog_post_tags;
			
			if ($blog_post_tags && get_the_tags()) { 
				echo '<ul class="tags">';
				
				foreach (get_the_tags() as $tagone) { 
					echo '<li><a href="' . get_tag_link($tagone->term_id) . '">' . $tagone->name . '</a></li>';
				}
				
				echo '</ul>';
			}
		}
	} elseif ($type == 'project') { // Post type - portfolio
		if ($page_type == 'post') { 
			global $portfolio_post_tags;
			
			$project_tags = get_the_terms($cmsms_id, $taxonomy);
			
			if ($portfolio_post_tags && $project_tags) { 
				echo get_the_term_list($cmsms_id, $taxonomy, '<ul class="tags"><li>', '</li><li>', '</li></ul>');
			}
		}
	}
}



/* Get Posts More Button/Link Function */
function cmsms_more($cmsms_id, $type = 'post', $layout = 'sidebar') {
	if ($type == 'post') { // Post type - blog
		global $blog_page_link;
		
		if ($blog_page_link) { 
			$post_more_text = get_post_meta($cmsms_id, 'post_more_text', true);
			
			if ($post_more_text == '') {
				$post_more_text = __('Read More', 'cmsmasters');
			}
			
			echo '<a class="button fr" href="' . get_permalink($cmsms_id) . '"><span>' . $post_more_text . '</span></a>';
		}
	} elseif ($type == 'project') { // Post type - portfolio
		global $selected_numbercolumns_sidebar, 
			$selected_numbercolumns_full, 
			$portfolio_page_sidebar_one_link, 
			$portfolio_page_sidebar_two_link, 
			$portfolio_page_sidebar_three_link, 
			$portfolio_page_full_one_link, 
			$portfolio_page_full_two_link, 
			$portfolio_page_full_three_link, 
			$portfolio_page_full_four_link;
		
		$post_more_text = get_post_meta($cmsms_id, 'project_more', true);
		
		if ($post_more_text == '') {
			$post_more_text = __('View Project', 'cmsmasters');
		}
		
		if ( 
			($selected_numbercolumns_sidebar == 'one_block' && $portfolio_page_sidebar_one_link && $layout == 'sidebar') || 
			($selected_numbercolumns_sidebar == 'two_blocks' && $portfolio_page_sidebar_two_link && $layout == 'sidebar') || 
			($selected_numbercolumns_sidebar == 'three_blocks' && $portfolio_page_sidebar_three_link && $layout == 'sidebar') || 
			($selected_numbercolumns_full == 'one_block' && $portfolio_page_full_one_link && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'two_blocks' && $portfolio_page_full_two_link && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'three_blocks' && $portfolio_page_full_three_link && $layout == 'fullwidth') || 
			($selected_numbercolumns_full == 'four_blocks' && $portfolio_page_full_four_link && $layout == 'fullwidth') 
		) { // Sidebar one column, sidebar two columns, sidebar three columns, fullwidth one column, fullwidth two columns, fullwidth three columns, fullwidth four columns
			echo '<a class="button" href="' . get_permalink($cmsms_id) . '"><span>' . $post_more_text . '</span></a>';
		}
	}
}



/* Get Related, Popular & Recent Posts Function */
function cmsms_related($related_box = false, $tgsarray = null, $popular_box = false, $recent_box = false, $related_number = 4, $type = 'post', $taxonomy = null) {
    if (($related_box && !empty($tgsarray)) || $recent_box || $popular_box) { 
		if ($type == 'post') {
			$r = new WP_Query(array(
				'posts_per_page' => $related_number, 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1, 
				'tag__in' => $tgsarray, 
				'post__not_in' => array(get_the_ID()), 
				'post_type' => $type
			));
		} elseif ($type != 'post' && $taxonomy) {
			$r = new WP_Query(array(
				'posts_per_page' => $related_number,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'term_id',
						'terms' => $tgsarray
					)
				), 
				'post__not_in' => array(get_the_ID()), 
				'post_type' => $type 
			));
		}
		
        echo '<aside class="related_posts">' . 
			'<h3>' . (($type == 'post') ? __('More posts', 'cmsmasters') : __('More projects', 'cmsmasters')) . '</h3>' . 
            '<ul>';
        
        if ($related_box && !empty($tgsarray) && $r->have_posts()) { 
            echo '<li><a href="#" class="current">' . __('Related', 'cmsmasters') . '</a></li>';
        } 
        
        if ($popular_box) { 
            echo '<li><a href="#" class="';
            
            if (!$related_box || empty($tgsarray) || !$r->have_posts()) {
                echo 'current';
            } 
            
            echo '">' . __('Popular', 'cmsmasters') . '</a></li>';
        }
        
        if ($recent_box) { 
            echo '<li><a href="#" class="';
            
            if ((!$related_box || empty($tgsarray) || !$r->have_posts()) && !$popular_box) {
                echo 'current';
            } 
            
            echo '">' . __('Latest', 'cmsmasters') . '</a></li>';
        } 
        
        echo '</ul>' . 
        '<div class="cl"></div>';

        if ($related_box && !empty($tgsarray) && $r->have_posts()) { 
            echo '<div class="related_posts_content" style="display:block;">';
			
			if ($type == 'post') {
				$related = new WP_Query(array(
					'posts_per_page' => $related_number, 
					'post_status' => 'publish', 
					'ignore_sticky_posts' => 1, 
					'tag__in' => $tgsarray, 
					'post__not_in' => array(get_the_ID()), 
					'post_type' => $type
				));
			} elseif ($type != 'post' && $taxonomy) {
				$related = new WP_Query(array(
					'posts_per_page' => $related_number,
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'tax_query' => array(
						array(
							'taxonomy' => $taxonomy,
							'field' => 'term_id',
							'terms' => $tgsarray
						)
					), 
					'post__not_in' => array(get_the_ID()), 
					'post_type' => $type 
				));
			}

            if ($related->have_posts()) :
                $numb = 0;

                while ($related->have_posts()) : $related->the_post(); 
                    $numb++;

                    if ($numb % 2) {
                        echo '<div class="one_half">';
                    } else { 
                        echo '<div class="one_half last">'; 
                    } 
                    ?>
                    <table>
                        <tbody>
                            <tr>
								<?php cmsms_thumb_small(get_the_ID(), $type); ?>
                                <td>
                                    <a href="<?php the_permalink() ?>" title="<?php cmsms_title(get_the_ID()); ?>"><?php cmsms_title(get_the_ID()); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 

                    if ($numb % 2) {
                        echo '</div>';
                    } else { 
                        echo '</div><div class="cl"></div>'; 
                    } 
                endwhile;
            else : 
                echo '<p>' . (($type == 'post') ? __('No Related Posts Found', 'cmsmasters') : __('No Related Projects Found', 'cmsmasters')) . '</p>';
            endif;

            wp_reset_postdata(); 

            echo '</div>';
        } 

        if ($popular_box) { 
            echo '<div class="related_posts_content"';

            if (!$related_box || empty($tgsarray) || !$r->have_posts()) {
                echo ' style="display:block;"';
            }

            echo '>';
			
            $popular = new WP_Query(array(
                'posts_per_page' => $related_number, 
                'post_status' => 'publish', 
                'ignore_sticky_posts' => 1, 
				'order' => 'DESC', 
				'orderby' => 'meta_value', 
				'meta_key' => 'cmsms_likes', 
                'post__not_in' => array(get_the_ID()), 
                'post_type' => $type 
            ));

            if ($popular->have_posts()) :
                $numb = 0;

                while ($popular->have_posts()) : $popular->the_post(); 
                    $numb++;

                    if ($numb % 2) {
                        echo '<div class="one_half">';
                    } else { 
                        echo '<div class="one_half last">'; 
                    } 
                    ?>
                    <table>
                        <tbody>
                            <tr>
								<?php cmsms_thumb_small(get_the_ID(), $type); ?>
                                <td>
                                    <a href="<?php the_permalink() ?>" title="<?php cmsms_title(get_the_ID()); ?>"><?php cmsms_title(get_the_ID()); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 

                    if ($numb % 2) {
                        echo '</div>';
                    } else { 
                        echo '</div><div class="cl"></div>'; 
                    } 
                endwhile;
            else : 
                echo '<p>' . (($type == 'post') ? __('No Popular Posts Found', 'cmsmasters') : __('No Popular Projects Found', 'cmsmasters')) . '</p>';
            endif;

            wp_reset_postdata(); 

            echo '</div>';
        }

        if ($recent_box) { 
            echo '<div class="related_posts_content"';

            if ((!$related_box || empty($tgsarray) || !$r->have_posts()) && !$popular_box) {
                echo ' style="display:block;"';
            }

            echo '>';

            $recent = new WP_Query(array(
                'posts_per_page' => $related_number, 
                'post_status' => 'publish', 
                'ignore_sticky_posts' => 1, 
                'post__not_in' => array(get_the_ID()), 
                'post_type' => $type 
            ));

            if ($recent->have_posts()) :
                $numb = 0;

                while ($recent->have_posts()) : $recent->the_post(); 
                    $numb++;

                    if ($numb % 2) {
                        echo '<div class="one_half">';
                    } else { 
                        echo '<div class="one_half last">'; 
                    } 
                    ?>
                    <table>
                        <tbody>
                            <tr>
								<?php cmsms_thumb_small(get_the_ID(), $type); ?>
                                <td>
                                    <a href="<?php the_permalink() ?>" title="<?php cmsms_title(get_the_ID()); ?>"><?php cmsms_title(get_the_ID()); ?></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 

                    if ($numb % 2) {
                        echo '</div>';
                    } else { 
                        echo '</div><div class="cl"></div>'; 
                    } 
                endwhile;
            else : 
                echo '<p>' . (($type == 'post') ? __('No Latest Posts Found', 'cmsmasters') : __('No Latest Projects Found', 'cmsmasters')) . '</p>';
            endif;

            wp_reset_postdata(); 

            echo '</div>';
        } 

        echo '</aside>';
    }
}



/* Get Embeded Video Function */
function get_video_iframe($url, $text = null) {
    preg_match('/^(http:\/\/)(www\.)?([^\/]+)(\.com)/i', $url, $matches);
    
    if ($matches[3] == 'youtube') {
        preg_match('/^(http:\/\/)?(www\.)?youtube\.com\/(watch\?v=)?(v\/)?([^&]+)/i', $url, $matches);
        
        $match = $matches[5];
        
        return '<iframe src="http://www.youtube.com/embed/' . $match . '?rel=0&amp;showinfo=0&amp;hd=1&amp;fs=1&amp;wmode=transparent" class="fullwidth" frameborder="0" allowfullscreen></iframe>';
    } elseif ($matches[3] == 'vimeo') {
        preg_match('/^(http:\/\/)?(www\.)?vimeo\.com\/([^\/]+)/i', $url, $matches);
        
        $match = $matches[3];
        
        return '<iframe src="http://player.vimeo.com/video/' . $match . '?title=0&amp;byline=0&amp;portrait=0&amp;hd=1&amp;wmode=transparent" class="fullwidth" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
    } elseif ($matches[3] == 'dailymotion') {
        preg_match('/^(http:\/\/)?(www\.)?dailymotion\.com\/(video\/)?([^_]+)/i', $url, $matches);
        
        $match = $matches[4];
        
        return '<iframe src="http://www.dailymotion.com/embed/video/' . $match . '?hideInfos=1&amp;logo=0&amp;forcedQuality=hd&amp;wmode=transparent" class="fullwidth" frameborder="0" allowFullScreen></iframe>';
    } elseif ($matches[3] == 'screenr') {
        preg_match('/^(http:\/\/)?(www\.)?screenr\.com\/([^\/]+)/i', $url, $matches);
        
        $match = $matches[3];
        
        return '<iframe src="http://www.screenr.com/embed/' . $match . '?wmode=transparent" class="fullwidth" frameborder="0" allowFullScreen></iframe>';
    } else {
		if ($text) {
			return $text;
		} else {
			return '<br /><h2 style="text-align:center;">' . __('Unknown type of the video. Check your video link.', 'cmsmasters') . '</h2><br />';
		}
    }
}



/* Get Contact Form Function */
function cmsmasters_contact_form($formname, $email) {
    global $wpdb, $shortname;
	
	$encodedEmail = base64_encode($formname . '|' . $email . '|' . $formname);
    
    if ($wpdb->get_var("SELECT id FROM " . $wpdb->prefix . $shortname . "_forms WHERE type = 'form' AND parent_slug = '" . $formname . "'") != '') {
        $results = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . $shortname . "_forms WHERE parent_slug='" . $formname . "' ORDER BY number ASC");
        
        foreach ($results as $form_result) {
            $form_descr = unserialize($form_result->description);
            
            if ($form_result->type == 'form') {
                $out = '<div class="cmsms-form-builder">' .
                    '<div style="display:none;" class="box success_box">' .
                        '<table>' .
                            '<tbody>' .
                                '<tr>' .
                                    '<td></td>' .
                                    '<td>' . $form_descr[1] . '</td>' .
                                '</tr>' .
                            '</tbody>' .
                        '</table>' .
                    '</div>' .
                    '<script type="text/javascript">' .
                        'jQuery(document).ready(function () {' .
                            "jQuery('#form_" . $formname . "').validationEngine('init');" .
                            "jQuery('#form_" . $formname . " a#" . $formname . "_formsend').click(function () { " .
                                "jQuery('#form_" . $formname . " .loading').animate( { opacity : 1 } , 250);";
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type == 'checkbox') {
                $out .= "var var_" . $form_result->slug . " = '';" . 
                "jQuery('input[name=\'" . $form_result->slug . "\']:checked').each(function () { " . 
                    "var_" . $form_result->slug . " += jQuery(this).val();" . 
                "} );";
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type == 'checkboxes') {
                $out .= "var var_" . $form_result->slug . " = '';" . 
                "jQuery('input[name=\'" . $form_result->slug . "\']:checked').each(function () { " . 
                    "var_" . $form_result->slug . " += jQuery(this).val() + ', ';" . 
                "} );" . 
                "if (var_" . $form_result->slug . " !== ''){" . 
                    "var_" . $form_result->slug . " = var_" . $form_result->slug . ".slice(0, -2);" . 
                "}";
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type == 'form') {
                $out .= "if (jQuery('#form_" . $formname . "').validationEngine('validate')) { ";
                
                if (in_array('captcha', unserialize($form_result->parameters))) {
                    $out .= "if (validateCaptcha() !== 'success') { " .
                        "jQuery('#" . $formname . "_builder_captcha').css( { border : '2px solid #ff0000' } );" .
                        "jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250);" .
                        'Recaptcha.reload();' .
                        'return false;' .
                    '} else {' .
                        "jQuery('#" . $formname . "_builder_captcha').removeAttr('style');" .
                    '}';
                }
                
                $out .= "jQuery.post('" . get_template_directory_uri() . "/theme/functions/form-builder-sendmail.php', { ";
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type != 'form') {
                if ($form_result->type == 'checkboxes' || $form_result->type == 'checkbox') {
                    $out .= $form_result->slug . " : var_" . $form_result->slug . ",";
                } elseif ($form_result->type == 'radiobutton') {
                    $out .= $form_result->slug . " : jQuery('input[name=\'" . $form_result->slug . "\']:checked').val(),";
                } else {
                    $out .= $form_result->slug . " : jQuery('#" . $form_result->slug . "').val(),";
                }
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type == 'form') {
                $out .= "contactemail : '" . $encodedEmail . "', " .
                                "formname : '" . $formname . "'" .
                            '} , function (data) {' .
                                "jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250);" .
                                "jQuery('#form_" . $formname . "').fadeOut('slow');" .
                                "document.getElementById('form_" . $formname . "').reset();" .
                                "jQuery('#form_" . $formname . "').parent().find('.box').hide();" .
                                "jQuery('#form_" . $formname . "').parent().find('.success_box').fadeIn('fast');" .
                                "jQuery('html, body').animate( { scrollTop : jQuery('#form_" . $formname . "').offset().top - 140 } , 'slow');" .
                                "jQuery('#form_" . $formname . "').parent().find('.success_box').delay(5000).fadeOut(1000, function () { " . 
                                    "jQuery('#form_" . $formname . "').fadeIn('slow');" . 
                                "} );";

                            if (in_array('captcha', unserialize($form_result->parameters))) {
                                $out .= 'Recaptcha.reload();';
                            }

                            $out .= '} );' .
                            'return false;' .
                        '} else {' .
                            "jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250);" .
                            'return false;' .
                        '}' .
                    '} );' .
                '} );';
                
                if (in_array('captcha', unserialize($form_result->parameters))) {
                    $out .= "var RecaptchaOptions = {theme : 'clean'};" .
                    'function validateCaptcha() {' .
                        "var challengeField = jQuery('input#recaptcha_challenge_field').val(), " .
							"responseField = jQuery('input#recaptcha_response_field').val(), " .
							$formname . '_captcha_html = jQuery.ajax( { ' .
                            "type : 'post'," .
                            "url : '" . get_template_directory_uri() . "/theme/functions/validate-captcha.php', " .
                            "data : 'form=signup&recaptcha_challenge_field=' + challengeField + '&recaptcha_response_field=' + responseField, " .
                            'async : false' .
                        '} ).responseText;' .
                        'return ' . $formname . '_captcha_html;' .
                    '}';
                }
                
                $out .= '</script>' .
                '<form action="#" method="post" id="form_' . $formname . '">';
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type != 'form') {
                $field_label = stripslashes($form_result->label);
                $field_name = $form_result->slug;
                $vals = unserialize($form_result->value);
                $params = unserialize($form_result->parameters);
                
                $required_label = (in_array('required', $params)) ? ' <span class="color_3">*</span>' : '';
                $required = (in_array('required', $params)) ? 'required,' : '';
                
                $minSize = '';
                $maxSize = '';
                
                foreach ($params as $param) {
                    if (str_replace('minSize', '', $param) != $param) {
                        $minSize = $param . ',';
                    }
                    
                    if (str_replace('maxSize', '', $param) != $param) {
                        $maxSize = $param . ',';
                    }
                }
                
                $customEmail = (in_array('custom[email]', $params)) ? 'custom[email],' : '';
                $customUrl = (in_array('custom[url]', $params)) ? 'custom[url],' : '';
                $customNumber = (in_array('custom[number]', $params)) ? 'custom[number],' : '';
                $customOnlyNumberSp = (in_array('custom[onlyNumberSp]', $params)) ? 'custom[onlyNumberSp],' : '';
                $customOnlyLetterSp = (in_array('custom[onlyLetterSp]', $params)) ? 'custom[onlyLetterSp],' : '';
                $validate_val = $required . $minSize . $maxSize . $customEmail . $customUrl . $customNumber . $customOnlyNumberSp . $customOnlyLetterSp;
                $validate = ($validate_val != '') ? ' class="validate[' . substr($validate_val, 0, -1) . ']"' : '';
                $descr = (unserialize($form_result->description) != '' && unserialize($form_result->description) != ' ') ? '<span class="db">' . stripslashes(unserialize($form_result->description)) . '</span>' : '';
                
                switch ($form_result->type) {
                case 'text':
                    $out .= '<div class="form_info cmsms_input">' .
                        '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                        '<input type="text" name="' . $field_name . '" id="' . $field_name . '" value=""' . $validate . ' />' .
                        $descr .
                    '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'email':
                    $out .= '<div class="form_info cmsms_input">' .
                        '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                        '<input type="text" name="' . $field_name . '" id="' . $field_name . '" value=""' . $validate . ' />' .
                        $descr .
                    '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'textarea':
                    $out .= '<div class="form_info cmsms_textarea">' .
                        '<label for="' . $field_name . '">' . $field_label . $required_label . '</label>' .
                        '<textarea name="' . $field_name . '" id="' . $field_name . '" cols="58" rows="6"' . $validate . '></textarea>' .
                        $descr .
                    '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'dropdown':
                    $out .= '<div class="form_info cmsms_select">' .
                        '<label>' . $field_label . $required_label . '</label>' .
                        '<select name="' . $field_name . '" id="' . $field_name . '"' . $validate . '>';

                    foreach ($vals as $val) {
                        $out .= '<option value="' . $val . '">' . $val . '</option>';
                    }

                    $out .= '</select>' .
                        '<div class="cl"></div>' .
                        $descr .
                    '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'radiobutton':
                    $out .= '<div class="form_info cmsms_radio">' .
                        '<label>' . $field_label . $required_label . '</label>' .
                        $descr;

                    $i = 1;

                    foreach ($vals as $val) {
                        $checked = ($i == 1) ? ' checked="checked"' : '';
                        
                        $out .= '<div class="check_parent">' .
                            '<input type="radio" name="' . $field_name . '" id="' . $field_name . $i . '" value="' . $val . '"' . $validate . $checked . ' />' .
                            '<label for="' . $field_name . $i . '">' . $val . '</label>' .
                        '</div>' .
                        '<div class="cl"></div>';

                        $i++;
                    }

                    $out .= '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'checkbox':
                    $out .= '<div class="form_info cmsms_checkbox">' .
                        '<label>' . $field_label . $required_label . '</label>' .
                        $descr .
                        '<div class="check_parent">' .
                            '<input type="checkbox" name="' . $field_name . '" id="' . $field_name . '" value="' . $vals[0] . '"' . $validate . ' />' .
                            '<label for="' . $field_name . '">' . $vals[0] . '</label>' .
                        '</div>' .
                        '<div class="cl"></div>' .
                    '</div>' .
                    '<div class="cl"></div>';
                    break;
                case 'checkboxes':
                    $out .= '<div class="form_info cmsms_checkboxes">' .
                        '<label>' . $field_label . '</label>' .
                        $descr;

                    $i = 1;

                    foreach ($vals as $val) {
                        $out .= '<div class="check_parent">' .
                            '<input type="checkbox" name="' . $field_name . '" id="' . $field_name . $i . '" value="' . $val . '" />' .
                            '<label for="' . $field_name . $i . '">' . $val . '</label>' .
                        '</div>' .
                        '<div class="cl"></div>';
                        
                        $i++;
                    }

                    $out .= '</div>' .
                    '<div class="cl"></div>';
                    break;
                }
            }
        }
        
        foreach ($results as $form_result) {
            if ($form_result->type == 'form') {
				if (in_array('captcha', unserialize($form_result->parameters))) {
					require_once(CMSMASTERS_CLASSES . '/recaptchalib.php');
					global $recaptcha_public_key;

					$out .= '<div id="' . $formname . '_builder_captcha" class="cmsms-form-builder-captcha">' . recaptcha_get_html($recaptcha_public_key) . '</div>' .
					'<div class="cl"></div>';
				}

				$out .= '<div class="loading"></div>' .
				'<div class="fl"><a id="' . $formname . '_formsend" class="button" href="#"><span>' . __('Send Message', 'cmsmasters') . '</span></a></div>';

				if (in_array('reset', unserialize($form_result->parameters))) {
					$out .= '<div class="fl" style="padding:0 0 0 10px;"><a id="' . $formname . '_formclear" class="button" href="#" onclick="if (confirm(\'' . __('Do you really want to reset the form?', 'cmsmasters') . '\')) document.getElementById(\'form_' . $formname . '\').reset(); return false;"><span>' . __('Reset Form', 'cmsmasters') . '</span></a></div>';
				}

				$out .= '<div class="cl"></div>' .
					'</form>' .
				'</div>';
            }
        }
        
        return $out;
    }
}

?>