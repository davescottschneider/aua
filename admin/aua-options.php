<div class="wrap">
	<h2>Alternate User Admin</h2>
	<p>This plugin makes it easy to create a unique user experience for registered users of your Wordpress site by allowing complete customization of the look and feel of creating and editing posts. This plugin is ideal for use with a custom post type and can be fully customized with your own custom css.</p>
	<form method="post" action="options.php"> 
	<?php settings_fields( 'aua_options_group' ); ?>
	<?php do_settings_sections( 'aua_options_group' ); ?>
    <table class="form-table">
	    <tr>
		    <th scope="row">Select post type to use with alternate user admin.</th>
		</tr>
		<tr>
			<?php $post_types = get_post_types( '', 'names' ); 

			foreach ( $post_types as $post_type ) {
				$ischecked = get_option('aua-'.$post_type);
				//var_export( $ischecked );
				if ($ischecked == "on"){
					echo '<tr><td><input type="checkbox" checked name="aua-'.$post_type.'">' . $post_type . '</td></tr>';
				} else {
					echo '<tr><td><input type="checkbox" name="aua-'.$post_type.'">' . $post_type . '</td></tr>';
				}
			}
			?>
		</tr>
	</table>
	<?php
		submit_button();
	?>
	</form>
</div>
