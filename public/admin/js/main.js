var activePhotoSelectName;

$(document).ready(function(){
    calcHeight();

    $(window).resize(function() {
        calcHeight();
    });

    if($('.dash-preloader').length){
        var checkLoadedTimer;

        checkLoadedTimer = setInterval(function(){
            var loadStatus = true;
            $.each($('div.has-preloader img'), function(index, img){
                if(!img.complete){
                    loadStatus = false;
                }
            });
            if(loadStatus){
                clearInterval(checkLoadedTimer);
                $('.dash-preloader').fadeOut();
                setTimeout(function(){
                    $('.dash-preloader').remove();
                }, 1000);
            }
        }, 1000);
    }

    $(document).on('click', '.dash-checkbox-toggle', function(){
        var checkToggle = $(this),
            checkBoxInput = $(checkToggle).find('input[type="checkbox"]');

        $(checkToggle).toggleClass('checked');
        if($(checkToggle).hasClass('checked')){
            $(checkBoxInput).attr('checked', true);
        }else{
            $(checkBoxInput).attr('checked', false);
        }
    });

    $(document).on('click', '.dash-control-btn', function(){
        var btn = $(this),
            mode = btn.data('mode'),
            model = btn.data('model') ? btn.data('model') : btn.closest('.dash-table').data('model'),
            id = null,
            parentId = null,
            container = $('.dash-form-container');

        if(mode == 'delete' || mode == 'edit' || mode == 'view'){
            if(model == 'media'){
                id = btn.closest('.dash-media-item').data('id');
            }else{
                id = btn.closest('.dash-table-row').data('id');
            }
        }

        if(btn.data('parent-id')){
            parentId = btn.data('parent-id');
        }

        openForm(model, mode, container, parentId, id);

    });

    $(document).on('click', '.select-photo-btn', function(){
        activePhotoSelectName = $(this).data('photo-name');
    });

    $(document).on('click', '.dash-select-photos-container .dash-media-item .dash-media-preview', function(){
        var selectedItem = $(this).closest('.dash-media-item'),
            container = $(selectedItem).closest('.dash-select-photos-container');

         $(container).find('.dash-media-item').not($(selectedItem)).removeClass('selected');

        $(selectedItem).toggleClass('selected');

        if($(selectedItem).hasClass('selected')){
            $(container).closest('.dash-form-container').find('.dash-select-btn').attr('disabled', false);
            $(container).closest('.dash-form-container').find('#selectedPhotoId').val($(selectedItem).data('id'));
        }else{
            $(container).closest('.dash-form-container').find('.dash-select-btn').attr('disabled', true);
            $(container).closest('.dash-form-container').find('#selectedPhotoId').val('');
        }
    });

    $(document).on('click', '.dash-select-btn', function(){
        if($('#selectedPhotoId').val()){
            $('input[name="'+activePhotoSelectName+'"]').val($('#selectedPhotoId').val());

            var imageItemSrc  = $('.dash-media-item[data-id="'+$('#selectedPhotoId').val()+'"]').find('img').attr('src');

            $('input[name="'+activePhotoSelectName+'"]').closest('.photo-container').find('.photo-content').html('<img src="'+imageItemSrc+'" /><span class="dash-btn blue-btn select-photo-btn dash-control-btn" data-photo-name="'+activePhotoSelectName+'" data-model="media" data-mode="select-photo">Change photo</span>');
        }
        $('#selectPhotoModal').modal('hide');
    });

    /*$(document).on('click', '.reject-realty-btn', function(){
        var id = $(this).data('id');
        $.ajax({
			url: '/admin/realty/reject?id='+id,
			cache:false,
			//data: {},
			type: 'get',
			success: function(data){
                if(data.success){
    				window.location.reload();
                }
			},
			error: function(err){

			}
		});
    });*/

    $(document).on('submit', '.ajax-form', function(e){
		e.preventDefault();
        var form = $(this)[0],
            formData = new FormData(form),
            url = $(form).attr('action'),
            method = $(form).attr('method');

        $(form).find('.invalid-feedback').remove();
        $(form).find('.dash-input, label, .empty-photo').removeClass('is-invalid');
        $(form).find('label').removeClass('form-control');
		if(formData){
			$.ajax({
				type: method,
				url: url,
				data: formData,
				processData: false,
				contentType: false,
				success:function(data){
                    $(form).closest('.dash-modal').modal('hide');
                    if(data.mode == "delete"){
                        var elem = $('.dash-table-row[data-id="'+data.id+'"], .dash-table-column[data-id="'+data.id+'"]');

                        if(elem.closest('.dash-table-row-container').length){
                            elem.closest('.dash-table-row-container').remove();
                        }else{
                            elem.remove();
                        }

                    }else{
                        if(data.redirect){
                            window.location = data.redirect;
                        }
                        else{
                            //if(data.mode == 'edit'){
                                //window.location.reload();
                            //}else{
                                var parentId = '';
                                if(data.model == 'property-options' || data.model == 'property-features' || data.model == 'list-items' || data.model == 'article-options' || data.model == 'article-screens' || data.model == 'direction-options' || data.model == 'direction-features'){
                                    parentId = data.parentId ? ('?id=' + data.parentId) : '';
                                }
                                $(form).find('.dash-input').val('');
                                $.ajax({
                        			url: '/dashboard/' + data.model + parentId,
                        			cache:false,
                        			//data: {},
                        			type: 'get',
                        			success: function(list){
                        				$('.dash-table[data-model="'+data.model+'"]').find('.dash-table-body').html(list);
                        			},
                        			error: function(err){

                        			}
                        		});

                                if(data.model == 'list-items'){
                                    $('.dash-table[data-model="'+data.model+'"]').find('.dash-control-btn').data('parent-id', data.parentId);
                                    $('.dash-table[data-model="'+data.model+'"]').find('input[name="list_id"]').val(data.parentId);
                                }
                            //}
                        }
                    }
				},
				error:function(data){
					var errors = data.responseJSON.errors;

					$.each(errors, function(input, error){
	                   $(form).find('.dash-input[name="'+input+'"]').addClass('is-invalid');
                       if(input == 'media_id'){
                           $(form).find('input[name="'+input+'"]').closest('.photo-container').find('.empty-photo').addClass('is-invalid');
                       }
					});
				}
			});
		}
	});


    $(document).on('click', '.dash-tab-btn', function(){
        var tab = $(this).data('tab'),
            panel = $(this).data('panel');

        $('.dash-tab-btn[data-panel="'+panel+'"]').not($(this)).removeClass('active');
        $('.dash-tab[data-panel="'+panel+'"]').not($(tab)).removeClass('active-tab');
        $(this).addClass('active');
        $(tab).addClass('active-tab');
    });

/* media upload */
    $(document).on('click', '.add-photos-btn', function(){
        var input = $('#uploadPhoto');
        input.click();
   });

   $(document).on('change', '#uploadPhoto', function (){
        var input = this;

        if(input.files){
            $.each(input.files, function(index, file){
                if(!$('#photo'+index+'Canvas').length){
                    $('#uploadPhotoForm').after('<canvas id="photo'+index+'Canvas" style="display:none;"></canvas>');
                }
            });
            setTimeout(function(){
                readFiles(input.files, $('.dash-media-container'));
            }, 1000);
        }
	});

    $(document).on('change', '#featureTypeSelect', function(){
        var toggle = $(this).find('option:selected').data('toggle');
        setToggle(toggle);
    });

    $(document).on('click', '.dash-toggle-sidebar-btn', function(){
        $('#menuSidebar').toggleClass('opened');
        var status = 1;
        if($('#menuSidebar').hasClass('opened')){
            status = 1;
        }else{
            status = 0;
        }
        $.ajax({
			url: '/dashboard/toggleSidebar?on='+status,
			cache:false,
			//data: {},
			type: 'get',
			success: function(data){
                if(data.success){
    				window.location.reload();
                }
			},
			error: function(err){

			}
		});
    });

    $(document).on('click', '.profile-sidebar-btn', function(){
        $('#profileSidebar').toggleClass('opened');
    })

    $(document).on('click', '.dash-profile-photo-btn', function(){
        $('#profileAvatar').click();
    });

    $(document).on('change', '#profileAvatar', function(){
        var input = this,
            reader = new FileReader(),
            canvas = $('#avatarCanvas');

    	reader.onload = function (e) {
            var img = new Image();
            img.onload = function(){
                imageWidth = this.width,
                imageHeight = this.height;
                var aspectRatio = imageWidth / imageHeight;

                var newWidth = 250,
                    newHeight = newWidth / aspectRatio;

                canvas[0].width = newWidth;
                canvas[0].height = newHeight;
                var ctx = canvas[0].getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
            }
            img.src = event.target.result;

            var imgElem ='<img src="'+img.src+'" />';

            $('.dash-profile-photo-container').find('.dash-profile-photo').removeClass('empty-photo');
            $('.dash-profile-photo-container').find('.dash-profile-photo').find('img').replaceWith(imgElem);
    	}

    	reader.readAsDataURL(input.files[0]);
    });


    $(document).on('submit', '#profileForm', function(e){
		e.preventDefault();
        var form = $(this)[0],
            formData = new FormData(form),
            url = $(form).attr('action'),
            method = $(form).attr('method');

            if($('#profileAvatar').get(0).files.length !== 0){
                console.log(true);
                var canvas = $('#avatarCanvas');

                var base64 = canvas[0].toDataURL();

                var arr = base64.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]),
                    n = bstr.length,
                    u8arr = new Uint8Array(n);

                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }

                var file = new File([u8arr], 'avatar.png', {type:"image/png"});

                formData.append("avatar", file);
            }

            setTimeout(function(){
                $.ajax({
                    url: url,
                    cache:false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: method,
                    success: function(data){
                        if(data.result == 'success'){
                            $('.user-name').html(data.user.name);
                            $('.user-avatar').html('<img src="'+data.user.avatar+'" />');
                            $('.user-avatar').removeClass('empty-photo');
                        }
                    },
                    error: function(err){
                    }
                });
            }, 1000);

    });

    /*$('.dashboard-table-content').scroll(function(e){
        if($('.page-divider').length){
            var pageDivider = $('.page-divider'),
                page = pageDivider.data('page'),
                param = null,
                model = null;

            if($(this).scrollTop() > pageDivider.position().top - screen.height * 1.5){
                if($('.dashboard-table').length){
                    model = $('.dashboard-table').data('model');
                    if(model == 'realty'){
                        var mode = $('.realty-mode-btn.active').data('mode');
                        if(mode){
                            param = '&mode=' + mode;
                        }
                        var id = $('#searchRealtyInput').val();
                        param = param + '&customId='+id;

                    }else if(model == 'users'){
                        var email = $('#searchPhoneInput').val();
                        if(email){
                            param = '&email=' + email;
                        }
                    }
                    $(pageDivider).remove();
                    loadRecords(model, page, param);
                }
            }
        }
    });*/

    /*$(document).on('input', '#searchPhoneInput', function(){
        var email = $(this).val(),
            param = '';

        if(email){
            param = '&email=' + email;
        }
        loadRecords('users', 1, param, true);
    });

    $(document).on('input', '#searchRealtyInput', function(){
        var id = $(this).val(),
            param = '';

        if(id){
            param = '&customId=' + id;
        }
        loadRecords('realty', 1, param, true);
    });*/

});

