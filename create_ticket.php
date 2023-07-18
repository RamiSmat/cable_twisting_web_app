<?php
    session_start();
?>
<?php
require_once("config.php");

/*session_start();*/
if (isset($_GET["project_id"])) {
    $machine=$_GET['machine'];
    $projetid = $_GET["project_id"];
    $stmt = $conn->prepare("SELECT * FROM aptiv_data WHERE _id = ?");
    $stmt->bind_param("s", $projetid);
    $stmt->execute();
    $result = $stmt->get_result();
    date_default_timezone_set('Africa/Tunis');
    if ($row = $result->fetch_assoc()) {
        $color1 = $row["Color 1"];
        $color2 = $row["Color 2"];
        $color3 = $row["Color 3"];
        $section1 = $row["Section 1"];
        $section2 = $row["Section 2"];
        $section3 = $row["Section 3"];
        $longini1= $row["Longueur initial 1"];
        $longini2= $row["Longueur initial 2"];
        $longini3= $row["Longueur initial 3"];
        $longfin1= $row["Longueur final1"];
        $longfin2=$row["Longueur final2"];
        $longfin3=$row["Longueur final 3"];
        $pas=$row["Pas de Machine"];
        $username=$_SESSION["username"];
        $UNICO1 = $row["UNICO1"];
        $UNICO2 = $row["UNICO2"];
        $UNICO3 = $row["UNICO3"];
        $famille = $row["Famille"];
        $twistcode = $row["L-code Twist"];
        $date = date('d-m-y h:i:s');
        $imagePath = 'images/ticket.png';
        $fontPath = 'fonts/477981829-OUTFIT-REGULAR.ttf';
        $fontSize = 16;
        $newImage = imagecreatetruecolor(700, 1000);
        $backgroundColor = imagecolorallocate($newImage, 255, 255, 255);
        imagefill($newImage, 0, 0, $backgroundColor);
        $textColor = imagecolorallocate($newImage, 0, 0, 0);
        $ticketImage = imagecreatefrompng($imagePath);
        imagecopy($newImage, $ticketImage, 0, 0, 0, 0, imagesx($ticketImage), imagesy($ticketImage));
        imagettftext($newImage, 50, 0, 194, 173, $textColor, $fontPath, $twistcode);
        imagettftext($newImage, $fontSize, 0, 40, 56, $textColor, $fontPath, $date);
        imagettftext($newImage, $fontSize, 0, 550, 45, $textColor, $fontPath, $username);
        imagettftext($newImage, $fontSize, 0, 550, 111, $textColor, $fontPath, $machine);
        imagettftext($newImage, $fontSize, 0, 230, 288, $textColor, $fontPath, $famille);
        imagettftext($newImage, $fontSize, 0, 230, 360, $textColor, $fontPath, $UNICO1);
        imagettftext($newImage, $fontSize, 0, 330, 360, $textColor, $fontPath, $UNICO2);
        imagettftext($newImage, $fontSize, 0, 430, 360, $textColor, $fontPath, $UNICO3);
        imagettftext($newImage, $fontSize, 0, 230, 462, $textColor, $fontPath, $longfin1);
        imagettftext($newImage, $fontSize, 0, 330, 462, $textColor, $fontPath, $longfin2);
        imagettftext($newImage, $fontSize, 0, 430, 462, $textColor, $fontPath, $longfin3);
        imagettftext($newImage, $fontSize, 0, 230, 530, $textColor, $fontPath, $longini1);
        imagettftext($newImage, $fontSize, 0, 330, 530, $textColor, $fontPath, $longini2);
        imagettftext($newImage, $fontSize, 0, 430, 530, $textColor, $fontPath, $longini3);
        imagettftext($newImage, $fontSize, 0, 230, 606, $textColor, $fontPath, $section1);
        imagettftext($newImage, $fontSize, 0, 330, 606, $textColor, $fontPath, $section2);
        imagettftext($newImage, $fontSize, 0, 430, 606, $textColor, $fontPath, $section3);
        imagettftext($newImage, $fontSize, 0, 230, 680, $textColor, $fontPath, $color1);
        imagettftext($newImage, $fontSize, 0, 330, 680, $textColor, $fontPath, $color2);
        imagettftext($newImage, $fontSize, 0, 430, 680, $textColor, $fontPath, $color3);
        imagettftext($newImage, $fontSize, 0, 337,755, $textColor, $fontPath, $pas);
        imagettftext($newImage, 50, 0, 194, 852, $textColor, $fontPath, $twistcode);
        $stmt = $conn->prepare("INSERT INTO tickets (username,date,famille,codetwist,unico1,unico2,unico3,longini1,longini2,longini3,longfin1,longfin2,longfin3,section1,section2,section3,color1,color2,color3,pas,machine) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssssssssssss",$username,$date,$famille,$twistcode,$UNICO1,$UNICO2,$UNICO3,$longini1,$longini2,$longini3,$longfin1,$longfin2,$longfin3,$section1,$section2,$section3,$color1,$color2,$color3,$pas,$machine);
        $stmt->execute();
        $newImagePath = 'images/tickett.png';
imagepng($newImage, $newImagePath);
imagedestroy($newImage);

header("Content-Type: image/png");
header("Content-Disposition: attachment; filename=tickett.png");
header("Content-Length: " . filesize($newImagePath));

readfile($newImagePath);
exit();
    }
}