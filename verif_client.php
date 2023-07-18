<?php 
require_once("config.php");
if (isset($_GET['projet'])) {
    $projet = $_GET['projet'];
    $cable1 = $_GET['cable1'];
    $cable2 = $_GET['cable2'];
    $cable3 = $_GET['cable3'];
    $machine=$_GET['machine'];
    $stmt = $conn->prepare("SELECT * FROM aptiv_data WHERE `L-code Twist` = ?");
    $stmt->bind_param("s", $projet);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
          
            $projectId = $row['_id'];
            $projectCable1 = $row['UNICO1'];
            $projectCable2 = $row['UNICO2'];
            $projectCable3 = $row['UNICO3'];
            if (($cable1 === $projectCable1) && ($cable2 === $projectCable2) && ($cable3 === $projectCable3)){
                header("Location: create_ticket.php?project_id=".$projectId."&machine=".$machine);
            }
            else{
                header("Location: client.php?erreur=2");
                
            }

        }
    } else {
        header("Location: client.php?erreur=1");
        
    }
}