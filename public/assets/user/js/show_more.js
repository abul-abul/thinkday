$(document).ready(function () {
    $('.show_more_interest').click(function () {
        var id = $('.interest_show_block').last().attr('data-id');
        $(this).css('display','none');
        $.ajax({
            type:"GET",
            url: '/show-more-interest/'+id,
            beforeSend : function(){
                $('.interest_loading').css('display','block');
            },
            success:function(data){
                $(this).css('display','block');

                if (data.status == 'success' && data.resource != ''){
                    $('.interst_block_show').append(data.resource)
                }else{
                    $('.show_more_interest').hide(500);
                }
            }
        })
    })
    //
    $('.show_more_news').click(function () {
        var id = $('.news_show_block').last().attr('data-id');
        $(this).css('display','none');

        $.ajax({
            type:"GET",
            url: '/show-more-news/'+id,
            beforeSend : function(){
                $('.showw_more_loading').css('display','block');
            },
            success:function(data){
                if (data.status == 'success' && data.resource != ''){
                    $('.append_news_block').append(data.resource)
                }else{
                    $('.show_more_news').hide(500);
                }
            }
        })
    })











})