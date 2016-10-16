<?php zerif_before_about_us_trigger(); ?>

<section class="about-us" id="aboutus">

	<?php zerif_top_about_us_trigger(); ?>

	<div class="container">

	<?php
		// Left Side
		$rhea_left_side_title = get_theme_mod('rhea_about_us_left_title',__('We do','rhea'));
		$rhea_left_side_title_highlighted = get_theme_mod('rhea_about_us_left_title_highlight',__('big things','rhea'));
		$rhea_left_side_description = get_theme_mod('rhea_about_us_left_side_description',__('We love to work with startups because they are as passionate as we are about their products. Whether you need a full website redesign or just some sprucing up of current products, we want to help and make your startup dream a reality.','rhea'));

		$rhea_clients_title = get_theme_mod('rhea_about_us_clients_title', __('OUR HAPPY CLIENTS','rhea'));
		$rhea_clients_description = get_theme_mod('rhea_about_us_clients_description', __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.','rhea'));
	?>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 left-about-us">
			<h2 class="about-us-left-title">
				<?php if ( $rhea_left_side_title != '' ) {
					echo '<span class="normal">'.$rhea_left_side_title.'</span> ';
				}else{ ?>
					<span class="normal zerif_hidden_if_not_customizer"></span>
				<?php } ?>
				<?php if ( $rhea_left_side_title_highlighted != '' ) { ?>
					<span class="colored">
						<?php echo $rhea_left_side_title_highlighted ?>
					</span>
				<?php }else{ ?>
					<span class="colored zerif_hidden_if_not_customizer"></span>
				<?php } ?>
			</h2>
			<?php if ( $rhea_left_side_description != '' ) { ?>
				<p class="about-us-left-description"><?php echo $rhea_left_side_description ?></p>
			<?php }else{ ?>
				<p class="about-us-left-description zerif_hidden_if_not_customizer"></p>
			<?php } ?>
			<div class="progressbar-container">
				<?php if ( is_active_sidebar( 'sidebar-progress-bar' ) ) {
					dynamic_sidebar( 'sidebar-progress-bar' );
				}else{ ?>
					<div class="progress-holder">
						<h3><?php _e('CREATIVITY', 'rhea'); ?></h3>
						<span class="completion-rate" style="width: 70%">70%</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
						  </div>
						</div>
					</div>
					
					<div class="progress-holder">
						<h3><?php _e('DEVELOPMENT', 'rhea'); ?></h3>
						<span class="completion-rate" style="width: 87%">87%</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
						    <span class="sr-only">87% Complete (success)</span>
						  </div>
						</div>
					</div>

					<div class="progress-holder">
						<h3><?php _e('MARKETING', 'rhea'); ?></h3>
						<span class="completion-rate" style="width: 93%">93%</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 93%">
						    <span class="sr-only">93% Complete (success)</span>
						  </div>
						</div>
					</div>

					<div class="progress-holder">
						<h3><?php _e('WORDPRESS', 'rhea'); ?>/h3>
						<span class="completion-rate" style="width: 95%">95%</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						    <span class="sr-only">95% Complete (success)</span>
						  </div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 aboutus_boxes">
			<?php if ( is_active_sidebar( 'sidebar-right-aboutus' ) ) {
				dynamic_sidebar( 'sidebar-right-aboutus' );
			}else{ ?>
				<div class="about_us_box">
					<div class="header_aboutus_box">
						<div class="pull-left icon-holder">
							<i class="fa fa-lightbulb-o"></i>
						</div>
						<div class="aboutus_titles pull-left">
							<h4><?php _e('Our History', 'rhea'); ?></h4>
							<p><?php _e('Company was founded in 2016', 'rhea'); ?></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="aboutus_content">
						<p><?php _e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'rhea'); ?></p>
					</div>
				</div>
				<div class="about_us_box">
					<div class="header_aboutus_box">
						<div class="pull-left icon-holder">
							<i class="fa fa-lightbulb-o"></i>
						</div>
						<div class="aboutus_titles pull-left">
							<h4><?php _e('Our Mission', 'rhea'); ?></h4>
							<p><?php _e('Company was founded in 2016', 'rhea'); ?></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="aboutus_content">
						<p><?php _e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.', 'rhea'); ?></p>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>

</div> <!-- / END CONTAINER -->

	<?php zerif_bottom_about_us_trigger(); ?>
	
</section> <!-- END ABOUT US SECTION -->

<?php zerif_after_about_us_trigger(); ?>

<section class="clients">
	<div class="clients-container">
		<div class="container">
			<div class="row">
			<!-- CLIENTS -->
			<?php
				if(is_active_sidebar( 'sidebar-aboutus' )):
					echo '<div class="custom-clients col-lg-4 col-md-4 col-sm-6 col-xs-12">';
						if ( $rhea_clients_title != '' ) {
							echo '<h2>'.$rhea_clients_title.'</h2>';
						}else{
							echo '<h2 class="zerif_hidden_if_not_customizer"></h2>';
						}
						
						if ( $rhea_clients_description != '' ) {
							echo '<p>'.$rhea_clients_description.'</p>';
						}else{
							echo '<p class="zerif_hidden_if_not_customizer"></p>';
						}
						
					echo '</div>';

					echo '<div class="custom-client-list col-lg-8 col-md-8 col-sm-6 col-xs-12">';
						echo '<div data-scrollreveal="enter right move 60px after 0.00s over 2.5s">';
						dynamic_sidebar( 'sidebar-aboutus' );
						echo '</div>';
					echo '</div> ';
				endif;
			?>
			</div>
		</div>
	</div>
</section>