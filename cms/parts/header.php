<?php
session_start();
include_once 'classes/autoloader.php';
$db = new Database();

if (!isset($_SESSION["admin"]) && basename($_SERVER["PHP_SELF"]) !== 'login.php') {
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/galery.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Mačky</title>
  <link rel="icon" type="images/x-icon" href="../img/306213.png" />
</head>
<style>
  body {
    background-color: #fbfbfb;
  }

  @media (min-width: 991.98px) {
    main {
      padding-left: 240px;
    }
  }

  .sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    padding: 58px 0 0;
    box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
    width: 240px;
    z-index: 600;
  }
</style>

<body>
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="objednavky.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true"><i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Objednávky</span></a>
        <a href="produkty.php" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-chart-area fa-fw me-3"></i><span>Produkty</span></a>
      </div>
    </div>
  </nav>