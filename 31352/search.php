<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div id="content"><!--content start-->
        <div class="content_top">
        	<div class="left_content fltleft"><!--left_content start-->
            	               
							<?php if (have_posts()) : ?>
            <h2 class="pagetitle">Search Results</h2>
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
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style ">                        
                                    <a class="addthis_button_tweet"></a>  
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>                     
                                    </div>
                                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f9e2797134af394"></script>
                                    <!-- AddThis Button END -->
                                </div>
                            </div><!--post_block start-->
                            <?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>
                    
                     
                
    </div><!--left_content end-->
     

<?php get_sidebar(); ?>
<?php get_footer(); ?>
