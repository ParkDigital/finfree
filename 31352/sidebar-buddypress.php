<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		   <div class="right_content fltright" style="display:none;"><!--right_content start-->
				<?php if(is_home()|| is_category()||is_search()){ ?><?php } else { ?>
				<div class="inner_search_area">
				                <?php get_search_form(); ?>
				                </div>
				<?php } ?>

               <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				         	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget Area') ) : ?>
							<?php endif; ?> 
        

            </div><!--right_content end-->
            <div class="clrflt"></div>
        </div>
        </div><!--content end-->
        
    </div><!--wrapper end-->
</div><!--outer_top end-->
