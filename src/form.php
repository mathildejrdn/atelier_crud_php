<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body><h1>Ajouter un.e utilisateurice</h1>
<form action="create.php" method="post">  
    <label for="first_name">
        Prénom
    </label>
    <input type="text" name='first_name' required>
    <label for="last_name">
        Nom
    </label>
    <input type="text" name='last_name' required>
    <button>Ajouter</button>
    </form>
    <a href="atelier.php">Retour</a> 
    <?php echo print_r($_POST);?>
</body>
</html>