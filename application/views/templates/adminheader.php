<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php $title ?> </title>

  <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $title ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">  
    <ul class="navbar-nav mr-auto">
      <?php
          //Load  data from navigation model to Navbar
           $baseurl = base_url();
            foreach($nav as $element)
            {
              echo '<li class="nav-item"> <a class="nav-link" href='."$baseurl"."admins/"."$element".">".rtrim($element,"s")."</a> </li>";
            }
      ?>
    </ul>
    </div>

    <?php
    //Show username on the right if it is set. aka user is logged in 
    if (isset($_SESSION["username"]))
    {
      $username = $_SESSION["username"];
    }
    else
    {
      $username = "";
    }
    echo "<h5> <span class=".'"float-right text-primary"'.">".$username."</span> </h5>"?>
</nav>

</body>