function setToggle(toggle){
    $('.toggle-input').not($(toggle)).removeClass('active-input');

    $(toggle).addClass('active-input');
}

function openForm(model, mode, container, parentId = '', id = ''){
    var url = '/dashboard/'+model+'/'+mode+'/form';

    url += (id ? '?id='+id : '') + (parentId ? '?parentId='+parentId : '');

    $.ajax({
        url: url,
        cache:false,
        //data: {},
        type: 'get',
        success: function(form){
            if(mode == 'select-photo'){
                $('#selectPhotoModal').find('.dash-form-container').html(form);

                var currentPhotoId = $('input[name="'+activePhotoSelectName+'"]').val();

                $('.dash-select-photos-container .dash-media-item[data-id="'+currentPhotoId+'"]').addClass('selected');
                $('#selectedPhotoId').val(currentPhotoId);

                $('#selectPhotoModal').modal();
            }else{
                if(model == 'list-items'){
                    $('#listModal').find('.dash-form-container').html(form);

                    //var currentPhotoId = $('input[name="'+activePhotoSelectName+'"]').val();

                    //$('.dash-select-photos-container .dash-media-item[data-id="'+currentPhotoId+'"]').addClass('selected');
                    //$('#selectedPhotoId').val(currentPhotoId);

                    if(mode == 'delete'){
                        $('#listModal').removeClass('wide-modal').addClass('orange-modal');
                        modalTitle = 'Delete';
                    }else{
                        $('.dash-modal').removeClass('orange-modal');
                        modalTitle = 'List Item';
                    }
                    $('#listModal').find('.modal-title-label').html(modalTitle);

                    $('#listModal').modal();
                    $('.modal-backdrop').last().css('z-index', '1050');

                }else{
                    $(container).not($('#selectPhotoModal .dash-form-container, #listModal .dash-form-container')).html(form);
                    var modalTitle = model;

                    if(model == 'media' && (mode == 'view')){
                        $('.dash-modal').addClass('wide-modal');

                        if(mode == 'select-photo'){
                            modalTitle = 'Choose photo';
                        }
                    }else{
                        $('.dash-modal').not($('#selectPhotoModal, #listModal')).removeClass('wide-modal');
                    }

                    if(mode == 'delete'){
                        $('.dash-modal').not($('#selectPhotoModal')).removeClass('wide-modal').addClass('orange-modal');
                        modalTitle = 'Delete';
                    }else{
                        $('.dash-modal').removeClass('orange-modal');
                    }

                    if(model == 'property-options' && mode != 'delete'){
                        modalTitle = 'Property option';
                    }else if(model == 'property-features' && mode != 'delete'){
                        modalTitle = 'Property feature';
                    }

                    $('.dash-modal').not($('#selectPhotoModal, #listModal')).find('.modal-title-label').html(modalTitle);

                    $('.dash-modal').not($('#selectPhotoModal, #listModal')).modal();
                }

            }
        },
        error: function(err){

        }
    });
}

