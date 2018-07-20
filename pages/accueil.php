<?php
require_once('../includes/config/config.php');
require_once('../'.$config['paths']['includes'] . '/header.php');

?>

<!-- Jumbotorn page accueil -->
<div class="jumbotron site-header" id="demo5">
    <div class="container text-center">
        <h1><span class="glyphicon glyphicon-education"></span></h1>
        <h1 class="row"><?php echo $lang[9]; ?></h1>
		<h3><?php echo $lang[10]; ?></h3>
        <p class="row"><?php echo $lang[11]; ?></p>
        <div class="text-right flip">
           <span class="bigbutton bg1"> <a href="<?php echo $config['urls'][0]; ?>"><span><?php echo $lang[12]; ?></span></a></span>
        </div>
    </div>
</div>
<!-- fin Jumbotorn page accueil -->

<?php
require_once('../'.$config['paths']['includes'] . '/footer.php');
?>



