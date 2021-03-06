<?php

namespace Projet\Controllers;

class ControllerFront
{
    private $listMetas;
    private $listFAQ;
    private $listCategorie;
    private $FrontManager;
    public $nomPage;
    private $erreurCreationCompte = false;
    private $libelleErreurCreationCompte;
    private $erreurConnexionCompte = false;
    private $libelleErreurConnexionCompte;

    private function gestionHeader()
    {
        //On récupère la liste des métas
        $this->listMetas = $this->FrontManager->lireListeMetas($this->nomPage);
        //On récupère la liste des FAQs
        $this->listFAQ = $this->FrontManager->lireListeFAQ();
        //On récupère la liste des catégorie
        $this->listCategorie = $this->FrontManager->lireListeCategorie();
    }

    private function gestionModeConnecte()
    {
        
        if(isset($_GET['action2']))
        {
            //On test si l'utilisateur à cliquer sur "Me connecter"
            if($_GET['action2'] == "connecter")
            {
                //L'utilisateur essaie de se connecter
                //on test le couple @/mot de passe
                //si ok, on récupère l'idClient dans la variable testConnexion
                $testConnexion = $this->FrontManager->seConnecter($_POST["emailIdentifier"], $_POST["motDePasseIdentifier"]);

                if($testConnexion != false)
                {
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idClient'] = $testConnexion;
                    $_SESSION['panier'] = array();

                    setcookie('emailClient', $_POST["emailIdentifier"], time()+3600*24);
                }
                else{
                    $this->erreurConnexionCompte = true;
                    $this->libelleErreurConnexionCompte = "L'e-mail ou le mot de passe est incorrecte";
                }
            }

            //On test si l'utilisateur a cliqué sur "se déconnecter"
            if($_GET['action2'] == "deconnecter")
            {
                //On détruit la variable de session
                unset($_SESSION['idClient']);
                unset($_SESSION['panier']);
            }

            if($_GET['action2'] == "creerCompte")
            {
                //L'utilisateur essaie de creer son compte
                //on test les champs 
                //si ok, on récupère l'idClient dans la variable testCreerCompte
                $testCreerCompte = $this->FrontManager->creerCompte($_POST["numeroAbonneCreer"],$_POST["civilite"], $_POST["nomCreer"], $_POST["prenomCreer"], $_POST["emailCreer"], $_POST["mobileCreer"],
                $_POST["telephoneCreer"], $_POST["adresseCreer"], $_POST["dateCreer"], $_POST["motDePasseCreer"]);
                
                if(is_numeric($testCreerCompte))
                {   
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idClient'] = $testCreerCompte;
                    $_SESSION['panier'] = array();

                    setcookie('emailClient', $_POST["emailCreer"], time()+3600*24);
                }
                else
                {
                    $this->erreurCreationCompte = true;
                    $this->libelleErreurCreationCompte = $testCreerCompte;
                }
            }
        }
    }


    function homeFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listCdCoeur = $FrontManagerLivre-> lireListeCoupDeCoeurLimit4();
        $listNouveautes = $FrontManagerLivre-> lireListeNouveautesLimit4();
        $listMangas = $FrontManagerLivre-> lireListeMangasLimit4();
        $listBandesDessinees = $FrontManagerLivre-> lireListeBandesDessineesLimit4();
        $listCuisine = $FrontManagerLivre-> lireListeCuisineLimit4();

        $FrontManagerAtelier = new \Projet\Models\front\ManagerFrontAtelier();
        $listAtelier = $FrontManagerAtelier-> lireListeAtelierLimit4();
       

