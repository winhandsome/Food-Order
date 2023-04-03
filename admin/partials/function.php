<?php
    define('ADMIN_URL', 'http://localhost/food-order/admin/');
    
    function redirect_to($page){
        $url = ADMIN_URL. $page ;
        header("location: $url");
    };

?>