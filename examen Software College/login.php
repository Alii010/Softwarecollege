<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>SoftwareCollege</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" type="image/png" href="foto.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css



">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
     
    </div>
</div>
</nav>
<!-- Einde navigatie menu -->
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Gebruikersnaam</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Wachtwoord</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Nog geen account? <a href="register.php">Meld je aan</a>
  	</p>
  </form>

  <!--<div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-snapchat"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">OverOns</a></li>
                <li class="list-inline-item"><a href="#">Agenda</a></li>
                <li class="list-inline-item"><a href="#">Contact</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>-->



  <!-- Bootstrap scripts -->
<script src="./public/validation.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>