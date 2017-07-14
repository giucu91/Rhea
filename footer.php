<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>

</div><!-- .site-content -->
<?php zerif_before_footer_trigger(); ?>
<?php 
	if(is_active_sidebar( 'zerif-sidebar-footer' ) || is_active_sidebar( 'zerif-sidebar-footer-2' ) || is_active_sidebar( 'zerif-sidebar-footer-3' )):
		echo '<div class="footer-widget-wrap"><div class="container">';
		if(is_active_sidebar( 'zerif-sidebar-footer' )):
			echo '<div class="footer-widget col-xs-12 col-sm-4">';
			dynamic_sidebar( 'zerif-sidebar-footer' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-2' )):
			echo '<div class="footer-widget col-xs-12 col-sm-3 col-sm-offset-1">';
			dynamic_sidebar( 'zerif-sidebar-footer-2' );
			echo '</div>';
		endif;
		if(is_active_sidebar( 'zerif-sidebar-footer-3' )):
			echo '<div class="footer-widget col-xs-12 col-sm-3 col-sm-offset-1">';
			dynamic_sidebar( 'zerif-sidebar-footer-3' );
			echo '</div>';
		endif;
		echo '</div></div>';
	endif;
?>
<footer id="footer" role="contentinfo">
	<div class="bottom-footer">
		<div class="container">
			<?php zerif_top_footer_trigger(); ?>
			<div class="row">
				<div class="col-md-4 col-xs-12 pull-right">
					<?php

					// open link in a new tab when checkbox "accessibility" is not ticked
					$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );

					$zerif_socials_facebook = get_theme_mod( 'zerif_socials_facebook' );
					$zerif_socials_twitter = get_theme_mod( 'zerif_socials_twitter' );
					$zerif_socials_linkedin = get_theme_mod( 'zerif_socials_linkedin' );
					$zerif_socials_behance = get_theme_mod( 'zerif_socials_behance' );
					$zerif_socials_dribbble = get_theme_mod( 'zerif_socials_dribbble' );
					$zerif_socials_instagram = get_theme_mod( 'zerif_socials_instagram' );

					if(!empty($zerif_socials_facebook) || !empty($zerif_socials_twitter) || !empty($zerif_socials_linkedin) || !empty($zerif_socials_behance) || !empty($zerif_socials_dribbble) || !empty($zerif_socials_instagram) ):
						echo '<ul class="social">';
						
						/* facebook */
						if( !empty($zerif_socials_facebook) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_facebook).'"><i class="fa fa-facebook"></i></a></li>';
						endif;
						/* twitter */
						if( !empty($zerif_socials_twitter) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_twitter).'"><i class="fa fa-twitter"></i></a></li>';
						endif;
						/* linkedin */
						if( !empty($zerif_socials_linkedin) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
						endif;
						/* behance */
						if( !empty($zerif_socials_behance) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_behance).'"><i class="fa fa-behance"></i></a></li>';
						endif;
						/* dribbble */
						if( !empty($zerif_socials_dribbble) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_dribbble).'"><i class="fa fa-dribbble"></i></a></li>';
						endif;
						/* instagram */
						if( !empty($zerif_socials_instagram) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_instagram).'"><i class="fa fa-instagram"></i></a></li>';
						endif;
						echo '</ul>';
					endif;
					?>
				</div>
				<div class="col-md-8 col-xs-12 pull-left">
					<?php

					if( !empty($zerif_copyright) ):
						echo '<p id="zerif-copyright">'.wp_kses_post($zerif_copyright).'</p>';
					elseif( isset( $wp_customize ) ):
						echo '<p id="zerif-copyright" class="zerif_hidden_if_not_customizer"></p>';
					endif;
					
					echo '<div class="zerif-copyright-box">Build with <a class="zerif-copyright" href="https://georgeciobanu.com/rhea/"'.$attribut_new_tab.' rel="nofollow">Rhea </a>'.__('powered by','rhea').'<a class="zerif-copyright" href="http://wordpress.org/"'.$attribut_new_tab.' rel="nofollow"> WordPress</a></div>';

					?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php zerif_bottom_footer_trigger(); ?>
		</div>
	</div>
</footer> <!-- / END FOOOTER  -->

<?php zerif_after_footer_trigger(); ?>

	</div><!-- mobile-bg-fix-whole-site -->
</div><!-- .mobile-bg-fix-wrap -->


<?php wp_footer(); ?>
<?php zerif_bottom_body_trigger(); ?>

</body>

</html>