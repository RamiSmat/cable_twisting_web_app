<?php
require_once 'config.php';
require_once 'functions.inc.php';
if(isset($_POST['username'])&& isset($_POST['password1'])&& isset($_POST['password2'])){
    $username=$_POST['username'];
    $pwd=$_POST['password1'];
    $pwdrepeat=$_POST['password2'];

   if (emptyInputSignup($username,$pwd,$pwdrepeat)!== false){
        header("Location: ajouterutilisateur.php?error=emptyinput");
        exit();
    }
    if (pwdMatch($pwd,$pwdrepeat)!== false){
        header("Location: ajouterutilisateur.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn,$username)!== false){
        header("Location: ajouterutilisateur.php?error=usernametaken");
        exit();
    }
    createUser($conn,$username,$pwd);
    
}
else{
    header("Location: ajouterutilisateur.php");
    exit();
}