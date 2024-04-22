jQuery(document).ready(function($) {

	"use strict";

	var grveFeatureSliderFrame;
	var grveFeatureSliderContainer = $( "#grve-feature-slider-container" );
	grveFeatureSliderContainer.sortable();

	$(document).on("click",".grve-feature-slider-item-delete-button",function() {
		$(this).parent().remove();
	});

	$(document).on("click",".grve-upload-feature-slider-post-button",function() {

		var post_ids = $('#grve-upload-feature-slider-post-selection').val();
		if( '' != post_ids ) {

			var dataParams = {
				action:'movedo_grve_get_admin_feature_slider_media',
				post_ids: post_ids.toString(),
				_grve_nonce: movedo_grve_upload_feature_slider_texts.nonce_feature_slider_media
			};
			$.post( movedo_grve_upload_feature_slider_texts.ajaxurl, dataParams, function( mediaHtml ) {
				grveFeatureSliderContainer.append(mediaHtml);
				$(this).grveFeatureSliderUpdatefunctions();
			}).fail(function(xhr, status, error) {
				$('#grve-upload-feature-slider-button-spinner').hide();
			});
		}

	});

	$(document).on("click",".grve-upload-feature-slider-button",function() {

		if ( grveFeatureSliderFrame ) {
			grveFeatureSliderFrame.open();
			return;
		}

		grveFeatureSliderFrame = wp.media.frames.grveFeatureSliderFrame = wp.media({
			className: 'media-frame grve-media-feature-slider-frame',
			frame: 'select',
			multiple: 'toggle',
			title: movedo_grve_upload_feature_slider_texts.modal_title,
			library: {
				type: 'image'
			},
			button: {
				text:  movedo_grve_upload_feature_slider_texts.modal_button_title
			}

		});
		grveFeatureSliderFrame.on('select', function(){
			var selection = grveFeatureSliderFrame.state().get('selection');
			var ids = selection.pluck('id');

			$('#grve-upload-feature-slider-button-spinner').show();
			var dataParams = {
				action:'movedo_grve_get_admin_feature_slider_media',
				attachment_ids: ids.toString(),
				_grve_nonce: movedo_grve_upload_feature_slider_texts.nonce_feature_slider_media
			};
			$.post( movedo_grve_upload_feature_slider_texts.ajaxurl, dataParams, function( mediaHtml ) {
				grveFeatureSliderContainer.append(mediaHtml);
				$(this).grveFeatureSliderUpdatefunctions();
			}).fail(function(xhr, status, error) {
				$('#grve-upload-feature-slider-button-spinner').hide();
			});
		});
		grveFeatureSliderFrame.on('ready', function(){
			$( '.media-modal' ).addClass( 'grve-media-no-sidebar' );
		});


		grveFeatureSliderFrame.open();
	});

	$.fn.grveFeatureSliderUpdatefunctions = function(){
		$('.grve-slider-item.grve-item-new .wp-color-picker-field').wpColorPicker();
		$('.grve-slider-item.grve-item-new').removeClass('grve-item-new');
		$('#grve-upload-feature-slider-button-spinner').hide();
		$( "[data-dependency]" ).grveInitFieldsDependency();
	};

});
