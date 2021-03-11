<?php
//error_reporting(0);
define('APP_URL' , 'http://localhost');
define('PFE_MATLAB_DIR' , 'D:\wamp\www\pfe\matlab');
define('UPLOAD_DIR' , 'D:\wamp\www\pfe\uploads');
$config = array(
    
    "urls" => array(
        "baseUrl" => APP_URL."/pfe/",
        /********* application ********/
        0=> APP_URL."/pfe/application",
        1=> APP_URL."/pfe/application/simple",
        2=> APP_URL."/pfe/application/avance",
        3=> APP_URL."/pfe/application/api",
        4=> APP_URL."/pfe/application/apprentissage",
        5=> APP_URL."/pfe/application/simple/bdd1",
        6=> APP_URL."/pfe/simple",
        7=> APP_URL."/pfe/simple",
        8=> APP_URL."/pfe/simple",
        9=> APP_URL."/pfe/simple",
        10=>APP_URL."/pfe/simple",
        ),
    
    "paths" => array(
        "bdd" =>   "bdd/",
        "includes" =>   "includes/",
        "uploads" =>  "uploads/",
        "matlab" =>   "matlab/",
        "pages" =>  "pages/",
        "pdf" =>  "pdf/"
        )
);

function redirect($url)
{

   echo '<script> location.replace("'.$url.'"); </script>';
   die();
}

 

?>