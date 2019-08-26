$(document).ready(function () {
    $('#form1').on('submit', function(e){
        e.preventDefault();
        var username = $('#username').val();
        var lastname = $('#lastname').val();
        var mobile = $('#mobile').val();
        var email = $('#email').val();
        var isError = true;

        var regex = /^[a-zA-Z ]*$/;
        if(!regex.test(username)){
            isError = false;
            $('#usernameerror').html('Only Character and Spaces Allowed');
        }else{
            $('#usernameerror').html('');
        }

        var regex = /^[a-zA-Z ]*$/;
        if(!regex.test(lastname)){
            isError = false;
            $('#lastnameerror').html('Only Character and Spaces Allowed');
        }else{
            $('#lastnameerror').html('');
        }

        var regex = /^[1-9]{1}[0-9]{9}$/;
        if(!regex.test(mobile)){
            isError = false;
            $('#mobileerror').html('Please Enter 10 Digit Valid mobile number');
        }else{
            $('#mobileerror').html('');
        }

        var regex = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if(!regex.test(email)){
            isError = false;
            $('#emailerror').html('Please Enter Valid Email Address');
        }else{
            $('#emailerror').html('');
        }

        if(isError == true){
            $.ajax({
                type: "post",
                url: "user.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function (response) {
                    $('#message').html(response);
                    if(response === '1'){
                        $('#message').html('Record added Succesfully into database');
                        $('#username').val('');
                        $('#lastname').val('');
                        $('#mobile').val('');
                        $('#email').val('');
                        $('#image').val('');
                    }else{
                       var data = JSON.parse(response);
                       $('#usernameerror').html(data.usernameerror);
                       $('#lastnameerror').html(data.lastnameerror);
                       $('#mobileerror').html(data.mobileerror);
                       $('#emailerror').html(data.emailerror);
                       $('#imageerror').html(data.imageerror);

                        
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
    
                    $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
                
            });
        }

    });


    $('#image').on('change', function(){
        var value = $('#image').val();
        var typ = value.substring((value.lastIndexOf('.')+1)).toLowerCase();
        var acceptableType = ["jpeg", "png", "gif", "jpg"];
        var isImag = $.inArray(typ, acceptableType);
        
        if(isImag<0){
            isError = false;
            $('#image').val("");
            $('#imageerror').html("Please upload a valid image");
        }else{
            $('#imageerror').html("");
        }
    });

    $('#display').on('click', function(){
        window.location.replace("display.php");
    });
});