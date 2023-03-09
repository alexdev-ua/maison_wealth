$(document).ready(function(){

	$(document).on('click','.menu-btn', function(){
		var sidebar = $($(this).data('open'));
		sidebar.toggleClass('open');

		$(this).toggleClass('active');
	});

	$(document).on('click', '.user-top-btn', function(){
		$('.user-menu').toggleClass('open');
		$(this).toggleClass('active');
	});


	$(document).click(function(e){
		var target = $(e.target);

		if(target.is('#menuSidebar') && $('.sidebar-content') !== target){
			$('.menu-btn').click();
		}

	});

	window.initSlide = 0;
	$(document).on('click', '.photos-slider .photo', function(e){
		var slide = $(this).data('slick-index');
		window.initSlide = parseInt(slide);
	});
	$(document).on('click', '.photos-list .photo', function(e){
		var slide = $(this).data('slide');
		window.initSlide = parseInt(slide);
	});

	$(document).on('shown.bs.modal', '#galleryModal', function () {
			initSlider($(".gallery-slider"), window.initSlide);
    });

});

function initSlider(slider, initSlide = 0){
	$(slider).not('.slick-initialized').slick({
		initialSlide: initSlide,
		dots: false,
		infinite: true,
		fade: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		centerMode: false,
		arrows: true,
		prevArrow: '<button id="prev" type="button" class="btn btn-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
		nextArrow: '<button id="next" type="button" class="btn btn-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
	});
	console.log(initSlide);
	$(slider).slick('slickGoTo', initSlide,true);
}
