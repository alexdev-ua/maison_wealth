var scrollPosition = 0;

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
            if(!$('.request-result-dialog').length){
                $('body').css('overflow', 'auto');
            }
        }
        calcHeight();
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

});

function calcHeight(){
	let vh = window.innerHeight * 0.01;
	$('.page').attr('style', '--vh:'+vh+'px');
}
