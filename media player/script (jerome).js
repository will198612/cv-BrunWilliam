//initialisation du tableau de musiques
var tableau=new Array();
tableau.push('musique/Cartoon_Hoedown.mp3');
tableau.push('musique/Blue_Skies.mp3');
tableau.push('musique/Earthy_Crust.mp3');
tableau.push('musique/JohnDunbarTheme.mp3');
tableau.push('musique/Stay_With_You.mp3');

//variable index de lecture
var index=0;

//fonction d'initialisation
function init() {
	//chargement de la première musique
	document.getElementById('mediaplayer').src=tableau[0];
	//nettoyage et affichage du titre de la première chanson
	document.getElementById('title').innerText=cleanString(tableau[0]);
	//initialisation du range de volume par rapport au volume du mediaplayer
	document.getElementById('volume').value=document.getElementById('mediaplayer').volume;
	//initialisation de la barre de progression
	document.getElementById('progression').value=0;
	//lancement de la fonction de chargement des musiques
	loadSongs();
	
}

//fonction utilitaire de nettoyage des titres
function cleanString(title) {
	//remplacement des _ par des espaces
	title=title.split('_').join(' ');
	//remplacement du .mp3 par rien
	title=title.replace('.mp3','');
	return title;
}

//fonction précédent
function previous() {
	//si index arrive à zéro (première chanson), on ne peut plus faire précédent
	if (index>0) {
		//on décrémente index
		index--;
		//on charge la musique correspondante à l'index
		document.getElementById('mediaplayer').src=tableau[index];
		//on déclenche la fonction de lecture
		play();
	}
}


//fonction suivant
function next() {
	//si on arrive à la dernière chanson, on ne peut plus faire suivant
	if (index<tableau.length) {
		//on incrémente l'index
		index++;
		//on charge la musique correspondante à l'index
		document.getElementById('mediaplayer').src=tableau[index];
		//on déclenche la fonction de lecture
		play();
	}
}

//fonction de lecture
function play() {
	//si le player est pause
	if (document.getElementById('mediaplayer').paused) {
		//lancement de la lecture
		document.getElementById('mediaplayer').play();
		
		//nettoyage et affichage du titre de la chanson en cours
		document.getElementById('title').innerText=cleanString(tableau[index]);
		//mettre "Pause" sur le bouton de lecture
		document.getElementById('btnplay').innerText='Pause';
	} else {
		//on met en pause le player
		document.getElementById('mediaplayer').pause();
		//mettre "Lecture" sur le bouton de lecture
		document.getElementById('btnplay').innerText='Lecture';
	}	
}

//fonction de mise à jour de la durée de la musique au moment où on la récupère
function updateDuration() {
	//calcul, nettoyage et affichage de la durée au format minutes:secondes
	document.getElementById('duration').innerText=parseInt(document.getElementById('mediaplayer').duration/60)+':'+parseInt(document.getElementById('mediaplayer').duration%60);
	//mise à jour de la valeur max du range de progression
	document.getElementById('progression').setAttribute('max',document.getElementById('mediaplayer').duration);
}

//fonction de mise à jour de la progression de la musique
function updateProgress() {
	//la valeur du range progression est le currenttime du mediaplayer
	document.getElementById('progression').value=document.getElementById('mediaplayer').currentTime;
	
	//Affichage du temps écoulé
	document.getElementById('currenttime').innerText=parseInt(document.getElementById('mediaplayer').currentTime/60)+':'+parseInt(document.getElementById('mediaplayer').currentTime%60);
	
	//si on arrive à la fin de la chanson 
	if (parseInt(document.getElementById('mediaplayer').currentTime)==parseInt(document.getElementById('mediaplayer').duration)) {
		//on la fonction suivante
		next();
	}
}

//fonction de mise à jour de la lecture courante si on change la valeur du range de progression
function progress() {
	document.getElementById('mediaplayer').currentTime=document.getElementById('progression').value;
}

//fonction baisse de volume
function volumeMinus() {
	//si le volume est supérieur à zéro on peut le baisser
	if (document.getElementById('mediaplayer').volume>0) {
		document.getElementById('mediaplayer').volume-=0.2;
		document.getElementById('volume').value=document.getElementById('mediaplayer').volume;
	}
}

//fonction augmentation de volume
function volumePlus() {
	//si le volume est inférieur à 1 on peut l'augmenter
	if (document.getElementById('mediaplayer').volume<1) {
		document.getElementById('mediaplayer').volume+=0.2;
		document.getElementById('volume').value=document.getElementById('mediaplayer').volume;
	}
}

// fonction de changement du volume du mediaplayer quand on change la valeur du range de volume
function changeVolume() {
	console.log(document.getElementById('volume').value);
	document.getElementById('mediaplayer').volume=document.getElementById('volume').value;
}

//fonction de changement de musique avec l'index en paramètre (on clique sur une carte de musique)
function playSong(indexPlay) {
	document.getElementById('mediaplayer').src=tableau[indexPlay];
	index=indexPlay;
	play();
}

//fonction de création des cartes de musique 
function loadSongs() {
	var html='';
	
	/*var divElt=document.createElement('div');
	divElt.style="width: 18rem;";
	divElt.className="card";
	
	var imgElt=document.createElement('img');
	imgElt.className="card-img-top";
	imgElt.setAttribute('alt','...');
	imgElt.setAttribute('src','...');
	
	divElt.appendChild(imgElt);*/
	
	//on parcourt la tableau, on crée le html des cartes qu'on va aller ensuite rajouter dans un conteneur de cartes
	for (var i=0;i<tableau.length;i++) {
		//manière pas propre, au dessus manière propre
		html+='<div class="card" style="width: 18rem;"> 		  <img src="..." class="card-img-top" alt="...">			  <div class="card-body">				<h5 class="card-title">'+cleanString(tableau[i])+'</h5>	<p class="card-text"></p>				<a href="#" class="btn btn-primary" onclick="playSong('+i+')">Lecture</a>  </div></div></div>';
	}
	document.getElementById('liste').innerHTML=html;
	
}
