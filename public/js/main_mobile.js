$(document).ready(function(){
	calcHeight();

    $(window).resize(function() {
        calcHeight();
    });

	$(document).on('click','.menu-btn', function(){
		$('.main-menu').toggleClass('opened');
	});

});

function calcHeight(){
	let vh = window.innerHeight * 0.01;
	$('.page').attr('style', '--vh:'+vh+'px');
}
