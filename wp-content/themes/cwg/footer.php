<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info thirteenForty evCenter" style="min-height:62px;">
			
		</div><!-- .site-info -->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="thirteenForty evCenter" style="padding:0px;">
					<div class="col-sm-5 col-md-5" style="padding-top:20px;">
						<div class="mailndPhone" style="margin-bottom:10px;">
							<img src="<? echo get_stylesheet_directory_uri();?>/resources/images/mail.png" />
							<span><a href="info@cwgdigital.com">info@cwgdigital.com</a></span>
						</div>
						
						
						<div class="mailndPhone">
							<img src="<? echo get_stylesheet_directory_uri();?>/resources/images/analog-phone.png" />
							<span>888.687.3313</span>
						</div>
						<br/>
						<br/>
						<div>
							<label class="white" style="font-size:18px;margin-bottom:0px;line-height:1">Want more news, tips and strategies?</label>
							<label>Sign up for our weekly newsletter here</label>
							<br/>
							<br/>
							<label>&copy; 2014. Cook Wheelwright Group Inc. All rights reserved.</label>
						</div>
					</div>
					<div class="col-sm-3 col-md-2" style="padding-right:5px;">
						<?php dynamic_sidebar( 'footer-linkset-1' ); ?>
					</div>
					<div class="col-sm-3 col-md-2">
						<?php dynamic_sidebar( 'footer-linkset-2' ); ?>
					</div>
					<div id="footer-social" class="col-sm-12 col-md-3" style="padding-top:20px;">
						<label class="white" style="font-size:18px;margin-bottom:20px;line-height:1">Get Social With Us</label><br/>
						<a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/facebook-footer.png" /></a>
						<a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/linkedin-footer.png" /></a>
						<a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/twitter-footer.png" /></a>
						<a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/youtube-footer.png" /></a>
						<a href="#"><img src="<? echo get_stylesheet_directory_uri();?>/resources/images/rss-footer.png" /></a>
						
						<br/>
						<br/>
						<br/>
						
						<label>
						Toll free (888) 687-3313
						<br/>
						Local (480) 779-8001
						</label>
						<br/>
						<br/>
						<label><a href="#">Sitemap </a>  |  <a href="#">RSS</a></label>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>