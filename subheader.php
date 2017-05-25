<header class="holder-header rhea-subheader" id="sticky-header">
	<div class="container">
		<div class="text-left col-md-3 col-sm-3 col-xs-6">
			<?php
				if( has_custom_logo() ) {
					the_custom_logo();
				} else {
				?>
					<div class="site-title-tagline-wrapper">
						<h1 class="site-title">
							<a href=" <?php echo esc_url( home_url( '/' ) ) ?> ">
								<?php bloginfo( 'title' ) ?>
							</a>
						</h1>

						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( ! empty( $description ) ) : ?>

							<p class="site-description">

								<?php echo $description; ?>

							</p> <!-- /.site-description -->

						<?php elseif( is_customize_preview() ): ?>

						<p class="site-description"></p>

						<?php endif; ?>

					</div> <!-- /.site-title-tagline-wrapper -->

			<?php } ?>
		</div>
		<div class="rhea-primary-menu col-md-9 col-sm-9 col-xs-6">
			<div class="mobile-menu-burger">
				<div class="">
					<div class="burger-menu-icon">
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					  	<span></span>
					</div>
				</div>
			</div>

			<?php do_action( 'rhea_output_menu' ); ?>

		</div>
		
	</div>
</header>