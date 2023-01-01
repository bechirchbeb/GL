<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>Saisissez vos coordonnees</title>
</head>
<body>
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post"
enctype="application/x-www-form-urlencoded">
<fieldset>
<legend><b>Vos coordonnees</b></legend>
<table>

</td></tr>
<tr><td>Login : </td><td><input type="text" name="login" size="40" maxlength="30"
/></td></tr>
<tr><td>pass : </td><td><input type="password" name="pass" size="40" maxlength="30"/>
</td></tr>
<tr><td>identifiant  : </td><td><input type="text" name="id" size="40" maxlength="30"/>
</td></tr>

<tr>
<td><input type="reset" value="Effacer"></td>
<td><input type="submit" value="Envoyer"></td>
</tr>
</table>
</fieldset>
</form>
<?php
require_once 'utilisateur.php';
echo "avant le if"; // commentaire de teste

require_once("connexion1.php");
$idcom=connexpdo('magasin','myparam');


if(!empty($_POST['login'])&& !empty($_POST['pass'])) 
{
    $iduser=$idcom->quote($_POST['id']); 
    $login=$idcom->quote($_POST['login']); 
    $nom=$idcom->quote($_POST['login']); 
    $pass=$idcom->quote($_POST['pass']);
    $user1 = new \Sprint1\Utilisateur\Utilisateur($iduser,$nom,$login,$pass);

   


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