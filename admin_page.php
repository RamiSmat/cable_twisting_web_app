<?php

if (!isset($_SESSION["username"]) || $_SESSION["username"] !== "admin") {
    header("Location: login_form.php");
    exit();
}
else{
    echo "";
}

