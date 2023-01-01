<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="./mystyle1.css">
</head>

<body>
    
    <div class="page-1 screen">
        <div class="overlap-group3">
            <h1 class="lespoir-des-pauvres">L'espoir des pauvres</h1>
            <div class="white-rectangle"></div>
            <img class="righty-1" src="./righty-1@1x.png" alt="righty 1" />
            <img class="lefty-1" src="./lefty-1@1x.png" alt="lefty 1" />

            <form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
                enctype="application/x-www-form-urlencoded">
                <fieldset>
            <div class="email-form">
                <div class="email montserrat-normal-scarpa-flow-20px">login</div>
                <div class="overlap-group">
                        <input id="emailField" name="login" type="text" placeholder="user_name"/>
                </div>
            </div>
            <div class="pass-form">
                <div class="mot-de-passe montserrat-normal-scarpa-flow-20px">Mot de passe</div>
                <div class="overlap-group">
                        <input id="passwordField" type="password" name="pass" placeholder="password"/>
                </div>
            </div>
               
            <div class="connexion-1">Connexion</div>
            <div class="mot-de-passe-oubli">mot de passe oublié </div>
            <p class="vous-navez-pas-de-c">
                <span class="span0">vous n'avez pas de compte ?</span>
                <span class="span1"> inscrivez-vous</span>
            </p>
            <p class="saisissez-vos-inform"> saisissez vos informations d'identification pour accéder à votre compte
            </p>
        </div>
       
        
    </div>
     
    </fieldset>
    <table style="inherits:page-1 screen ;">
            <td>
        <input type="reset" value="Effacer">
       <input type="submit" value="Envoyer">
            </td>
</form>
<?php
require_once 'utilisateur.php';
echo "avant le if"; // commentaire de test
require_once("connexion1.php");

$idcom=connexpdo('magasin','myparam');


if(!empty($_POST['login'])&& !empty($_POST['pass'])) 
{
    $iduser=$idcom->quote($_POST['id']); 
    $login=$idcom->quote($_POST['login']); 
    $nom=$idcom->quote($_POST['login']); 
    $pass=$idcom->quote($_POST['pass']);
    $user1 = new \Sprint1\Utilisateur\Utilisateur($iduser,$nom,$login,$pass);

    echo " dans if";


echo "Objet crée "; // commentaire de teste 
// commentaires de teste
//echo $user1->nom;
//echo $user1->login;
//echo $user1->motDePasse;
//echo $user1->id;
 

$html = <<<HTML

<!DOCTYPE html public>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
    <title>testPersonne</title>
</head>

<body>

<table style="width:100%">
 <tr>
    <th>utilisateu</th>
    <th>id</th>
    <th>nom</th>
    <th>prenom</th>
    
   
  </tr>
  
HTML;
$html.= "<tr>
  <td> user1</td>

  <td>".$user1->seConnecter($login,$pass)."</td>
  
</tr> 
</tr>";

$html.=<<<HTML
</table>

</body>
</html>
HTML;
echo $html;
}
else
{
    echo "saisir vos donnée !!";
}
?>