// Monolith by BigSpring
// Licensed under MIT Open Source
// Use this file to store your site-specific custom JS magic.

jQuery(document).ready(function($) {

	$(document).foundation({
        equalizer : {
            equalize_on_stack: true
        }
	});
	
	// hack to remove empty <p> tags
	$('p:empty').remove();
	
	// custom JS goes here

});