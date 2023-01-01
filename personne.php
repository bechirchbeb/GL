<?php
namespace Sprint1\Personne;
 abstract class Personne 
{
    public $id;
    public $nom;
   
   

    public function __construct($i,$n)
    {
        $this->id=$i;
        $this->nom=$n;
        
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
public function __toString()
    {
        echo "l'identifiant :".$this->id. ",le nom :".$this->nom."<br>/n";
    }



}
?>