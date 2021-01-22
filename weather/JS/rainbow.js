

function recup() {
    //initialisation HTTPRequest
    var xhttp = new XMLHttpRequest();
    //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
        xhttp.onreadystatechange = function() {
            //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
            if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
                var obj=JSON.parse(xhttp.responseText);
                document.getElementById("typeTime").src =  "http://openweathermap.org/img/wn/" + obj.weather[0].icon +"@2x.png";// on recupere l'icone
                document.getElementById("temperature").innerText=obj.main.temp+"°c";//on recupere la température
                document.getElementById("cloudDensity").innerText=obj.weather[0].description;//on recupere la densité des nuages
            }
        }
        xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?q="+document.getElementById('search').value+"&appid=a1f54fdf65e2ba11aa0e9710d2ce2eb3&units=metric&lang=fr", true);
        xhttp.send();
        

        var xhttp1 = new XMLHttpRequest();
        //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
            xhttp1.onreadystatechange = function() {
                //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
                if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                    var obj=JSON.parse(xhttp1.responseText);
                     
                    document.getElementById('ville').innerText=obj.city.name;
                }
            }
            xhttp1.open("GET", "http://api.openweathermap.org/data/2.5/forecast?q="+document.getElementById('search').value+"&appid=a1f54fdf65e2ba11aa0e9710d2ce2eb3&units=metric&lang=fr", true);
            xhttp1.send();
            Add(0);
        }

        function Add(opt){
            var xhttp2 = new XMLHttpRequest();
        //on lui affecte une fonction quand HTTPREQUEST reçoit des informations
            xhttp2.onreadystatechange = function() {
                //vérification que la requête HTTP est effectuée (readyState 4) et qu'elle s'est bien passée (status 200)
                if (this.readyState == 4 && this.status == 200) {
                // Typical action to be performed when the document is ready:
                    var obj=JSON.parse(xhttp2.responseText);
        
                    document.getElementById('tbody').innerHTML='';

             for ( var i=0, ien=obj.list.length ; i<ien ; i++ ) {//recuperation de donné voulu de BOB
        
                var tr=document.createElement('tr');

                var td=document.createElement('td');
                    td.className="date";
                        td.innerText=obj.list[i].dt_txt;
                            tr.appendChild(td);
                                document.getElementById('tbody').appendChild(tr);
                var td=document.createElement('td');
                    td.className="temperature";
                        td.innerText=obj.list[i].main.temp+"°c";
                            tr.appendChild(td);
                                document.getElementById('tbody').appendChild(tr);

                var td=document.createElement('td');
                    td.className="humidity";
                        td.innerText=obj.list[i].main.humidity;
                            tr.appendChild(td);
                                document.getElementById('tbody').appendChild(tr);

                var td=document.createElement('td');
                    td.className="windSpeed";
                        td.innerText=obj.list[i].wind.speed;
                            tr.appendChild(td);
                                document.getElementById('tbody').appendChild(tr);

                var td=document.createElement('td');
                    td.className="description";
                        td.innerText=obj.list[i].weather[0].description;
                            tr.appendChild(td);
                                document.getElementById('tbody').appendChild(tr);

                var td=document.createElement('td');
                var icone=document.createElement('img');
                        icone.className="icone";
                            icone.src =  "http://openweathermap.org/img/wn/" + obj.list[i].weather[0].icon +"@2x.png"; 
                                td.appendChild(icone);
                                    tr.appendChild(td);
                                        document.getElementById('tbody').appendChild(tr);
                                    }
                $('#table').DataTable
                ({
                lengthMenu: [10, 25, 50],
                pageLength: 10,
                language: 
                {
                  url: "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
                }
              });      
        }
    };
        xhttp2.open("GET", "http://api.openweathermap.org/data/2.5/forecast?q="+document.getElementById('search').value+"&appid=a1f54fdf65e2ba11aa0e9710d2ce2eb3&units=metric&lang=fr", true);
        xhttp2.send();
            }
