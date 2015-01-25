<!DOCTYPE html>
<head>
    <title>Petlanda | Sign Up..</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->    
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>css/pages/page_log_reg_v2.css">    

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>css/theme-colors/default.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?php echo $this->config->item('assets');?>css/custom.css">
</head> 

<body>
<!--=== Content Part ===-->    
<div class="container">
    <!--Reg Block-->
    <div class="reg-block">
        <div class="reg-block-header">
            <h2>Sign Up</h2>
            <ul class="social-icons text-center">
                <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>
                <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="#"></a></li>
            </ul>
            <p>Already Signed Up? Click <a class="color-green" href="<?php echo base_url().'login'?>">Sign In</a> to login your account.</p>
        </div>

        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input id="userName" type="text" class="form-control" placeholder="Username">
        </div>
        <div class="alert alert-danger fade in" style="display: none;" id="username_msg">
            <strong> You can't leave this empty. </strong> 
        </div>
        <div class="alert alert-danger fade in" style="display: none;" id="user_exist_msg">
            <strong>Ohh!</strong> This username already exist.
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input id="email" type="text" class="form-control" placeholder="Email">
        </div>
        <div class="alert alert-danger fade in" style="display: none;" id="email_msg">
            <strong>Ohh!</strong> This enter valid email.
        </div>
        <div class="alert alert-danger fade in" style="display: none;" id="email_exist_msg">
            <strong>Ohh!</strong> This email already exist.
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input id="Password" type="Password" class="form-control" placeholder="Password">
        </div>
        <div class="alert alert-danger fade in" id="password_msg" style="display: none;">
            <strong>Ohh!</strong>  You can't leave this empty. 
        </div>
        <div class="input-group margin-bottom-30">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input id="Password_repeat" type="Password" type="text" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="alert alert-danger fade in" id="mismatch_msg" style="display: none;">
            <strong>Ohh!</strong> These passwords don't match. Try again?
        </div>
        

<!--        <div class="checkbox">            
            <label>
                <input type="checkbox"> 
                <p>I read <a target="_blank" href="page_terms.html">Terms and Conditions</a></p>
            </label>
        </div>-->
                                
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button type="button" id="register_user" class="btn-u btn-block">Register</button>                
            </div>
        </div>
    </div>
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/back-to-top.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/countdown/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>plugins/backstretch/jquery.backstretch.min.js"></script>
<script type="text/javascript">
    $.backstretch([
      "<?php echo $this->config->item('assets');?>img/bg/5.jpg",
      "<?php echo $this->config->item('assets');?>img/bg/4.jpg",
      ], {
        fade: 1000,
        duration: 7000
    });
</script>
<!-- JS Customization -->
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>js/custom.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="<?php echo $this->config->item('assets');?>js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();      
    });
    
    jQuery("#register_user").click(function(){
        //alert(JSON.stringify());
        var userName = jQuery.trim(jQuery('#userName').val());
        jQuery('#password_msg').fadeOut(1000);
        if(userName.length==0){
            jQuery('#username_msg').fadeIn();
            return false;
        }else{
           jQuery('#username_msg').fadeOut(1000);
        }
        var email = jQuery.trim(jQuery('#email').val());
        if(email.length==0){
            jQuery('#email_msg').fadeIn();
            return false;
        }
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(email.length>0){
            if(!regex.test(email)) {
                jQuery('#email_msg').fadeIn();
                return false;
            }else{
                jQuery('#email_msg').fadeOut(1000);
            }
        }
        var Password = jQuery.trim(jQuery('#Password').val());
        if(Password.length==0){
            jQuery('#password_msg').fadeIn();
            return false;
        }
        var Password_repeat = jQuery.trim(jQuery('#Password_repeat').val());
        if(Password_repeat.length==0){
            jQuery('#mismatch_msg').fadeIn();
            return false;
        }
        if(Password!==Password_repeat){
            jQuery('#mismatch_msg').fadeIn();
            return false;
        }else{
            jQuery('#mismatch_msg').fadeOut(1000);
        }
        
//        if(site_name.length<=4){
//            alert('Please enter website name.');
//            $('html, body').animate({ scrollTop: 0 }, 1000);
//            $('#website_name').focus();
//            return false;
//        }
        
            jQuery.ajax({
                type : "post",
                dataType : "html",
                url : 'http://petlanda.com/login/authenticate_user',
                data : ({ 
                    action_type: 'ajax',
                    userName : userName,
                    email : email,
                    Password:Password,
                    Password_repeat:Password_repeat
                    //your_logo_type:your_logo_type,
                }),
                success : function(data){
                        if(data=='user_exist'){
                            alert('username or email already exist.');
                            return false;
                        }else if(data=='password_not_match'){
                            alert('These passwords don\'t match. Try again');
                            return false;
                        }
                        location.href = 'http://petlanda.com/';
                },
                error: function(xhr){
                      //alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                      console.log(xhr);
                      return false;
                },
                beforeSend : function(){
                    
                }
            });
            
        
    });
</script>
</body>
</html> 