<?php
session_start();

// variabelen aanmaken
$username = "";
$email    = "";
$errors = array(); 

// connectie met database
$db = mysqli_connect('localhost', 'root', '', 'softwarecollege');

// REGISTREER USER
if (isset($_POST['reg_user'])) {
  // ontvang alle invoerwaarden van het formulier
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validatie: ervoor zorgen dat het formulier correct is ingevoerd...
  // door (array_push()) overeenkomstige fout toe te voegen aan $errors array
  if (empty($username)) { array_push($errors, "Gebruikersnaam is verplicht"); }
  if (empty($email)) { array_push($errors, "Email is verplicht"); }
  if (empty($password_1)) { array_push($errors, "Wachtwoord is verplicht"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Wachtwoord komt niet overeen");
  }

  //  eerst database checken voor de zekerheid
  //  er bestaat geen user met dezelfde gebruikersnaam en/of email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // als user bestaat
    if ($user['username'] === $username) {
      array_push($errors, "Gebruikersnaam bestaat al");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email bestaat al");
    }
  }

  // registreer user als er geen errors zijn in de formulier
  if (count($errors) == 0) {
  	$password = md5($password_1);//wachtwoord beveiligen in de database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "U bent nu ingelogd";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Gebruikersnaam is verplicht");
    }
    if (empty($password)) {
        array_push($errors, "Wachtwoord is verplicht");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "U bent nu ingelogd";
          header('location: index.php');
        }else {
            array_push($errors, "Verkeerd gebruikers/wachtwoord combinatie");
        }
    }
  }
  
  ?>