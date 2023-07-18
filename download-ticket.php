<?php
require_once("config.php");
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $stmt = $conn->prepare("SELECT * FROM tickets WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $color1 = $row["color1"];
        $color2 = $row["color2"];
        $color3 = $row["color3"];
        $section1 = $row["section1"];
        $section2 = $row["section2"];
        $section3 = $row["section3"];
        $longini1= $row["longini1"];
        $longini2= $row["longini2"];
        $longini3= $row["longini3"];
        $longfin1= $row["longfin1"];
        $longfin2=$row["longfin2"];
        $longfin3=$row["longfin3"];
        $pas=$row["pas"];
        $machine=$row["machine"];
        $username=$row["username"];/*$_SESSION["username"];*/
        $UNICO1 = $row["unico1"];
        $UNICO2 = $row["unico2"];
        $UNICO3 = $row["unico3"];
        $famille = $row["famille"];
        $twistcode = $row["codetwist"];
        $date = $row["date"];;
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
