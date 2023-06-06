var activeScreen,
    scrollTimer = 0,
    scrollPosition = 0,
    canScroll = false;

$(document).ready(function(){
    /*$('html, body, .page').animate({
        scrollTop: 0
    }, 0);*/

    activeScreen = $('.page-screen').first();

    $(window).on('wheel', function(e){
        clearTimeout(scrollTimer);
        //if(!$(activeScreen).hasClass('auto-height')){
            scrollTimer = setTimeout(function(){
                scroll(e);
            }, 300);
        //}
    });

    $(document).on('click', '.scroll-to-btn', function(){
		var scrollScreen = $(this).data('scroll-to'),
            autoScroll = false;

        $(scrollScreen).addClass('active-screen');
        $(scrollScreen).addClass('opened');

        $('.page-screen').not($('.page-screen').first()).not($(scrollScreen)).removeClass('active-screen opened');

        console.log($(activeScreen), $(scrollScreen), $(scrollScreen).is($(activeScreen)));

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
            //console.log('up', $(activeScreen).attr('id'), $(anotherScreen).attr('id'), $(activeScreen).scrollTop(), $(activeScreen).position().top, $(activeScreen).scrollTop() == $(activeScreen).position().top);
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
            //console.log('down', $(activeScreen).attr('id'), $(anotherScreen).attr('id'), $(activeScreen).scrollTop(), $(activeScreen).prop('scrollHeight'), window.innerHeight, $(activeScreen).scrollTop() >= $(activeScreen).prop('scrollHeight') - window.innerHeight);
        }


        if($(anotherScreen).length){

            if(e.originalEvent.deltaY < 0){
                if($(activeScreen) != $('.page-screen').first() && $(anotherScreen) != $('.page-screen').first()){
                    if(!$(activeScreen).hasClass('auto-height') || canScroll/*$(activeScreen).scrollTop() == $(activeScreen).position().top*/){
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
                if(!$(activeScreen).hasClass('auto-height') || canScroll/*$(activeScreen).scrollTop() >= $(activeScreen).prop('scrollHeight') - window.innerHeight*/){
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
