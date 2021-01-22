       //tableau musique
    var tableau=new Array();
    tableau.push('musique/Cartoon_Hoedown.mp3'),('Silent_Partner');
    tableau.push('musique/Blue_Skies.mp3','media_Right_Productions');
    tableau.push('musique/Earthy_Crust.mp3','Jingle_Punks');
    tableau.push('musique/JohnDunbarTheme.mp3','City_of_Prague');
    tableau.push('musique/Stay_With_You.mp3','Silent_Partner');
    var index=[0]; // créer une variable qui correspond l'élément 0 de mon tableau.
    //var indexName=[index][0];//création d'une variable pour mon nom artiste
               // les fonctions player.

    function init() {   // le démarrage du player.
        document.getElementById('mediaplayer').src=tableau[index];  // je vais chercher la musique [0]de mon tableau.
        document.getElementById('title').innerText=cleanString(tableau[0]);  //je nettoie d'entrée mes titres
        document.getElementById('volume').value=document.getElementById('mediaplayer').volume;  // je vais chercher ma value par défaut dans mon id volume.
        document.getElementById('progression').value=0;//
       //loadongs();
       }


    function previous() {
        console.log('précédent');
        
        if(index>0) {  //impossible de repartir en arrière à la première musique pour cela index>0.
        index--;      //l'index sera toujours en moins 1 quand j'appuie sur mon bouton.
        document.getElementById('mediaplayer').src=tableau[index];  //je vais rechercher mes infos dons mon tableau[index].
        play();      //puis lecture auto
        }
       }

    function next(){
       console.log('suivant');
     if(index<tableau.length) {//impossible d'aller au dela de la dernière musique de l'index de mon tableau.
       index++;//l'index sera toujours en plus 1 quand j'appuie sur mon bouton.
       document.getElementById('mediaplayer').src=tableau[index];//je vais rechercher mes infos dons mon tableau[index].
       play();//puis lecture auto
         }
        }
       
    function play() {
                   // lancer la lecture.
        console.log('lecture');//ecrit lecture dans la console.

     if(document.getElementById('mediaplayer').paused){//mon lecteur est par défaut sur pause.
        document.getElementById('mediaplayer').play();//je lance mon lecteur en appuyant sur mon bouton lecture.
            //   document.getElementById('duration').innerText=document.getElementById('mediaplayer').duration/60;
        document.getElementById('title').innerText=cleanString(tableau[index]);
        document.getElementById('btnplay').innerText='pause'; //quand le lecteur s'est lancé le mot lecture devient pause. 
    }else {
        document.getElementById('mediaplayer').pause();//mon lecteur se met en pause quand j'appuie sur bouton.
        document.getElementById('btnplay').innerText='lecture';  //quand le lecteur s'est lancé le mot pause devient lecture. 
         } 
        }

    //fonction de mise à jour de la durée de la musique au moment où on la récupè
function updateDuration() {
    //calcul, nettoyage et affichage de la durée au format minutes:secondes
    document.getElementById('duration').innerText=parseInt(document.getElementById('mediaplayer').duration/60)+':'+parseInt(document.getElementById('mediaplayer').duration%60);
    //mise à jour de la valeur max du range de progression
    document.getElementById('progression').setAttribute('max',document.getElementById('mediaplayer').duration);
        }

    //fonction de mise à jour de la progression de la musique
    function updateProgress() {
        //la valeur du range progression est le currenttime du mediaplayer
        document.getElementById('progression').value=document.getElementById('mediaplayer').currentTime;//lis la value actuel de ma progression de mon mediaplayer
        //Affichage du temps écoulé
        document.getElementById('currenttime').innerText=parseInt(document.getElementById('mediaplayer').currentTime/60)+':'+parseInt(document.getElementById('mediaplayer').currentTime%60);
        //si on arrive à la fin de la chanson 
     if(parseInt(document.getElementById('mediaplayer').currentTime)==parseInt(document.getElementById('mediaplayer').duration)){//si ma musique arrive au bout du temps on passe à la suivante
        //on la fonction suivante
        next();
         }
        }
    
        //fonction de mise à jour de la lecture courante si on change la valeur du range de progression
    function progress() {
        document.getElementById('mediaplayer').currentTime=document.getElementById('progression').value;
        }  


    function voldown() {
     if (document.getElementById('mediaplayer').volume>0) {// pour descendre mon volume il doit etre sup. à 0.
        document.getElementById('mediaplayer').volume-=0.2;//mon volume descends de 0.2 en 0.2.
        document.getElementById('volume').value=document.getElementById('mediaplayer').volume;//fait reculer ma barre de volume
         }
        }

    function volup() {
     if (document.getElementById('mediaplayer'). volume<1) {// pour augmenter mon volume il doit etre inf. à 1.
        document.getElementById('mediaplayer').volume+=0.2;//mon volume augmente de 0.2 en 0.2.
        document.getElementById('volume').value=document.getElementById('mediaplayer').volume;//fait avancer ma barre de volume
         }
        }
 
    function changeVolume() {
        console.log(document.getElementById('volume').value);
        document.getElementById('mediaplayer').volume=document.getElementById('volume').value;//mon range de volume prends la valeur de ma value qui soit descends ou augmente de 0.2 sur une échelle de 1.
        }
    function NameArtist() {
        console.log('name');
        document.getElementById('name').src=tableau[indexName];
        
    }

    function cleanString(title) {
        title=title.replace('musique/','');//remplcement de musique/ par rien
        title=title.split('_').join(' ');//remplacement de _ par un espace pour mes titres
        title=title.replace('.mp3','');//remplcement de .mp3 par rien
        return title;
    }
    
    //fonction de changement de musique avec l'index en paramètre (on clique sur une carte de musique)
    function playsong(indexPlay) {
        document.getElementById('mediaplayer').src=tableau[indexPlay];
        index=indexPlay;
        document.getElementById('title').innerText=cleanString(tableau[indexPlay]);
        play();
    }