// =======================================================================//
// CONFIGURATION                                                         //
// =====================================================================//

	// =======================================================================//
	// Set the number of Blog Posts to be loaded when "Load more" is trigged //
	// =====================================================================//

		var limitPosts = 6;

	// =======================================================================//
	// Twitter username                                                      //
	// =====================================================================//

		var twitterUser = 'ResetBlueArt';

	// =======================================================================//
	// Google Maps                                                           //
	// =====================================================================//

		var google_maps_latitude = 43.724682;
		var google_maps_longitude = 10.402522;
		var google_maps_zoom = 4;
		var google_maps_circle_radius = 290000;
		var google_maps_circle_stroke_color = '#262626';
		var google_maps_circle_fill_color = '#333333';
		var google_maps_landscape_color = '#777777';
		var google_maps_water_color = '#F9F9F9';

// =======================================================================//
// END CONFIGURATION                                                     //
// =====================================================================//


// =======================================================================//
// Do not edit this code unless you know what you are doing!             //
// =====================================================================//


		$(window).load(function() {

			// preload images

			$("#preload").fadeOut();
			$("#preload-wrapper").delay(350).fadeOut("slow");

			// set background slider width and height

			var ww = $(window).width();
			var wh = $(window).height();

			$('#homepage, #background-slider img.sliderImg').css({
				width : ww + 'px' ,
				height : wh + 'px'
			});

			// set video height

			var videoWidth = $(".video-js").width();
			var videoHeight = Math.floor(videoWidth / 1.77);

			$('.video-js').css({
				height : videoHeight + 'px'
			});

		});


		$(window).resize(function(){

			// preload images

			$("#preload").fadeOut();
			$("#preload-wrapper").delay(350).fadeOut("slow");

			// set background slider width and height

			var ww = $(window).width();
			var wh = $(window).height();

			$('#homepage, #background-slider img.sliderImg').css({
				width : ww + 'px' ,
				height : wh + 'px'
			});

			// set video height

			var videoWidth = $(".video-js").width();
			var videoHeight = Math.floor(videoWidth / 1.77);

			$('.video-js').css({
				height : videoHeight + 'px'
			});

		});


jQuery(document).ready(function () {

		if(
			navigator.userAgent.match(/Android/i) ||
			navigator.userAgent.match(/webOS/i) ||
			navigator.userAgent.match(/iPhone/i) ||
			navigator.userAgent.match(/iPad/i)||
			navigator.userAgent.match(/iPod/i) ||
			navigator.userAgent.match(/BlackBerry/i)) {
				$(".member-image, article.spotlight, ul.team-social li").click(function(){});
			}

  		// =======================================================================//
		// LocalScroll applied to Nav and Main Logo - homepage                   //
		// =====================================================================//

			$('nav, #main-logo').localScroll({
				event:'click',
				hash:true,
				easing:'easeOutCubic',
				duration:5000,
				offset:-45
			});

		// =======================================================================//
		// Navigation always visible                                             //
		// =====================================================================//

			$("#navbar").sticky({ topSpacing:0 });

		// =======================================================================//
		// Highlight current section in Nav during the scroll                    //
		// =====================================================================//

			$('body').scrollspy({target:'#navbar'});

		// =======================================================================//
		// Flexslider init                                                       //
		// =====================================================================//

			// Main slider - Homepage fullscreen background

				jQuery('#background-slider').flexslider({
					slideshow: true,
					slideshowSpeed: 6000,
					animationSpeed: 500,
					animation: "fade",
					controlNav: false,
					directionNav: true,
					pausePlay: true,
					touch: true,
					keyboard: true,
					mousewheel: false,
				});

			// Spotlight sliders - present your works

				jQuery('.small-slider, .big-slider').flexslider({
					animation: "fade",
					controlNav: true,
					directionNav: false,
					touch: true,
					keyboard: true,
					mousewheel: false,
				});

		// =======================================================================//
		// Load more posts in the blog                                           //
		// =====================================================================//

			var $blog = $('#blog');
			$('#more-post a').click(function(){
				var $newEls = $('article.post:not(:visible):lt('+limitPosts+')');
				$blog.append( $newEls ).isotope( 'appended', $newEls );
				return false;
			});

		// =======================================================================//
		// Fancybox                                                              //
		// =====================================================================//

			jQuery('.fancybox').fancybox({
				padding : 0,
				fitToView	: false,
				closeEffect	: 'none',
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 300
					}
				}
			});

		// =======================================================================//
		// Twitter integration                                                   //
		// =====================================================================//
			jQuery(function($){
				$(".twitter-feed").tweet({
					modpath: 'js/twitter/',
					username: twitterUser,
					page: 1,
					count: 5,
					loading_text: "loading ..."
				}).bind("loaded", function() {
					var ul = $(this).find(".tweet_list");
					var ticker = function() {
						setTimeout(function() {
							var top = ul.position().top;
							var h = ul.height();
							var incr = (h / ul.children().length);
							var newTop = top - incr;
							if (h + newTop <= 0) newTop = 0;
							ul.animate( {top: newTop}, 500 );
							ticker();
						}, 5000);
					};
					ticker();
				});
			});


		// =======================================================================//
		// Mobile menu toggle                                                    //
		// =====================================================================//
			var toggleNav = $('.menuToggle');
			var toggleLink = $('ul.nav a');

			toggleNav.on('click', function(event) {
				if($(this).parent().find('ul.nav').is(':hidden')){
					$(this).parent().find('ul.nav').slideDown();
				}else{
					$(this).parent().find('ul.nav').slideUp();
				}
				event.preventDefault();
			});

}); // End Document Ready

