<?php
    session_start();
    if($_SESSION["username"] && $_SESSION["username"]!== "admin"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <div class="welcome_container">
    <div class="container_client">
    <img class="logo-login" src="images/aptiv-vector-logo.svg" alt="logo aptiv">

        <form class="login-form" action="verif_client.php" method="GET">
        <select name="machine" style="
    border-radius:5px; height:50px; border: 1px solid black; padding-left:10px; font-size: 1.1em;"  class="machine-dropdown" id="lang">
            <option value="BT01">Choisir la machine</option>
            <option value="BT01">BT01</option>
            <option value="BT02">BT02</option>
            <option value="BT03">BT03</option>
            <option value="BT04">BT04</option>
            <option value="BT05">BT05</option>
            <option value="BT06">BT06</option>
            <option value="BT07">BT07</option>
            <option value="BT08">BT08</option>
            <option value="BT09">BT09</option>
            <option value="BT10">BT10</option>
            <option value="BT11">BT11</option>
            <option value="BT12">BT12</option>
            <option value="BT13">BT13</option>
            <option value="BT14">BT14</option>
            <option value="BT15">BT15</option>
            <option value="BT16">BT16</option>
            <option value="BT17">BT17</option>
            <option value="BT18">BT18</option>
            <option value="BT19">BT19</option>
            <option value="BT20">BT20</option>
            <option value="BT21">BT21</option>
            <option value="BT22">BT22</option>
            <option value="BT23">BT23</option>
            <option value="BT24">BT24</option>
            <option value="BT25">BT25</option>
        
      </select>
        <h1>
            Scanner le code twist
        </h1>
        <input type="text" name="projet" placeholder="L-code twist">
        <h1>
            Scanner les cables
        </h1>
            <input type="text" name="cable1" placeholder="cable 1">
            <input type="text" name="cable2" placeholder="cable 2">
            <input type="text" name="cable3" placeholder="cable 3">
            <button type="submit" class="seconnecter">Torsader</button>
        </form>
    </div>
    </div>
  <?php
  if (isset($_GET["erreur"])){
    $error_message=$_GET["erreur"];
    if($error_message==="1"){
      echo "<div style='display:flex;flex-direction:column;justify-content:center;align-items:center; margin-top:-90px;'><h1 style='font-family: Arial, Helvetica, sans-serif; color:#D80630; font-size:1.15em;' >Remplir les cases!</h1></div>";
    }
    else if ($error_message==="2"){
      echo "<div style='display:flex;flex-direction:column;justify-content:center;align-items:center; margin-top:-90px;'><h1 style='font-family: Arial, Helvetica, sans-serif; color:#D80630; font-size:1.15em;' >Vérifier les informations scannées!</h1></div>";
    }
  }
 
  ?>
  
</body>
</html>
<?php }
else if ($_SESSION["username"]=== "admin"){
  header("Location: admin.php");
}
else {
  header("Location: login_form.php");
}?>