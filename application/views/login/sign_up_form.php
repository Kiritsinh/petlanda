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
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="First name" id="firstname" name="firstname">
            <input type="text" class="form-control" placeholder="Last name" id="lastname" name="lastname">
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
    <div class="input-group margin-bottom-40">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <select name="gender" id="gender" class="form-control">
            <option disabled="" selected="" value="0">Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>          
    </div>

        <div class="alert alert-danger fade in" id="gender_msg" style="display: none;">
            <strong>Ohh!</strong>  Please select your gender. 
        </div>
        <div class="input-group margin-bottom-40">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <select name="country" id="country" class="form-control">
                <option disabled="" selected="" value="0">Country</option>
                <?php 
                foreach($country as $val){
                    if(!empty($val)){
                    ?>
                <option value="<?php echo $val;?>"><?php echo $val;?></option>
                <?php }}?>
            </select>          
        </div>
<div class="input-group margin-bottom-40" id="city_div" style="display: none;">
                      
        </div>
<div class="input-group margin-bottom-40">
    <span class="input-group-addon">Birthday</span>
    <span class="input-group-addon">
             <select class="form-control" title="Day" id="day" name="birthday_day" aria-label="Day">
                 <option selected="1" value="0">D</option>
                 <?php 
                 $days = range(1, 31);
                 foreach($days as $val){?>
                 <option value="<?php echo $val;?>"><?php echo $val;?></option>
                 <?php }?>
                 </select>
    </span>     
    <span class="input-group-addon">
             <select class="form-control" title="Month" id="month" name="birthday_month" aria-label="Month">
                 <option selected="1" value="0">M</option>
                 <?php 
                 $month = array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                 foreach($month as $key=>$val){
                 ?>
                 <option value="<?php echo $key;?>"><?php echo $val;?></option>
                 <?php }?>
                 
             </select>
    </span>
    <span class="input-group-addon">
                 <select class="form-control" title="Year" id="year" name="birthday_year" aria-label="Year">
                     <option selected="1" value="0">Y</option>
                     <?php 
                     $years = array_reverse(range(1905, 2015));
                     foreach($years as $val){?>
                     <option value="<?php echo $val;?>"><?php echo $val;?></option>
                     <?php }?>
                     </select>
             </span>
    </div>
<div class="alert alert-danger fade in" id="bday_msg" style="display: none;">
            <strong>Ohh!</strong>  Please enter your birthday. 
        </div>

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
<!-- Datepicker Form -->
<script src="<?php echo $this->config->item('assets');?>plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        $('#country').change(function() {
            var country = $('#country').val();
            jQuery.ajax({
                type: "post",
                dataType: "html",
                //url: 'http://localhost/petlanda/login/get_city',
                url: 'http://petlanda.com/login/get_city',
                data: ({
                    action_type: 'ajax',
                    country: country
                }),
                success: function(data) {
                    if(data=='no_country'){
                        jQuery('#city_div').html('Please select valid country');
                        return false;
                    }
                    jQuery('#city_div').show();
                    jQuery('#city_div').html(data);
                }
            });
        });
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
        
        var firstname = jQuery.trim(jQuery('#firstname').val());
        var lastname = jQuery.trim(jQuery('#lastname').val());
        
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
        var gender = jQuery('#gender').val();
        if(gender==null){
            jQuery('#gender_msg').fadeIn();
            return false;
        }else{
            jQuery('#gender_msg').fadeOut(1000);
        }
        var country = jQuery.trim($('#country').val());
        var city = jQuery.trim($('#city').val());
        if(country==null || country==0){
            alert('Please select country');
            return false;
        }
        var day = jQuery.trim(jQuery('#day').val());
        var month = jQuery.trim(jQuery('#month').val());
        var year = jQuery.trim(jQuery('#year').val());
        
        if(day==0 || month==0 || year==0){
            jQuery('#bday_msg').fadeIn();
            return false;
        }else{
            jQuery('#bday_msg').fadeOut(1000);
        }
        
        jQuery.ajax({
                type : "post",
                dataType : "html",
                url : 'http://petlanda.com/login/authenticate_user',
                //url : 'http://localhost/petlanda/login/authenticate_user',
                data : ({ 
                    action_type: 'ajax',
                    userName : userName,
                    email : email,
                    Password:Password,
                    Password_repeat:Password_repeat,
                    gender:gender,
                    firstname:firstname,
                    lastname:lastname,
                    day:day,
                    month:month,
                    year:year,
                    country:country,
                    city:city                    
                }),
                success : function(data){
                        if(data=='user_exist'){
                            alert('username or email already exist.');
                            return false;
                        }else if(data=='password_not_match'){
                            alert('These passwords don\'t match. Try again');
                            return false;
                        }else if(data=='bday'){
                            alert('Please select valid birh date');
                            return false;
                        }else if(data=='fake_country'){
                            alert('Please select valid country');
                            return false;
                        }else if(data=='fake_city'){
                            alert('Please select valid city');
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