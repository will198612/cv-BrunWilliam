
/*----------------fonction d'initialisation du calendrier-----------------------*/

document.addEventListener('DOMContentLoaded', function() { 
  var calendarEl = document.getElementById('calendar'); //création du calendrier, relié à la div

  var calendar = new FullCalendar.Calendar(calendarEl, {      // on instancie le calendrier
    // on appelle les plugins on veut dans le calendrier, toutes les options
    initialView: 'dayGridMonth', //type de vue initiale du calendrier (mois)
    firstDay: 1, // passage de la premier colonne du dimanche [0] par defaut au lundi [1]
    locale :'fr', // traduction en français
    nowIndicator: true, // permet d'indiquer now sur le calendrier
    editable: true, // option de l'interaction, permet de bouger les évènements directement à la souris
    initialDate: '2020-11-07',
    headerToolbar: { //  ouverture du header et à ses éléments
      center: 'prev,next',
      left: 'title', 
      right: 'dayGridMonth,timeGridWeek,timeGridDay', 
    },
 
    events: [ // mise en place des évènements dans le calendrier
      {
        title: 'Dynamisme des pages avec Javascript',
        start: '2020-11-02',
        end: '2020-11-07',
        backgroundColor:'green',
      },
      {
        title: 'Dynamisme des pages avec le Framework Javasript Jquery',
        start: '2020-11-09',
        end: '2020-11-11',
        backgroundColor:'green',
      },
      {
        title: ' Armistice',
        start: '2020-11-11',
        end:'2020-11-11',
        backgroundColor:'red',
        // classNames:['tice'],
      },
      {
        title: 'Dynamisme des pages avec le Framework Javasript Jquery',
        start: '2020-11-12',
        end: '2020-11-13',
        backgroundColor:'green',
      },
      {
        groupId: 'ECF',
        title: 'ECF',
        start: '2020-11-13',
        backgroundColor:'orange',
      },
      {
        title: 'PHP -Programmation Orientée Objet',
        start: '2020-11-16',
        end: '2020-11-20',
        backgroundColor:'yellow',
      },
      {
        groupId: 'ECF',
        title: ' ECF',
        start: '2020-11-20',
        backgroundColor:'red',
      },
      {
        title: 'Bases de données',
        start: '2020-11-23',
        end: '2020-11-28',
        backgroundColor:'yellow',
      },
      {
        title: 'PHP-Accès aux bases de données',
        start: '2020-11-30',
        end: '2020-12-04',
        backgroundColor:'yellow',
      },
      {
        groupId: 'ECF',
        title: ' ECF',
        start: '2020-12-04',
        backgroundColor:'red',
      },
      {
       
        title: 'PHP-Projet en équipe(ECF)',
        start: '2020-12-07',
        end: '2020-12-12',
        backgroundColor:'violet',
        
       

      },
      {
        title: 'PHP avec le Framework Symfony',
        start: '2020-12-14',
        end: '2020-12-19',
        backgroundColor:'violet',
      },
      {
        title: 'PHP avec le Framework Symfony',
        start: '2020-12-21',
        end: '2020-12-25',
        backgroundColor:'violet',
      },
      {
        groupId: 'Noël',
        title:  'Noël',
        start: '2020-12-25',
        backgroundColor:'red',
      },
      {
        title: 'Fermeture de centre',
        start: '2020-12-28',
        end: '2021-01-02',
        backgroundColor:'bluelight',
      },
      {
        title: 'PHP avec le Framework Symfony',
        start: '2021-01-04',
        end: '2021-01-09',
        backgroundColor:'violet',
      },
      {
        title: 'Symfony-projet en équipe',
        start: '2021-01-11',
        end: '2021-01-16',
        backgroundColor:'violet',
      },
      {
        title: 'Symfony-projet en équipe',
        start: '2021-01-18',
        end: '2021-01-23',
        backgroundColor:'violet',
      },
      {
        title: 'CMS-Wordpress',
        start: '2021-01-25',
        end: '2021-01-30',
        backgroundColor:'violet',
      },
      {
        title: 'Javascript avec la solution NodeJS',
        start: '2021-02-01',
        end: '2021-02-06',
        backgroundColor:'violet',
      },
      {
        title: 'Javascript avec la solution NodeJS',
        start: '2021-02-08',
        end: '2021-02-13',
        backgroundColor:'violet',
      },
      {
        title: 'Javascript-Développement mobileavec les solutions cross-platform',
        start: '2021-02-15',
        end: '2021-02-20',
        backgroundColor:'violet',
      },
      {
        title: 'Javascript-Projet en équipe(ECF)',
        start: '2021-02-22',
        end: '2021-02-27',
        backgroundColor:'violet',
      },
      {
        title: 'Période en entreprise',
        start: '2021-03-01',
        end: '2021-03-06',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-03-08',
        end: '2021-03-13',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-03-15',
        end: '2021-03-20',
        backgroundColor:'blue',
      },

      {
        title: 'Période en entreprise',
        start: '2021-03-22',
        end: '2021-03-27',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-03-29',
        end: '2021-04-03',
        backgroundColor:'blue',
      },
      {
        groupId: 'Pâques',
        title: ' Pâques',
        start: '2021-04-05',
        backgroundColor:'red',
      },
      {
        title: 'Période en entreprise',
        start: '2021-04-06',
        end: '2021-04-10',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-04-12',
        end: '2021-04-17',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-04-19',
        end: '2021-04-24',
        backgroundColor:'blue',
      },
      {
        title: 'Période en entreprise',
        start: '2021-04-26',
        end: '2021-05-01',
        backgroundColor:'blue',
      },
      {
        title: 'Fermeture de centre',
        start: '2021-05-03',
        end: '2021-05-08',
        backgroundColor:'bluelight',
      },
      {
        title: 'Préparation de la certification',
        start: '2021-05-10',
        end: '2021-05-13',
        backgroundColor:'SALMON',
      },
      {
        groupId: 'Ascension',
        title: ' Ascension',
        start: '2021-05-13',
        backgroundColor:'red',
      },
      {
        title: 'Préparation de la certification',
        start: '2021-05-14',
        end: '2021-05-15',
        backgroundColor:'SALMON',
        classNames:['']
      },
      {
        title: 'Préparation de la certification',
        start: '2021-05-17',
        end: '2021-05-22',
        backgroundColor:'SALMON',
      },
      {
        title: 'Certification',
        start: '2021-05-24',
        end: '2021-05-28',
        backgroundColor:'brown',
      },
      {
        groupId: 'Fin de formation',
        title: ' Fin de formation',
        start: '2021-05-28',
        backgroundColor:'SALMON',
      },
    ],
    // eventColor: 'black',
    // eventTextColor: 'red',
    // eventBorderColor: 'green',
    // eventBackgroundColor:'violet',

  });
  
  // $(document).ready(function() {
   
  //   $('.fc-event-title.fc-sticky').css({'background': 'linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c)','color':'#256ACD','font-weight':'900','font-size':'1.5vw','margin-top':'30px'});
  //   $('.fc-event-title-container').css({'background': 'linear-gradient(0.25turn, #3f87a6, #ebf8e1, #f69d3c)','height':'85px','text-align':'center',});
  //   $('.fc-daygrid-day-events').css({'height':'90px'});
  //   $('.fc-toolbar-title').css({'color':'violet'});
  //  $('#php1').html('<span class="php" style="color:red">PHP-Projet en équipe(ECF)</span>');
   
  // });
  calendar.render(); // appel du calendrier
 
});
// function changeClass() { 
//   document.getElementsByClassName('.fc-event-title.fc-sticky').className = "newClass"; 
// }

