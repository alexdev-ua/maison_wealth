var activeScreen,
    scrollPosition = 0,
    canScroll = false;

    const debounce = function(fn, d) {
        let timer;

        return function() {
            let context = this;
            let args = arguments;

            clearTimeout(timer);

            timer = setTimeout(() => {
                fn.apply(context, args);
            }, d);
        }
    }


$(document).ready(function(){
    /*$('html, body, .page').animate({
        scrollTop: 0
    }, 0);*/

    activeScreen = $('.page-screen').first();

    $(document).on('touchmove', function(e){
        console.log(e);
    });

    $(window).on('wheel', debounce(function(e){
        console.log(e.originalEvent.deltaY);
        if(!Number.isInteger(e.originalEvent.deltaY) || (e.originalEvent.deltaY > 0 && e.originalEvent.deltaY < 100) || (e.originalEvent.deltaY < 0 && e.originalEvent.deltaY > -100)){
            scroll(e);
            return false;
        }else{
            scroll(e);
        }
    }, 200));

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
                }
            }
            if(canScroll){
                canScroll = false;
            }
        }
    }
}
