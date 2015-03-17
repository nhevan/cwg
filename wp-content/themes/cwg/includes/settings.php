<?php

/**
 * cwg Tabbed Settings Page
 */

add_action( 'init', 'cwg_admin_init' );
add_action( 'admin_menu', 'cwg_settings_page_init' );

function cwg_admin_init() {

	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('customjs',get_stylesheet_directory_uri() . '/resources/js/custom.js', array('jquery','media-upload','thickbox'),'1.0',true);
	add_image_size( 'portfolio-featured', 9999, 213 );
	$settings = get_option( "cwg_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'cwg_home_fullwidth_image1' => 'Image 1 url',
			'cwg_home_fullwidth_image_content' => 'Sample Homepage image 1 text',
			'cwg_home_fullwidth_image_content_link' => 'link',
			'cwg_home_fullwidth_image_content_link_title' => 'link title',
			'cwg_home_fullwidth_image2' => 'Image 2 url',
			'cwg_home_fullwidth_image2_link' => 'Image 2 link',
			'cwg_home_fullwidth_image2_content' => 'Image 2 content area',
			'cwg_home_split-section_image1_link' => 'Split Section Image 1 link',
			'cwg_home_split-section_image2_link' => 'Split Section Image 2 link',
			'cwg_home_split-section_logo' => 'Split Section Logo link',
			'cwg_home_split-section-content' => 'Split Section content',
			'cwg_home_split-section-title' => 'Split Section title',
			'cwg_home_split-section_logo2' => 'Split Section Logo link 2',
			'cwg_home_split-section-content2' => 'Split Section content 2',
			'cwg_home_split-section-title2' => 'Split Section title 2',
			
			'cwg_tag_class' => false,
			'cwg_ga' => false
		);
		add_option( "cwg_theme_settings", $settings, '', 'yes' );
	}	
}

function cwg_settings_page_init() {
	$theme_data = get_theme_data( get_stylesheet_directory_uri() . '/style.css' );
	$settings_page = add_theme_page( 'CWG Theme Settings', 'CWG Theme Settings', 'edit_theme_options', 'theme-settings', 'cwg_settings_page' );
	add_action( "load-{$settings_page}", 'cwg_load_settings_page' );
}

function cwg_load_settings_page() {
	if ( $_POST["cwg-settings-submit"] == 'Y' ) {
		check_admin_referer( "cwg-settings-page" );
		cwg_save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function cwg_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "cwg_theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
		if ( isset ( $_GET['tab'] ) )
	        $tab = $_GET['tab']; 
	    else
	        $tab = 'homepage'; 

	    switch ( $tab ){ 
	        case 'general' :
				$settings['cwg_tag_class']	  = $_POST['cwg_tag_class'];
			break; 
	        case 'footer' : 
				$settings['cwg_ga']  = $_POST['cwg_ga'];
			break;
			case 'homepage' : 
				$settings['cwg_home_fullwidth_image1']	  = $_POST['cwg_home_fullwidth_image1'];
				$settings['cwg_home_fullwidth_image_content']	  = $_POST['cwg_home_fullwidth_image_content'];
				$settings['cwg_home_fullwidth_image_content_link']	  = $_POST['cwg_home_fullwidth_image_content_link'];
				$settings['cwg_home_fullwidth_image_content_link_title']	  = $_POST['cwg_home_fullwidth_image_content_link_title'];
				$settings['cwg_home_fullwidth_image2']	  = $_POST['cwg_home_fullwidth_image2'];
				$settings['cwg_home_fullwidth_image2_link']	  = $_POST['cwg_home_fullwidth_image2_link'];
				$settings['cwg_home_fullwidth_image2_content']	  = $_POST['cwg_home_fullwidth_image2_content'];
				$settings['cwg_home_split-section_image1_link']	  = $_POST['cwg_home_split-section_image1_link'];
				$settings['cwg_home_split-section_image2_link']	  = $_POST['cwg_home_split-section_image2_link'];
				$settings['cwg_home_split-section_logo']	  = $_POST['cwg_home_split-section_logo'];
				$settings['cwg_home_split-section-content']	  = $_POST['cwg_home_split-section-content'];
				$settings['cwg_home_split-section-title']	  = $_POST['cwg_home_split-section-title'];
				$settings['cwg_home_split-section_logo2']	  = $_POST['cwg_home_split-section_logo2'];
				$settings['cwg_home_split-section-content2']	  = $_POST['cwg_home_split-section-content2'];
				$settings['cwg_home_split-section-title2']	  = $_POST['cwg_home_split-section-title2'];
				
			break;
	    }
	}
	
	if( !current_user_can( 'unfiltered_html' ) ){
		if ( $settings['cwg_ga']  )
			$settings['cwg_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['cwg_ga'] ) ) );
		if ( $settings['cwg_home_fullwidth_image_content'] )
			$settings['cwg_home_fullwidth_image_content'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['cwg_home_fullwidth_image_content'] ) ) );
			
		if ( $settings['cwg_home_fullwidth_image2_content'] )
			$settings['cwg_home_fullwidth_image2_content'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['cwg_home_fullwidth_image2_content'] ) ) );
			
		if ( $settings['cwg_home_split-section-content'] )
			$settings['cwg_home_split-section-content'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['cwg_home_split-section-content'] ) ) );
		if ( $settings['cwg_home_split-section-content2'] )
			$settings['cwg_home_split-section-content2'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['cwg_home_split-section-content2'] ) ) );
			
	}

	$updated = update_option( "cwg_theme_settings", $settings );
}

