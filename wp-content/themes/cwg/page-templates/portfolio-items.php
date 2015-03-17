<?php
/**
 * Template Name: Portfolio Items
 *
 */

get_header(); ?>
<style>
.breadcrms a.active-brd{
	color: #a3d65c;
	font-weight:bold;
}
</style>
	<div id="primary" class="site-content" style="margin-top:0px;">
	<div class="thirteenForty evCenter">
		<div id="breadcrumbs">	
<? 
	$currentpagename = $wp_query->queried_object->post_title;
	$currentpage =  get_page_by_title($currentpagename);
	$id = $currentpage->ID;
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id(16) );
	$parents = get_post_ancestors( $currentpage->ID );
	if( $id == get_the_ID() || $id == $currentpage->post_parent ){
	echo "<span class='breadcrms' style='font-family:verdana; font-size:14px;'>";
	
	//echo get_the_title($parents[0]);
	if($parents==null){
		echo "<strong>";
		//the_title();
		$base = get_the_permalink();
		echo "<a style='text-transform:uppercase; color: #a3d65c;' href='".$base."'>".$currentpagename."</a>";
		echo "</strong>";
		echo " //";
		wp_reset_query();
		
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
	
		// Filter through all pages and find About's children
		$currentpage_children = get_page_children( $id, $all_wp_pages );
	
		// echo what we get back from WP to the browser
		//echo '<pre>' . print_r( $currentpage_children, true ) . '</pre>';
		/*foreach($currentpage_children as $children){
			echo " / ";
			echo "<a href='".$base.$children->post_name."'>".$children->post_title."</a>";
			
		}*/
	}else{
		
		
		//the_title();
		$base = get_the_permalink();
		echo "<a style='text-transform:uppercase;' href='".get_permalink($parents[0])."'>".get_the_title($parents[0])."</a>";
		
		echo " // ";
		$currentpagename = $wp_query->queried_object->post_title;
		$base = get_the_permalink();
		echo "<a style='text-transform:uppercase; color: #a3d65c;' href='".$base."'>".$currentpagename."</a>";
		wp_reset_query();
		
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
	
		// Filter through all pages and find About's children
		$currentpage_children = get_page_children( $parents[0], $all_wp_pages );
	
		// echo what we get back from WP to the browser
		//echo '<pre>' . print_r( $currentpage_children, true ) . '</pre>';
		
		/*foreach($currentpage_children as $children){
			$cur_id =  get_the_ID();
			$child_id = $children->ID;
			$cls = "";
			if($cur_id == $child_id) $cls =  'active-brd';
			echo " / ";
			echo "<a  class='".$cls."' href='".get_permalink($child_id)."'>".$children->post_title."</a>";
			break;
			
		}*/
	}
	
	echo "</span>";
 ?>
<? 
	}else{
		echo "not about us or its children";
	}
