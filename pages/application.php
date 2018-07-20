<?php
require_once('/../includes/config/config.php');
require_once('/../'.$config['paths']['includes'] . '/header.php');
?>



<?php
if(!isset($_GET['type'])){
    
require_once('/../'.$config['paths']['includes'] . '/application/welcome.php');
    
} else if($_GET['type']=='simple') {
    
    
        require_once('/../'.$config['paths']['includes'] . '/application/reconnaissance_simple.php');
        echo '<script type="text/javascript" src="'.$config['urls']['baseUrl'].'js/ajax_form.js"></script>';
    
}else if($_GET['type']=='avance') {
    
    
        require_once('/../'.$config['paths']['includes'] . '/application/reconnaissance_avance.php');
        echo '<script type="text/javascript" src="'.$config['urls']['baseUrl'].'js/ajax_form_av.js"></script>';
    
}else if($_GET['type']=='api') {
    
    
        require_once('/../'.$config['paths']['includes'] . '/application/api.php');
        echo '<script type="text/javascript" src="'.$config['urls']['baseUrl'].'js/ajax_form_av.js"></script>';
    
} else {
    require_once('/../'.$config['paths']['includes'] . '/application/welcome.php');
}
?>


<?php require_once('/../'.$config['paths']['includes'] . '/footer.php');?>