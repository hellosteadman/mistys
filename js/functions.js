var WebsiteContext = function($) {
	return {
		tabs: function() {
			var hash = document.location.hash ? document.location.hash.substr(1) : '';

			if(hash) {
				if($('#' + hash).hasClass('tab')) {
					$('.tab.active').removeClass('active');
					$('#' + hash).addClass('active');

					$('.tabs .active').removeClass('active');
					$('.tabs a[href="#' + hash + '"]').parent().addClass('active');
				}
			}
		}
	};
};

jQuery(document).ready(
	function($) {
		var mistys = new WebsiteContext($);
		
		if($('body').hasClass('home')) {
			var skylineTop = $('#skyline').position().top;
			var windowHeight = $(window).height();

			$(document).on('scroll',
				function() {
					var y = $(document).scrollTop();

					$('#skyline').css('top',
						skylineTop - y * 0.75
					);

					if(y > windowHeight - 250) {
						$('#nav-wrapper').addClass('static');
					} else {
						$('#nav-wrapper').removeClass('static');
					}
				}
			);

			$('#intro').on('ended',
				function() {
					$('#intro').animate(
						{
							opacity: 0
						},
						1000
					);
				}
			);

			$('#releases .carousel').imagesLoaded(
				function() {
					$('#releases .carousel').owlCarousel(
						{
							itemsDesktop: [1199, 4],
							itemsDesktopSmall: [979, 3],
							itemsTablet: [768, 2],
							itemsMobile: [479, 1]
						}
					);
				}
			);
		}
		
		$('a img.attachment-thumbnail').each(
			function() {
				$(this).parent().addClass('thickbox').attr('rel', 'page');
			}
		);
		
		$('#jquery_jplayer').jPlayer(
			{
				swfPath: '<?php echo get_template_directory_uri(); ?>/js/Jplayer.swf',
				supplied: 'm4a'
			}
		);
		
		$('a.audio-preview').on('click',
			function(e) {
				var mp4 = $(this).attr('href');
				
				e.preventDefault();
				if($(this).hasClass('playing')) {
					$('#jquery_jplayer').jPlayer('stop');
					$(this).html('').animate(
						{
							width: 16
						},
						function() {
							$(this).removeClass('playing');
						}
					);
				} else {
					$('#jquery_jplayer').jPlayer('setMedia',
						{
							m4a: mp4
						}
					);
					
					$('#jquery_jplayer').jPlayer('play');
					$('.audio-preview.playing').html('').animate(
						{
							width: 16
						},
						function() {
							$(this).removeClass('playing');
						}
					);
					
					$(this).addClass('playing').animate(
						{
							width: 150
						}
					).html('Playing');
				}
			}
		);
		
		$('a.menu-toggle').on('click',
			function() {
				$('#nav-wrapper ul').toggleClass('menu-closed');
			}
		);
		
		$(window).hashchange(mistys.tabs);
		mistys.tabs();
	}
);