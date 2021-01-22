    function loadContinents() {
      var xhttp = new XMLHttpRequest();
      //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp.onreadystatechange = function() {
          //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
          if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            var obj=JSON.parse(xhttp.responseText);
            
            document.getElementById('continent').innerHTML="";
            var option=document.createElement('option');
            option.id='message1';
            option.value ='';
            option.innerText='Monde';
            document.getElementById('continent').appendChild(option);
            // console.log(obj[i].libelle_continent);
            for (var i=0;i<obj.length;i++) {
              option=document.createElement('option');
              option.value=obj[i].id_continent;
              option.innerText=obj[i].libelle_continent;
              document.getElementById('continent').appendChild(option);    
            }
          
          }
        };
        xhttp.open("GET", "continent.php", true);
        xhttp.send();
        
      var xhttp1 = new XMLHttpRequest();
      //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp1.onreadystatechange = function() {
          //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
          if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            var obj=JSON.parse(xhttp1.responseText);
            
            document.getElementById('pays').innerHTML='';
            for (var i=0;i<obj.length;i++) {
              var tr=document.createElement('tr');
              if (i==obj.length-1) {
                tr.style="font-weight:bold";
              }
              
                    var td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:white; background-color:#5D6D7E  ");
                        td.innerText=obj[i].libelle_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red;background-color:#5D6D7E");
                      td.innerText=obj[i].population_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_natalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].esperance_vie_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_infantile_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].nombre_enfants_par_femme_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_croissance_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].population_plus_65_pays;
                            tr.appendChild(td);
                            document.getElementById('pays').appendChild(tr);

            }
            
            $('#tableau').attr('data-page-length',10).DataTable
              ({
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                language: 
                {
                  url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
                }
              });
                           
            }
        };
        xhttp1.open("GET", "country.php?continent="+document.getElementById('continent').value, true);
        xhttp1.send();    
    }

    function changeContinent() {
            
      var xhttp = new XMLHttpRequest();
      //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp.onreadystatechange = function() {
          //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
          if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            var obj=JSON.parse(xhttp.responseText);
            
            document.getElementById('region').innerHTML='';
            
            var option =document.createElement('option');
            option.value='';
            option.innerText='Sélectionner une région';
            document.getElementById('region').appendChild(option);
            for (var i=0;i<obj.length;i++) {
              option =document.createElement('option');
              option.value=obj[i].id_region;
              option.innerText=obj[i].libelle_region;
              document.getElementById('region').appendChild(option);
            }
          
          }
        };
        xhttp.open("GET", "regions.php?continent="+document.getElementById('continent').value, true);
        xhttp.send();
        
        var xhttp1 = new XMLHttpRequest();
      //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp1.onreadystatechange = function() {
          //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
          if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            var obj=JSON.parse(xhttp1.responseText);
            
            document.getElementById('pays').innerHTML='';
            for (var i=0;i<obj.length;i++) {
              var tr=document.createElement('tr');
              if (i==obj.length-1) {
                tr.style="font-weight:bold";
              }
                    var td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:black; background-color:#5D6D7E  ");
                        td.innerText=obj[i].libelle_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                      td.innerText=obj[i].population_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_natalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].esperance_vie_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_infantile_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].nombre_enfants_par_femme_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_croissance_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].population_plus_65_pays;
                            tr.appendChild(td);
                            document.getElementById('pays').appendChild(tr);

            }
          
          }
        };
        xhttp1.open("GET", "country.php?continent="+document.getElementById('continent').value, true);
        xhttp1.send();
        
    }

    function changeRegion() {
      
      var xhttp1 = new XMLHttpRequest();
      //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp1.onreadystatechange = function() {
          //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
          if (this.readyState == 4 && this.status == 200) {
          // Typical action to be performed when the document is ready:
            var obj=JSON.parse(xhttp1.responseText);
            
            document.getElementById('pays').innerHTML='';
            for (var i=0;i<obj.length;i++) {
              var tr=document.createElement('tr');
              if (i==obj.length-1) {
                tr.style="font-weight:bold";
              }
                    var td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:black; background-color:#5D6D7E  ");
                        td.innerText=obj[i].libelle_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red;background-color:#5D6D7E");
                      td.innerText=obj[i].population_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_natalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].esperance_vie_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_mortalite_infantile_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].nombre_enfants_par_femme_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].taux_croissance_pays;
                            tr.appendChild(td);
                            td=document.createElement('td');
                              td.setAttribute("style","font-style : italic; color:red; background-color:#5D6D7E");
                        td.innerText=obj[i].population_plus_65_pays;
                            tr.appendChild(td);
                            document.getElementById('pays').appendChild(tr);
            }
          
          }
        };
        xhttp1.open("GET", "country.php?continent="+document.getElementById('continent').value+"&region="+document.getElementById('region').value, true);
        xhttp1.send();
    }
    $(document).ready(function() {
      $(".menu-icon").on("click", function() {
            $("nav ul").toggleClass("showing");
      });
});

// Scrolling Effect

$(window).on("scroll", function() {
      if($(window).scrollTop()) {
            $('nav').addClass('black');
      }

      else {
            $('nav').removeClass('black');
      }
})