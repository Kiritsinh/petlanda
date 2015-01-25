<?php
session_start();
//session_destroy();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    //header("location: home.php");
    //redirect(site_url(), 'refresh');
}

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'twitter') {
        //header("Location: http://localhost/petlanda/twitter/login-twitter.php");
        header("Location: twitter/login-twitter.php");
    } 
//    else if ($oauth_provider == 'facebook') {
//        header("Location: login-facebook.php");
//    }
}
?>
<!DOCTYPE html>
<head>
    <title>Petlanda | Login Page..</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <?php //echo $this->config->item('css');exit;?>
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
            <h2>Sign In</h2>
            <ul class="social-icons text-center">
                <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>
                <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="?login&oauth_provider=twitter"></a></li>
            </ul>
            <p>Don't Have Account? Click <a class="color-green" href="<?php echo base_url().'login/sign_up'?>">Sign Up</a> to registration.</p>            
        </div>

        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input id='userName' type="text" class="form-control" placeholder="Email Or Username">
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input id='Password' type="password" class="form-control" placeholder="Password">
        </div>
        <hr>

<!--        <div class="checkbox">
            <label>
                <input type="checkbox"> 
                <p>Always stay signed in</p>
            </label>            
        </div>-->
                                
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button type="button" id='login_btn' class="btn-u btn-block">Log In</button>
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
    
    jQuery("#login_btn").click(function(){
        //alert(JSON.stringify());
        var userName = jQuery.trim(jQuery('#userName').val());
        if(userName.length==0){
            jQuery('#username_msg').fadeIn();
            return false;
        }else{
           jQuery('#username_msg').fadeOut(1000);
        }
        var Password = jQuery.trim(jQuery('#Password').val());
        if(Password.length===0){
            jQuery('#password_msg').fadeIn();
            return false;
        }
            jQuery.ajax({
                type : "post",
                dataType : "html",
                url : 'http://petlanda.dev/login/auth_user',
                data : ({ 
                    action_type: 'ajax',
                    userName : userName,
                    Password:Password
                }),
                success : function(data){
                        if(data=='success'){
                            location.href = 'http://petlanda.dev/';
                        }
                        if(data=='new'){
                            location.href = 'http://petlanda.dev/login/sign_up';
                        }
                        //alert(data);
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