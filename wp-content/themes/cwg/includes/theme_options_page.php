<?

if ( is_admin() ){
	add_action( 'admin_menu', 'custom_theme_options' );

}

/*------Registering Options-------*/
function register_mysettings() { // whitelist options
  register_setting( 'sociallink-group', 'facebook' );
  register_setting( 'sociallink-group', 'twitter' );
  register_setting( 'sociallink-group', 'linkedin' );
  register_setting( 'callus-group', 'callusNumber' );
}

function custom_theme_options() {
	add_theme_page( 'Customize your Theme', 'Theme Options', 'edit_theme_options', 'customise_theme_option_menu', 'custom_theme_options_page' );
	
	add_action( 'admin_init', 'register_mysettings' );
}

/*---The Actual Theme Options Page-----*/
function custom_theme_options_page() {
	if ( !current_user_can( 'edit_theme_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
<div class="wrap">
<h2>Theme Options</h2>
<div class="option-grp-holder">
	<form method="post" action="options.php">
	    <?php settings_fields( 'sociallink-group' ); ?>
	    <?php do_settings_sections( 'sociallink-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        <th scope="row">Facebook Url:</th>
	        <td><input type="text" name="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" /></td>
	        </tr>
	         
	        <tr valign="top">
	        <th scope="row">Twitter Url:</th>
	        <td><input type="text" name="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" /></td>
	        </tr>
	        
	        <tr valign="top">
	        <th scope="row">LinkedIn Url:</th>
	        <td><input type="text" name="linkedin" value="<?php echo esc_attr( get_option('linkedin') ); ?>" /></td>
	        </tr>
	        
	    </table>
	    
	    <?php submit_button(); ?>
	</form>
	<form method="post" action="options.php">
		<?php settings_fields( 'callus-group' ); ?>
	    <?php do_settings_sections( 'callus-group' ); ?>
	    <table>
	    	<tr valign="top">
	        <th scope="row">Call Us Number:</th>
	        <td><input type="text" name="callusNumber" value="<?php echo esc_attr( get_option('callusNumber') ); ?>" /></td>
	        </tr>
	    </table>
	    <?php submit_button(); ?>
	</form>
</div>
</div>
	<?
}
?>