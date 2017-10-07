$(function(){
    $("#register_form").validate({
        
        rules:{
            usernamesignup:{
                required:true,
                minlength:2
            },
            userlogin:{
                 required:true,
                 remote:{
                    url:"check_data.php?type=check_login",
                    type:"post"
                 }
            },
            userbirth:{
                 required:true
            },
            emailsignup:{
                 required:true,
                 email:true,
                  remote:{
                    url:"check_data.php?type=check_email",
                    type:"post"
                 }
            },
            country:{
                 required:true
            },
            passwordsignup:{
                 required:true,
                  minlength:6
            },
            passwordsignup_confirm:{
                 equalTo:"#passwordsignup"
            }
            
        }        
    });
    
       $("#login_form").validate({
        rules:{
            username:{
                required:true
            }
          
            
        }
        
    });
});