function calcHeight(){
    let vh = window.innerHeight * 0.01;
    $('.page').attr('style', '--vh:'+vh+'px');
}

function readFiles(files, container) {
    var deafaultWidth = 1200;
        //imageHeight = 900;
        //img = document.createElement("img");
    $.each(files, function(index, file){
        var reader = new FileReader(),
            canvas = $('#photo'+index+'Canvas');
    	reader.onload = function (e) {
            //img.src = e.target.result;
            var img = new Image();
            img.onload = function(){
                imageWidth = this.width,
                imageHeight = this.height;
                var aspectRatio = imageWidth / imageHeight;

                /*if(aspectRatio >= 1){
                    aspectRatio = 1 / aspectRatio;
                }*/

                var newWidth = deafaultWidth,
                    newHeight = newWidth / aspectRatio;

                canvas[0].width = newWidth;
                canvas[0].height = newHeight;
                var ctx = canvas[0].getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);

                setTimeout(function(){
                    uploadPhoto(index);
                }, 500);
            }
            img.src = event.target.result;

            var imgElem ='<div class="dash-table-column dash-media-item col-3" data-id="tmp_'+index+'">'+
                '<img src="'+img.src+'" class="dash-media-preview" />'+
                '<button class="dash-table-option-btn dash-btn blue-btn dash-control-btn" data-mode="view"><i class="fas fa-eye"></i></button>'+
                '<button class="dash-table-option-btn dash-btn orange-btn dash-control-btn" data-mode="delete"><i class="fas fa-trash-alt"></i></button>'+
            '</div>';
            container.append(imgElem);
    	}

    	reader.readAsDataURL(file);

    });

}

