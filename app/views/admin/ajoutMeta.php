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
        <!-- <link rel="stylesheet" href="app/public/css/admin/ajout.css"> -->
        <link rel="stylesheet" href="app/public/css/admin/stylesAdmin.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./admin-listeMeta">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un meta
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>?action2=ajoutMeta">

                <!-- nomPage  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nomPage">Nom de la page :</label>
                    <input class=conteneurInputAjout type="text" id="nomPage" name="nomPage" placeholder="Nom de la page" >             
                </section>

                <!-- keywords  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="keywords">Keywords :</label>
                    <textarea class=conteneurInputAjout id="keywords" name="keywords" placeholder="Keywords"></textarea>            
                </section>

                <!-- description  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="description">Description :</label>
                    <textarea class=conteneurInputAjout id="description" name="description" placeholder="Description"></textarea>            
                </section>

                <!-- title  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="title">Title :</label>
                    <input class=conteneurInputAjout type="text" id="title" name="title" placeholder="Title">             
                </section>


                <!-- BOUTON VALIDER  -->
                <section>
                    <input class="boutonValiderAjoutLivre" id="btnValideAjoutLivre"  type="submit" value="Valider">
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