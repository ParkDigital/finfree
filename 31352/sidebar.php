<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		   <div class="right_content col-lg-4 col-md-4 col-xs-12 pad-n"><!--right_content start-->
				<?php if(is_search()){ ?><?php } else { ?>
				<div class="inner_search_area">
				                <?php get_search_form(); ?>
				                </div>
				<?php } ?>
                
               <div class="gry">
               <?php 	/* Widgetized sidebar, if you have the plugin installed. */
				         	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget Area') ) : ?>
							<?php endif; ?> 
        </div>

            </div><!--right_content end-->
            <div class="clrflt"></div>
        </div>
        </div><!--content end-->
        
    </div><!--wrapper end-->
</div><!--outer_top end-->