function uploadPhoto(index){
    var form = $('#uploadPhotoForm')[0],
        formData = new FormData(form),
        url = $(form).attr('action'),
        method = $(form).attr('method');

    //$.each(files, function(index, file){
        var canvas = $('#photo'+index+'Canvas');

        var base64 = canvas[0].toDataURL();

        var arr = base64.split(','),
            mime = arr[0].match(/:(.*?);/)[1],
            bstr = atob(arr[1]),
            n = bstr.length,
            u8arr = new Uint8Array(n);

        while(n--){
            u8arr[n] = bstr.charCodeAt(n);
        }

        var file = new File([u8arr], 'photo.png', {type:"image/png"});

        formData.append("photo", file);
        formData.append("index", index);
    //});

    setTimeout(function(){
        $.ajax({
            url: url,
            cache:false,
            data: formData,
            processData: false,
            contentType: false,
            type: method,
            success: function(data){
                console.log(data);
                if(data.savedPhoto){
                    $.each(data.savedPhoto, function(index, mediaId){
                        $('.dash-media-item[data-id="tmp_'+index+'"]').attr('data-id', mediaId);
                    });
                }
                //$('canvas').remove();
            },
            error: function(err){
            }
        });
    }, 1000);
}

/*function loadRecords(model, page, param, reload = false){
    var container = $('.dash-table-content');

    $.ajax({
        url: '/admin/'+model+'/load?p='+page+(param ? param : '')+'&reload='+reload,
        cache:false,
        //data: {},
        type: 'get',
        success: function(data){
            if(reload){
                container.html(data);
            }else{
                container.append(data);
                setTimeout(function(){
                    if(model == 'users'){
                        if($('.dashboard-table[data-model="users"] .date-group-label').length > 1){
                            var supervise = {};
                            $('.dashboard-table[data-model="users"] .date-group-label').each(function() {
                                var txt = $(this).data("date");
                                if (supervise[txt]){
                                    $(this).remove();
                                }
                                else{
                                    supervise[txt] = true;
                                }
                            });
                        }
                    }
                }, 100);
            }
        },
        error: function(err){

        }
    });
}*/
