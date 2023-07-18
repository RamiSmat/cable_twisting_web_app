<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Ajouter utilisateur</title>
</head>
<body>
<main class="main-ajouter">
    <form class="form-ajouter" action="signup.inc.php" method="post">
        <h1>Ajouter un nouveau utilisateur</h1>
        <div>
            <input placeholder="Username" type="text" name="username" id="username">
        </div>
        <div>
            <input placeholder="Mot de passe" type="password" name="password1" id="password1">
        </div>
        <div>
            <input  placeholder="Réecrire le Mot de passe" type="password" name="password2" id="password2">
        </div>
        
        <button class="ajouter-button" type="submit">Ajouter</button>
    </form>
</main>
</body>
</html>