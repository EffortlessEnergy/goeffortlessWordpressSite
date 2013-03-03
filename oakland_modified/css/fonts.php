<?php 
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.1
 * 
 * Fonts & Colors Settings File
 * Created by CMSMasters
 * 
 */


header('Content-type: text/css');
require('../../../../wp-load.php');
require('../theme/classes/var.php');

?>
body {
	font : <?php echo $content_font_size . 'px/' . 
	$content_line_height . 'px ' . 
	((strpos(stripslashes($content_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($content_font)) . "'" : stripslashes($content_font)); ?>;
}

h1, 
a.logo span.title {
	font : <?php echo $h1_font_size . 'px/' . 
	$h1_line_height . 'px ' . 
	((strpos(stripslashes($h1_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h1_font)) . "'" : stripslashes($h1_font));
	
	if (str_replace('+', ' ', stripslashes($h1_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h2, 
.post .published {
	font : <?php echo $h2_font_size . 'px/' . 
	$h2_line_height . 'px ' . 
	((strpos(stripslashes($h2_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h2_font)) . "'" : stripslashes($h2_font));
	
	if (str_replace('+', ' ', stripslashes($h2_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h3 {
	font : <?php echo $h3_font_size . 'px/' . 
	$h3_line_height . 'px ' . 
	((strpos(stripslashes($h3_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h3_font)) . "'" : stripslashes($h3_font));
	
	if (str_replace('+', ' ', stripslashes($h3_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h4, 
.format-quote .aside blockquote {
	font : <?php echo $h4_font_size . 'px/' . 
	$h4_line_height . 'px ' . 
	((strpos(stripslashes($h4_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h4_font)) . "'" : stripslashes($h4_font));
	
	if (str_replace('+', ' ', stripslashes($h4_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h5 {
	font : <?php echo $h5_font_size . 'px/' . 
	$h5_line_height . 'px ' . 
	((strpos(stripslashes($h5_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h5_font)) . "'" : stripslashes($h5_font));
	
	if (str_replace('+', ' ', stripslashes($h5_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

h6, 
.cmsms-form-builder label, 
.wpcf7 label, 
.button_large, 
.togg .tog {
	font : <?php echo $h6_font_size . 'px/' . 
	$h6_line_height . 'px ' . 
	((strpos(stripslashes($h6_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($h6_font)) . "'" : stripslashes($h6_font));
	
	if (str_replace('+', ' ', stripslashes($h6_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

q, 
blockquote {
	font : <?php echo $bqt_font_size . 'px/' . 
	$bqt_line_height . 'px ' . 
	((strpos(stripslashes($bqt_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($bqt_font)) . "'" : stripslashes($bqt_font));
	
	if (str_replace('+', ' ', stripslashes($bqt_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

code {
	font : <?php echo $code_font_size . 'px/' . 
	$code_line_height . 'px ' . 
	((strpos(stripslashes($code_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($code_font)) . "'" : stripslashes($code_font));
	
	if (str_replace('+', ' ', stripslashes($code_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

small, 
abbr {
	font : <?php echo $small_font_size . 'px/' . 
	$small_line_height . 'px ' . 
	((strpos(stripslashes($small_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($small_font)) . "'" : stripslashes($small_font));
	
	if (str_replace('+', ' ', stripslashes($small_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder input[type="radio"]+label, 
.wpcf7 label input[type="checkbox"]+span, 
.wpcf7 label input[type="radio"]+span {
	font : <?php echo $input_font_size . 'px/' . 
	$input_line_height . 'px ' . 
	((strpos(stripslashes($input_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($input_font)) . "'" : stripslashes($input_font));
	
	if (str_replace('+', ' ', stripslashes($input_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

#navigation li > a {
	font : <?php echo $nav_title_font_size . 'px/' . 
	$nav_title_line_height . 'px ' . 
	((strpos(stripslashes($nav_title_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($nav_title_font)) . "'" : stripslashes($nav_title_font));
	
	if (str_replace('+', ' ', stripslashes($nav_title_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

#navigation ul li a, 
.widget .cmsms-form-builder label, 
.widget .wpcf7 label, 
.blog.short .post .published, 
.portfolio.short .post .published {
	font-family : <?php echo ((strpos(stripslashes($nav_dropdown_font), '+')) ? "'" . str_replace('+', ' ', stripslashes($nav_dropdown_font)) . "'" : stripslashes($nav_dropdown_font));
	
	if (str_replace('+', ' ', stripslashes($nav_dropdown_font)) !== str_replace('+', ' ', stripslashes($content_font))) { 
		echo ((strpos(stripslashes($content_font), '+')) ? ", '" . str_replace('+', ' ', stripslashes($content_font)) . "'" : ', ' . stripslashes($content_font));
	} ?>;
}

#navigation ul li a {
	font-size:<?php echo $nav_dropdown_font_size; ?>px;
	line-height:<?php echo $nav_dropdown_line_height; ?>px;
}

body {
	color : <?php echo $text_color; ?>;
}

a, 
.color_3, 
q:before, 
blockquote:before, 
.blog .post h2.entry-title a:hover,
.blog .page h2.entry-title a:hover, 
.portfolio_container .portfolio .entry-title a:hover, 
.widget_custom_popular_portfolio_entries h6.project_title a:hover, 
.widget_custom_recent_portfolio_entries h6.project_title a:hover, 
ul.p_filter li.current a, 
ul.p_filter li a:hover, 
.blog.short .post .entry-title a:hover, 
.widgetinfo {
	color : <?php echo $link_color; ?>;
}

a:hover, 
.color_1, 
.tabs li a.current, 
.related_posts ul li a.current, 
.tags li a, 
.user_name a, 
.category_name a, 
.comments_number, 
.cmsmsLike:hover, 
.cmsmsLike.active, 
div.jp-playlist a.jp-playlist-current {
	color : <?php echo $link_hover_color; ?>;
}

h1, 
a.logo span.title {
	color : <?php echo $h1_color; ?>;
}

h2, 
.blog .post h2.entry-title a, 
.blog .page h2.entry-title a, 
.portfolio_container .portfolio .entry-title a, 
.blog.short .post .entry-title a {
	color : <?php echo $h2_color; ?>;
}

h3 {
	color : <?php echo $h3_color; ?>;
}

h4 {
	color : <?php echo $h4_color; ?>;
}

h5 {
	color : <?php echo $h5_color; ?>;
}

h6, 
.widget_custom_popular_portfolio_entries h6.project_title a, 
.widget_custom_recent_portfolio_entries h6.project_title a {
	color : <?php echo $h6_color; ?>;
}

#navigation li > a {
	color : <?php echo $nav_title_color; ?>;
}

#navigation > li.current-menu-ancestor > a, 
#navigation > li.current-menu-item > a, 
#navigation > li > a:hover, 
#navigation li:hover > a {
	color : <?php echo $nav_title_active_color; ?>;
}

#navigation ul li a {
	color : <?php echo $nav_dropdown_color; ?>;
}

#navigation li.current_page_item li.current_page_item li.current_page_item a, 
#navigation li.current_page_item li.current_page_item li a:hover, 
#navigation li.current_page_item li.current_page_item a, 
#navigation li.current_page_item li a:hover, 
#navigation ul li a:hover {
	color : <?php echo $nav_dropdown_active_color; ?>;
}

q, 
blockquote {
	color : <?php echo $bqt_color; ?>;
}

code {
	color : <?php echo $code_color; ?>;
}

small, 
abbr, 
.color_2, 
.widget_custom_twitter_entries ul li abbr.published a, 
.widget_custom_contact_form_entries .form_info label, 
.tags li a:hover,
.user_name a:hover, 
.category_name a:hover, 
.comments_number:hover, 
.togg .tog.current, 
.blog.short .post .published, 
.portfolio.short .post .published, 
.tour li.current a {
	color : <?php echo $small_color; ?>;
}

input, 
textarea, 
select, 
option, 
.cmsms-form-builder .check_parent input[type="checkbox"]+label, 
.cmsms-form-builder input[type="radio"]+label, 
.wpcf7 input[type="checkbox"]+span, 
.wpcf7 label input[type="radio"]+span {
	color : <?php echo $input_color; ?>;
}

code:before, 
span.dropcap2, 
.table thead th, 
.table tfoot th, 
.post .published, 
.shortcode_slideshow ul.shortcode_slideshow_pager li.current a, 
.shortcode_slideshow ul.shortcode_slideshow_pager li a:hover, 
.wp-pagenavi a, 
.button, 
.wpcf7 input[type="submit"], 
.button_medium, 
.button_large, 
.cmsmsLike:hover, 
.cmsmsLike.active, 
.cmsms_slider_parent a.cmsms_prev_slide:hover span, 
.cmsms_slider_parent a.cmsms_next_slide:hover span, 
.cmsms_slider_parent a.cmsms_close_video:hover, 
.cmsms_slider_parent ul.cmsms_slides_nav li.active a, 
.cmsms_slider_parent ul.cmsms_slides_nav li:hover a, 
.cmsms_content_slider_parent ul.cmsms_slides_nav li.active a, 
.cmsms_content_slider_parent ul.cmsms_slides_nav li:hover a {
	background-color : <?php echo $link_color; ?>;
}

#bottom .cmsms-form-builder input[type="text"]:focus, 
#bottom .cmsms-form-builder textarea:focus, 
#bottom .wpcf7 input[type="text"]:focus, 
#bottom .wpcf7 textarea:focus, 
input[type="text"]:focus, 
textarea:focus, 
select:focus, 
.cmsmsLike:hover, 
.cmsmsLike.active, 
select#resp_navigation:focus {
	border-color : <?php echo $link_color; ?>;
}

.colored_block, 
#navigation li.current-menu-ancestor > a, 
#navigation li.current-menu-item > a, 
#navigation li:hover > a:hover, 
#navigation ul li:hover > a, 
.logo img {
	background-color : <?php echo $colored_block_bg; ?>;
}

#navigation ul li a,
#navigation li:hover > a {
	background-color : <?php echo $nav_dropdown_bg; ?>;
}

#header, 
#navigation > li > ul > li:first-child > a {
	border-top-color : <?php echo $colored_block_bg; ?>;
}

#navigation ul li.current_page_item:first-child > a:before, 
#navigation ul li:first-child > a:hover:before, 
#navigation ul li.current_page_item:first-child:hover > a:hover:before, 
#navigation ul li:first-child > a:before {
	border-bottom-color : <?php echo $colored_block_bg; ?>;
}

#navigation ul li.current_page_item:first-child:hover > a:before {
	border-bottom-color : <?php echo $nav_dropdown_bg; ?>;
}
