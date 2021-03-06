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
        <!-- <link rel="stylesheet" href="app/public/css/admin/accueil.css"> -->
        <link rel="stylesheet" href="app/public/css/admin/stylesAdmin.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>

        <main class="accueil">
            <!-- BOUTON SE DECONNECTER  -->
            <figure class="seDeconnecter">
                <a  href="./admin-<?= $this->nomPage;?>?action2=seDeconnecter">
                    <img src="app/public/image/bouton/disconnect.png" alt="Se déconnecter" title="Se déconnecter">
                </a>
            </figure>
            <!-- FIN BOUTON DECONNECTER  -->

            <!-- TITRE  -->
            <h1>
                Administration du site 'Ma bibliothèque en ligne'
            </h1>
            <!-- FIN TITRE  -->

            <!-- SECTION RESERVER  -->
            <section class="gestionReserver">
                <a href="./admin-listeReservation" class="gererReservations">
                    Gérer les reservations
                </a>
            </section>
            <!-- FIN SECTION RESERVER  -->

            <!-- SECTION DES ARTICLES  -->
            <section class="gestionsDesTables">

                <a href="./admin-listeLivres" class="gererArticle">
                    Gérer les livres
                </a>

                <a href="./admin-listeAuteur" class="gererArticle">    
                        Gérer les auteurs
                </a>

                <a href="./admin-listeAtelier" class="gererArticle">
                        Gérer les ateliers
                </a>

                <a href="./admin-listeCategorie" class="gererArticle"> 
                        Gérer les catégories 
                </a>

                <a href="./admin-listeClient" class="gererArticle">
                        Gérer les clients
                </a>

                <a href="./admin-listeCoupDeCoeur" class="gererArticle">
                        Gérer les coups de coeur
                </a>

                <a href="./admin-listeEditeur" class="gererArticle">
                        Gérer les éditeurs

                </a>

                <a href="./admin-listeFAQ" class="gererArticle">
                        Gérer les FAQ
                    </article>
                </a>
                <a href="./admin-listeMeta" class="gererArticle">
                    Paramètrage des pages
                </a>
            
            </section>
            <!-- FIN SECTION DES ARTICLES  -->
        </main>

        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
    </body>

    

</html>