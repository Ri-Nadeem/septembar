<?php
include "user.php";
include "header.php";
session::logcheck();
$user = new user();

if(isset($_POST['submit'])){
    $log = $user->logcreat($_POST);
}

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



<div class="container">
  <h2>Log In form..:)</h2>

  <?php

    if(isset($log)){
        echo $log;
    }

?>

  <form action="" method="post">


    <div class="form-group">
      <label for="email"><b>Email:</b></label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>


    <div class="form-group">
      <label for="pwd"><b>Password:</b></label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>


    <button type="submit" name="submit" class="btn btn-primary"><b>Submit</b></button>
  </form>
</div>

</body>
</html>
