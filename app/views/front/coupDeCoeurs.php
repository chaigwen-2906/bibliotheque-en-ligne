<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?= $this->listMetas['keywords']; ?>">
    <meta name="description" content="<?= $this->listMetas['description']; ?>">
    <meta name="title" content="<?= $this->listMetas['title']; ?>">
    <meta http-equiv="expires" content="43200" />

    <title> Coup de coeurs - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="app/public/css/header.css">
    <link rel="stylesheet" href="app/public/css/footer.css">
    <link rel="stylesheet" href="app/public/css/coupDeCoeur.css"> -->
   
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
    <body>


        <?php require_once("app/views/layout/header.php"); ?>

        <main class ="coupDeCoeur">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianeCoupDeCoeurs" >
                <a href="./front-home">
                    Accueil >
                </a>
                    Nos coup de coeurs
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- TEXTE EN SVG   -->
            <div class="conteneurSVG">
                <svg width="100px" height="50px">
                    <text x="10" y="30" style="
                        font-family: Times New Roman;
                        font-size  : 2.2em;
                        stroke     : #ffffff;
                        fill       : #dc143c;">
                        Bienvenue sur nos coup de coeurs  
                    </text>
                </svg>
            </div> 
            <!-- FIN TEXTE EN SVG -->

            <!-- SLIDER  -->
            <figure class="figureSlider">
                <img id="imgSlider" class="imgSlider">
                <img id="gauche" class="imgGauche" src="app/public/image/bouton/flecheGauche.png">
                <img id="droite" class="imgDroite" src="app/public/image/bouton/flecheDroite.png">
            </figure>
            <!-- FIN SLIDER  -->

            <!-- ARTICLE COUP DE COEUR  -->
            <div class="blockContenu">
                <h1 class="titreMain">
                    Nos coup de coeurs du moment 
                </h1>
                <!--------------livre coup de coeur, favorite book------------------>
                <section class="articles">  
                    <?php foreach ($listCdCoeur as $unCoupDeCoeur) {?>

                        <!-- TOUT LES ARTICLES  -->
                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Coup de coeur
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($unCoupDeCoeur['image'])."'
                                alt='".$unCoupDeCoeur['nom']."' title='".$unCoupDeCoeur['nom']."' />";?>
                            </figure>
                            <h4>
                                <?= $unCoupDeCoeur['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./front-detailLivre-".$unCoupDeCoeur['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $unCoupDeCoeur['nomAuteur']." ".$unCoupDeCoeur['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($unCoupDeCoeur['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                        <!--FIN DE TOUT LES ARTICLES  -->

                    <?php } ?>
                </section>
            </div>
            <!--FIN  ARTICLE COUP DE COEUR  -->

        </main>
        

        
        <?php require_once("app/views/layout/footer.php") ?> 

    </body>

</html>