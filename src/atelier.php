<?php 
const DBHOST = 'db';
const DBNAME = 'atelier_crud';
const DBUSER = 'test';
const DBPASS = 'test';

    //c'est ça qu'il nous manquait ! le ";" veut lui signifier "ça y est c'est fait"
$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    //Maintenant, on se connecte avec le PDO
try {
$db = new PDO($dsn, DBUSER, DBPASS);
echo "connexion réussie";
} catch(PDOException $error) {
    echo "échec de la connection: " . $error->getMessage() . "</br>";
}
//ci-dessus la fonction nous sort le message d'erreur en cas d'échec

$sql = "SELECT * FROM users";

//ici la requête préparée 
$query = $db->prepare($sql);
//ici on exécute la requête
$query->execute();
//on récupère maintenant les données de tableau associatif
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>"; print_r($users);
// echo "</pre>";
//pour erwan regarder sans l'option de PDO


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>Liste des utilisateurices</h1>
    <table>
        <thead>
            <td>Id</td>
            <td>Prénom</td>
            <td>Nom</td>
            <td>Actions</td>
        </thead>
        <tbody>
            <!-- <tr>
                 <td>0</td>
                <td>Jean-luc</td>
                <td>Mélenchon</td> 
            </tr> 
        Nous n'en avons plus besoin, après avoir ajouté cet utilisateur en HTML pour vérifier nous pouvons le supprimer et uniquement
    nous baser sur ceux de la BDD-->
            <?php 
            // Pour chaque utilisateur qu'on a récupéré dans $users, on affiche une nouvelle ligne dans la table HTML
            // Chaque utilisateur de table $user sera identifié dans le foreach en tant que $user 
                foreach($users as $user){
                    ?>
                     <tr>  
                        <td> <?= $user['id'] ?></td> 
                        <td> <?= $user['first_name'] ?></td> 
                        <td> <?= $user['last_name'] ?></td> 
                    
                        <td> 
                            <a href='user.php?id=<?=$user["id"]?>'>Voir l'utilisateurice</a></td>
                            <td> 
                            <a href='update.php?id=<?=$user["id"]?>'>Mettre à jour</a></td>
                            <td> 
                                <a href='delete.php?id=<?=$user["id"]?>'>Supprimer</a></td>
                        </td>
                     </tr> 
                    <?php
                }
            ?>
            <a href="form.php"/>ajoutez un.e utilisateurice</a> </br>
        </tbody>
    </table>
</body>
</html>