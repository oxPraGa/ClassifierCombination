<?php
require_once('../includes/config/config.php');
require_once('../'.$config['paths']['includes'] . '/header.php');

?>

        
        
        <!-- source = http://rootslabs.net/blog/538-embarquer-pdf-page-web-pdf-js -->
        
        <script src="./lib/pdfjs/build/pdf.js"></script>
        <script>
        PDFJS.workerSrc='./lib/pdfjs/build/pdf.worker.js';    
        </script>

<div style="float:left">
    
  
    <div  id="viewer" style="display: none;margin-top: 5%;">
        <canvas id="canvasPDF" class="" style="border:1px solid #ddd;  margin:0px;"></canvas>
        
        <div class="text-center" >
            <span id="bp" class="btn "><span><?php echo $lang[36]; ?></span></span>
            <span id="bn" class="btn "><span><?php echo $lang[35]; ?></span></span>
        </div>
    </div>
    
    <aside class="pull-left" style="margin-left:0px; margin-top: 10%;">
            <ul class="nav">
                <li class="nav-item">
                    <span onclick="chapitre(1)">PAGE DE GARDE</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(2)">DÉDICACES</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(3)">REMERCIEMENTS</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(4)">RÉSUMÉS</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(10)">LISTES</span>
                </li> 
                <li class="nav-item">
                    <span onclick="chapitre(15)">INTRODUCTION GENERALE</span>
                </li>
                
                <li class="nav-item">
                    <span onclick="chapitre(17)">INTRODUCTION À LA RCONNAISSANCE DU MANUSCRIT</span>
                    <ul>
                        <li><span onclick="chapitre(17)">Introduction</span></li>
                        <li><span onclick="chapitre(17)">Reconnaissance de l’écriture manuscrite</span></li>
                        <li><span onclick="chapitre(17)">Le manuscrit arabe</span></li>
                        <li><span onclick="chapitre(20)">Définitions</span></li>
                        <li><span onclick="chapitre(22)">Traitement d'image</span></li>
                        <li><span onclick="chapitre(22)">Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(23)">L'EXTRACTION DE CARACTÉRISTIQUES</span>
                    <ul>
                        <li><span onclick="chapitre(23)">Introduction</span></li>
                        <li><span onclick="chapitre(23)">Extraction de l'information par la méthode LM</span></li>
                        <li><span onclick="chapitre(24)">Extraction des caractéristiques par la méthode FT</span></li>
                        <li><span onclick="chapitre(30)">Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(31)">LA COMBINAISON DE CLASSIFIEURS</span>
                    <ul>
                        <li><span onclick="chapitre(31)">Introduction</span></li>
                        <li><span onclick="chapitre(31)">Classification</span></li>
                        <li><span onclick="chapitre(34)">Les méthodes de combinaison</span></li>
                        <li><span onclick="chapitre(43)">Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(44)">LES CLASSIFIEURS UTILISÉS</span>
                    <ul>
                        <li><span onclick="chapitre(44)">Introduction</span></li>
                        <li><span onclick="chapitre(44)">Les réseaux de neurones</span></li>
                        <li><span onclick="chapitre(45)">Architectures</span></li>
                        <li><span onclick="chapitre(49)">Les Algorithmes d'apprentissage</span></li>
                        <li><span onclick="chapitre(50)">Les machines à vecteurs de support SVM</span></li>
                        <li><span onclick="chapitre(53)">LIBSVM</span></li>
                        <li><span onclick="chapitre(56)">Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(57)">IMPLÉMENTATION, TESTS ET RÉSULTATS</span>
                    <ul>
                        <li><span onclick="chapitre(57)">Introduction</span></li>
                        <li><span onclick="chapitre(57)">Environement de travail</span></li>
                        <li><span onclick="chapitre(59)">Implémentation</span></li>
                        <li><span onclick="chapitre(72)">Conclusion</span></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(73)">CONCLUSION GÉNÉRALE</span>
                </li>
                <li class="nav-item">
                    <span onclick="chapitre(75)">RÉFÉRENCES</span>
                </li>
                
            </ul>
        </aside>
    </div>
<div style="clear:both"></div>



                <script>
                    var numPage=1;
            var totalPage=null;
            var oPDF=PDFJS.getDocument(config["pdf"] + 'memoire.pdf');
            
            function chapitre(Npage){
                numPage=Npage;
                oPDF.then(renderPDF);
            } 
            function renderPDF(pdf){
                if(totalPage==null){
                    totalPage=pdf.numPages;
                }
                bp.style.display="inline";
                b.style.display="inline";
                if(numPage == 1){
                    bp.style.display="none";
                }else if(numPage == totalPage){
                    b.style.display="none";
                }
                if(numPage <= totalPage){
                    pdf.getPage(numPage).then(renderPage);
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                    
                }
                viewer.style.display="inline-block";
            }
            function renderPage(page){    
                var scale = 1.5;     
                var viewport = page.getViewport(scale);  
                var canvas = document.getElementById('canvasPDF');   
                var viewer = document.getElementById('viewer');   
                var context = canvas.getContext('2d');    
                canvas.height = viewport.height;    
                canvas.width = viewport.width;      
                var renderContext = {      
                    canvasContext: context,       
                    viewport: viewport     };        
                page.render(renderContext); }
                    
                    ////////////// firt page //////////////
                     oPDF.then(renderPDF);
                    
                     
            b=document.getElementById('bn');
            bp=document.getElementById('bp');
                    
                    /********* next page *******/
            b.addEventListener('click',function(){
                if(numPage < totalPage){
                numPage++;
                oPDF.then(renderPDF);
                }
            });
                    /********** last page *********/
            bp.addEventListener('click',function(){
                if(numPage > 1){
                numPage--;
                oPDF.then(renderPDF);
                }
            });
        </script>
 <?php
require_once('../'.$config['paths']['includes'] . '/footer.php');
?>
