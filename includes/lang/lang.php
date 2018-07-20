<?php
session_start();
if(!isset($_GET['lang']) || $_GET['lang']=='fr'){
$_SESSION['lang']='fr';
$_SESSION['langAffich']='Français'; 
}else{
$_SESSION['lang']='ar';
$_SESSION['langAffich']='العربية'; 
}
?>