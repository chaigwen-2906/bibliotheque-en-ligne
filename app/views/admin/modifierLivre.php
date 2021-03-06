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
                <a href="./admin-listeLivres">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Modifier un livre
            </h1>
            <form enctype="multipart/form-data" method="POST" action="./admin-<?= $this->nomPage;?>-<?= $idLivre;?>?action2=modifieLivre">

                <!-- CATEGORIES  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectCategorie">Catégorie :</label>
                    <select class=conteneurInputAjout id="selectCategorie" name="selectCategorie">
                            <option value="">
                                Catégorie...
                            </option>
                            <?php
                                foreach($listCategorie AS $uneCategorie)
                                {
                                    echo "<option value='".$uneCategorie['idCategorie']."'";
                                    if($uneCategorie['idCategorie'] == $unLivre->getIdCategorie())
                                    {
                                        echo " selected";
                                    }
                                    echo ">".$uneCategorie['nomCategorie']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- AUTEURS -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectAuteurs">Auteurs :</label>
                    <select class=conteneurInputAjout id="selectAuteurs" name="selectAuteurs">
                            <option value="">
                                Nom et prénom...
                            </option>
                            <?php
                                foreach($listAuteurs AS $unAuteur)
                                {
                                    echo "<option value='".$unAuteur['idAuteur']."'";
                                    if($unAuteur['idAuteur'] == $unLivre->getIdAuteur())
                                    {
                                        echo " selected";
                                    }
                                    echo ">".$unAuteur['nomAuteur']." ".$unAuteur['prenomAuteur']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- EDITERS  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectEditeurs">Editeurs :</label>
                    <select class=conteneurInputAjout id="selectEditeurs" name="selectEditeurs">
                            <option value="">
                                Code et nom d'éditeurs...
                            </option>
                            <?php
                                foreach($listEditeurs AS $unEditeurs)
                                {
                                    echo "<option value='".$unEditeurs['idEditeur']."'";
                                    if($unEditeurs['idEditeur'] == $unLivre->getIdEditeur())
                                    {
                                        echo " selected";
                                    }
                                    echo ">".$unEditeurs['code']." -> ".$unEditeurs['nom']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- NOM  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nomLivre"> Nom du livre :</label>
                    <input class=conteneurInputAjout type="text" id="nomLivre" name="nomLivre" placeholder="Nom du livre" value="<?= $unLivre->getNom(); ?>" required>             
                </section>

                <!-- IMAGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="imageLivre"> Image du livre :</label>
                    <input class=conteneurInputAjout type="file" id="imageLivre" name="image">             
                </section>

                <!-- DATE DE PUBLICATION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateLivre"> Date de publications du livre :</label>
                    <input class=conteneurInputAjout type="date" id="dateLivre" name="dateLivre" placeholder=" Date de publications du livre" value="<?= substr($unLivre->getDateDePublication(),0,10); ?>">             
                </section>

                <!-- DESCRIPTION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="descriptionLivre">Descriptions du livre :</label>
                    <textarea class=conteneurInputAjout id="descriptionLivre" name="descriptionLivre" placeholder="Entrer votre description"><?= $unLivre->getDescription(); ?></textarea>            
                </section>

                <!-- DISPONIBLE  -->
                <section class="conteneurSection">
                <label class="conteneurLabel" for="selectDispoLivre">Livre disponible :</label>
                    <select class=conteneurInputAjout id="selectDispoLivre" name="selectDispoLivre" placeholder="Livre disponible">
                            <option value='oui'<?php if($unLivre->getDisponible() == 'oui'){ echo " selected"; } ?>>oui</option>
                            <option value='non'<?php if($unLivre->getDisponible() == 'non'){ echo " selected"; } ?>>non</option>
                    </select>         
                </section>

                <!-- NB DE PAGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nbPageLivre"> Nombre de pages du livre :</label>
                    <input class=conteneurInputAjout type="number" id="nbPageLivre" name="nbPageLivre" placeholder="Nombre de pages du livre " value="<?= $unLivre->getNbDePage(); ?>">             
                </section>

                <!-- DIMENSION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dimensionLivre"> Dimension du livre :</label>
                    <input class=conteneurInputAjout type="text" id="dimensionLivre" name="dimensionLivre" placeholder="Dimension du livre" value="<?= $unLivre->getDimension(); ?>">             
                </section>

                <!-- LANGUE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="langueLivre"> Langue du livre :</label>
                    <input class=conteneurInputAjout type="text" id="langueLivre" name="langueLivre" placeholder="Langue du livre" value="<?= $unLivre->getLangue(); ?>">             
                </section>

                <!-- ISBN  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="isbnLivre"> isbn du livre :</label>
                    <input class=conteneurInputAjout type="text" id="isbnLivre" name="isbnLivre" placeholder="isbn du livre" value="<?= $unLivre->getIsbn(); ?>">             
                </section>

                <!-- EAN  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="eanLivre"> Ean du livre :</label>
                    <input class=conteneurInputAjout type="text" id="eanLivre" name="eanLivre" placeholder="Ean du livre" value="<?= $unLivre->getEan(); ?>">             
                </section>

                <!-- BOUTON VALIDER  -->
                <section>
                    <input class="boutonValiderAjoutLivre" id="btnValideAjoutLivre" type="submit" value="Valider">
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