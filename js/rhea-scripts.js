jQuery(document).ready(function(){
	window.rhea_nav = 'closed';

	jQuery('#nav-icon').click(function(){
		jQuery(this).toggleClass('open');

		if ( window.rhea_nav == 'closed' ) {
			var top = jQuery(".burger-menu-container").offset().top;
			var right = jQuery(window).width() - (jQuery('.burger-menu-container').offset().left + 30);
			jQuery('body').addClass('nav_opend');
			jQuery('.burger-menu-container').css({ 'top': top+'px', 'right': right+'px' });
			jQuery('.full-navigation').addClass('open');
			window.rhea_nav = 'open';
		}else{
			window.rhea_nav = 'closed';
			jQuery('body').removeClass('nav_opend');
			jQuery('.full-navigation').removeClass('open');
			jQuery('.full-navigation').addClass('close');
			setTimeout(function() { jQuery('.full-navigation').removeClass('close'); }, 500);
			jQuery('.burger-menu-container').removeAttr('style');
		}

	});

	jQuery("#sticky-header").sticky({topSpacing:0});
	jQuery(window).resize(function(){
		var sticky_height = jQuery('#sticky-header').height();
		jQuery('header#home').css('margin-bottom',sticky_height);
	}).trigger('resize');

	// Mobile Menu
	jQuery('.rhea-primary-menu .burger-menu-icon').click(function(){
		jQuery(this).toggleClass('open');
		jQuery('.rhea-primary-menu').toggleClass('mobile-menu-open');
	});

});