function cwg_admin_tabs( $current = 'homepage' ) { 
    $tabs = array( 'homepage' => 'Home', 'general' => 'General', 'footer' => 'Footer' ); 
    $links = array();
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";
        
    }
    echo '</h2>';
}

function cwg_settings_page() {
	global $pagenow;
	$settings = get_option( "cwg_theme_settings" );
	$theme_data = get_theme_data( get_stylesheet_directory_uri() . '/style.css' );
	$theme_data['Name'] = "CWG Custom WP Theme";
	?>
	
	<div class="wrap">
		<h2><?php echo $theme_data['Name']; ?> Settings</h2>
		
		<?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			
			if ( isset ( $_GET['tab'] ) ) cwg_admin_tabs($_GET['tab']); else cwg_admin_tabs('homepage');
		?>

		<div id="poststuff">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
				wp_nonce_field( "cwg-settings-page" ); 
				
				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
				
					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
					else $tab = 'homepage'; 
					
					echo '<table class="form-table">';
					switch ( $tab ){
						case 'general' :
							?>
							<!--<tr>
								<th><label for="cwg_tag_class">Tags with CSS classes:</label></th>
								<td>
									<input id="cwg_tag_class" name="cwg_tag_class" type="checkbox" <?php if ( $settings["cwg_tag_class"] ) echo 'checked="checked"'; ?> value="true" /> 
									<span class="description">Output each post tag with a specific CSS class using its slug.</span>
								</td>
							</tr>-->
							<?php
						break; 
						case 'footer' : 
							?>
							<!--<tr>
								<th><label for="cwg_ga">Insert tracking code:</label></th>
								<td>
									<textarea id="cwg_ga" name="cwg_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["cwg_ga"] ) ); ?></textarea><br/>
									<span class="description">Enter your Google Analytics tracking code:</span>
								</td>
							</tr>-->
							<?php
						break;
						case 'homepage' : 
							?>
							<tr>
								<th><label for="cwg_home_fullwidth_image1">Image 1 URL</label></th>
								<td>
									<span class="description">Upload Image 1 here</span>
									<input id="cwg_home_fullwidth_image1" name="cwg_home_fullwidth_image1" value="<?php echo $settings["cwg_home_fullwidth_image1"]; ?>" ></input><br/>
									<input id="upload_image1_button" type="button" value="Upload Image" />
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image_content">Image 1 Content</label></th>
								<td>
									<span class="description">Enter the introductory text for the home page first image content</span>
									<textarea id="cwg_home_fullwidth_image_content" name="cwg_home_fullwidth_image_content" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["cwg_home_fullwidth_image_content"] ) ); ?></textarea><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image_content_link">Image 1 Content Link</label></th>
								<td>
									<span class="description">Enter the Link for the home page first image content</span><br/>
									<input id="cwg_home_fullwidth_image_content_link" name="cwg_home_fullwidth_image_content_link" value="<?php echo $settings["cwg_home_fullwidth_image_content_link"]; ?>"></input><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image_content_link_title">Image 1 Content Link Title</label></th>
								<td>
									<span class="description">Enter the Link Title for the home page first image content</span><br/>
									<input id="cwg_home_fullwidth_image_content_link_title" name="cwg_home_fullwidth_image_content_link_title" value="<?php echo $settings["cwg_home_fullwidth_image_content_link_title"]; ?>"></input><br/>
									
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr/>
									<hr/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image2">Image 2 URL</label></th>
								<td>
									<span class="description">Upload Image 2 here</span>
									<input id="cwg_home_fullwidth_image2" name="cwg_home_fullwidth_image2" value="<?php echo $settings["cwg_home_fullwidth_image2"]; ?>" ></input><br/>
									<input id="upload_image2_button" type="button" value="Upload Image" />
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image2_content">Image 2 Content</label></th>
								<td>
									<span class="description">Enter the introductory text for the home page second image content</span>
									<textarea id="cwg_home_fullwidth_image2_content" name="cwg_home_fullwidth_image2_content" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["cwg_home_fullwidth_image2_content"] ) ); ?></textarea><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_fullwidth_image2_link">Image 2 Profile Link</label></th>
								<td>
									<span class="description">Enter the Link for the home page 2nd image profile link</span><br/>
									<input id="cwg_home_fullwidth_image2_link" name="cwg_home_fullwidth_image2_link" value="<?php echo $settings["cwg_home_fullwidth_image2_link"]; ?>"></input><br/>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr/>
									<hr/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section_image1_link">Home Split Section Left Image URL</label></th>
								<td>
									<span class="description">Enter the Link for the home page split section left image URL</span><br/>
									<input id="cwg_home_split-section_image1_link" name="cwg_home_split-section_image1_link" value="<?php echo $settings["cwg_home_split-section_image1_link"]; ?>"></input><br/>
									<input id="upload_split_image1" type="button" value="Upload Image" />
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section-title">Left Split Section Title</label></th>
								<td>
									<span class="description">Enter the Title for the home page left split section content</span><br/>
									<input id="cwg_home_split-section-title" name="cwg_home_split-section-title" value="<?php echo $settings["cwg_home_split-section-title"]; ?>"></input><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section-content">Home Page Left Split Section Content</label></th>
								<td>
									<span class="description">Enter the text for the home page left split section content</span><br/>
									<textarea id="cwg_home_split-section-content" name="cwg_home_split-section-content" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["cwg_home_split-section-content"] ) ); ?></textarea><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section_logo">Home Left Split Section Logo</label></th>
								<td>
									<span class="description">Enter the Link for the home page left split section logo URL</span><br/>
									<input id="cwg_home_split-section_logo" name="cwg_home_split-section_logo" value="<?php echo $settings["cwg_home_split-section_logo"]; ?>"></input><br/>
									<input id="upload_split_logo" type="button" value="Upload Image" />
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section_image2_link">Home Page Split Section Right Image URL</label></th>
								<td>
									<span class="description">Enter the Link for the home page split section right image URL</span><br/>
									<input id="cwg_home_split-section_image2_link" name="cwg_home_split-section_image2_link" value="<?php echo $settings["cwg_home_split-section_image2_link"]; ?>"></input><br/>
									<input id="upload_split_image2" type="button" value="Upload Image" />
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section-title2">Right Split Section Title</label></th>
								<td>
									<span class="description">Enter the Title for the home page right split section content</span><br/>
									<input id="cwg_home_split-section-title2" name="cwg_home_split-section-title2" value="<?php echo $settings["cwg_home_split-section-title2"]; ?>"></input><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section-content2">Home Page right Split Section Content</label></th>
								<td>
									<span class="description">Enter the text for the home page right split section content</span><br/>
									<textarea id="cwg_home_split-section-content2" name="cwg_home_split-section-content2" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["cwg_home_split-section-content2"] ) ); ?></textarea><br/>
								</td>
							</tr>
							<tr>
								<th><label for="cwg_home_split-section_logo2">Home Right Split Section Logo</label></th>
								<td>
									<span class="description">Enter the Link for the home page right split section logo URL</span><br/>
									<input id="cwg_home_split-section_logo2" name="cwg_home_split-section_logo2" value="<?php echo $settings["cwg_home_split-section_logo2"]; ?>"></input><br/>
									<input id="upload_split_logo2" type="button" value="Upload Image" />
								</td>
							</tr>
							<?php
						break;
					}
					echo '</table>';
				}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
					<input type="hidden" name="cwg-settings-submit" value="Y" />
				</p>
			</form>
			
			<p><?php echo $theme_data['Name'] ?> by <a href="http://cookwheelwright.com/">Cook Wheelwright</a> </p>
		</div>

	</div>
<?php
}


?>