<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">
        <meta name="title" content="Notre bibliothèque en ligne">

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <link rel="stylesheet" href="app/public/css/admin/ajout.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="supprimerLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./admin-listeLivres">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Supprimer un livre
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>-<?= $idLivre;?>?action2=supprimerLivre">

                <h2>
                    Attention : Tous les commentaires, les coups de coeur et les réservations associés à ce livre seront également supprimés ! 
                    <br>
                    <br>
                    Voulez vous réellement supprimer ce livre !  
                </h2>
     
                <!-- BOUTON VALIDER  -->
                <section >
                    <input class="boutonSupprimerLivre" type="submit" value="Valider">
                </section>
                
            </form>    
        </main>
        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
    </body>
    
</html>