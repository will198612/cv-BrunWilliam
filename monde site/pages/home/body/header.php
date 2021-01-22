<body onload="loadContinents()" id="body_table" class="body container">  
            <!-- chargement de la fonction d'affichage du monde -->  
      <section  class="row col-lg-12 ml-5">    
            <!-- chargement de la fonction d'affichage des continents -->
        <select class="col-lg-5 mt-4 ml-4 " id="continent" value="" name="continent" onchange="changeContinent()"></select>  
            <!-- chargement de la fonction d'affichage des régions -->
        <select class="col-lg-5 mt-4 ml-4 " id="region" value="" name="region" onchange="changeRegion()" >Sélectionner une région</select>
          </section>
    <?php 
    require('pages/home/body/table.php'); 
    ?>
        
      