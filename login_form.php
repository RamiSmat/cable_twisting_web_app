<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="welcome_container">
    <div class="container_bonjour">
    <img class="logo-login" src="images/aptiv-vector-logo.svg" alt="logo aptiv">
        <h1>
            Se Connecter
        </h1>
        <form class="login-form" action="login.php" method="POST">
            
            <input type="text" name="username" placeholder="nom">
            <input type="password" name="password" placeholder="mot de passe">
            <button type="submit" class="seconnecter">Se connecter</button>
        </form>
        <?php 
        if(isset($_GET["errorcode"])){
            echo "<h3 style='color:#E90038 ; font-family: Arial, Helvetica, sans-serif;'>Erreur, réessayer</h3>";
        }
        ?>
        
    </div>
    </div>
  
</body>
</html>