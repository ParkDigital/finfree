<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<div id="outer3"><!--outer3 start-->
<div id="sub_footer_wrap">
	<?php wp_nav_menu( array('menu' => 'Footer Menu1','container' => '','menu_class'=> 'menu12' )); ?>
    <?php wp_nav_menu( array('menu' => 'Footer Menu2','container' => '','menu_class'=> 'menu12' )); ?>    
</div>
</div><!--outer3 end-->

<div id="outer4"><!--outer4 start-->
<div id="footer_logo"><!--footer_logo start-->
  <div id="footer_wrap">
        <div class="powered_bg">Powered by<br />
        <span>united conservationists.org</span></div>
        <div class="copyright">&copy; 2001-2011 All Rights Reserved. Fin Free is a registered trademark of United Conservationists</div>
    </div>
</div><!--footer_logo end-->
</div><!--outer4 end-->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
