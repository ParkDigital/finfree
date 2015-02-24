<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
 <div id="content"><!--content start-->
 <div class="container">
        <div class="content_top2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        	<div class="left_content fltleft"><!--left_content start-->
            	<h2>In the <?php single_cat_title(); ?></h2>                   
							<?php if (have_posts()) : ?>
            
                            <?php while (have_posts()) : the_post(); ?>
                            <div class="post_block"><!--post_block start-->
                                <div class="post_date fltleft"><span class="date2"><?php the_time('j') ?></span><br /><span class="month"><?php the_time('M') ?></span><br /><?php the_time('Y') ?></div>
                                <div class="post_heading fltright">
                                    <h3><?php the_title(); ?></h3>
                                    <h4>administrator Last Updated on <?php the_time('jS F Y') ?></h4>
                                </div>
                                <div class="clrflt"></div>
                              <?php the_excerpt(); ?>
                                
                                <div class="social">
                                   
                                </div>
                            </div><!--post_block start-->
                            <?php endwhile; ?>
            
                            <div class="navigation">
                                <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                                <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                            </div>
                    
                        <?php else : ?>
                    
                            <h2 class="center">Not Found</h2>
                            <p class="center">Sorry, but you are looking for something that isn't here.</p>
                            <?php get_search_form(); ?>
                    
                        <?php endif; ?>
                
    </div></div><!--left_content end-->
     

<?php get_sidebar(); ?>
<?php get_footer(); ?>
