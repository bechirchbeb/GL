<?php
namespace  Sprint1\Utilisateur;
include("connexion1.php");

require_once 'Personne.php';
use Sprint1\Personne as Personne;
class Utilisateur extends Personne\Personne
{

    public $login;
    public $motDePasse;
    
   

    public function __construct($id,$nom,$login,$pwd)
    {
       parent::__construct($id,$nom);
       $this->motDePasse = $pwd;
        $this->login = $login;
       
        
    }
    public function __get($prop) 
{
return $this->$prop;
}

public function __set($prop, $val)
{
echo "Affectation de la valeur $val à la propriété 
$prop <br /> ";
$this->$prop = $val;
}

public function seConnecter($login ,$motDePasse)
{
        echo $login;
        echo $motDePasse;
if(!empty($login) && !empty($motDePasse))
{
    $idcom=connexpdo('magasin','myparam');
    
$requete="SELECT * FROM test WHERE lower(login)
LIKE $login AND lower(pass) LIKE $motDePasse"; 
$result=$idcom->query($requete);
if(!$result) 
{
echo "Lecture impossible";
}
else
{
$nbcol=$result->columnCount();
$nbart=$result->rowCount();
if($nbart==0)
{
echo "<h3>Il n'y a aucun utilisateur correspondant au login : $motDePasse</h3>";
exit;
}

// Affichage des titres du tableau

echo "<p> Welcom ! </p>";
echo "<p><a href='page2.html'> cliquez ici pour accéder au home page </p>";

}
while($ligne=$result->fetch(PDO::FETCH_NUM));
}
else {echo "<h3>Connexion compléter !</h3>";}

}

}
?>