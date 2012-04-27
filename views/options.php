<div class="wrap">
	<?php screen_icon() ?>
	<h2><?php _e( '2010 Rocks!', $this->textdomain ) ?></h2>
	<form method="post" action="options.php">
		<?php settings_fields( 'twentyten' ); ?>
		<?php settings_errors(); ?>
		<h3><?php _e( 'General Settings', $this->textdomain ) ?></h3>
		<table class="form-table"><tbody>
			<tr valign="top">
				<th scope="row"><?php _e( 'Logo', $this->textdomain ) ?></th>
				<td>
					<input class="regular-text" type="text" name="twentyten[logo]" value="<?php echo $options['logo'] ?>" /><input type="button" class="button-secondary media-upload" value="<?php _e( 'Upload', $this->textdomain ) ?>" />
					<p><?php _e( 'Width', $this->textdomain ) ?>: <input class="small-text" type="text" name="twentyten[logowidth]" value="<?php echo $options['logowidth'] ?>" /> <?php _e( 'Height', $this->textdomain ) ?>: <input class="small-text" type="text" name="twentyten[logoheight]" value="<?php echo $options['logoheight'] ?>" /></p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Layout', $this->textdomain ) ?></th>
				<td>
				<?php foreach( $this->layouts() as $layout ) : ?>
					<div class="layout image-radio-option theme-layout">
					<label class="description">
						<input type="radio" name="twentyten[layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['layout'], $layout['value'] ); ?> />
						<span>
							<img src="<?php echo esc_url( $this->base_url . 'images/' . $layout['value'] . '.gif' ); ?>" width="136" height="122" alt="" />
							<?php echo $layout['label']; ?>
						</span>
					</label>
					</div>
				<?php endforeach; ?>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Link color', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[link]" value="<?php echo $options['link'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Link hover color', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[linkhover]" value="<?php echo $options['linkhover'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
		</tbody></table>
		<h3><?php _e( 'Footer Settings', $this->textdomain ) ?></h3>
		<table class="form-table"><tbody>
			<tr valign="top">
				<th scope="row"><?php _e( 'Footer background', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[footerbg]" value="<?php echo $options['footerbg'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Footer color', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[footercolor]" value="<?php echo $options['footercolor'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Footer link color', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[footerlink]" value="<?php echo $options['footerlink'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e( 'Footer link hover color', $this->textdomain ) ?></th>
				<td>
					<input type="text" name="twentyten[footerlinkhover]" value="<?php echo $options['footerlinkhover'] ?>" />
					<div class="color-selector"></div>
					<a href="#" class="pick-color">Pick a color</a>
				</td>
			</tr>
		</tbody></table>
		<?php submit_button() ?>
	</form>
</div><!-- .wrap -->