<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ihab2014_vijay');
define('DB_PASSWORD', 'vijay@%^()');
define('DB_DATABASE', 'ihab2014_web_petlanda');

class User {

    function checkUser($uid, $oauth_provider, $username,$email,$twitter_otoken,$twitter_otoken_secret) 
	{
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $query = mysqli_query($db,"SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
        $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
        if (!empty($result)) {
            # User is already present
        } else {
            
            #user not present. Insert a new Record
            //echo "INSERT INTO `users` (oauth_provider, oauth_uid, username,email,twitter_oauth_token,twitter_oauth_token_secret) VALUES ('$oauth_provider', $uid, '$username','$email','$twitter_otoken','$twitter_otoken_secret')";
            $query = mysqli_query($db,"INSERT INTO `users` (oauth_provider, oauth_uid, username,email,twitter_oauth_token,twitter_oauth_token_secret) VALUES ('$oauth_provider', $uid, '$username','$email','$twitter_otoken','$twitter_otoken_secret')");
            $query = mysqli_query($db,"SELECT * FROM `users` WHERE oauth_uid = '$uid' and oauth_provider = '$oauth_provider'");
            $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
            return $result;
        }
        return $result;
    }

}
?>
