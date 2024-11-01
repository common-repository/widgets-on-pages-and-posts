<?php
/**
 * Provide a admin area view for the plugin
 *
 * @link
 * @since      1.0.0
 *
 * @package    Widgets_On_Pages
 * @subpackage Widgets_On_Pages/admin/partials
 */

?>
<div class="wrap">
	<div id="icon-tools" class="icon32"></div>
	<h2>Widgets on Pages: Options</h2>
	<form method="post" action="options.php">
		<?php
		wp_nonce_field( 'update-options' );
		settings_fields( 'wop_options' );
		$options = get_option( 'wop_options_field' );
		if ( ! is_array( $options ) ) {
			$options = array();
		}
		if ( array_key_exists( 'enable_css', $options ) ) {
			$enable_css = $options['enable_css'];
		} else {
			$enable_css = '0';
		}
		?>

		<table class="form-table wop-form-table">

			<tr valign="top">
				<td>
					<h3>Enable styling (remove bullets etc)</h3>

					<?php echo '<input name="wop_options_field[enable_css]" type="checkbox" value="1" class="code" ' . checked( 1, $enable_css, false ) . ' />';
					?>
					<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'widgets-on-pages' )  ?>" />
					<input type="hidden" name="action" value="update" />
					</p>
				</td>
			</tr>
			<tr>
			</tr>
			<tr><td>
				<h3>Additional Sidebars</h3>
				<p><strong>Note:</strong> Additional sidebars are now managed under the <a href="<?php echo admin_url( 'edit.php?post_type=turbo-sidebar-cpt' ); ?>">Turbo Sidebars menu item</a>.</p>

			</td></tr>
		</table>

	</form>
</div>
