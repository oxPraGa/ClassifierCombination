<?php
session_start();
if(!isset($_SESSION['lang'])){
    $_SESSION['lang']='fr';
    $_SESSION['langAffich']='Français';  
}
session_id();
require_once('/lang/' . $_SESSION["lang"] . '.php');
?>


<!DOCTYPE HTML>

<HTML lang="<?php echo $_SESSION["lang"] ;?>">
    <HEAD>
        
        <BASE href="<?php echo $config['urls']['baseUrl']; ?>"/>
            
        <TITLE><?php echo $lang[1]; ?></TITLE>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $lang[2]; ?>">
        <meta name="keywords" content="<?php echo $lang[3]; ?>">
        <meta name="author" content="<?php echo $lang[4]; ?>">
        <link rel="shortcut icon" href="image/favicon.ico">
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/main.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/headerFooter.css"/>
        
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/bigbutton.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/explainList.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/application.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>lib/bootstrap-3.3.6-dist/css/bootstrap.min.css"/>
        
        <?php if($_SESSION['lang']=='ar')
            echo '<link rel="stylesheet" type="text/css" href="'.$config['urls']['baseUrl'].'lib/bootstrap-rtl-master/dist/css/bootstrap-rtl.min.css">';
        ?>
         <script type="text/javascript">
            var config = []; 
            config["rootLink"]  = '<?php echo $config['urls']['baseUrl']; ?>';
            config["bdd"]  = '<?php echo $config['paths']['bdd']; ?>';
            config["includes"]  = '<?php echo $config['paths']['includes']; ?>';
            config["uploads"]  = '<?php echo $config['paths']['uploads']; ?>';
            config["matlab"]  = '<?php echo $config['paths']['matlab']; ?>';
            config["pages"]  = '<?php echo $config['paths']['pages']; ?>';
            config["pdf"]  = '<?php echo $config['paths']['pdf']; ?>';
         </script>
        <script src="<?php echo $config['urls']['baseUrl']; ?>lib/jquery/jquery-1.12.3.min.js"></script>
        <script src="<?php echo $config['urls']['baseUrl']; ?>lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
        <script>
            function langage(l){
	
	// instancer la requete ajax.
	var xhr =  new XMLHttpRequest();
	
	// traimtement de la requete qu'on elle termine.
	xhr.onreadystatechange= function () {	
		if (xhr.readyState == 4 ){
			if ( xhr.status == 200) {
				//foction qui affiche les resultats du traimtement du fichier txt
				 location.reload();
			} else {
				die('Une erreur est survenue!');
			}
		}
	};

	// créer une connexion.
	xhr.open('GET',config["includes"]+'/lang/lang.php?lang='+l, false);
	// envoyer les données
	xhr.send(null);	
	
} // Fin traiter(file_name);
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo $config['urls']['baseUrl']; ?>css/slide.css"/>

    </HEAD>
<BODY>
    <header>
        <nav class="navbar navbar-default ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $config['urls']['baseUrl']; ?>accueil"><span class="glyphicon glyphicon-home"></span> <?php echo $lang[5]; ?></a>
                </div>
                
                <!-- les liens de la barre de navigation -->
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav">
                        <li> <a href="<?php echo $config['urls']['baseUrl']; ?>application" > <span class="glyphicon glyphicon-th"></span>  <?php echo $lang[6]; ?></a> </li>
                        <li> <a href="<?php echo $config['urls']['baseUrl']; ?>memoire"> <span class="glyphicon glyphicon-book"></span> <?php echo $lang[7]; ?></a> </li>
                        <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> <?php echo $lang[8]; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right flip">
                        <li>
                            <div class="dropdown">
                                <li><a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer">
                                        <span class="glyphicon glyphicon-globe"></span> 
                                        <?php echo $_SESSION['langAffich']; ?><span class="caret "></span>
                                        <ul class="dropdown-menu">
                                            <li><a onclick="langage('fr')" style="cursor:pointer">Francais</a></li>
                                            <li><a onclick="langage('ar')" style="cursor:pointer">العربية</a></li>
                                        </ul>
                                    </a>
                                </li>
                            </div></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>