<?php
include "user.php";
include "header.php";
session::sessioncheck();

session::init();
?>

<?php
    
    $mse = session::get("mes");
    if(isset($mse)){
        echo $mse;
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
Hello,<?php
    $name = session::get("name");
    if(isset($name)){
        echo $name;
    }
    ?>
<div class="container">

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $user = new user();
    $udata = $user->udata();
    if($udata){
        foreach ($udata as $sdata) {
         
    ?>
      <tr>
        <td><?php echo $sdata['name']; ?></td>
        <td><?php echo $sdata['email']; ?></td>
        <td><a href="update.php?id=<?php echo $sdata['id']; ?>">veiw</a></td>
      </tr>
        <?php } }?>
    </tbody>
  </table>
</div>

</body>
</html>
