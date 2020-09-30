<?php
session::init();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php

if(isset($_GET['action']) && $_GET['action']=='logout'){
    session::destory();
}
?>

<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
  <?php
    $log = session::get("login");
    $id = session::get("id");
    if($log==true){

?>
    <li class="nav-item">
      <a class="nav-link" href="#">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?action=logout">Log out</a>
    </li>
    <?php
    }
    else{

?>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Log In</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <?php
    }

?>
  </ul>
</nav>


</body>
</html>
