// worker for execute script

//la fonction traiter qui execute la fonction php traiter du traimtement matlab
function traiter(file_name){

	// Les donnees de la forme pour la methode POST
	var fD = new FormData();
	fD.append('file_name',file_name);
	
	// instancer la requete ajax.
	xhr_traiter =  new self.XMLHttpRequest();

	// créer une connexion.
	xhr_traiter.open('POST',config["rootLink"] + config["includes"] + 'application/traiter.php', false);
	// envoyer les données
	xhr_traiter.send(fD);
    // traimtement de la requete qu'on elle termine.
	affichier();
} // Fin traiter(file_name);

// foction qui affiche les resultats du traimtement du fichier txt
function affichier(){
	
	// instancer la requete ajax.	
	var xhr = new self.XMLHttpRequest();
	
	// traimtement de la requete qu'on elle termine.
	xhr.onreadystatechange= function () {
		if (xhr.readyState == 4 ){
			if ( xhr.status == 200) {
				postMessage(xhr.responseText);
			} else {
				postMessage('Une erreur est survenue dans le script de la fonction affichier dans le fichier worker.js !');
			}
		}
	};

	// créer une connexion
	xhr.open('GET', config["rootLink"] + config["matlab"] + 'result.txt ?' + new Date().getTime(), true);
	// envoyer les données.
	xhr.send();
    
} // Fin affichier();

	
/**** Main du script ****/

// declaration des variables
var file;
var config;
var xhr_upload,xhr_traiter,xhr_result;

// Ecouter l'événement
self.addEventListener("message", function(e) {
	// les donnee passer au worker the passed-in available via e.data
    if(e.data instanceof Array ){
        config=e.data;
    }
	file=e.data;
	uploadFile();
}, false);

// Upload le fichier au serveur	
function uploadFile(){	
	
	// Les donnees de la forme pour la methode POST.
	var formData = new FormData();
	
	// Verifie que  le fichie est une image bmp.

	if (file && ( file.type.match('image.bmp')  || file.type.match('image.png')  || file.type.match('image.jpg') || file.type.match('image.jpeg') ) ){
		
		// Ajouter le fichier a la requête
		formData.append('fileToUpload', file, file.name);
	
		// instancer la requete ajax.
		xhr_upload = new self.XMLHttpRequest();
	
		// traimtement de la requete qu'on elle termine.
		xhr_upload.onreadystatechange= function () {
			if (xhr_upload.readyState == 4 ){
				if ( xhr_upload.status == 200) {
					if(xhr_upload.responseText == "Le fichier "+ file.name+" est uploadé."){
						// averti le script principal que l'image est uploade pour l'affichier
						postMessage(200);
						//traimtement du fichie uploadé
						traiter(file.name);
					} else {
						postMessage(401);
					}
					
				} else {
					postMessage('Une erreur est survenue dans le script de la fonction uploadFile dans le fichier worker.js !');
				}
			}
		};
	
		// créer une connexion
		xhr_upload.open('POST', config["rootLink"] + config["includes"] + 'application/upload.php', true);
		// envoyer les données.
		xhr_upload.send(formData);	
	} else {
		postMessage(401);
	}
	
 } // Fin uploadFile();