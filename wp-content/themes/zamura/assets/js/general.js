// JavaScript Document
jQuery(document).ready(function() {
	
	var zamuraViewPortWidth = '',
		zamuraViewPortHeight = '';

	function zamuraViewport(){

		zamuraViewPortWidth = jQuery(window).width(),
		zamuraViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( zamuraViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var zamuraSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var zamuraSiteHeaderWidth = jQuery('.site-header').width();
			var zamuraSiteHeaderPadding = ( zamuraSiteHeaderWidth * 2 )/100;
			var zamuraMenuHeight = jQuery('.menu-container').height();
			
			var zamuraMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var zamuraMenuPadding = ( zamuraSiteHeaderHeight - ( (zamuraSiteHeaderPadding * 2) + zamuraMenuHeight ) )/2;
			var zamuraMenuButtonsPadding = ( zamuraSiteHeaderHeight - ( (zamuraSiteHeaderPadding * 2) + zamuraMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':zamuraMenuPadding});
			jQuery('.site-buttons').css({'padding-top':zamuraMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		zamuraViewport();
		
	});
	
	zamuraViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( zamuraViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

    var owl = jQuery("#zamura-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });			
	
});		