<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Panier">
    <meta name="description" content="Panier">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Panier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/panier.css">
    
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="panier">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianePanier" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Votre Panier
            </div>
            <!--FIN  FILS D'ARIANE  -->


            <!-- Mes demandes de réservation non validées.  -->
            <section class="sectionCommande">
                <h1>
                    Mes demandes de réservation non validées.
                </h1>
                <?php foreach ($donnees as $uneDonnees) {?>
                    <article class="commande">

                        <ul>
                            <li>
                                Nom du livre : <strong><?= $uneDonnees['nom']; ?></strong>
                            </li>
                            <li>
                                Nom auteur : <strong><?= $uneDonnees['nomAuteur']; ?></strong>
                            </li>
                        </ul>
                       
                        <figure>
                            <a class="monBoutton" href="./<?= $this->nomPage;?>?action2=suppressionLivre&id=<?=$uneDonnees['idLivre'];?>">
                                <img src="./../app/public/image/bouton/poubelle.png" alt="Suppression" title="Suppression">
                            </a>
                        
                        </figure>
                    </article>
                <?php } ?>



                <!-- BOUTON VALIDER COMMANDE  -->
                <article class="bouton">
                    <!-- on valide le panier -->
                    <a href="./<?= $this->nomPage;?>?action2=validerPanier" class="monBoutton">
                        Valider
                    </a>
                </article>




            </section>
            <!--Mes demandes de réservation non validées. -->
            

            <!-- MES DEMANDE EN ATTENTE DE VALIDATION  -->
            <section>
                <h1>
                    Mes demande en attente de validation
                </h1>
                <?php foreach ($listDemandeEnAttente as $uneListDemandeEnAttente) {?>
                    <article class="commandeAttente">
                        
                        <ul>
                            <li>
                                Nom du livre : <strong><?= $uneListDemandeEnAttente['nom']; ?></strong>
                            </li>
                            <li>
                                Nom auteur : <strong><?= $uneListDemandeEnAttente['nomAuteur']; ?></strong>
                            </li>
                            <li>
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $uneListDemandeEnAttente = new DateTime($uneListDemandeEnAttente['dateDeDebut']);
                                ?>
                                Date de début : <strong><?= $uneListDemandeEnAttente->format('d/m/Y'); ?></strong>
                            </li>
                        </ul>

                    </article>
                <?php }?>
            
            </section>
            <!--FIN MES DEMANDE EN ATTENTE DE VALIDATION    -->


            <!-- CONFIRMER LES COMMANDE -->
            <section>
            <h1>
                Mes demandes validées
            </h1>
            <?php foreach ($listDemandeValider as $uneListDemandeValider) {?>
                <article class="commandeConfirmer">
                    <ul>
                        <li>
                            Nom du livre : <strong><?= $uneListDemandeValider['nom']; ?></strong>
                        </li>
                        <li>
                            Nom auteur : <strong><?= $uneListDemandeValider['nomAuteur']; ?></strong>
                        </li>
                        <li>
                            <?php 
                                //récupération de la date sous forme d'un datetime
                                // puis utilisation de la fonction format pour afficher avec le format attendu
                                $uneListDemandeValider = new DateTime($uneListDemandeValider['dateDeDebut']);
                            ?>
                            Date de début : <strong><?= $uneListDemandeValider->format('d/m/Y'); ?></strong>
                        </li>
                    </ul>
                </article>
            <?php }?>
                <!--FIN CONFIRMER LES COMMANDE -->

            </section>
        </main>

            
        <?php require_once("./app/views/layout/footer.php") ?> 

       <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>

    </body>

</html>