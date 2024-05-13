<?php include "backend/db_conn.php";
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/galery.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Mačky</title>
      <link rel="icon" type="images/x-icon" href="img/306213.png" />
  </head>
    <body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;"> 
      <div class="container-fluid">
        <a class="navbar-brand" >
        <img src="img/306213.png" alt="Logo" width=auto height="50" class="d-inline-block align-text-center">
        Mačky
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Domov</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index2.php">Informácie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index3.php">História</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Plemená mačiek
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index4.php">Siamská mačka</a></li>
                <li><a class="dropdown-item" href="index5.php">Britská mačka</a></li>
                <li><a class="dropdown-item" href="index6.php">Perzská mačka</a></li>
                <li><a class="dropdown-item" href="index7.php">Ragdoll</a></li>
                <li><a class="dropdown-item" href="index8.php">Sphynx</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index9.php">Formulár</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="obchod.php">Obchod</a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
             <a class="nav-link" href="kosik.php">Košík</a>
          </li>
        </ul>
      </div>
    </nav>