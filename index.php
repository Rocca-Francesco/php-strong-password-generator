<?php 
session_start();
include_once __DIR__ . './functions.php';

// ricevo la lunghezza della password da generare e la trasformo in un numero
$lunghezzaPassword = $_GET["lunghezzaPassword"] ?? 0;
$lunghezzaPassword = (int)$lunghezzaPassword;

$_SESSION['lunghezzaPassword'] = $lunghezzaPassword;

$nuovaPassword = generaPassword($lunghezzaPassword) ?? '';
$_SESSION['nuovaPassword'] = $nuovaPassword;
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Strong Password Generator</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Genera la tua nuova password sicura.</h1>
    <form action="" method="GET">
      <label class="d-block" for="lunghezzaPassword">Scegli quanti caratteri deve avere la tua nuova password.</label>
      <input  name="lunghezzaPassword" id="lunghezzaPassword"  type="number" min="4" max="10">
      <button>Genera</button>
    </form>

    <form action="./mostrapassword.php">
      <h2>La tua nuova password è: </h2>
      <input type="password" value="<?= $nuovaPassword ?>">
      <span class="d-block">Visualizza la password in modo sicuro.</span>
      <button>Visualizza</button>
    </form>
  </div>
</body>
</html>