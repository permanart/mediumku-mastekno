<?php
add_action('admin_menu', 'mediumku_menu');
function mediumku_menu() {
	add_menu_page('mediumku Panel', 'mediumku Panel', 'administrator','configuration', 'configuration','dashicons-editor-kitchensink',81 );
	add_submenu_page( 'configuration', 'Dashboard', 'Dashboard', 'administrator', 'configuration','configuration');
	$submenu['configuration'][0][0] = 'Dashboard';
	add_action( 'admin_init', 'register_mediumku_settings' );
}
function register_mediumku_settings() {
	register_setting( 'mediumku-settings', 'adsheader' );
	register_setting( 'mediumku-settings', 'adssingle' );
	register_setting( 'mediumku-settings', 'adsfooter' );
	register_setting( 'mediumku-settings', 'featured' );
}
function dashboard() { 
?>
<div class="wrap">
<h2>Dashboard</h2>
</div>
<?php }
function configuration() {
?>
<div class="wrap">
<h2>Mediumku Panel</h2>
<form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields( 'mediumku-settings' ); ?>
    <?php do_settings_sections( 'mediumku-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Ads Header</th>
        <td><textarea type="text/javascript" name="adsheader" rows="10" cols="50" value="<?php echo esc_attr( get_option('adsheader') ); ?>" class="large-text code" placeholder="Place your ads code here"><?php echo esc_attr( get_option('adsheader') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Ads Single Post</th>
        <td><textarea type="text/javascript" name="adssingle" rows="10" cols="50" value="<?php echo esc_attr( get_option('adssingle') ); ?>" class="large-text code" placeholder="Place your ads code here"><?php echo esc_attr( get_option('adssingle') ); ?></textarea></td>
        </tr>        
        <tr valign="top">
        <th scope="row">Ads Footer</th>
        <td><textarea type="text/javascript" name="adsfooter" rows="10" cols="50" value="<?php echo esc_attr( get_option('adsfooter') ); ?>" class="large-text code" placeholder="Place your ads code here"><?php echo esc_attr( get_option('adsfooter') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Featured Image Single Post</th>
	<td>
		<select name="featured">
    			<option value="1" <?php if ( esc_attr( get_option('featured') ) == '1' ) echo 'selected="selected"'; ?>>Enable</option>
    			<option value="0" <?php if ( esc_attr( get_option('featured') ) == '0' ) echo 'selected="selected"'; ?>>Disable</option>
		</select>
	</td>
        </tr>
    </table>  
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>