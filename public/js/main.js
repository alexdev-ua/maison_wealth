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
		popUp($(this).data('pop-up'));
	});

	$(document).on('click', '.property-location-btn', function(){
		var btn = $(this),
			location = $(btn).data('location');
		if(!$(this).hasClass('active')){
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);

			var price = '';

			if(urlParams.has('price')){
				price = 'price=' + urlParams.get('price');
			}

			loadProperties(location, price);

			$('.property-location-btn').not(btn).removeClass('active');
			$(btn).addClass('active');
		}
	});

	$(document).on('click', '.reset-price-filter-btn', function(){
		var location = $('.property-location-btn.active').data('location');

		$('.price-block').remove();

		loadProperties(location);
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

        $(currentBlock).closest('.page-screen').find('.banners-block .banner-image').not($($(this).data('banner'))).fadeOut();
        $($(this).data('banner')).fadeIn();
	});

	$(document).on('submit', '#contactForm, #consultationForm, #notFoundConsultationForm', function(e){
        e.preventDefault();
        var form = $(this)[0],
    		data = new FormData(form),
            url = $(form).attr('action');

        $(form).find('.custom-input').removeClass('is-invalid');
        $(form).find('.invalid-feedback').remove();

        $(form).find('.submit-btn').attr('disabled', true);

		if(data){
			$.ajax({
				type:'POST',
				url: url,
				data: data,
				processData: false,
				contentType: false,
				success:function(data){
                    //$('#personalConsultationPopUp').remove();
                    if(data.success){
                        $(form).find('.custom-input').val('');
						if($('.pop-up.opened').length){
							popUp('.pop-up.opened');
						}
                        var formResultDialog = '<div class="request-result-dialog">'+
								'<div class="request-result-content">' +
									'<p class="request-result-title">Congratulations!</p>' +
									'<p class="request-result-text">Your request was sent successfully and our managers contact with you as soon as possible</p>' +
									'<button class="main-btn black-btn close-result-btn">Close</button>' +
								'</div>' +
							'</div>';

						if(!$('.request-result-dialog').length){
							$('.page').append(formResultDialog);
						}
						$('.request-result-dialog').fadeIn();
						$('body').css('overflow', 'hidden');

						$(form).find('.submit-btn').attr('disabled', false);
                    }
				},
				error:function(data){
					var errors = data.responseJSON.errors;

					$.each(errors, function(input, error){
                        $(form).find('.custom-input[name="'+input+'"]').addClass('is-invalid');
                        $(form).find('.custom-input[name="'+input+'"]').after('<span class="invalid-feedback" role="alert">'+error+'</span>');
					});
                    $(form).find('.submit-btn').attr('disabled', false);
				}
			});
		}
    });

	$(document).on('click', '.close-result-btn', function(){
		$('.request-result-dialog').fadeOut();
		$('body').css('overflow', 'auto');

		setTimeout(function(){
			$('.request-result-dialog').remove();
		}, 1500);
	});

});

function loadProperties(location, price = ''){
	$('.properties-list .property-item').css('opacity','0.5');

	$.ajax({
		type:'GET',
		url: '/properties/' + location + '?partial=1' + (price ? '&' + price : ''),
		data:{},
		processData: false,
		contentType: false,
		success:function(data){
			$('.properties-list .property-item').css('opacity','0');
			$('.properties-list').html(data);
			setTimeout(function(){
				$('.properties-list .property-item').removeClass('hidden-property');
			}, 100);
			history.pushState({}, null, '/properties/' + location + (price ? '?' + price : ''));
		},
		error:function(data){

		}
	});
}

function popUp(popUp){
	$(popUp).fadeToggle();
	$(popUp).toggleClass('opened');
	if($('.pop-up').hasClass('opened')){
		$('body').css('overflow', 'hidden');
	}else{
		$('body').css('overflow', 'auto');
	}
}
