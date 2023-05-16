var activeScreen,
    scrollTimer = 0;

$(document).ready(function(){
    $('html, body, .page').animate({
        scrollTop: 0
    }, 0);

    activeScreen = $('.page-screen').first();

    $(window).on('wheel', function(e){
        clearTimeout(scrollTimer);
        //if(!$(activeScreen).hasClass('auto-height')){
            scrollTimer = setTimeout(function(){
                scroll(e)
            }, 500);
        //}
    });

    $(document).on('mouseenter', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').addClass('opened');
        $('.banners-block .banner-image').not($($(this).data('banner'))).fadeOut();
        $($(this).data('banner')).fadeIn();
	});
	$(document).on('mouseleave', '.invest-item .details-btn', function(){
		$(this).closest('.invest-item').removeClass('opened');
	});

});

function scroll(e){
    var screens = $('.page-screen'),
        anotherScreen = null;

    if(e.originalEvent.deltaY !== 0){
        if(e.originalEvent.deltaY < 0){
            console.log('up');
            if(!$(activeScreen).hasClass('auto-height')){
                anotherScreen = $(activeScreen).prev();
            }
        }
        else {
            console.log('down');
            anotherScreen = $(activeScreen).next();
        }
        if($(anotherScreen).length){

                if(e.originalEvent.deltaY < 0){
                    if(!$(anotherScreen).hasClass('auto-height')){
                        $('html, body, .page').animate({
                            scrollTop: $(anotherScreen).position().top
                        }, 100);
                    }
                }else{
                    if(!$(activeScreen).hasClass('auto-height')){
                        $('html, body, .page').animate({
                            scrollTop: $(anotherScreen).position().top
                        }, 100);
                    }
                }

                /*if(e.originalEvent.deltaY > 0){
                    $('html, body, .page').animate({
                        scrollTop: $(anotherScreen).position().top
                    }, 100);
                }*/


            if(e.originalEvent.deltaY < 0){
                if($(activeScreen) != $('.page-screen').first() && $(anotherScreen) != $('.page-screen').first()){
                    $(activeScreen).removeClass('opened');
                    $(activeScreen).removeClass('active-screen');
                }
            }
            else {
                $(anotherScreen).addClass('active-screen');
                $(anotherScreen).addClass('opened');
            }

            activeScreen = $(anotherScreen);
        }
    }
}
