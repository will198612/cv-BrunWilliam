 
 <body style="text-align: left;"> 
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Liens</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody id="rows">

            </tbody>
        </table>
        
        <script>
            function fillDialog(id,title,desc,dd,df,link){
                document.getElementById('id-text').value=id;
                document.getElementById('titre-text').innerText=title;
                document.getElementById('description-text').innerText=desc;
                document.getElementById('date-de-debut-text').value=dd;
                document.getElementById('date-de-fin-text').value=df;
                document.getElementById('link-text').value=link;
                $('#exampleModal').modal('show');
            }


            var xhttp = new XMLHttpRequest();
			//on lui affecte une fonction quand HTTPREQUEST reçoit des informations
				xhttp.onreadystatechange = function() {
					//vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
					if (this.readyState == 4 && this.status == 200) {
					// Typical action to be performed when the document is ready:
						var obj=JSON.parse(xhttp.responseText);
                        //console.log(obj);
                        
                        for (var i=0;i<obj.length;i++) 
                    {
                    var tr=document.createElement('tr');
                    var td=document.createElement('td');
                        td.innerText=obj[i].Id_Formulaire;
                            tr.appendChild(td);
                             td=document.createElement('td');
                        td.innerText=obj[i].Titre;
                            tr.appendChild(td);
                             td=document.createElement('td');
                        td.innerText=obj[i].Description;
                            tr.appendChild(td);
                             td=document.createElement('td');
                        td.innerText=obj[i].Date_debut;
                            tr.appendChild(td);
                             td=document.createElement('td'); 
                        td.innerText=obj[i].Date_fin;
                            tr.appendChild(td);
                              td=document.createElement('td');
                        td.innerText=obj[i].Link;
                            tr.appendChild(td);
                              td=document.createElement('td');
                        td.innerHTML='<button onclick="fillDialog(\''+obj[i].Id_Formulaire+'\',\''+obj[i].Titre+'\',\''+obj[i].Description+'\',\''+obj[i].Date_debut+'\',\''+obj[i].Date_fin+'\',\''+obj[i].Link+'\')">modifier</button>    <button>supprimer</button>';
                        tr.appendChild(td);
                        document.getElementById('rows').appendChild(tr);      
                    }  
    //                 $('#table').datatable({
    //       language: {
    //           url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
    //   }
    //   });              
				  }
				};
				xhttp.open("GET", "pages/ajax.php", true);
				xhttp.send();
                
        </script>
        <h2 style="color: black;"> Créez votre formulaire simplement </h2> 
        <p>Cliquez sur le bouton pour créer une question</p> 
        <button onClick="addQuestion()"> Créer une question </button> 
        <p id="Question"></p> 
        
        <!-- <select id="reponses" name="typereponses"  class="form-control" onchange="addReponse()"><option value="">type de reponses</option></select> -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification de formulaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id-text">
          <div class="form-group">
            <label for="titre-text" class="col-form-label">Titre :</label>
            <textarea class="form-control" id="titre-text"></textarea>
          </div>
          <div class="form-group">
            <label for="description-text" class="col-form-label">Description :</label>
            <textarea class="form-control" id="description-text"></textarea>
          </div>
          <div class="form-group">
            <label for="date-de-debut-text" class="col-form-label">Date de début :</label>
            <input type="date" class="form-control" id="date-de-debut-text">
          </div>
          <div class="form-group">
            <label for="date-de-fin-text" class="col-form-label">Date de fin :</label>
            <input type="date" class="form-control" id="date-de-fin-text">
          </div>
          <div class="form-group">
            <label for="link-text" class="col-form-label">Liens :</label>
            <textarea class="form-control" id="link-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button id="send" type="button" class="btn btn-primary" >envoyer message</button>
      </div>
    </div>
  </div>
</div>
    
    <script> 
        var down = document.getElementById("addQuestion"); 
        var br = document.createElement("br");  // ligne vide
        
        function addQuestion() { 
                    
            // Creation formulaire dynamique
            var form = document.createElement("FORM");
          
            form.setAttribute("method", "post"); 
            form.setAttribute("name", "F_1");
            form.setAttribute("action", "pages/formulaires.php");
            //document.body.appendChild('FORM'); 
    
            // input element question 
            var q1 = document.createElement("TEXTAREA"); 
            q1.setAttribute("rows", "3"); 
            q1.setAttribute("cols", "70"); 
            q1.setAttribute("type", "text"); 
            q1.setAttribute("name", "q1"); 
            q1.setAttribute("placeholder", "Question"); 
            q1.setAttribute("required", true);
    
                    // creation button submit
                    var s = document.createElement("input"); 
                    s.setAttribute("type", "submit"); 
                    s.setAttribute("value", "valider"); 
                    s.setAttribute("id","submit");    
                    s.setAttribute("onClick","function addReponse()");             
                    // appenchild input question dans le form 
                    form.appendChild(q1);     
                    form.appendChild(br.cloneNode());  // ligne vide 
                    form.appendChild(s);   // appenchild button submit dans le form
                    document.getElementsByTagName("body")[0].appendChild(form); 
        } 

        function addReponse() {
                // Creation formulaire dynamique
            var form = document.createElement("form"); 
            form.setAttribute("method", "post"); 
            form.setAttribute("action", "pages/formulaires.php"); 

                // input element question  text large
            var r1 = document.createElement("textarea"); 
            r1.setAttribute("rows", "8"); 
            r1.setAttribute("cols", "70"); 
            r1.setAttribute("placeholder", "reponse1");
            r1.setAttribute("id","inner1");
            
            // input element question texte court
            var r2 = document.createElement("textarea"); 
            r2.setAttribute("rows", "1"); 
            r2.setAttribute("cols", "70"); 
            r2.setAttribute("placeholder", "reponse2");
            r2.setAttribute("id","inner2");
            
            // input element question radio bolleen 
            var r3 = document.createElement("input"); 
            r3.setAttribute("type", "radio"); 
            r3.setAttribute("value", "oui"); 
            r3.setAttribute("id","inner3");
            var r4 = document.createElement("input"); 
            r4.setAttribute("type", "radio"); 
            r4.setAttribute("value", "non"); 
            r4.setAttribute("id","inner4");

            // creation button submit
            var s = document.createElement("input"); 
                    s.setAttribute("type", "submit"); 
                    s.setAttribute("value", "valider"); 
                    
                    // appenchild input question dans le form 
                    form.appendChild(r1);   
                    form.appendChild(br.cloneNode());  // ligne vide

                    form.appenChild(r2) ; 
                    form.appendChild(br.cloneNode());  // ligne vide
                    
                    form.appenChild(r3) ;
                    form.appenChild(r4) ; 
                    form.appendChild(br.cloneNode());  // ligne vide
                    form.appendChild(s);   // appenchild button submit dans le form 
                    document.getElementsByTagName("body")[0].appendChild(form);
        }
        </script> 




