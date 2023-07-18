<?php
session_start();
?>
<?php

    if($_SESSION["username"]==="admin"){
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin CP</title>
    <link rel="stylesheet" href="admin.css">
    
</head>
<body>
    <div class="admin-container">
        <div class="first-container">
            <div class="header-container">
                <h1>
                    Dernier cables torsadés
                </h1>
            </div>
            <?php
            require_once("config.php");
            /*$query = "SELECT * FROM users LIMIT 10";
            $result = mysqli_query($conn, $query);*/ ?>
             <?php
                $totalRowsQuery = "SELECT COUNT(*) as total FROM tickets";
                $totalRowsResult = mysqli_query($conn, $totalRowsQuery);
                $totalRows = mysqli_fetch_assoc($totalRowsResult)['total'];
                $rowsPerPage = 10;
                $totalPages = ceil($totalRows / $rowsPerPage);
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));
                $offset = ($currentPage - 1) * $rowsPerPage;
                $query = "SELECT * FROM tickets LIMIT $offset, $rowsPerPage";
                $result = mysqli_query($conn, $query);
                $endRow= $offset<70 ? $offset+10: $totalRows;
                echo "<h3>affichage des tickets {$offset} à {$endRow} de {$totalRows}<h3>";
                $totalPages = ceil($totalRows / $rowsPerPage);
                for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='?pageticket={$i}&page='> {$i} </a>";
                }
            ?>
           
            <br></br>
            <table id="utilisateurs">
                <thead>
                    <tr>
                    <th>Utilisateur</th>
                    <th>Machine</th>
                    <th>Date twist</th>
                    <th>ticket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['machine']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a style="text-decoration: none; " href="download-ticket.php?id=<?php echo $row['id']?>">Voir ticket</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="second-container">
            <div class="header-container">
            <h1>
                Utilisateurs
            </h1>
            <a class="add-button" href="ajouterutilisateur.php">Ajouter</a>
            </div>
            
            <?php
            require_once("config.php");
            /*$query = "SELECT * FROM users LIMIT 10";
            $result = mysqli_query($conn, $query);*/ ?>
             <?php
                $totalRowsQuery = "SELECT COUNT(*) as total FROM users";
                $totalRowsResult = mysqli_query($conn, $totalRowsQuery);
                $totalRows = mysqli_fetch_assoc($totalRowsResult)['total'];
                $rowsPerPage = 10;
                $totalPages = ceil($totalRows / $rowsPerPage);
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages));
                $offset = ($currentPage - 1) * $rowsPerPage;
                $query = "SELECT * FROM users LIMIT $offset, $rowsPerPage";
                $result = mysqli_query($conn, $query);
                $endRow= $offset<70 ? $offset+10: $totalRows;
                echo "<h3>affichage des utilisateurs {$offset} à {$endRow} de {$totalRows}<h3>";
                $totalPages = ceil($totalRows / $rowsPerPage);
                for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='?pageticket=&page={$i}'> {$i} </a>";
                }
            ?>
           
            <br></br>
            <table id="utilisateurs">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Username</th>


                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
           
        </div>
        
    </div>
    
</body>
</html>
<?php }
else {
  header("Location: login_form.php");
}?>