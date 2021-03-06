<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerReservations extends Manager{

    function lireListeReservationsParStatut($statut)
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idReservation, livre.nom as nomLivre, client.nom AS nomClient, client.prenom AS prenomClient, disponible, dateDeDebut FROM reservation 
        LEFT JOIN client ON(reservation.idClient = client.idClient) 
        LEFT JOIN livre ON(reservation.idLivre = livre.idLivre) WHERE statut LIKE ?";  

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$statut]);

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;
    }

    function lireListeReservationsParIdLivre($idLivre)
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idReservation FROM reservation where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultat;

    }


     function lireListeReservationsParIdClient($idClient)
     {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idReservation FROM reservation where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultat;
     }
}