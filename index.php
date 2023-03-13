<?php 
// ricevo la lunghezza della password da generare e la trasformo in un numero
$lunghezzaPassword = $_GET["lunghezzaPassword"] ?? 0;
$lunghezzaPassword = (int)$lunghezzaPassword;

function generaPassword($lunghezzaPassword) {
  // verifico che la lunghezza scelta della password corrisponda ai criteri necessari
  if ($lunghezzaPassword < 4 || $lunghezzaPassword > 10) {
    return false;
  } else {
    // creo la mia variabile password e la genero
    $nuovaPassword = null;
    for ($i = 1; $i <= $lunghezzaPassword; $i++) {
      $newNum = rand(0, 9);
      $nuovaPassword .= $newNum;
    }
    var_dump($nuovaPassword);
  }
}
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

    <h2>La tua nuova password è: </h2>
    <span><?= generaPassword($lunghezzaPassword) ?></span>
  </div>
</body>
</html>