<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('pr')) {

    function pr($array) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

}
?>
