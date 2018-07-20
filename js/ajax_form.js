 
// tableau des worker pour les apples adresses pas  
var w = [];

//Erreur javaScript arreter le code

function die(str) { 'use strict'; throw new Error(str || "Script terminé."); }

// cree un worker 
function startWorker(fileJs, i) {
    
	if (typeof (Worker) !== "undefined") {
        if (typeof (w[i]) == "undefined") {
            w[i] = new Worker(fileJs);
        }
	} else {
        die("Désolé, votre navigateur ne supporte pas les Web Workers...");
    }
} // Fin startWorker();

//arreter un worker
function stopWorker(i) {
	if (w[i] !== undefined) {
		w[i].terminate();
		w[i] = undefined;
	}
} // Fin stopWorker();

//Affichier l'image uploade en ajoutons Style
function AfficherImgAnalyse(ImgName) {
	var x = document.getElementById('i');
    x.src = config["uploads"] + ImgName.name+"?" + new Date().getTime();
    x.style.padding = 'auto';
    x.style.margin = 'auto';
    $(document).ready(function(){
        $("#analyserImage").modal();
    });
    //animation();
}

// animation analyse d'image
//declaration de variable contenue l'interval de temps
var id;
$(document).ready(function(){
    $("#analyserImage").on('shown.bs.modal', function () {
    //function animation(){
        I=document.getElementById('i');
        EA=document.getElementById('EA');
        LV=document.getElementById('LV');
        lng=document.getElementsByTagName('html')[0].lang;
        
        xI = I.clientWidth;
        yI=I.clientHeight;
        xEA = EA.clientWidth;
        yEA = EA.clientHeight;
        LV.style.height=yEA+'px';
        rTol=true;
        vide = (xEA-xI)/2;
        r = xEA - vide;
        
        lng=='fr'? LV.style.marginLeft=r+'px':(LV.style.marginRight=r+'px',  r = vide);
        $('#LV').fadeIn();
        //LV.style.display='block';

        id = setInterval(frame, 10);
        function frame() {  
            I = document.getElementById('i');
            EA = document.getElementById('EA');
            xInew = I.clientWidth;
            xEAnew = EA.clientWidth;

            if (xInew > xI || xEAnew > xEA){
                EA = document.getElementById('EA');
                LV = document.getElementById('LV');
                r += xInew - xI;
                xI = I.clientWidth;;
                yI = I.clientHeight;
                xEA = EA.clientWidth;
                yEA = EA.clientHeight;
                LV.style.height=yEA+'px';
                vide = (xEA-xI)/2;
            } else if (xInew < xI || xEAnew < xEA){
                EA = document.getElementById('EA');
                LV = document.getElementById('LV');
                r -= xI - xInew;
                xI = I.clientWidth;;
                yI = I.clientHeight;
                xEA = EA.clientWidth;
                yEA = EA.clientHeight;
                LV.style.height=yEA+'px';
                vide = (xEA-xI)/2;
            } 

                if (r < vide){
                    rTol=false;
                    LV.style.boxShadow='-2px 0px 8px #33ccff';
                } else if(r > xEA - vide){
                     rTol=true;
                    LV.style.boxShadow='2px 0px 8px #33ccff';
                }
            if (rTol)
                r -= 3;
            else
                r += 3;
            lng=='fr'? LV.style.marginLeft=r+'px':LV.style.marginRight=r+'px';
                //LV.style.marginLeft=r+'px';
            }
    //}
    });
});
//stop animation
function stopAnimation(){
    $(document).ready(function(){
    $('#LV').fadeOut("slow",function(){
        clearInterval(id);
    });
    });
                
    
   // LV = document.getElementById('LV');
    //LV.style.display='none';
}
/**** Main du script ****/

//declaration des variables	
var form = document.getElementById('file-form');
var fileSelect = document.getElementById('file-select');
var uploadButton = document.getElementById('upload-button');
var img = document.getElementById('img'); 
var resultatEcriture = document.getElementById('resultat');


//Ecouteur d'evenement click pour masker l'analyse d'image

$("#analyserImage").on('hide.bs.modal', function () {
    stopWorker(1);
	fileSelect.value = "";
	resultatEcriture.innerHTML=""; 
	stopAnimation();
    $('#resultat').fadeOut("slow");
		
 });
/***** selectionner manuellement ********/	
// Ecouteur d'evenement selectionement du fichier pour commencer uploading
document.getElementById('file-select').onchange=function(){
	var file = fileSelect.files[0];
	//verifie qu'il est selectionner un fichier
	if(fileSelect.files[0].name!='') {
		startWorker("js/worker.js",1);
		w[1].postMessage(config);
		w[1].postMessage(file);
		w[1].onmessage=function(e){
			//si l'image est uploaded
			if(e.data==200){
				//affichier l'analyse d'image
				AfficherImgAnalyse(file);
			} else if(e.data==401){
                alert('selectionner une image bmp, png, jpg ou jpeg !');
            } else {
				resultatEcriture.innerHTML = e.data;
               
                $(document).ready(function(){
                    $('#resultat').show("slow");
                });
                
                //resultatEcriture.className= resultatEcriture.className.replace('hidden', 'visible' );
                stopAnimation();

			}
		}
	}	
};



