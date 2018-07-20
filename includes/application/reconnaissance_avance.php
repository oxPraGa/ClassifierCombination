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
        <h1 style="color:#0079d1"><?php echo $lang[19]; ?></h1>
        <p><?php echo $lang[20]; ?></p>
        <div class="text-right flip">
          <span class="bigbutton bg1"><span><?php echo $lang[16]; ?></span></span>
        </div>
    </div>
</div>
<!-- fin Jumbotorn page application --> 

<div class="row" id="upload">
	<div class="col-xs-2 col-sm-3 col-md-4 "></div>
		<div class="col-xs-8 col-sm-6 col-md-4 text-center"  id="deposer">
            <p class="bigTxt"><?php echo $lang[25]; ?></p>
            <span class="glyphicon glyphicon-open"></span>
            <p class="smallTxt"><?php echo $lang[26]; ?></p>
            <label id="import-manual-trigger" class="btn-link" style="cursor:pointer">
                <?php echo $lang[27]; ?>
                <input type="file" name="fileToUpload" id="file-select" enctype="image/bmp" class="hidden" >
            </label>
		</div>
	<div class="col-xs-2 col-sm-3 col-md-4 "></div>	
</div>

<?php require_once('/../'.$config['paths']['includes'] . '/application/draw.php') ?>
<!-- Modal -->
<div id="analyserImage" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">   
            <div class="modal-body">
	           <button class="close " data-dismiss="modal" aria-label="close">&times;</button>
	           <br/><br/>
                <div id="EA">
		          <div id="LV" class="ligne_verticale" ></div>
                    <img id="i" class="img-rounded img-responsive" >
		          </div>
                <br/>
                <div id="resultat" class="table-responsive" style="display:none">
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th><?php echo $lang[31]; ?></th>
                        <th><?php echo $lang[32]; ?></th>
                        <th><?php echo $lang[33]; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="nn_lm">
                        <td>NN LM</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                      <tr id="nn_ft">
                        <td>NN FT</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                      <tr id="svm_lm">
                        <td>SVM LM</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                        <tr id="svm_ft">
                        <td>SVM FT</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                    </tbody>
                  </table>
                    
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th><?php echo $lang[34]; ?></th>
                        <th><?php echo $lang[32]; ?></th>
                        <th><?php echo $lang[33]; ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="voteMajoritaire">
                        <td>Vote majoritaire</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                      <tr id="borda">
                        <td>Borda</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                      <tr id="BKS">
                        <td>BKS</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                        <tr id="DS">
                        <td>DS</td>
                        <td class="bel"></td>
                        <td class="classe"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
		          <div class="text-center">
		              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang[28]; ?></button>
		          </div>
	           </div>
        </div>
    </div>
</div>

