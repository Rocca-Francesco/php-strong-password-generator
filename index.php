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
    
    // definisco i caratteri possibili e le lunghezze delle stringhe prese in considerazione, le metto fuori per alleggerire il processo del 'for'
    $permittedNum = '0123456789'; // 0
    $numLength = strlen($permittedNum); 
    $permittedLowerCase = 'abcdefghijklmnopqrstuvwxyz'; // 1
    $lowerCaseLength = strlen($permittedLowerCase);
    $permittedUpperCase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // 2
    $upperCaseLength = strlen($permittedUpperCase);
    $permittedSymbols = '~`! @#$%^&*()_-+={[}]|\:;”‘<,>.?/'; // 3
    $symbolsLength = strlen($permittedSymbols);

    for ($i = 1; $i <= $lunghezzaPassword; $i++) {
      // scelgo il gruppo da cui devo generare
      $chooseGroupPermitted = rand(0, 3);

      // per ogni gruppo, genero un numero in base alla lunghezza, scelgo il valore dalla lista in base al numero generato e lo aggiungo alla password
      if ($chooseGroupPermitted == 0) {
        $newRandom = rand(0, $numLength);
        $nuovaPassword .= substr($permittedNum, $newRandom, 1);
      } else if ($chooseGroupPermitted == 1) {
        $newRandom = rand(0, $lowerCaseLength);
        $nuovaPassword .= substr($permittedLowerCase, $newRandom, 1);
      } else if ($chooseGroupPermitted == 2) {
        $newRandom = rand(0, $upperCaseLength);
        $nuovaPassword .= substr($permittedUpperCase, $newRandom, 1);
      }  else if ($chooseGroupPermitted == 3) {
        $newRandom = rand(0, $symbolsLength);
        $nuovaPassword .= substr($permittedSymbols, $newRandom, 1);
      };
      
    }
    return $nuovaPassword;
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