?><div style="float:right; font-size:18px;">Call us at <span style="font-family:Verdana; font-size:18px; font-weight:bolder;">888.687.3313</span> for a free consultation.<span style="margin-left:50px; border: solid 2px #a3d65c; padding: 5px;"><a href="http://cwg.cookwheelwright.com/contact-us/"><span style="font-size: 18px; font-family:Verdana;color: #a3d65c;">CONTACT US</span></a></span></div>
</div><!-- breadcrumbs -->
	</div> <!-- thirteenForty -->	
	
	<div id="innerbanner" <? if($feat_image!=null){ ?> style="background-image:url('<?php echo $feat_image; ?>');background-repeat:no-repeat;background-size:100% 100%;" <? } ?> >	
		<div class="thirteenForty evCenter">
			<div id="innerbanner-heading"> 
				<h1>We are CWG.</h1>
				<h3>Digital & Beyond.</h3>
			</div><!-- innerbanner-heading  -->
			<div id="innerbanner-text">
				<p>Founded during a recession with the purpose of helping entrepreneurs weather the storm and grow their businesses against all odds, CWG keeps the renegade spirit alive today in everything we do. From web based campaigns to social media to advertising, our focus on helping brands connect with their audience and build value through digital platforms is why more emerging brands trust CWG with their creative and advertising needs. At CWG we love a challenge, the bigger the better...<br/> call us today to discover what we can do for you.<p>
		</div><!-- innerbanner-heading  -->		
		</div><!--thirteenForty -->
	</div><!-- innerbanner -->			
		<div id="content" role="main" class="thirteenForty evCenter">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<script type="text/javascript">
							jQuery(document).ready(function($){
								$('.portfolio-image-slider').bxSlider({
									pagerCustom: '#portfolio-image-pager',
									auto : true
								});	
							});
						</script>
						<style type="text/css">
							.bx-wrapper .bx-viewport{
								box-shadow: 0px;
								border: 0px;
							}
							.portfolio-image-slider{
								height: inherit;
							}
							.portfolio-image-slider li{
								height: inherit
							}
							.portfolio-image-slider li img{
								margin: 0px auto;
							}
							.portfolio-image-slider li{
								margin: 0px;
								border: solid #ccc 2px;
							}
							#portfolio-image-pager {
								text-align: center;
							}
							
							#portfolio-image-pager a img{
								border: solid #ccc 1px;
								margin: 0 5px;
								padding: 3px;
								height:150px;
								width: 150px;
							}
							
							#portfolio-image-pager a:hover img,
							#portfolio-image-pager a.active img{
								border: solid #5280DD 1px;
							}
							
							.bx-wrapper {
								margin-bottom: 10px;
							}
						</style><!-- style for the BX Slider	--> <!--js and cs for portfolio slider images (bxslider0 -->
						<?
							$custom_fields = get_post_custom_values('portfolio-item-images', get_the_ID());
							$pos_tmp = stripos($custom_fields[0], "[gallery");
							$gallery = substr($custom_fields[0], $pos_tmp);
							$img_links = explode(" ", $gallery);
							$img_links = $img_links[1];
							$length_tmp = strlen($img_links);
							$array_attachment_id = substr($img_links, 5, $length_tmp - 7);
							$array_attachment_id = explode(",", $array_attachment_id);
							$count = 0;
							foreach($array_attachment_id as $slide_id){
								$slide_id = (int)$slide_id;
								$link_gallery[$count++] = wp_get_attachment_url( $slide_id );
							}
						?>
						<br/>
						<br/>
						<div class="container-fluid">
							<div class="row-fluid">
									<div class="col-md-6">
										<?
											if($link_gallery[0]!=false){ ?>
											<ul class="portfolio-image-slider">
												<?
													foreach($link_gallery as $slide){
														echo "<li><img src='$slide' /></li>";
													}
												?>
											</ul>
											<div id="portfolio-image-pager">
												<?
													$index = 0;
													foreach($link_gallery as $slide){
														echo "<a data-slide-index='$index' href=''><img src='$slide' /></a>";
														$index++;
													}
												?>
											</div>
										<? }else{	
											echo "<h2 style='text-align:center;'>Please select some related photos to display as gallery. </h2>";
										}	
										?>
									</div>
									<div class="col-md-6">
										<h2 class="portfolio-item-title"><?php the_title(); ?></h2>
										<?
											$roles = get_post_custom_values('role', get_the_ID());
											$platforms = get_post_custom_values('platforms', get_the_ID());
											$hearts = get_post_custom_values('current_heart_count', get_the_ID());
										?>
										<label class="green port-key">Roles:</label>
										<div>
											<label class="port-value"><? echo $roles[0]; ?> </label>
										</div>
										<br/>

										<label class="green port-key" style="padding-right: 20px;">Platform:</label>
										<div>
											<label class="port-value" ><? echo $platforms[0]; ?></label>
										</div>
										<?php the_content(); ?>
										<img class="port-item-heart" style="height: 30px;" src="<? echo get_stylesheet_directory_uri(); ?>/resources/images/heart.png" />
										<label style="font-size: 12px;"><? echo $hearts[0]; ?> loves</label>
										<br/>
										<br/>
										<a class="noDeco black" href="/portfolio" style="font-size: 22px; font-weight: bolder;"> << Return to Portfolio Page </a>
									</div>
							</div>
						</div>

					</div><!-- .entry-content -->
				</article><!-- #post -->
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>