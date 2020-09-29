<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php $title ?> </title>

  <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">
  <style>
  .jumbotron {
  color: white;
  background-image: url(<?php echo base_url().'application/Images/WebsiteBackground2.jpg';?>);
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
  background-color: rgba(245, 245, 245, 0.4);
 }
 .jumbotron-override {
    margin-bottom: 0px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?php echo $title ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Logins">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Registrations">Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Forums">Forums</a>
      </li>
    </ul>
    </div>
</nav>