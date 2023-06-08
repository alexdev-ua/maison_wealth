var activeScreen,
    scrollTimer = 0,
    scrollPosition = 0,
    canScroll = false,
	lastPosition = null,
	scrollDirection = 1;

$(document).ready(function(){
	calcHeight();

    $(window).resize(function() {
        calcHeight();
    });

	$(document).on('click','.menu-btn', function(){
		$('.main-menu').toggleClass('opened');
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
        canScroll = true;
	});

	activeScreen = $('.page-screen').first();

	$('.page').bind('touchmove', function(e) {
        if(!$('.main-menu.opened').length && !$('.pop-up.opened').length){
    		clearTimeout(scrollTimer);
            //if(!$(activeScreen).hasClass('auto-height')){
                scrollTimer = setTimeout(function(){
                    scroll(e);
                }, 300);
            //}
        }
	});


    $(document).bind('touchstart', function (e){
        lastPosition = e.originalEvent.touches[0].clientY;
        console.log(lastPosition);
    });

    $(document).bind('touchend', function (e){
        var currentPosition = e.originalEvent.changedTouches[0].clientY;

        if(currentPosition < lastPosition){
            scrollDirection = 1;
        }else{
            scrollDirection = -1;
        }
        console.log(currentPosition, scrollDirection);


    });

});

function calcHeight(){
	let vh = window.innerHeight * 0.01;
	$('.page').attr('style', '--vh:'+vh+'px');
}

function scroll(e){
    var anotherScreen = null;

        if(scrollDirection < 0){
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

            if(scrollDirection < 0){
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
