<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?
	$currentpagename = $wp_query->queried_object->post_title;
	$currentpage =  get_page_by_title($currentpagename);
	$id = $currentpage->ID;
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	$parents = get_post_ancestors( $currentpage->ID );


	//load different page template if child page of PORTFOLIO i.e. parent_id = 16
	if ($parents[0] == 16){
		load_template( dirname( __FILE__ ) . '/page-templates/portfolio-items.php' );		
		exit(0);
	}
	
?>
	
	
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
	
	if( $id == get_the_ID() || $id == $currentpage->post_parent ){
	echo "<span class='breadcrms' style='font-family:verdana; font-size:14px;'>";
	
	//echo get_the_title($parents[0]);
	if($parents==null){
		echo "<strong>";
		//the_title();
		$base = get_the_permalink();
		echo "<a style='text-transform:uppercase; color: #a3d65c;' href='".$base."'>".$currentpagename."</a>";
		echo "</strong>";
		echo " /";
		wp_reset_query();
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
	
		// Filter through all pages and find About's children
		$currentpage_children = get_page_children( $id, $all_wp_pages );
	
		// echo what we get back from WP to the browser
		//echo '<pre>' . print_r( $currentpage_children, true ) . '</pre>';
		foreach($currentpage_children as $children){
			echo " / ";
			echo "<a href='".$base.$children->post_name."'>".$children->post_title."</a>";
			
		}
	}else{
		
		
		//the_title();
		$base = get_the_permalink();
		echo "<a href='".get_permalink($parents[0])."'>".get_the_title($parents[0])."</a>";
		
		echo " /";
		wp_reset_query();
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
	
		// Filter through all pages and find About's children
		$currentpage_children = get_page_children( $parents[0], $all_wp_pages );
	
		// echo what we get back from WP to the browser
		//echo '<pre>' . print_r( $currentpage_children, true ) . '</pre>';
		foreach($currentpage_children as $children){
			$cur_id =  get_the_ID();
			$child_id = $children->ID;
			$cls = "";
			if($cur_id == $child_id) $cls =  'active-brd';
			echo " / ";
			echo "<a  class='".$cls."' href='".get_permalink($child_id)."'>".$children->post_title."</a>";
			
		}
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
			'category_name'    => 'specialties',
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
						<img src="<? echo $featuredImg[0]; ?>" class="aligncenter"/>
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
	
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>