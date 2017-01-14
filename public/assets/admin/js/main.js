$(document).ready(function(){
	//article
	$(window).load(function(){
		$('.wysiwyg-choose-file').next().remove();
	});

	$('.save_article').click(function(){
		var editor = $('#editor1').html();
		var text = $('.editor_article').val(editor);
	});

	$('.uploade_article_images').click(function(){
		$('.article_image').trigger('click');		
	});

	$('.article_image').change(function(event){
		files = event.target.files;
        event.stopPropagation(); 
        event.preventDefault();
        var data = new FormData();
        var token = $('.article_image').attr('alt');
        data.append('file', files[0]);
        data.append('_token',token);

        $.ajax({
            url: '/ab-admin/article-uploade',
            type: 'post',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data)
            {   
            	var src = '/assets/admin/images/article_uploade/' + data
	            $('#gridSystemModal').modal('show');
	            $('.article_images_js').attr('src',src);   
            }
        });
	})

    $('.save_images_article').click(function(){
        $('#gridSystemModal').modal('hide');
    })

    $('.edit_file_article').click(function(){
        $('.edit_file_article_image').trigger('click')
    })
	//end article


    //===========Gallery
    $('.add_gallery').click(function(){
        $('.gallery_file').trigger('click')
    })


    $('.galery_delete').click(function(){
        var id = $(this).attr('data-id');
        var row = $(this).parent().parent().parent()
        $.ajax({
            url: '/ab-admin/delete-gallery/' + id,
            type: 'get',
            success: function(data)
            {   
                row.hide(1000);
            }
        });
    })

    $('.galery_edit').click(function(){
        window.edit_id = $(this).attr('data-id')
        window.link_image = $(this).parent().parent().prev().prev().children().attr('src');
        window.link_image1 = $(this).parent().parent().prev().prev().children();
        $('.gallery_image_modal').attr('src',link_image)
    })

    $('.gallery_image_modal').click(function(){
        $('.gallery_image_modal_edit').trigger('click')
    })

    $('.gallery_image_modal_edit').change(function(){
        files = event.target.files;
        event.stopPropagation(); 
        event.preventDefault();
        var data = new FormData();
        var token = $('.gallery_image_modal_edit').attr('content');
        data.append('file', files[0]);
        data.append('_token',token);
        data.append('id',edit_id);
        $.ajax({
            url: '/ab-admin/gallery-image-edit',
            type: 'post',
            data: data,
            cache: false,
            beforeSend: function() {
               $('.img_loading').css('display','block');
            },
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data)
            {   
                var src = '/assets/admin/images/gallery_uploade/' + data;
                link_image1.attr('src',src)                 
                $('.gallery_image_modal').attr('src',src);
                $('.img_loading').css('display','none');
            }
        });
    })

    $('.crop_image_button').click(function(){
        $('.get_data').trigger('click');
        var token = $('.get_data').attr('content');
        var get_data = $('#putData').val();
        var image = $('#image').attr('src');
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/ab-admin/crop-image',
            type: 'post',
            data: {_token:token,data_crop:get_data,data:image},
            success: function(data)
            {   
                var image_name = data.image_name;
                $.ajax({
                    url: '/ab-admin/crop-image-update',
                    type: 'post',
                    data: {_token:token,id:id,image_name:image_name},
                    success : function(data){
                        location.reload()
                    }
                })
            }
        });
    })


    $('.resize_icon').click(function(event){
        window.resize_id = $(this).attr('data-id');
        window.token = $(this).attr('content');
    })

    $('.resize_image').click(function(){
        var width = $('.gal_image_width').val();
        var height = $('.gal_image_height').val();
        $(this).attr('disabled', 'disabled');

        if(width == '' && height == '')
        {
            alert('error')
        }else{
            $.ajax({
                url: '/ab-admin/resize-image',
                type: 'post',
                data: {_token:token,id:resize_id,height:height,width:width},
                beforeSend: function() {
                   $('.img_loading1').css('display','block');
                },
                success : function(data){
                    location.reload();

                }   
            }) 
        }
        
    })
    //===========End Gallery


    //============Page 
    $('.page_plus').click(function(){
        $(this).parent().next().children().fadeIn(100)
        $(this).fadeOut(100,function(){
            $(this).next().css('display','block')
        })
    })
    $('.page_minus').click(function(){
        $(this).parent().next().children().fadeOut(100)
        $(this).fadeOut(100,function(){
            $(this).prev().css('display','block')
        })
    })
    //============end page

    //===========Page gallery
    $('.crop_image_gallery_button').click(function(){
        $('.get_data').trigger('click');
        var token = $('.get_data').attr('content');
        var get_data = $('#putData').val();
        var image = $('#image').attr('src');
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/ab-admin/crop-page-gallery',
            type: 'post',
            data: {_token:token,data_crop:get_data,data:image},
            success: function(data)
            {
                // var image_name = data.image_name;
                // $.ajax({
                //     url: '/ab-admin/crop-image-page-gallery-update',
                //     type: 'post',
                //     data: {_token:token,id:id,image_name:image_name},
                //     success : function(data){
                //        // location.reload()
                //     }
                // })
            }
        });
    })

    //===========End Page gallery


})

