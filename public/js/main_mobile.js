$(document).ready(function(){

	$(document).on('click', '.screen-info-block', function(){
		var infoBlock = $(this);
		var container = $(infoBlock).find('.info-container');

		if(!$(infoBlock).hasClass('info-opened')){

			$(infoBlock).toggleClass('info-opened');
			setTimeout(function(){
				$(container).addClass('show');
			}, 500);

		}else{

			$(container).removeClass('show');
			setTimeout(function(){
				$(infoBlock).toggleClass('info-opened');
			}, 500);

		}

	});

	$(document).on('click','.menu-btn', function(){
		var menu = $($(this).data('open'));

		if(menu.hasClass('open')){
			if($('html').scrollTop() == 0){
				$('.header').removeClass('fixed');
			}
		}else{
			$('.header').addClass('fixed');
		}

		menu.toggleClass('open');

		$(this).toggleClass('active');
	});

	$(document).on('click', '.callback-btn', function(){
		$('#contactModal').fadeIn();
	});

	$(document).on('click', '.dialog-close-btn', function(){
		var dialog = $(this).data('close');
		$(dialog).fadeOut();
	});

	$(document).on('submit', '#contactForm', function(e){
		e.preventDefault();
		var data = new FormData($('#contactForm')[0]);
		$('.error-msg').remove();
		$.ajax({
			type:'POST',
			url: '/contact-form/save',
			data:data,
			processData: false,
			contentType: false,
			success:function(data){
				if(data == 'success'){
					showMessage('Ваши данные отправлены. Ожидайте обратной связи', 'success');
					$('#contactForm').find('input').val('');

					setTimeout(function(){
						$('#contactModal').fadeOut();
					}, 4000);
				}
			},
			error:function(data){
				var errors = data.responseJSON.errors;

				$.each(errors, function(key, value){
					$('<span class="error-msg">'+value[0]+'</span>').insertAfter('input[name="'+key+'"]');
				});

			}
		});
	});

	$(document).click(function(e){
		var target = $(e.target);

		if(target.is('#menuSidebar') && $('.sidebar-content') !== target){
			//$('.menu-btn').click();
		}

	});

	var scrollTopOld = 0;
	$(window).scroll(function(){
		var scrollTop = $('html').scrollTop();

		$.each($('.screen-content'), function(key, item){
			if((scrollTop + (window.innerHeight - window.innerHeight/4)) > $(item).offset().top){
				$(item).addClass('show');
			}
		});

		//console.log(scrollTop, scrollTopOld);
		if(scrollTop > scrollTopOld || scrollTop == 0){
			if(!$('.main-menu').hasClass('open')){
				$('.header').removeClass('fixed');
			}
		}else{
			$('.header').addClass('fixed');
		}

		scrollTopOld = scrollTop;
	});

});

function showMessage(msg, mode){
	var msgHtml = '<div class="info-message '+mode+'-message">'+msg+'</div>';

	$('.page').append(msgHtml);
	$('.info-message').fadeIn().delay(3000).fadeOut();
	setTimeout(function(){
		$('.info-message').remove();
	}, 4000);
}
