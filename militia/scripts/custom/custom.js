(function($){

	function stretch_portal_content() {
		if ($(window).height() > $('#page-wrapper').height()) {
			$('#page-wrapper').height($(window).height());
		}
		var pageY = ($(window).height() - 1080) / 2;
		$('#page-wrapper').css('backgroundPosition', 'center ' + pageY + 'px');
	}

	$(document).ready(function(e) {
		
		$('h1#page-title').appendTo($('div#main-top'));

		/**
		* Remove Chrome autofill styling
		*/
		/*
		if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
			var _interval = window.setInterval(function () {
			var autofills = $('input:-webkit-autofill');
			if (autofills.length > 0) {
					window.clearInterval(_interval); // stop polling
					autofills.each(function() {
						var clone = $(this).clone(true, true);
						$(this).after(clone).remove();
					});
				}
			}, 20);                                               
		}
		*/
		
		// .parallax(xPosition, speedFactor, outerHeight) options:
		// xPosition - Horizontal position of the element
		// inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
		// outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
		$('html').parallax("50%", 0.1);
		$('body').parallax("50%", -1.3);


		$('#main').fadeIn(1000);
		$('#footer-columns').delay(500).fadeIn(1500);

		/**
		* Maximize the real estate available to the portal contents
		*/
		stretch_portal_content();
		$(window).resize(stretch_portal_content);

		/**
		* Zero the angle of inclination
		*/
		var bodyY = ($(window).height() - 3600) / 2;
		//$('body').css('backgroundPosition', 'center ' + bodyY + 'px');
		//$('#nav').localScroll(800);

		/*
		if ($('body').hasClass('admin-menu')) {
			$('html').addClass('admin-menu');
		}
		*/
		
		$('.admin-menu').removeClass('admin-menu');
		$('.admin-menu-with-shortcuts').removeClass('admin-menu-with-shortcuts');
		
		/**
		* Slow background speed when scrolling
		*/
		/*
		var tempScrollTop, currentScrollTop = 0;

		$(window).scroll(function(){

			var backgroundPosition = $('body').css('background-position');
			// backgroundPosition = "0% 0%" for example
			var displacement = backgroundPosition.split(' '); // ["0%", "0%"]
			var y = Number(displacement[1].replace(/[^0-9-]/g, ''));
			
			// As suggested, you could also get the float:
			var yFloat = parseFloat(displacement[1].replace(/[^0-9-]/g, ''));

			currentScrollTop = $('body').scrollTop();
			if (tempScrollTop < currentScrollTop ) {
				//scrolling down
				$('body').css('backgroundPosition', 'center ' + (yFloat + 1) + 'px');
			
			} else if (tempScrollTop > currentScrollTop ) {
				//scrolling up
				$('body').css('backgroundPosition', 'center ' + (yFloat - 1) + 'px');

			}
			tempScrollTop = currentScrollTop;
		});
		*/
		/*
		$('h2.comment-form').click(function(){
			$('form.comment-form').slideDown(500);
		});
		*/
		$('.page-node-29 .view-pilots table tr td').wrapInner('<div class="td-wrapper" />');

		/**
		* Hide/show top menu
		*/
		$('#header').mouseenter(function(){
				$('#block-system-main-menu').stop(true, true).fadeIn();
		});
		$('#header').mouseleave(function(){
				$('#block-system-main-menu').fadeOut();
		});

		/**
		* Strip resizable stuff from the signup form
		*/
		$('.page-eform-submit-enlistment .form-textarea-wrapper').removeClass('resizeable').removeClass('resizeable-textarea');

		/**
		* Replace scroll bars
		*/
		$('.scroll-pane').jScrollPane();

		/**
		* Join the Militia button
		*/
		$('#block-enlist-button').click(function(){
			$(location).attr('href','/enlist');
		});

  });

})(jQuery);

// a, an, as, at, before, but, by, for, from, is, in, into, like, of, off, on, onto, per, since, than, the, this, that, to, up, via, with
