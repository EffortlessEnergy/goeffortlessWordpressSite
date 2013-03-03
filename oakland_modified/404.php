<?php
/**
 * @package WordPress
 * @subpackage Oakland
 * @since Oakland 1.0
 * 
 * 404 Error Page Template
 * Created by CMSMasters
 * 
 */

get_header();

global $error_search_show, 
	$error_sitemap_show, 
	$error_sitemap_link;

?>


<!-- _________________________ Start Content _________________________ -->
							<section class="middle_content">
								<div class="entry">
                                    <div class="error">
										<h1>404</h1>
										<h3><?php _e("We're sorry, but the page you were looking for doesn't exist.", 'cmsmasters'); ?></h3>
										<?php 
										if ($error_search_show) { 
											get_search_form(); 
										} 
										?>
										<?php if ($error_sitemap_show && $error_sitemap_link != ''){ ?>
											<a href="<?php echo $error_sitemap_link; ?>" class="with_arrow"><?php _e('Sitemap', 'cmsmasters'); ?></a>
										<?php } ?>
							        </div>
								</div>
							</section>
<!-- _________________________ Finish Content _________________________ -->


<?php get_footer(); ?>