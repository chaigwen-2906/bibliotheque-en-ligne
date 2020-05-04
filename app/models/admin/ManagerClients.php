<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerClients extends Manager{

    function getListeClients()
    {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT * FROM client ";  
        

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;

    }


    
}