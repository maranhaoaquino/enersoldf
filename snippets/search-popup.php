<form method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="navbar-search" class="sr-only">
		<?php _e( 'Search:', 'odin' ); ?>
	</label>
    <div class="form-group">
		<input type="search" value="<?php echo get_search_query(); ?>" class="form-control" name="s" id="navbar-search" />
	</div>
	<button type="submit" class="btn btn-default"><?php _e( 'Search', 'odin' ); ?></button>
</form>