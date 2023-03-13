<?php

session_start();

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
    $permittedSymbols = '~`!@#$%^&*()_-+={[}]|\:;”‘<,>.?/'; // 3
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
      
    };
    return $nuovaPassword;
  };
};
?>