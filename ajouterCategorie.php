<?php
    include("connexion1.php");
    $idconn = connexpdo('espoirPauvre','myparam');
//echo  (string)$_POST['nomcat'];
//echo (string)$_POST['Description'];

    if(!empty($_POST['nomcat']) && !empty($_POST['Description']) )
    {
        
        
        $reqprep = $idconn->prepare("INSERT into categorie(nomcategorie,description)
         values(:nomcat,:Description);");
         
        $reqprep->bindValue(':nomcat', $_POST['nomcat']);
        $reqprep->bindValue(':Description',$_POST['Description']);
       
        $reqprep->execute();
        $reqprep->closeCursor();

    }
    echo "Categorie bien ajoutee !!";
?>