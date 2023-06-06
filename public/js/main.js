$(document).ready(function(){

	if($('.cookies-panel').length){
		setTimeout(function(){
			$('.cookies-panel').addClass('opened');
		}, 2000);
	}

	$(document).on('click', '.close-cookies-btn', function(){
		$.ajax({
			type:'GET',
			url: '/cookies?accept=0',
			data:{},
			processData: false,
			contentType: false,
			success:function(data){
				$('.cookies-panel').removeClass('opened');
			},
			error:function(data){

			}
		});
	});

	$(document).on('click', '.accept-cookies-btn', function(){
		$.ajax({
			type:'GET',
			url: '/cookies?accept=1',
			data:{},
			processData: false,
			contentType: false,
			success:function(data){
				$('.cookies-panel').removeClass('opened');
			},
			error:function(data){

			}
		});
	});

	$(document).on('click', '.pop-up-btn', function(){
		$($(this).data('pop-up')).fadeToggle();
	});

	$(document).on('click', '.back-to-top-btn', function(){
		$('html, body, .page').animate({
	        scrollTop: 0
	    }, 1000);
	});

	$(document).on('click', '.property-location-btn', function(){
		var btn = $(this),
			location = $(btn).data('location');
		if(!$(this).hasClass('active')){
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);

			var price = '';

			if(urlParams.has('price')){
				price = '&price=' + urlParams.get('price');
			}

			$('.properties-list .property-item').css('opacity','0.5');

			$.ajax({
				type:'GET',
				url: '/properties/' + location + '?partial=1' + price,
				data:{},
				processData: false,
				contentType: false,
				success:function(data){
					$('.properties-list .property-item').css('opacity','0');
					$('.property-location-btn').not(btn).removeClass('active');
					$(btn).addClass('active');
					$('.properties-list').html(data);
					setTimeout(function(){
						$('.properties-list .property-item').removeClass('hidden-property');
					}, 100);
					history.pushState({}, null, '/properties/' + location + price);
				},
				error:function(data){

				}
			});
		}
	});

	$(document).on('mouseenter', '.plot-item .plot-title', function(){
		var currentBlock = $(this).closest('.plot-item');

		$('.plot-item').not(currentBlock).removeClass('opened');
		currentBlock.addClass('opened');

        $(currentBlock).closest('.page-screen').find('.banners-block .banner-image').not($($(this).data('banner'))).fadeOut();
        $($(this).data('banner')).fadeIn();
	});

	$(document).on('mouseenter', '.invest-item .details-btn', function(){
		var currentBlock = $(this).closest('.invest-item');

		currentBlock.addClass('opened');

        $(currentBlock).closest('.page-screen').find('.banners-block .banner-image').not($($(this).data('banner'))).fadeOut();
        $($(this).data('banner')).fadeIn();
	});

	$(document).on('mouseleave', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').removeClass('opened');
	});


});
