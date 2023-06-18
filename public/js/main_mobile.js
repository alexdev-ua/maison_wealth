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

    $.each($('.page-screen'), function(index, screenItem){
        if($(document).scrollTop() + window.innerHeight >= $(screenItem).offset().top + window.innerHeight / 4){
            $(screenItem).addClass('active-screen opened');
        }
    });

	$(document).on('click','.menu-btn', function(){
		$('.main-menu').toggleClass('opened');
        if($('.main-menu').hasClass('opened')){
            $('body').css('overflow', 'hidden');
        }else{
            $('body').css('overflow', 'auto');
        }
	});

    $(document).on('click', '.scroll-to-btn', function(){
		var scrollScreen = $(this).data('scroll-to');

        $('.page-screen').addClass('active-screen opened');
        //if(autoScroll){
            $('html, body').animate({
    	        scrollTop: $(scrollScreen).offset().top
    	    }, 1500);
        //}

	});

    $(document).scroll(function(e){
        var scrollTop = $(this).scrollTop();

        if(scrollTop > scrollPosition){
            $.each($('.page-screen'), function(index, screenItem){
                if(scrollTop + window.innerHeight >= $(screenItem).offset().top + window.innerHeight / 4){
                    $(screenItem).addClass('active-screen opened');
                }
            });
        }else{
            $.each($('.page-screen'), function(index, screenItem){
                if(scrollTop + window.innerHeight <= $(screenItem).offset().top){
                    $(screenItem).removeClass('active-screen opened');
                }
            });
        }

        scrollPosition = scrollTop;
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
