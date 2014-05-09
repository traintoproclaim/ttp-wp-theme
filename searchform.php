<?php
?>
<div class="search">
	<form method="get" id="searchform" class="form-inline form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'twentyeleven' ); ?></label>
		<input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'ttp' ); ?>" />
	</form>
</div>