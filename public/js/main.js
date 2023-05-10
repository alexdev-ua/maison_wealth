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

	$(document).on('click', '.plot-item .plot-title', function(){
		var currentBlock = $(this).closest('.plot-item');

		$('.plot-item').not(currentBlock).removeClass('opened');
		currentBlock.addClass('opened');
	});

	$(document).on('click', '.back-to-top-btn', function(){
		$('html, body, .page').animate({
	        scrollTop: 0
	    }, 1000);
	});

	$(document).on('mouseenter', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').addClass('opened');
	});
	$(document).on('mouseleave', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').removeClass('opened');
	});

});