/***** drag and drop ********/
var dropper = document.getElementById('deposer');
dropper.addEventListener('dragover', function(e) {
	e.preventDefault(); // Annule l'interdiction de drop
	 dropper.style.borderColor = '#33CCFF';
	 dropper.getElementsByClassName('bigTxt')[0].style.color='#33CCFF';
	 dropper.querySelector('span').style.color='#33CCFF';
});

dropper.addEventListener('dragenter', function(e) {

	

});

dropper.addEventListener('dragleave', function() {
		  dropper.style.borderColor = '#ddd';
		  dropper.getElementsByClassName('bigTxt')[0].style.color='#ccc';
		  dropper.querySelector('span').style.color='#ddd';
});

dropper.addEventListener('drop', function(e) {
    e.preventDefault(); // Cette méthode est toujours nécessaire pour éviter une éventuelle redirection inattendue
    var file = e.dataTransfer.files[0],
        filenames = "";
		// Ecouteur d'evenement selectionement du fichier pour commencer uploading
		//verifie qu'il est selectionner un fichier
		if(e.dataTransfer.files.length==1) {
			startWorker("js/worker.js",1);
			w[1].postMessage(config);
			w[1].postMessage(file);
			w[1].onmessage=function(e){
				//si l'image est uploaded
				if(e.data==200){
					//affichier l'analyse d'image
					AfficherImgAnalyse(file);
				} else if(e.data==401){
                alert('selectionner une image bmp, png, jpg ou jpeg !');
                } else {
				resultatEcriture.innerHTML = e.data;
               
                $(document).ready(function(){
                    $('#resultat').show("slow");
                });
                stopAnimation();

				}
			}
		} else {
			
			alert('selectionner une seule image bmp, png, jpg ou jpeg !');
		}
		
	dropper.style.borderColor = '#ddd';
	dropper.getElementsByClassName('bigTxt')[0].style.color='#ccc';
	dropper.querySelector('span').style.color='#ddd';
});
 /****************************** draw ******************************************/
context = document.getElementById('draw').getContext("2d");
canvas=document.getElementsByTagName('canvas')[0];

canvas.height=canvas.parentElement.clientHeight;
canvas.width=canvas.parentElement.clientWidth;
$(window).resize(function(){
//canvas.height=canvas.parentElement.clientHeight;
canvas.width=canvas.parentElement.clientWidth;
    redraw()
    
});



$('#draw').mousedown(function(e){
  var mouseX = e.pageX - this.offsetLeft;
  var mouseY = e.pageY - this.offsetTop;
		
  paint = true;
  addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
  redraw();
});
$('#draw').mousemove(function(e){
  if(paint){
    addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
    redraw();
  }
});
$('#draw').mouseup(function(e){
  paint = false;
});
$('#draw').mouseleave(function(e){
  paint = false;
});
    
var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();
var paint;

function addClick(x, y, dragging)
{
  clickX.push(x);
  clickY.push(y);
  clickDrag.push(dragging);
  
}
$('#clear').on('click',function(){
    context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
    clickX = new Array();
    clickY = new Array();
    clickDrag = new Array();
    
})
    
function redraw(){
context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
context.beginPath();
context.rect(0, 0, context.canvas.width, context.canvas.height);
context.fillStyle = "#fff";
context.fill();
  
  context.strokeStyle = "#000";
  context.lineJoin = "round";
  context.lineWidth = 5;
			
  for(var i=0; i < clickX.length; i++) {		
    context.beginPath();
    if(clickDrag[i] && i){
      context.moveTo(clickX[i-1], clickY[i-1]);
     }else{
       context.moveTo(clickX[i]-1, clickY[i]);
     }
     context.lineTo(clickX[i], clickY[i]);
     context.closePath();
     context.stroke();
  }
}
$('#bmm').on('click',function (){
    
    c=document.getElementById('draw');
    //name=Math.random()+'.png';
    name='bmm.png';
    
  c.toBlob(function(blob){
      var f = new File([blob],name,{type: "image/png"});

      startWorker("js/worker.js",1);
			w[1].postMessage(config);
			w[1].postMessage(f);
      
			w[1].onmessage=function(e){
				//si l'image est uploaded
				if(e.data==200){
					//affichier l'analyse d'image
					AfficherImgAnalyse(f);
                     
				} else {
				resultatEcriture.innerHTML = e.data;
               
                $(document).ready(function(){
                    $('#resultat').show("slow");
                });
                stopAnimation();

				}
			}
      
  }, 'image/png', 0.1)


    		
    });
