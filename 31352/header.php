<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="icon" href="http://fin-free.com/wordpress/wp-content/uploads/2014/07/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href="<?php bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/dd.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/superfish.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo( 'template_url' ); ?>/css/shadowbox.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo( 'template_url' ); ?>/css/chapters.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php  bloginfo( 'template_url' ); ?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.dd.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/shadowbox.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/chapters.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDn-SGTcfzqj_jBgzFA26I0EqtwQu4QjKo&sensor=false"></script>
<script type="text/javascript">
jQuery( document ).ready( function ( $ ) {

$('.menu ul li:first-child').addClass( 'nobg' );
$('.menu ul li:last a').addClass( 'last' );

$(".mydds").msDropDown();
});

</script>
<script type="text/javascript">

$(document).ready(function(){
	Shadowbox.init();
	
	$('.popup').hide();
	$('.newsletter').hover(function(){
		$('.newsletter a').addClass('active');
	$(this).find('.popup').fadeIn();
	},function(){
	$(this).find('.popup').fadeOut();
	$('.newsletter a').removeClass('active');		
});
	
	
  $('#Name').focus(function(){ 

         if($(this).val()=='Name')

         {

            $(this).val('');

         }       
  });

  $('#Name').blur(function(){ 

         if($(this).val()=='')

         {

            $(this).val('Name');

         }   

    });

 $('#Email').focus(function(){ 

         if($(this).val()=='Email')

         {

            $(this).val('');

         }       
  });

  $('#Email').blur(function(){ 

         if($(this).val()=='')

         {

            $(this).val('Email');

         }   

    });

 $('#Comment').focus(function(){ 

         if($(this).val()=='Comment')

         {

            $(this).val('');

         }       
  });

  $('#Comment').blur(function(){ 

         if($(this).val()=='')

         {

            $(this).val('Comment');

         }   

    });


});

</script>	
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.cycle.all.min.js"></script>


<script type="text/javascript">
$('.banner_left').cycle({
   fx:     'scrollHorz',
   speed:  'normal',
   timeout: 0,
   pager:  '#nav',
   cleartypeNoBg: true,
   pagerAnchorBuilder: function(idx, slide) {
       // return selector string for existing anchor
       return '#nav li:eq(' + idx + ') a';
   }
});

$(document).ready(function() {
/*
$("#btnBsTab").click(function () {
console.log("tnt");
    if ($("#navmenu").hasClass("in")) {
        $("#navmenu").removeClass("in");
        $("#navmenu").removeClass("collapse");
    } else {
	$("#navmenu").addClass("collapse");
        $("#navmenu").addClass("in").css({height:'auto !important'});
    }
}); */

});
</script>








<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> 

<link href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>


<body>



        
<div id="outer_top" class="main-t"><!--outer_top start-->
	<div class="container"><!--wrapper start-->
            	<header class="navbar blue">
				<div class="container">
                <button type="button" id="btnBsTab" class="btn btn-navbar dropdown" data-toggle="collapse" data-target=".nav-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
				
                <nav class="nav-collapse menu fltright in collapse" style="height:282px;">
                	 <?php wp_nav_menu( array('menu' => 'Main Menu','container' => '',
					 'items_wrap'      => '<ul id="%1$s" class="sf-menu">%3$s</ul>',
					 'menu_class'=> 'sf-menu' )); ?>
                </nav>
				</div>
				</header>
            
            
            <!--header_top end-->
            
            <div class="container">
            
            <div class="header_middle"><!--header_middle start-->
            	
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-2 ">
                
                <div id="logo" class="fltleft"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo.png" width="107" height="137" alt="" /></a></div>
                </div>
                
                
                <div class="col-lg-9 col-md-9 col-xs-12 col-sm-10  ">
                <div class="donate_volunteer fltleft">
                    
                    <div class="donate fltleft">
			<a target="_blank"href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SY4CP5U9XZK9E"></a>
                    </div>
                    <div class="volunteer fltleft">
                    	<a href="<?php $page = get_page_by_title( 'Volunteer' ); echo get_page_link( $page->ID ); ?>"></a>
                    </div>
                </div>
                <div class="middle_nav">
                	<div class=" col-lg-12 col-md-12 width-s">
                    
              <span class="take_place fltleft"><a href="<?php $page = get_page_by_title( 'Fin Free Pledge' ); echo get_page_link( $page->ID ); ?>"></a></span>
               <span class="newsletter fltleft">
                     <?php wpsb_opt_in(); ?>
                    </a></span>
                    
               <span class="contact_us fltleft"><a href="<?php $page = get_page_by_title( 'Contact Us' ); echo get_page_link( $page->ID ); ?> "></a></span>
           
               </span>
               
               
                </div>
            </div>
            
            </div>
            
            
            </div>
            
            <!--header_middle end-->
            
            
            
          <?php if(is_category("test")){ ?>
            <div class="header_bottom"><!--header_bottom start-->
            	
            	<div class="tweet_feed fltleft">
                 
                </div>
                
                <div class="search_area fltright">
                  							 
                </div>
            </div>
							
                </div>
          
          <?php } else { ?>
     <div class="space"></div>
		<?php } ?>
        </div>
        </div>
        <!--header end-->
        