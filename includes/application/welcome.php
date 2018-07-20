<!-- Jumbotorn page application -->
<div class="jumbotron site-header" id="jumbotronApplication">
    <div class="container">
      <!--  <div class="pull-right dropdown" style="cursor:pointer">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><abbr>BDD:</abbr> Villes <span class="caret "></span></button>
            
            <ul class="dropdown-menu">
                <li><a onclick="bdd('villes')" style="cursor:pointer">Villes</a></li>
                <li><a onclick="bdd('communes')" style="cursor:pointer">Communes</a></li>
            </ul>
        </div>-->
        <h1><?php echo $lang[14]; ?></h1>
        <p><?php echo $lang[15]; ?></p>
        <div class="text-right flip">
          <span class="bigbutton bg1"><span><?php echo $lang[16]; ?></span></span>
        </div>
    </div>
</div>
<!-- fin Jumbotorn page application --> 

<div class="container-fluid">
    <ul class="explainList" >
        <li class="col-md-3 element">
            <a href="<?php echo $config['urls'][1] ?>" style="color:#6cc644"><span class="bigbutton bg2"><span><?php echo $lang[17]; ?> </span></span></a>
            <p><?php echo $lang[18]; ?></p>
        </li>
        <li class="col-md-3 element" >
            <a href="<?php echo $config['urls'][2] ?>" style="color:#0079d1"><span class="bigbutton bg2"><span><?php echo $lang[19]; ?> </span></span></a>
            <p><?php echo $lang[20]; ?></p>
            
        </li>
        <li class="col-md-3 element" >
            <a href="<?php echo $config['urls'][3] ?>" style="color:#7a3497"><span class="bigbutton bg2"><span><?php echo $lang[21]; ?></span></span></a>
            <p><?php echo $lang[22]; ?></p>
            
        </li>
        <li class="col-md-3 element" >
            <a href="<?php echo $config['urls'][4] ?>" style="color:#e8400d"><span class="bigbutton bg2"><span> <?php echo $lang[23]; ?></span></span></a>
            <p><?php echo $lang[24]; ?></p>
        </li>
    </ul>
</div>