<?php
    session_start();
?>
<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password,$user['password'])) {
 
        if ($username === "admin") {
            
            $_SESSION["username"] = $username;
            header("Location: admin.php");
            exit();
        } else {
            $_SESSION["username"] = $username;
            header("Location: client.php");
            exit();
        }

    } else {
        header("Location: login_form.php?errorcode=101");
        
    }
}
