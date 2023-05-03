$(document).ready(function(){

	$(document).on('click', '.pop-up-btn', function(){
		$($(this).data('pop-up')).fadeToggle();
	});

	$(document).on('mouseenter', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').addClass('opened');
	});
	$(document).on('mouseleave', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').removeClass('opened');
	});

	$(document).on('click', '.plot-item .plot-title', function(){
		var currentBlock = $(this).closest('.plot-item');

		$('.plot-item').not(currentBlock).removeClass('opened');
		currentBlock.addClass('opened');
	});

});
