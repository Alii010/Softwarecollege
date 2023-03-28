<?php
##Connectie maken met de database
include("conn.php");

$id = "";
$voornaam = "";
$achternaam = "";
$leeftijd = "";
$klas="";
$telefoon = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET method : alle data laten zien van de leerling


    if (!isset($_GET["id"])) {
        header("location:read.php");
        exit;
    }
    
    $id = $_GET["id"];

    //lees de tabel van de geselecteerde klant van database
    $sql = "SELECT * FROM leerlingen WHERE leerlingen.id=$id";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$row){
        header("location read.php");
        exit;
    }

    $voornaam = $row["voornaam"];
    $achternaam = $row["achternaam"];
    $leeftijd = $row["leeftijd"];
    $klas = $row["klas"];
    $telefoon = $row["telefoon"];
} else {
    //POST method: update de gegevens van de leerling
    $id = $_GET["id"];  
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $leeftijd = $_POST["leeftijd"];
    $klas = $_POST["klas"];
    $telefoon = $_POST["telefoon"];

    if(isset($_POST['update'])) {
        if (empty($voornaam) || empty($achternaam) || empty($leeftijd) || empty($klas) || empty($telefoon)) {
            $errorMessage = "Alle velden zijn verplicht";
        }else{

        //$sql = $conn->prepare(" UPDATE leerlingen SET voornaam  = :voornaam, achternaam = :achternaam, leeftijd  = :leeftijd, telefoon = :telefoon where id = :id") ;

       $sql = "UPDATE leerlingen SET voornaam  = '$voornaam', achternaam = '$achternaam', leeftijd  = $leeftijd, klas = '$klas', telefoon = $telefoon WHERE id = $id";
       $stmt = $conn->prepare($sql);
       $stmt->execute();

        

       // if (!$result) {
         //   $errorMessage = "ongeldige query: " . $conn->error;
           // break;
        //}

        $successMessage = "leerling succesvol geupdate";

        header("location: read.php");
        exit;

    }

}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="shortcut icon" type="image/png" href="foto.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
        <h2>Update Leerling</h2>

        <!-- Deze melding krijg je als je velden leeg zijn-->
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
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                <label class="col-sm-3 col-form-label">Klas</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="klas" value="<?php echo $klas; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Leeftijd</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="leeftijd" value="<?php echo $leeftijd; ?>">
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
                    <button type="submit" name='update' class="btn btn-primary">Verzenden</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="read.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
          <!-- Bootstrap scripts -->
        <script src="./public/validation.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    </div>
    
    
</body>

        </html>