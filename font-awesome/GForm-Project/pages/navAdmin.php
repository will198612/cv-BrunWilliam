<div class='col-12 float-right divNav'>
    <div class="row d-flex flex-nowrap">
        <nav class='col-12'>
          <?php 
          
          // if(!(isset($_SESSION["usertype"]))||$_SESSION["usertype"]!="admin"){
          //       // header("location:index.php?page=navAdmin.php");
          //  }
          ?>
          <a href = "index.php?page=comptes">Comptes utilisateurs</a>
          <a href = "index.php?page=formulaires">Gestion des formulaires</a>
          <a href = "index.php?page=analyses">Analyses des résultats</a>
          <a href = "index.php?page=repondre">Répondre à un sondage</a>
          <!-- <?php
          if(isset($_SESSION["user"])&&$_SESSION["user"]){ ?>
          <a href = "index.php?page=home&deconnection=true">Déconnection</a>
          <?php }
          ?> -->
        </nav>
    </div>
</div>