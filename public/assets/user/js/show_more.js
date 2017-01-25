$(document).ready(function () {
    $('.show_more_interest').click(function () {
        var id = $('.interest_show_block').first().attr('data-id');
        console.log(id);
        $.ajax({
            type:"GET",
            url: '/show-more-interest/'+id,
            success:function(data){
                $('.interst_block_show').html(data.resource)
            }
        })
    })
})