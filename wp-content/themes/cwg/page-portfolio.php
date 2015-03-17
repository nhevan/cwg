<?php
/**
 * Template Name: Portfolio Page Template
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
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
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
?><div style="float:right; font-size:18px;">Call us at <span style="font-family:Verdana; font-size:18px; font-weight:bolder;">888.687.3313</span> for a free consultation.<span style="margin-left:50px; border: solid 2px #a3d65c; padding: 5px;"><a href="http://cwg.cookwheelwright.com/contact-us/"><span style="font-family:Verdana; font-size:18px; color: #a3d65c;">CONTACT US</span></a></span></div>
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
			<?
			//15 mar 15 removed the while tag for getting article content
			?>
			<br/>
			<div class="container-fluid" id="portfolio-gallery-items">
				<div class="row-fluid">
					<?
						$currentpage_children = get_page_children( 16 , $all_wp_pages );
						foreach($currentpage_children as $children){
							//$cur_id =  get_the_ID();
							$child_id = $children->ID;
							$cls = "";
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($child_id, 'portfolio-featured' ) );
							if($feat_image == null){
								$feat_image = get_stylesheet_directory_uri();
								$feat_image .= "/resources/images/no-featured-img-found.jpg";
							}
							$hearts = get_post_custom_values('current_heart_count', $child_id);
							?>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<a  class='port-item-title' href=' <? echo get_permalink($child_id); ?>'>
									<img class="port-item-thumbnail" src="<? echo $feat_image; ?>"/>
								</a>
								<label class="">
									<a  class='port-item-title' href=' <? echo get_permalink($child_id); ?>'> <? echo $children->post_title; ?></a>
								</label>
								<label class="port-item-heart-count count_<? echo $child_id; ?>"><? echo $hearts[0]; ?></label>
								<img childId="<? echo $child_id; ?>" class="port-item-heart" src="<? echo get_stylesheet_directory_uri(); ?>/resources/images/heart.png" />
							</div>
							<? 
						}
					?>
				</div>	
			</div>

		</div><!-- #content -->
	
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>