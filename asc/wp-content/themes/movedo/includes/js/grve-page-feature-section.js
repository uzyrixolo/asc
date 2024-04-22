(function($) {

	"use strict";

	//Feature Element Selector
	$(document).on("change","#grve-page-feature-element",function() {

		$('.grve-feature-section-item').hide();
		$('.grve-feature-required').hide();
		$('.grve-feature-options-wrapper').show();

		switch($(this).val())
		{
			case "title":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-tab-content-link').trigger('click');
				$('.grve-item-feature-content-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-extra-settings').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-container').stop( true, true ).fadeIn(500);
			break;
			case "image":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-tab-bg-link').trigger('click');
				$('.grve-item-feature-bg-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-content-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-image-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-overlay-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-button-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-extra-settings').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-container').stop( true, true ).fadeIn(500);

			break;
			 case "video":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-tab-video-link').trigger('click');
				$('.grve-item-feature-video-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-bg-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-content-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-overlay-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-button-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-extra-settings').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-container').stop( true, true ).fadeIn(500);
			break;
			case "youtube":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-tab-youtube-link').trigger('click');
				$('.grve-item-feature-youtube-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-bg-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-content-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-overlay-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-button-settings').stop( true, true ).fadeIn(500);
				$('.grve-item-feature-extra-settings').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-container').stop( true, true ).fadeIn(500);
			break;
			case "slider":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-section-slider').stop( true, true ).fadeIn(500);
				$('#grve-feature-slider-container').stop( true, true ).fadeIn(500);
			break;
			case "map":
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-section-map').stop( true, true ).fadeIn(500);
				$('#grve-feature-map-container').stop( true, true ).fadeIn(500);
			break;
			case "revslider":
				$('.grve-feature-options-wrapper').hide();
				$('#grve-feature-section-options').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-tab-revslider-link').trigger('click');
				$('.grve-item-feature-revslider-settings').stop( true, true ).fadeIn(500);
				$('#grve-feature-single-container').stop( true, true ).fadeIn(500);
			break;
			default:
			break;
		}
	});

	$(document).on("change","#grve-page-feature-size",function() {
		if( 'custom' == $(this).val() ) {
			$('#grve-feature-section-height').stop( true, true ).fadeIn(500);
		} else {
			$('#grve-feature-section-height').hide();
		}
	});

	$(document).on("change",".grve-select-color-extra",function() {
		if( 'custom' == $(this).val() ) {
			$(this).parents('.grve-field-items-wrapper').find('.grve-wp-colorpicker').show();
		} else {
			$(this).parents('.grve-field-items-wrapper').find('.grve-wp-colorpicker').hide();
		}
	});

	//Feature Map
	$(document).on("click","#grve-upload-multi-map-point",function() {
		$('#grve-upload-multi-map-point').attr('disabled','disabled').addClass('disabled');
		$('#grve-upload-multi-map-button-spinner').show();

		var dataParams = {
			action:'movedo_grve_get_map_point',
			map_mode:'new',
			_grve_nonce: movedo_grve_feature_section_texts.nonce_map_point
		};

		$.post( movedo_grve_feature_section_texts.ajaxurl, dataParams, function( mediaHtml ) {
			$('#grve-feature-map-container').append(mediaHtml);
			$('#grve-upload-multi-map-point').removeAttr('disabled').removeClass('disabled');
			$('#grve-upload-multi-map-button-spinner').hide();
		}).fail(function(xhr, status, error) {
			$('#grve-upload-multi-map-point').removeAttr('disabled').removeClass('disabled');
			$('#grve-upload-multi-map-button-spinner').hide();
		});
	});
	$(document).on("click",".grve-map-item-delete-button",function() {
		$(this).parent().remove();
	});
	$(document).on("click",".postbox.grve-toggle-new .handlediv",function() {
		var p = $(this).parent('.postbox');
		p.toggleClass('closed');
	});

	// TABS METABOXES
	$(document).on("click",".grve-tabs .grve-tab-links a",function(e) {
		var currentAttrValue = $(this).attr('href');
		$('.grve-tabs ' + currentAttrValue).show().siblings().hide();
		$(this).parent('li').addClass('active').siblings().removeClass('active');
		e.preventDefault();
	});

	// LABEL TITLES
	$(document).on("change",".grve-admin-label-update",function() {
		var itemID = $(this).attr('id') + '_admin_label';
		$('#' + itemID ).html($(this).val());
	});

	// FIELDS DEPENDENCY
	$(document).on("change",".grve-dependency-field",function() {
		$(this).grveFieldsDependency();
	});

	$.fn.grveFieldsDependency = function(){

		var groupID = $(this).data( "group");

		$('#' + groupID + " [data-dependency] ").each(function() {
			var dataDependency = $(this).data( "dependency"),
				show = true;

			for (var i = 0; i < dataDependency.length; i++) {

				var depId = dataDependency[i].id,
					depValues = dataDependency[i].values,
					depNotEqualValue = dataDependency[i].value_not_equal_to,
					depVal = $('#' + depId ).val();

				if( depNotEqualValue ) {
					if($.inArray( depVal, depNotEqualValue ) == -1){
						show = true;
					} else {
						show = false;
					}
				} else {
					if($.inArray( depVal, depValues ) == -1){
						show = false;
					}
				}

			}

			if( show ) {
				$(this).fadeIn(500);
			} else {
				$(this).hide();
			}
		});
	};

	$.fn.grveInitFieldsDependency = function(){

		$(this).each(function() {
			var dataDependency = $(this).data( "dependency"),
				show = true;

			for (var i = 0; i < dataDependency.length; i++) {

				var depId = dataDependency[i].id,
					depValues = dataDependency[i].values,
					depNotEqualValue = dataDependency[i].value_not_equal_to,
					depVal = $('#' + depId ).val();

				if( depNotEqualValue ) {
					if($.inArray( depVal, depNotEqualValue ) == -1){
						show = true;
					} else {
						show = false;
					}
				} else {
					if($.inArray( depVal, depValues ) == -1){
						show = false;
					}
				}

			}

			if( show ) {
				$(this).fadeIn(500);
			} else {
				$(this).hide();
			}

		});

	};

	$(function() {
		$('.wp-color-picker-field').wpColorPicker();
		$( "[data-dependency]" ).grveInitFieldsDependency();
	});

	$(window).on('load',function() {
		$('#grve-page-feature-element').trigger('change');
		$('#grve-page-feature-size').trigger('change');
		$('.grve-select-color-extra').trigger('change');
	});

})( jQuery );