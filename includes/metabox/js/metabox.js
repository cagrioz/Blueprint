jQuery(document).ready(function($) {

	// ---------------------------------------------------------
	//  	Audio
	// ---------------------------------------------------------
		var audioOptions = jQuery('#blueprint_audio_format_metabox');
		var audioTrigger = jQuery('#post-format-audio');

		audioOptions.css('display', 'none');

	// ---------------------------------------------------------
	//  	Video
	// ---------------------------------------------------------
		var videoOptions = jQuery('#blueprint_video_format_metabox');
		var videoTrigger = jQuery('#post-format-video');

		videoOptions.css('display', 'none');

	// ---------------------------------------------------------
	//  	Gallery
	// ---------------------------------------------------------
		var galleryOptions = jQuery('#blueprint_gallery_format_metabox');
		var galleryTrigger = jQuery('#post-format-gallery');

		galleryOptions.css('display', 'none');

	// ---------------------------------------------------------
	//  	Core
	// ---------------------------------------------------------
		var group = jQuery('#post-formats-select input');

		group.change( function() {

			if(jQuery(this).val() == 'audio') {
				audioOptions.css('display', 'block');
				BlueprintHideAll(audioOptions);

			} else if(jQuery(this).val() == 'gallery') {
				galleryOptions.css('display', 'block');
				BlueprintHideAll(galleryOptions);

			} else if(jQuery(this).val() == 'video') {
				videoOptions.css('display', 'block');
				BlueprintHideAll(videoOptions);

			} else {
				videoOptions.css('display', 'none');
				audioOptions.css('display', 'none');
				galleryOptions.css('display', 'none');
			}

		});

		if(audioTrigger.is(':checked'))
			audioOptions.css('display', 'block');

		if(galleryTrigger.is(':checked'))
			galleryOptions.css('display', 'block');

		if(videoTrigger.is(':checked'))
			videoOptions.css('display', 'block');

		function BlueprintHideAll(notThisOne) {
			videoOptions.css('display', 'none');
			audioOptions.css('display', 'none');
			galleryOptions.css('display', 'none');
			notThisOne.css('display', 'block');
		}
	});
