
(function($) {

	"use strict";
	var Map = {

		init: function() {
			//Map
			this.map();
		},
		map: function(){
			$('.grve-map').each( function() {
				var map = $(this),
					gmapLat = map.attr('data-lat'),
					gmapLng = map.attr('data-lng');

				var gmapZoom = parseInt( map.attr('data-zoom') ) ? parseInt( map.attr('data-zoom') ) : 14;
				var gmapDisableStyle = map.attr('data-disable-style') ? map.attr('data-disable-style') : 'no';

				var gmapLatlng = new google.maps.LatLng( gmapLat, gmapLng );
				var gmapCustomEnabled = parseInt(movedo_grve_maps_data.custom_enabled);
				var gmapCustomCode = getStyleJSON(movedo_grve_maps_data.custom_code);
				var gmapLabelEnabled = parseInt(movedo_grve_maps_data.label_enabled);
				var gmapZoomEnabled = parseInt(movedo_grve_maps_data.zoom_enabled);
				var gmapTypeControl = parseInt(movedo_grve_maps_data.type_control);
				var gmapGestureHandling = movedo_grve_maps_data.gesture_handling;
				var labelEnabled = 'off';

				var styles = [];
				if ( 1 == gmapLabelEnabled ) {
					labelEnabled = 'on';
				}

				if ( 1 == gmapCustomEnabled && 'no' == gmapDisableStyle ) {
					styles = [
					  {
							"featureType": "water",
							"stylers": [
								{ "color": movedo_grve_maps_data.water_color }
							]
						},{
							"featureType": "landscape",
							"stylers": [
								{ "color": movedo_grve_maps_data.lanscape_color }
							]
						},{
							"featureType": "poi",
							"stylers": [
								{ "color": movedo_grve_maps_data.poi_color }
							]
						},{
							"featureType": "road",
							"elementType": "geometry",
							"stylers": [
								{ "color": movedo_grve_maps_data.road_color }
							]
						},{
							"featureType": "transit",
							"stylers": [
								{ "visibility": "off" }
							]
						},{
							"elementType": "labels.icon",
							"stylers": [
								{ "visibility": "off" }
							]
						},{
							"elementType": "labels.text",
							"stylers": [
								{ "visibility": labelEnabled },
							]
						},{
							"elementType": "labels.text.fill",
							"stylers": [
								{ "color": movedo_grve_maps_data.label_color }
							]
						},{
							"elementType": "labels.text.stroke",
							"stylers": [
								{ "color": movedo_grve_maps_data.label_stroke_color }
							]
						},{
							"featureType": "administrative.country",
							"elementType": "geometry",
							"stylers": [
								{ "color": movedo_grve_maps_data.country_color }
							]
						}
					];
				} else if ( 2 == gmapCustomEnabled && 'no' == gmapDisableStyle ) {
					styles = gmapCustomCode;
				}

				var defaultUI = false,
					enableZoomControl = true;
				if ( 0 != gmapCustomEnabled ) {
					defaultUI = true;
					if ( 1 == gmapZoomEnabled ) {
						enableZoomControl = true;
					} else {
						enableZoomControl = false;
					}
				}

				var enableMapTypeControl = false;

				if ( 1 == gmapTypeControl ) {
					enableMapTypeControl = true;
				} else {
					enableMapTypeControl = false;
				}

				var mapOptions = {
					zoom: gmapZoom,
					center: gmapLatlng,
					draggable: true,
					scrollwheel: false,
					zoomControl: enableZoomControl,
					gestureHandling: gmapGestureHandling,
					disableDefaultUI: defaultUI,
					mapTypeControl: enableMapTypeControl,
					mapTypeControlOptions: {
						mapTypeIds: ['roadmap', 'hybrid', 'satellite', 'terrain'],
						style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
					},
					styles: styles,
					zoomControlOptions: {
						style: google.maps.ZoomControlStyle.SMALL,
						position: google.maps.ControlPosition.LEFT_CENTER
					}
				};
				var gmap = new google.maps.Map( map.get(0), mapOptions );

				var mapBounds = new google.maps.LatLngBounds();
				var markers = [];

				map.parent().children('.grve-map-point').each( function(i) {

					var mapPoint = $(this),
					gmapPointMarker = mapPoint.attr('data-point-marker'),
					gmapPointTitle = mapPoint.attr('data-point-title'),
					gmapPointOpen = mapPoint.attr('data-point-open'),
					gmapPointLat = parseFloat( mapPoint.attr('data-point-lat') ),
					gmapPointLng = parseFloat( mapPoint.attr('data-point-lng') ),
					gmapPointType = mapPoint.attr('data-point-type') != undefined ? mapPoint.attr('data-point-type') : 'image',
					gmapBgColor = mapPoint.attr('data-point-bg-color') != undefined ? mapPoint.attr('data-point-bg-color') : 'black';
					var pointLatlng = new google.maps.LatLng( gmapPointLat , gmapPointLng );
					var data = mapPoint.html();
					var gmapPointInfo = data.trim();

					var pointMarker = "";

					var marker = new google.maps.Marker({
					  position: pointLatlng,
					  clickable: gmapPointInfo ? true : false,
					  map: gmap,
					  icon: gmapPointMarker,
					  title: gmapPointTitle,
					});

					if( '' === gmapPointType ) {
						gmapPointType = 'image';
					}

					if( 'image' != gmapPointType ) {
						var customMarker = new CustomMarker(
							pointLatlng,
							gmap,
							{
								type: gmapPointType,
								bg_color: gmapBgColor,
								clickable: gmapPointInfo ? true : false,
								title: gmapPointTitle,
							}
						);
						pointMarker = customMarker;
					} else {
						pointMarker = marker;
					}

					if ( gmapPointInfo ) {
						var infowindow = new google.maps.InfoWindow({
							content: data
						});

						google.maps.event.addListener(pointMarker, 'click', function() {
							infowindow.open(gmap,pointMarker);
						});
						if ( 'yes' == gmapPointOpen ) {
							setTimeout(function () {
								infowindow.open(gmap,pointMarker);
							},2000);
						}
					}
					markers.push(marker);
					mapBounds.extend(marker.position);
				});

				if ( map.parent().children('.grve-map-point').length > 1 ) {
					gmap.fitBounds(mapBounds);
					$(window).on( "resize", function() {
						gmap.fitBounds(mapBounds);
					});
				} else {
					$(window).on( "resize", function() {
						gmap.panTo(gmapLatlng);
					});
				}

				$('.grve-map').on( "grve_redraw_map", function() {
					if ( map.parent().children('.grve-map-point').length > 1 ) {
						gmap.fitBounds(mapBounds);
					} else {
						gmap.panTo(gmapLatlng);
					}
				});


				map.css({'opacity':0});
				map.delay(600).animate({'opacity':1});

			});
		}
	};


	function getStyleJSON (str) {
		try {
			var o = JSON.parse(str);
			if (o && typeof o === "object") {
				return o;
			}
		}
		catch (e) {
			return false;
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	// Custom Marker
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	function CustomMarker(latlng, map, args) {
		this.latlng = latlng;
		this.args = args;
		this.setMap(map);
	}
	CustomMarker.prototype = new google.maps.OverlayView();

	CustomMarker.prototype.draw = function() {

		var self = this,
			div = this.div,
			markerBgColor = 'black',
			markerClickable = false,
			markerTitle = "",
			markerType = "";

		if (!div) {
			if (typeof(self.args.bg_color) !== 'undefined') {
				markerBgColor = self.args.bg_color;
			}
			if (typeof(self.args.clickable) !== 'undefined') {
				markerClickable = self.args.clickable;
			}
			if (typeof(self.args.title) !== 'undefined') {
				markerTitle = self.args.title;
			}
			if (typeof(self.args.type) !== 'undefined') {
				markerType = self.args.type;
			}

			if ( 'dot' == markerType ) {
				div = this.div = $('' +
				'<div>'+
				'<div class="grve-marker-dot" title="' + markerTitle + '">' +
				'<div class="grve-dot grve-bg-' + markerBgColor + '"></div>' +
				'</div>' +
				'</div>' +
				'')[0];
			} else {
				div = this.div = $('' +
				'<div>'+
				'<div class="grve-marker-pulse-dot" title="' + markerTitle + '">' +
				'<div class="grve-dot grve-bg-' + markerBgColor + '"></div>' +
				'<div class="grve-first-pulse grve-bg-' + markerBgColor + '"></div>' +
				'<div class="grve-second-pulse grve-bg-' + markerBgColor + '"></div>' +
				'</div>' +
				'</div>' +
				'')[0];
			}


			div.style.position = 'absolute';
			div.style.paddingLeft = '0px';
			if ( markerClickable ) {
				div.style.cursor = 'pointer';
			}

			google.maps.event.addDomListener(div, "click", function(event) {
				google.maps.event.trigger(self, "click");
			});

			var panes = this.getPanes();
			panes.overlayImage.appendChild(div);
		}

		var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

		if (point) {
			div.style.left = point.x + 'px';
			div.style.top = point.y + 'px';
		}
	};

	CustomMarker.prototype.remove = function() {
		if (this.div) {
			this.div.parentNode.removeChild(this.div);
			this.div = null;
		}
	};

	CustomMarker.prototype.getPosition = function() {
		return this.latlng;
	};
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	// GLOBAL VARIABLES
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};

	Map.init();

	$(window).on("orientationchange",function(){

		setTimeout(function () {
			Map.init();
		},500);

	});

	$('.grve-tab-link').on('click', function() {
		var tabRel = $(this).attr('data-rel');
		if ( '' != tabRel && $(tabRel + ' .grve-map').length ) {
			setTimeout(function () {
				$('.grve-map').trigger( "grve_redraw_map" );
			},500);
		}
	});

	$(window).on('load',function () {

		var userAgent = userAgent || navigator.userAgent;
		var isIE = userAgent.indexOf("MSIE ") > -1 || userAgent.indexOf("Trident/") > -1 || userAgent.indexOf("Edge/") > -1;

		if ( $('#grve-body').hasClass( 'compose-mode' ) || ( $('#grve-feature-section .grve-map').length && isIE ) ) {
			$('.grve-map').trigger( "grve_redraw_map" );
		}

	});

})(jQuery);