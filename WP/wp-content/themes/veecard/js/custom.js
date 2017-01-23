jQuery(document).ready(function($) {


/********** jQuery Isotope Filterable Portfolio  **********/

var $container = $('#gallery');

if($container.length ) {
	$container.isotope({
	  itemSelector : '.view',
	  layoutMode : 'fitRows'
	});
}

var $optionSets = $('ul.filterable'),
$optionLinks = $optionSets.find('a');

$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('active') ) {
	return false;
	}
	var $optionSet = $this.parents('.filterable');
	$optionSet.find('li.active').removeClass('active');
	$this.parents('li').addClass('active');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
	key = $optionSet.attr('data-option-key'),
	value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		// changes in layout modes need extra logic
		changeLayoutMode( $this, options )
	} else {
		// otherwise, apply new options
		$container.isotope( options );
	}
	return false;
});

/********** jQuery Isotope Filterable Portfolio  **********/




/********** Prettyphoto Lightbox **********/	
	function buildPrettyPhoto() {
        jQuery("a[data-rel^='prettyPhoto'], a.prettyPhoto, a[rel^='prettyPhoto']").prettyPhoto({
			overlay_gallery: false
		});
	}
	buildPrettyPhoto();
/********** Prettyphoto Lightbox **********/



/********** Mobile Menu **********/	

	mainNavMenu(jQuery("#top-menu") , 0);
	function mainNavMenu(parent , level){
		jQuery(parent).children("li").each(function(i , obj){
			var label = "";
			for(var k = 0 ; k < level ; k++){
				label += "&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			label += jQuery(obj).children("a").text();
			jQuery("#responsive-top-menu").append("<option value = '" + jQuery(obj).children("a").attr("href") + "'>" + label + "</option>");
			
			if(jQuery(obj).children("ul").size() == 1){
				mainNavChildren(jQuery(obj).children("ul") , level + 1);
			}
		});
	}

	jQuery('#menu-button').live('click', function() {
		jQuery('#top-menu ul').toggle();
		return false;
	})

	/*WIDTH RESIZE*/	
	var currentWindowWidth = jQuery(window).width();
	jQuery(window).resize(function(){
		currentWindowWidth = jQuery(window).width();
		if(currentWindowWidth > 480) {jQuery('#top-menu ul').show()}  else {jQuery('#top-menu ul').hide() }
	});


	/*WIDTH RESIZE*/

/********** Mobile Menu **********/




});





