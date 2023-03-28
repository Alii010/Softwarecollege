<?php

include('conn.php');

$voornaam ="";
$achternaam ="";
$leeftijd ="";
$klas="";
$telefoon ="";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $voornaam =  $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $leeftijd = $_POST["leeftijd"];
    $klas = $_POST["klas"];
    $telefoon = $_POST["telefoon"];

    do {
        if ( empty($voornaam) || empty($achternaam) || empty($leeftijd) ||empty($klas) || empty($telefoon)){
            $errorMessage = "Alle velden zijn verplicht";
            break;
        }

        //nieuwe leerling toevoegen

        $sql = "INSERT INTO leerlingen (voornaam, achternaam, leeftijd, klas, telefoon) " .
                "VALUES ('$voornaam', '$achternaam', '$leeftijd', '$klas', '$telefoon')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "ongeldige query: " . $connection->error;
            break;
        }

        $voornaam ="";
        $achternaam ="";
        $leeftijd ="";
        $klas="";
        $telefoon ="";

        $successMessage = "Leerling toegevoegd";

        header("location: read.php");
        exit;

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="foto.jpg">
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
        <h2>Nieuw Leerling</h2>

        <?php 
        if (!empty($errorMessage)) {
            echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-succes alert-dismissible fade show' role='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert aria label>'
                    </div>
                </div>
            </div>            
            ";

        }
        
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Voornaam</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="voornaam" value="<?php echo $voornaam; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Achternaam</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="achternaam" value="<?php echo $achternaam; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Leeftijd</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="leeftijd" value="<?php echo $leeftijd; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Klas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="klas" value="<?php echo $klas; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefoonnummer</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telefoon" value="<?php echo $telefoon; ?>">
                </div>
            </div>

            <?php
            if ( !empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-succes alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert aria label>'
                        </div>
                    </div>
                </div>            
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Verzenden</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="read.php" role="button">Cancel</a>
                </div>
            </div>
        </form>

    </div>
    
    
</body>
</html>