// =======================================================================//
// Mobile menu function                                                  //
// =====================================================================//

	(function($) {
		$.fn.collapsable = function(options) {
			return this.each(function() {
				var obj = $(this);
				var tree = obj.next('.nav');
				obj.click(function(){
					if( obj.is(':visible') ){ tree.toggle();}
				});
				$(window).resize(function(){
					if ( $(window).width() <= 570 ){tree.attr('style','');};
				});
			});
		};
	})(jQuery);

// =======================================================================//
// Send email function                                                   //
// =====================================================================//

	$(function() {
		$('.error').hide();
		$("#send-mail").click(function() {
			$('.error').hide();
			var name = $("input#name").val();
			if (name == '' ) {
				$("span#name_error").show();
				return false;
			}
			var email = $("input#email").val();
			if (!email.match(/^([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$)/i)) {
				$("span#email_error").show();
				return false;
			}
			var subject = $("input#subject").val();
			if (subject == '') {
				$("span#subject_error").show();
				return false;
			}
			var message = $("textarea#message").val();
			if (message == '') {
				$("span#message_error").show();
				return false;
			}
			else {
				var dataString = 'name='+ name + '&email=' + email + '&subject=' + subject + '&message=' + message;
				$("#message-box").css("display", "block");
				$("#message-box").html("Sending...");
				$("#message-box").fadeIn("slow");
				setTimeout("send('"+dataString+"')",2000);
			}

			var dataString = 'name='+ name + '&email=' + email + '&subject=' + subject + '&message=' + message;
			$.ajax({
				type: "POST",
				url: "send-mail.php",
				data: dataString,
				cache: false,
				success: function() {
					$("#message-box").fadeIn("slow");
					$('#message-box').html("<p>Your message has been sent and we will be in touch soon!</p>");
					setTimeout('$("#message-box").fadeOut("slow")',2000);
				}
			});
			return false;
		});
	});

// =======================================================================//
// Google Maps function                                                  //
// =====================================================================//
	function initialize() {

		// Create an array of styles.
		var styles = [
			{ "featureType": "administrative", "stylers": [ { "visibility": "off" } ] },
			{ "featureType": "landscape", "stylers": [ { "visibility": "on" }, { "color": google_maps_landscape_color } ] },
			{ "featureType": "poi", "stylers": [ { "visibility": "off" } ] },
			{ "featureType": "road", "stylers": [ { "visibility": "on" }, { "lightness": -30 } ] },
			{ "featureType": "transit", "stylers": [ { "visibility": "off" } ] },
			{ "featureType": "water", "stylers": [ { "visibility": "on" }, { "color": google_maps_water_color } ] },{ }
		];
		// Create a new StyledMapType object, passing it the array of styles,
		// as well as the name to be displayed on the map type control.
		var styledMap = new google.maps.StyledMapType(styles,
		{name: "Styled Map"});
		var mapOptions = {
			zoom: google_maps_zoom,
			center: new google.maps.LatLng(google_maps_latitude,google_maps_longitude),
			mapTypeControl: false,
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
				position: google.maps.ControlPosition.TOP_RIGHT,
				mapTypeIds: ['map_style']
			},
			scrollwheel:false,
			draggable:false,
			panControl: true,
			panControlOptions: {
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE,
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			scaleControl: false,
			scaleControlOptions: {
				position: google.maps.ControlPosition.TOP_RIGHT
			},
			streetViewControl: false,
			streetViewControlOptions: {
				position: google.maps.ControlPosition.TOP_RIGHT
			}
		};
		var map = new google.maps.Map(document.getElementById('map_canvas'),
		mapOptions);
		//Associate the styled map with the MapTypeId and set it to display.
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
		var circleOptions = {
			center: new google.maps.LatLng(google_maps_latitude, google_maps_longitude),
			radius: google_maps_circle_radius,
			map: map,
			editable: false,
			strokeColor: google_maps_circle_stroke_color,
			strokeOpacity: 1,
			strokeWeight: 1,
			fillColor: google_maps_circle_fill_color,
			fillOpacity: 0.80,
		};
		var circle = new google.maps.Circle(circleOptions);
	}

	function loadScript() {
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
		'callback=initialize';
		document.body.appendChild(script);
	}

	window.onload = loadScript;
