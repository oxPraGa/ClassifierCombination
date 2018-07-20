<?php
//error_reporting(0);
 
$config = array(
    
    "urls" => array(
        "baseUrl" => "http://192.168.1.4/pfe/",
        /********* application ********/
        0=> "http://192.168.1.4/pfe/application",
        1=> "http://192.168.1.4/pfe/application/simple",
        2=> "http://192.168.1.4/pfe/application/avance",
        3=> "http://192.168.1.4/pfe/application/api",
        4=> "http://192.168.1.4/pfe/application/apprentissage",
        5=> "http://192.168.1.4/pfe/application/simple/bdd1",
        6=> "http://192.168.1.4/pfe/simple",
        7=> "http://192.168.1.4/pfe/simple",
        8=> "http://192.168.1.4/pfe/simple",
        9=> "http://192.168.1.4/pfe/simple",
        10=>"http://192.168.1.4/pfe/simple",
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