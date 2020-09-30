<?php
include "user.php";
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
  <h2>update form..:)</h2>

  <?php

    if(isset($reg)){
        echo $reg;
    }

?>

<?php
    if(isset($_GET['id'])){
        $updateid = (int)$_GET['id'];
    }
    $user = new user();
    $userdata = $user->userdata($updateid);
?>
<?php
    if($userdata){

    ?>
  <form action="" method="post">


  <div class="form-group">
      <label for="name"><b>Name:</b></label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $userdata->name; ?>">
    </div>

    <div class="form-group">
      <label for="email"><b>Email:</b></label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $userdata->email;?>">
    </div>


    <div class="form-group">
      <label for="pwd"><b>Password:</b></label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" value="<?php echo $userdata->password; ?>">
    </div>

    <div class="form-group">
      <label for="pwd"><b>Confirm Password:</b></label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter confirm password" name="cpswd" value="<?php echo $userdata->confirm;?>">
    </div>


    <button type="submit" name="submit" class="btn btn-primary"><b>Submit</b></button>
  </form>
  <?php
   
    }
?>
</div>

</body>
</html>