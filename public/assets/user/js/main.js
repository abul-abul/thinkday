$(document).ready(function () {
    $('.search_all').keypress(function(e){
        if(e.keyCode == 13)
        {
            $('#search_all').submit();
        }
    })


})