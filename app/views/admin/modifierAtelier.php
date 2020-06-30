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
                <a href="./admin-listeAtelier">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Modifier un atelier
            </h1>
            <form enctype="multipart/form-data" method="POST" action="./admin-<?= $this->nomPage;?>-<?= $idAtelier;?>?action2=modifierAtelier">

                 <!-- NOM  -->
                 <section class="conteneurSection">
                    <label class="conteneurLabel" for="nomAtelier"> Nom de l'atelier :</label>
                    <input class=conteneurInputAjout type="text" id="nomAtelier" name="nomAtelier"  value="<?= $unAtelier->getNom(); ?>" required>             
                </section>

                <!-- DATE DU JOUR  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateAtelier"> Date du jour de l'atelier :</label>
                    <input class=conteneurInputAjout type="date" id="dateAtelier" name="dateAtelier" value="<?= substr($unAtelier->getDate(),0,10); ?>" required>             
                </section>

                <!-- DESCRIPTION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="descriptionAtelier">Description de l'atelier  :</label>
                    <textarea class=conteneurInputAjout id="descriptionAtelier" name="descriptionAtelier"><?= $unAtelier->getDescription(); ?></textarea required>            
                </section>

                <!-- HORAIRE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="horaireAtelier">  Horaire de l'atelier  :</label>
                    <input class=conteneurInputAjout type="time" id="horaireAtelier" name="horaireAtelier" value="<?= substr($unAtelier->getHeure(),0,5); ?>" required>             
                </section>

                <!-- AGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="ageAtelier"> Age pour l'atelier :</label>
                    <input class=conteneurInputAjout type="number" id="ageAtelier" name="ageAtelier" value="<?= $unAtelier->getAge(); ?>" required>             
                </section>

                <!-- CAPACITE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="capaciteAtelier"> Capacité de l'atelier :</label>
                    <input class=conteneurInputAjout type="number" id="capaciteAtelier" name="capaciteAtelier" value="<?= $unAtelier->getCapacite(); ?>" required>             
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