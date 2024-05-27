<?php 
if (isset($_GET['id']) && !empty($_GET['id'])) //si l'id de l'url existe et est rempli
 {
require_once("connect.php");
// echo $_GET["id"];
$id = strip_tags($_GET["id"]);
$sql = "SELECT * FROM users WHERE id = :id";
//On prépare la requête dans $sql,donc récupérer l'id unique
$query = $db->prepare($sql);
//on accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(':id', $id, PDO::PARAM_INT);
//:id correspond à ce qui est dans la requête et $id de la variable
//PARAM_INT indique que l'on attend ici un nombre entier par défaut il est en PARAM STR donc string chaîne de caractère
//maintenant il est temps d'exécuter la requête
$query->execute();
//besoin d'une seule donnée donc fetch uniquement et non pas fetchAll
$user = $query->fetch(); 
//on vérifie avec un print_r
// print_r($user);

//s'il n'y a rien dans $user on redirige vers l'index, on vérifie si l'utilisateur existe dans la BDD
//!$user est le raccourci de isset $user... il n'y a pas besoin de préciser empty
if(!$user) {
    header('Location: atelier.php');
}  else {   require_once("disconnect.php");
}

} else { header('Location: atelier.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['first_name'] . ' ' . $user['last_name'] ?></title>
</head>
<body>
    <h1>Page de l'utilisateurice <?= $user['first_name'] . ' ' . $user['last_name'] ?></h1>
</body>
</html>