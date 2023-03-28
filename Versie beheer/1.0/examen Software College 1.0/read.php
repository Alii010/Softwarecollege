<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <link rel="shortcut icon" type="image/png" href="foto.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navigatie menu -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="login.php">Software College</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#expandme">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="expandme" >
        <div class="navbar-nav test">
          <a href="overons.html" class="nav-item nav-link">Over ons</a>
          <a href="agenda.html" class="nav-item nav-link">Agenda</a>
          <a href="contact.html" class="nav-item nav-link">Contact</a>
          <a href="create.php" class="nav-item nav-link">Create</a>
          <a href="read.php" class="nav-item nav-link">Read</a>
        </div>
    </div>
    </nav>
    <!-- Einde navigatie menu -->

    <div class="container my-5">
        <h2>Lijst van leerlingen</h2>
        <a class="btn btn-primary" href="create.php" role="button">Nieuw leerling</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Leeftijd</th>
                    <th>Klas</th>
                    <th>Telefoonnummer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                ##Connectie maken met de database
                /*$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "softwarecollege";

                //connectie maken
                $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                //checken connectie
                if($connection->connect_error) {
                    die("connectie niet gelukt: " . $connection->connect_error);
                }*/

                include('conn.php');

                //alles lezen van de database
                $sql = "SELECT * FROM leerlingen";
                $result = $conn->query($sql);

                if (!$result) {
                    die("ongeldige query: " . $connection_error);
                }

                //lees data 
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo"
                     <tr>
                        <td>$row[id]</td>
                        <td>$row[voornaam]</td>
                        <td>$row[achternaam]</td>
                        <td>$row[leeftijd]</td>
                        <td>$row[klas]</td>
                        <td>$row[telefoon]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href=update.php?id=$row[id]>Bijwerken</a>
                            <a class='btn btn-danger btn-sm' href=delete.php?id=$row[id]>Verwijderen</a>
                        </td>
                </tr>
                    ";
                }
                ?>         
            </tbody>
        </table>
    </div>    
        
    
</body>
</html>