        //Appel à la vue : affichage
        require 'app/views/front/home.php';
    }

    function coupDeCoeursFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listCdCoeur = $FrontManagerLivre-> lireListeCoupDeCoeur();

        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listNouveautes = $FrontManagerLivre-> lireListeNouveautesLimit16();
       
        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        //on charge le ManagerFrontAtelier
        $FrontAtelierManager = new \Projet\Models\front\ManagerFrontAtelier();
        $listAtelier = $FrontAtelierManager->lireListeAtelier();

        require 'app/views/front/atelier.php';
    }

    function pageRechercheFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        //Test si la page est appelée en tapant directement l'url (sans variable POST)
        if(isset($_POST['selectCategorie']) && isset($_POST['champRecherche']))
        {
            $resultPageRecherche = $FrontManagerLivre->rechercherLivre($_POST['selectCategorie'], $_POST['champRecherche']);
        }
        else{
            $resultPageRecherche = array();
        }
    
        require 'app/views/front/pageRecherche.php';
    }

    function panierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        $donnees = array();
        if(isset($_SESSION['idClient']))
        {
            //on charge le ManagerFrontLivre
            $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();


            //on test si la variable action2 existe
            if(isset($_GET["action2"])){

                //je test quel soit bien égale a ajoute panier
                if($_GET["action2"] == "suppressionLivre")
                {
                    // on test si l' id est dans le tableau 
                    if(in_array($_GET['id'] , $_SESSION['panier']))
                    {
                        //on cherche l'index de l'idLivre dans le tableau $_SESSION panier  
                        $tablIndex = array_search($_GET['id'], $_SESSION['panier'] );
                        //supprime dans le tableau la valeur presente a index $tablIndex  
                        unset($_SESSION['panier'][$tablIndex]);


                        echo "<script>alert('Votre demande à bien été supprimée')</script>";
                    }
                    else{

                        echo "<script>alert('Ce livre est déjà supprimer')</script>";
                    }
                }
                //action de validation panier
                if($_GET["action2"] =="validerPanier")
                {   
                    // mon panier est un tableau d'idLivre 
                    foreach ($_SESSION['panier'] as $unIdLivre)
                    {
                        $this->FrontManager->ajouterReservation($unIdLivre, $_SESSION['idClient'] );
                    }
                    
                    //on remet le tableau  $_SESSION ['panier] à vide
                    $_SESSION['panier'] = array();
                }
            }

            // j'affiche le chargement de tt les donnée
            if(!empty($_SESSION['panier']))
            {
                foreach($_SESSION['panier'] as $unIdLivre)
                {
                    $retour = $FrontManagerLivre->lireInfoLivre($unIdLivre);
                    $retour['idLivre'] = $unIdLivre;

                    array_push($donnees,$retour);
                }
            }
            
            $listDemandeEnAttente = $this->FrontManager->lireListeDemandeEnAttente($_SESSION['idClient']);
            $listDemandeValider = $this->FrontManager->lireListeDemandeValide($_SESSION['idClient']);

            require 'app/views/front/panier.php';
        }
        else{
            header('Location: ./front-home');
            exit();
        }
    }

    function conditionsGeneralesFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        require 'app/views/front/rgpd.php';
    }

    function planDuSiteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/planDuSite.php';
    }

    function detailLivreFront($idLivre)
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        if($idLivre != "")
        {
            $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
            $DetailLivre = $FrontManagerLivre->lireDetailLivre($idLivre);

            //on test si la variable action2 existe
            if(isset($_GET["action2"])){

                //je test quel soit bien égale a ajoute panier
                if($_GET["action2"] == "ajoutePanier")
                {
                    if(!in_array($idLivre, $_SESSION['panier']))
                    {
                        //on ajoute idLivre dans la variable $_SESSION panier 
                        array_push($_SESSION['panier'], $idLivre);

                        echo "<script>alert('Votre demande de réservation a bien été ajoutée au panier. \\nN\'oubliez pas de valider votre panier pour confirmer votre demande de réservation !')</script>";
                    }
                    else{

                        echo "<script>alert('Ce livre est déjà dans votre panier')</script>";
                    }
                }


                //On ajoute le commentaire si on est en situation de post du formulaire
                if($_GET["action2"] == "ajouteCommentaire")
                {
                    if(isset($_SESSION["idClient"]) && isset($_POST["noteLivre"]) && isset($_POST["commentaireLivre"]))
                    {
                        if($_POST["noteLivre"] != "")
                        {
                            //on enregistre le commentaire posté par utilisateur
                            $FrontManagerLivre->ecrireCommentaire($idLivre,$_SESSION["idClient"],$_POST["noteLivre"],$_POST["commentaireLivre"]);
                        }
                        else
                        {
                            echo "<script>alert('Veuillez saisir une note pour ce livre !')</script>";
                        }
                        
                    }
                }

            }
            
            //On récupère la liste des derniers commentaires
            $listCommentaire = $FrontManagerLivre->lireCommentaire($idLivre);

            require 'app/views/front/detailLivre.php';
        }
        else{
            header('Location: ./front-home');
            exit();
        }
    } 

    function detailAtelierFront($idAtelier)
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        if($idAtelier != "")
        {
            // on récupère par id
            $FrontManagerAtelier = new \Projet\Models\front\ManagerFrontAtelier();
            $DetailAtelier = $FrontManagerAtelier->lireDetailAtelier($idAtelier);

            require 'app/views/front/detailAtelier.php';
        }
        else{
            header('Location: ./front-home');
            exit();
        }
    }

    function monCompteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //TEST de sécurité : on s'assure que le client est connecté (qu'il existe une variable $_SESSION['idClient'])
        if(isset($_SESSION['idClient']))
        {
  
            //on enregistre avant de charger les informations
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "enregistrerInfosPers"){
                    
                    //on appelle la function qui met à jour les informations dans la basse de donnée
                    //récuperer les variables post
                    $this->FrontManager->mettreAJourClient($_SESSION['idClient'],$_POST['Civilite'],$_POST['nomCompte'],$_POST['prenomCompte'],$_POST['emailCompte'],
                    $_POST['mobileCompte'],$_POST['telephoneCompte'],$_POST['adresseCompte'],$_POST['dateNaissanceCompte']);
                }
                if ($_GET['action2'] == "enregistrerPassword"){
                    
                    //on appelle la function qui met à jour les informations dans la basse de donnée
                    //récuperer les variables post
                    $this->FrontManager->mettreAJourMotDePasseParIdClient($_SESSION['idClient'],$_POST['nouveauMotPasse'], $_POST['confirNouveauMotPasse']);
                }
            }

            // on récupère le compte
            $monCompte = $this->FrontManager->lireMonCompte($_SESSION['idClient']);

            require 'app/views/front/monCompte.php';

            if(isset($_GET['action2']))
            {
                //on test la valeur de action2
                if ($_GET['action2']=="modifier")
                {
                    echo "<script>";
                        echo "$('.conteneurMonCompte').hide();";
                        echo "$('.conteneurMonCompteModifier').show();";
                        echo "$('.conteneurCompteMotPass').show();";
                    echo "</script>";
                }
                else{
                    //si on tombe pas dans l'un cas au dessus on revient sur l'affichage de compte 
                    echo "<script>";
                        echo "$('.conteneurMonCompte').show();";
                        echo "$('.conteneurMonCompteModifier').hide();";
                        echo "$('.conteneurCompteMotPass').hide();";
                    echo "</script>";
                }
            }
            else{
                //Par défaut si pas d'action2 on revient sur la page mon compte
                echo "<script>";
                    echo "$('.conteneurMonCompte').show();";
                    echo "$('.conteneurMonCompteModifier').hide();";
                    echo "$('.conteneurCompteMotPass').hide();";
                echo "</script>";
            }
        }
        else{
            header('Location: ./front-home');
            exit();
        }
        
    }


    function pageErreurFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/pageErreur.php';
    }

    function passOublierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();


        if(isset($_GET["action2"]))
        {
            //on test si elle est egale a motDePasseOublier
            if($_GET["action2"] == "motDePasseOublier"){

                //on génére un mot de passe aleatoire 
                $nouveuMotPass = "";
                    //1ere lettre en majuscule
                $ascii = rand(65,90);

                    // nombre aleatoire
                $nouveauMotPass = chr($ascii);

                    //2ere lettre &
                $nouveauMotPass = $nouveauMotPass."&";

                    //3ere lettre chiffre aleatoire
                $nouveauMotPass = $nouveauMotPass.rand(1,9);

                    //on ajoute 5 lettres minuscules
                for($i=0; $i<5; $i++){
                    
                    $ascii = rand(97,122);
                    //
                    $nouveauMotPass = $nouveauMotPass.chr($ascii);
                }
                
                //j'appel ma fonction pour enregistrer dans la base de données
                $this->FrontManager->mettreAJourMotDePasseParEmail($_POST["adresseMail"],$nouveauMotPass);

                //on envoie le mail au client 
                // Le message
                $message = "Bonjour, votre mot de passe a été réinitialisé : ".$nouveauMotPass." \r\n";
                $message = $message."On vous invite à personnaliser ce mot de passe en vous rendant sur le site dans la rubrique: Mon compte \r\n";
                $message = $message."Si vous n'êtes pas à l'origine de cette manipulation, on vous invite à prendre contact avec la bibliothèquaire.\r\n";
                $message = $message."Nous vous remecions pour votre expérience sur notre site.";

                // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
                $message = wordwrap($message, 70, "\r\n");

                // Envoi du mail
                mail($_POST["adresseMail"], 'Nouveau mot de passe', $message);   
            }
        }
        
        require 'app/views/front/passOublier.php';
    }
    

     

}