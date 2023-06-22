var activeScreen,
    scrollPosition = 0,
    canScroll = false;

const debounce = function(func, wait) {
    let timer;

    $(window).stop(true, true);

    return function(e) {
        clearTimeout(timer);

        if(!Number.isInteger(e.originalEvent.deltaY) || Math.abs(e.originalEvent.deltaY < 100)){
            wait = 100;
        }else{
            wait = 300;
        }

        timer = setTimeout(() => {
            console.log('debounce deltaY', e.originalEvent.deltaY);
            func(e);
        }, wait);

    }

}

$(document).ready(function(){
    activeScreen = $('.page-screen').first();

    $(window).on('wheel, mousewheel', debounce(scroll, 300));

    $(document).on('click', '.scroll-to-btn', function(){
		var scrollScreen = $(this).data('scroll-to'),
            autoScroll = false;

        $(scrollScreen).addClass('active-screen');
        $(scrollScreen).addClass('opened');

        $('.page-screen').not($('.page-screen').first()).not($(scrollScreen)).removeClass('active-screen opened');

        if($(scrollScreen).is($(activeScreen))){
            autoScroll = true;
        }
        activeScreen = $(scrollScreen);

        if(autoScroll){
            $(scrollScreen).animate({
    	        scrollTop: 0
    	    }, 1000);
        }

        scrollPosition = 0;

	});

});

function scroll(e){
    console.log('scroll event');
    var anotherScreen = null;

    if(e.originalEvent.deltaY !== 0){
        if(e.originalEvent.deltaY < 0){
            if(!$(activeScreen).hasClass('auto-height')){
                anotherScreen = $(activeScreen).prev('.page-screen');
            }else{
                if($(activeScreen).scrollTop() == 0){
                    anotherScreen = $(activeScreen).prev('.page-screen');

                    if(scrollPosition == $(activeScreen).scrollTop()){
                        canScroll = true;
                    }else{
                        canScroll = false;
                    }
                }
                scrollPosition = $(activeScreen).scrollTop();
            }
        }
        else {
            if($(activeScreen).next('.page-screen').length){
                anotherScreen = $(activeScreen).next('.page-screen');

                if($(activeScreen).hasClass('auto-height')){
                    if($(activeScreen).scrollTop() >= $(activeScreen).prop('scrollHeight') - window.innerHeight){
                        if(scrollPosition == $(activeScreen).scrollTop()){
                            canScroll = true;
                        }else{
                            canScroll = false;
                        }
                    }
                    scrollPosition = $(activeScreen).scrollTop();
                }
            }
        }


        if($(anotherScreen).length){

            if(e.originalEvent.deltaY < 0){
                if($(activeScreen).attr('id') == 'footerScreen' && $('header').hasClass('red-header')){
                    $('header').removeClass('disable-color');
                    $('header .main-logo img').attr('src', '/images/ic_logo_red.svg');
                }
                if($(activeScreen) != $('.page-screen').first() && $(anotherScreen) != $('.page-screen').first()){
                    if(!$(activeScreen).hasClass('auto-height') || canScroll){
                        $(activeScreen).removeClass('opened');
                        setTimeout(function(){
                            $(activeScreen).next('.page-screen').removeClass('active-screen');
                        }, 400);
                        activeScreen = $(anotherScreen);
                    }
                }
                $(anotherScreen).addClass('active-screen');
                $(anotherScreen).addClass('opened');
            }
            else {
                if(!$(activeScreen).hasClass('auto-height') || canScroll){
                    $(anotherScreen).addClass('active-screen');
                    $(anotherScreen).addClass('opened');
                    activeScreen = $(anotherScreen);

                    if($(activeScreen).attr('id') == 'footerScreen' && $('header').hasClass('red-header')){
                        $('header').addClass('disable-color');
                        $('header .main-logo img').attr('src', '/images/ic_logo_light.svg');
                    }
                }
            }
            if(canScroll){
                canScroll = false;
            }
        }
    }
}
