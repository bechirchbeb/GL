<?php
    class Article
    {
    public $id;
    public $natureMateriel;
    public $reference;
    public $description;
        
    public function __construct($natureMateriel, $reference, $description){
        $this->natureMateriel = $natureMateriel;
        $this->reference = $reference;
        $this->description = $description;
    }

    public function supprimerArticle(){
        include("connexion1.php");
        $idconn = connexpdo('espoirPauvre','myparam');
        $reqprep = $idconn->prepare("DELETE from article where id_Article=:id");
        $reqprep->bindValue(':id',$id,PDO::PARAM_INT);
        $reqprep->execute();
        $reqprep->closeCursor();
        }

    public function mettreAJour(){
        include("connexion1.php");
        $idconn = connexpdo('espoirPauvre','myparam');
        $reqprep = $idconn->prepare("UPDATE article SET NatureMateriel=:natureMateriel,Reference=:reference,
        Description=:descr WHERE id_Article=:id");
        $reqprep->bindValue(':id',$id,PDO::PARAM_INT);
        $reqprep->bindValue(':natureMateriel',$natureMateriel,PDO::PARAM_STR);
        $reqprep->bindValue(':reference',$reference,PDO::PARAM_STR);
        $reqprep->bindValue(':descr',$description,PDO::PARAM_STR);
        $reqprep->execute();
        $reqprep->closeCursor();
        }
    

    public function ajouterArticle(){
        include("connexion1.php");
        $idconn = connexpdo('espoirPauvre','myparam');
        $reqprep = $idconn->prepare("INSERT into article(NatureMateriel,Reference,Description)
         values(:natureMateriel,:reference,:descr);");
         
        $reqprep->bindValue(':natureMateriel',$this->natureMateriel,PDO::PARAM_STR);
        $reqprep->bindValue(':reference',$this->reference,PDO::PARAM_STR);
        $reqprep->bindValue(':descr',$this->description,PDO::PARAM_STR);
        $reqprep->execute();
        $reqprep->closeCursor();
    }
}
?>