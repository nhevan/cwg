<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script>
  function GetWidth()
  {
          var x = 0;
          if (self.innerHeight)
          {
                  x = self.innerWidth;
          }
          else if (document.documentElement && document.documentElement.clientHeight)
          {
                  x = document.documentElement.clientWidth;
          }
          else if (document.body)
          {
                  x = document.body.clientWidth;
          }
		  alert(x);
          return x;
  }

  function GetHeight()
  {
          var y = 0;
          if (self.innerHeight)
          {
                  y = self.innerHeight;
          }
          else if (document.documentElement && document.documentElement.clientHeight)
          {
                  y = document.documentElement.clientHeight;
          }
          else if (document.body)
          {
                  y = document.body.clientHeight;
          }
          return y;
  }
 //GetWidth();
  </script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<div class="container-fluid" id="customBSHeader">
			<div class="row-fluid">
				<div class="thirteenForty evCenter">
					<div id="logo-holder" class="col-xs-12 col-sm-12 col-md-3">
						<a href="/"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/logo.png"/></a>
					</div>
					<div id="menu-holder" class="col-xs-12 col-sm-12 col-md-7">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
						</nav><!-- #site-navigation -->
						
					</div>
					<div id="chevron-holder" class="col-xs-12 col-sm-12 col-md-2">
						<!--<a href="#" id="chevron-slider-trigger">-->
						
								<img id="chevron-img" class="pull-left" src="<? echo get_stylesheet_directory_uri();?>/resources/images/chevron-angle.jpg" style="width:38px;min-height:111px;" />
								<div id="chevron-content-holder">
									<div id="trigSection"><span>Stay Connected<span></div>
									<div id="revealSection" >
										<ul class="">
											<li><a href="#"><img style="padding-left:20px;" src="<? echo get_stylesheet_directory_uri();?>/resources/images/fb.png" /></a></li>
											<li><a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/linkedin.png" /></a></li>
											<li><a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/google+.png" /></a></li>
											<li><a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/twitter.png" /></a></li>
										</ul>
									</div>
								
							</div>
						<!--</a>-->
					</div>
				</div>
			</div><!-- row-fluid ends -->
			</div><!-- BS row ends -->
		<!-- #customBSHeader ends -->
	</header><!-- #masthead -->

	<div id="main" class="wrapper <? if(!is_front_page()) echo "evCenter"; else echo "front-main"; ?>">