<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
 <div id="content"><!--content start-->
 <div class="container">
        <div class="content_top2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        	<div class="left_content "><!--left_content start-->
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
            	<h1><?php the_title(); ?></h1>
                <div class="post_details">
                <?php the_content(); ?>
                </div>
                <div style="padding-top:15px;"class="social">
                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style">                        
                                    <a class="addthis_button_tweet"></a>  
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>                     
                                    </div>
                                    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f9e2797134af394"></script>
                                    <!-- AddThis Button END -->
                </div>
              <?php endwhile; endif; ?>

            </div></div><!--left_content end-->
         

<?php get_sidebar(); ?>
<?php get_footer(); ?>
