<?php
/**
 * Template Name: CWG Home Page Template
 *
 */

get_header(); ?>
<?
	$settings = get_option('cwg_theme_settings');
	//var_dump($settings);
?>
	<div id="primary" class="site-content" style="margin-top:0px;">
		<div id="homeImageHolder1" class="" style="background-image:url('<? echo $settings['cwg_home_fullwidth_image1'];?>')">
			<div class="thirteenForty evCenter">
				<div id="homeImage1-text-holder" class="pull-right">
					<p><? echo $settings['cwg_home_fullwidth_image_content'];?></p>
					<a href="<? echo $settings['cwg_home_fullwidth_image_content_link'];?>">
						<? echo $settings['cwg_home_fullwidth_image_content_link_title'];?>
					</a>
				</div>
			</div>
		</div>
		
		<?
		//fetch all testimonials
		wp_reset_postdata();
		$args = array(
			'orderby'          => 'post_date',
			'order'            => 'ASC',
			'post_type'        => 'testimonials',
			'post_status'      => 'publish'
		); 
		$testimonials = get_posts( $args );
		?>

		<div class="thirteenForty evCenter" id="testimonials-holder">
			<span id="left-bracket" class="green bracket">[</span>
			<span>small agency. big&nbsp;</span><span class="green" id="hover-text">ideas</span>
			<span id="right-bracket" class="green bracket">]</span>
		</div>
		
		<div id="home-split-container" class="thirteenForty evCenter">
			<div class="narrower evCenter">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="col-md-6" style="background-image:url('<? echo $settings['cwg_home_split-section_image1_link'];?>');">
							<div class="home-split-content">
								<h3><? echo $settings['cwg_home_split-section-title'];?></h3>
								<img src="<? echo $settings['cwg_home_split-section_logo'];?>" />
								<br/>
								<br/>
								<p><? echo esc_html( stripslashes( $settings["cwg_home_split-section-content"] ) );?></p>
							</div>
						</div>
						<div class="col-md-6" style="background-image:url('<? echo $settings['cwg_home_split-section_image2_link'];?>');">
							<div class="home-split-content">
								<h3><? echo $settings['cwg_home_split-section-title2'];?></h3>
								<img src="<? echo $settings['cwg_home_split-section_logo2'];?>" />
								<br/>
								<br/>
								<p><? echo esc_html( stripslashes( $settings["cwg_home_split-section-content2"] ) );?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div id="content" role="main" style="text-align:center;width:80%;margin:0px auto;" class=" <? if(is_front_page()) echo "thirteenForty evCenter"; ?>">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<?
		//fetch latest 4 featured posts
		wp_reset_postdata();
		$args = array(
			'numberposts'   => 4,
			'category_name'    => 'featured',
			'orderby'          => 'post_date',
			'order'            => 'ASC',
			'post_type'        => 'post',
			'post_status'      => 'publish'
		); 
		$featuredPosts = get_posts( $args );
		?>
		<div id="home-4-featured" class="thirteenForty evCenter">
			<div class="container-fluid">
				<div class="row-fluid">
					<? if($featuredPosts){
						foreach($featuredPosts as $featured): setup_postdata( $featured );
						$featuredImg = wp_get_attachment_image_src( get_post_thumbnail_id( $featured->ID ),'full' );
						$tmpTitle = get_post_meta( $featured->ID,"Display Title");
					?>
					<div class="col-sm-6 col-md-3">
						<div class="featured-top-marker"></div>
						<h2><? echo $featured->post_title; ?></h2>
						<img src="<? echo $featuredImg[0]; ?>" />
						<h4><? echo $tmpTitle[0]; ?></h4>
						<p><? echo $featured->post_excerpt; ?></p>
						<a class="ev-learnbtn" href="<? echo get_permalink($featured->ID); ?>"><img style="width:87px;height:32px;" class="pull-right" src="<? echo get_stylesheet_directory_uri(); ?>/resources/images/learnMore-blue.png" /></a>
						
					</div>
					<?
						endforeach;
						wp_reset_postdata();
						}
					?>
				</div>
			</div>
		</div>
		<!-- end of home-4-featured -->
		<div id="homeImageHolder2" class="" style="background-image:url('<? echo $settings['cwg_home_fullwidth_image2'];?>')">
			<div class="ev-black-overlay">
				<div class="thirteenForty evCenter">
					<div id="homeImage2-text-holder" class="text-center">
						<p><? echo esc_html( stripslashes( $settings["cwg_home_fullwidth_image2_content"] ) );?></p>
						<a href="<? echo $settings['cwg_home_fullwidth_image2_link'];?>"><img style="width:140px;height:40px;" src="<? echo get_stylesheet_directory_uri(); ?>/resources/images/view-portfolio-btn.png" /></a>
					</div>
				</div>
			</div>
		</div>
		
		<!-- content slider begins -->
		<?
		//fetch all posts from category "Home Content Slider"
		$args = array(
			'numberposts'   => 4,
			'category_name'    => 'home-content-slider',
			'orderby'          => 'post_date',
			'order'            => 'ASC',
			'post_type'        => 'post',
			'post_status'      => 'publish'
		); 
		$slides = get_posts( $args );
		?>
		<div id="home-bottom-slider-holder" class="thirteenForty evCenter">
			<div class="container-fluid">
				<div class="row-fluid" >		
					<div class="col-md-3">
						<?php putRevSlider("home-bottom") ?>			
					</div>	
					<div class="col-md-9 content-slider-content-holder">
					<h1>Dedicated to doing good.</h1>
						<p style="text-align: left;">We're passionate about improving the communities we live in, which is why we donate hundreds of hours of time, sponsorships and materials annually to help further programs that impact the neighborhoods where we work and live. Click on the icons below to learn  about some great causes we are lucky to be involved with.</p>
<a href="any link"><img class="alignleft wp-image-93 size-full" src="http://cwg.cookwheelwright.com/wp-content/uploads/2014/11/image3.jpg" alt="image3" width="176" height="119" /></a><a href="http://cwg.cookwheelwright.com/wp-content/uploads/2014/11/image2.jpg"><img class="alignleft wp-image-92 size-full" src="http://cwg.cookwheelwright.com/wp-content/uploads/2014/11/image2.jpg" alt="image2" width="176" height="119" /></a><a href="http://cwg.cookwheelwright.com/wp-content/uploads/2014/11/image1.jpg"><img class="alignleft wp-image-91 size-full" src="http://cwg.cookwheelwright.com/wp-content/uploads/2014/11/image1.jpg" alt="image1" width="176" height="119" /></a>
					</div>
						
					
					<div id="pager-holder-wrapper" class="col-md-3" style="text-align:center;padding:0px;">
						<div id="pager-holder">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>