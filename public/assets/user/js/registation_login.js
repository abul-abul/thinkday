$(document).ready(function(){
    $('.reg_submit').click(function () {
        var name = $('.reg_name').val();
        var surname = $('.reg_surname').val();
        var reg_email = $('.reg_email').val();
        var reg_pass = $('.reg_pass').val();
        var reg_rebeatpass = $('.reg_rebeatpass').val();
        var token = $('.token').attr('content');

        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if(name == ""){
            $('.reg_name').addClass('red')
        }else{
            $('.reg_name').removeClass('red')
        }
        if(surname == ""){
            $('.reg_surname').addClass('red')
        }else{
            $('.reg_surname').removeClass('red')
        }
        if(reg_email == "" || !pattern.test(reg_email)){
            $('.reg_email').addClass('red')
        }else{
            $('.reg_email').removeClass('red')
        }
        if(reg_pass == ""){
            $('.reg_pass').addClass('red')
        }else{
            $('.reg_pass').removeClass('red')
        }
        if(reg_rebeatpass == ""){
            $('.reg_rebeatpass').addClass('red')
        }else{
            $('.reg_rebeatpass').removeClass('red')
        }
        if(reg_pass != reg_rebeatpass){
            $('.reg_pass').addClass('red')
            $('.reg_rebeatpass').addClass('red')
        }
        if(surname == "" || surname == "" || reg_email == "" || !pattern.test(reg_email) || reg_pass == "" || reg_rebeatpass == "" || reg_pass != reg_rebeatpass){

        }else{
            $.ajax({
                url: '/user/registration',
                type: 'post',
                data:{_token:token,firstname:name,lastname:surname,email:reg_email,password:reg_pass},
                success: function(data)
                {
                    console.log(data)
                }
            });
        }

    })

    $('.login_submit').click(function () {
        var login_email = $('.login_email').val();
        var login_password = $('.login_password').val();
        var token = $('.token').attr('content');
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(login_email == "" || !pattern.test(login_email)){
            $('.login_email').addClass('red')
        }else {
            $('.login_email').removeClass('red')
        }
        if(login_password == ""){
            $('.login_password').addClass('red')
        }else{
            $('.login_password').removeClass('red')
        }
        if(login_email == "" || !pattern.test(login_email) || login_password == ""){

        }else{
            $.ajax({
                url: '/user/login',
                type: 'post',
                data:{_token:token,email:login_email,password:login_password},
                success: function(data)
                {
                    if(data.error == 'success'){
                        window.location.assign('/user/profile');
                    }else{
                        alert('error')
                    }
                }
            });
        }
    })



})