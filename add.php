<?php

//leggo il file json dal disco
$fileContent = file_get_contents("dati.json");

//controllo di avere il necessario per creare un nuovo utente
if( isset($_POST["name"]) && isset($_POST["last_name"])) {

  //converto il json in un array associativo php
  $students = json_decode($fileContent, true);

  //creo un nuovo studente
  $newStudent = [
    "name" => $_POST["name"],
    "last_name" => $_POST["last_name"]
  ];

  //pusho lo studente appena creato nel mio array
  $students[] = $newStudent;

  //converto tutto l'array in un json
  $fileContent = json_encode($students);

  //scrivo il json su disco
  file_put_contents("dati.json", $fileContent);

} else {
  //se non ho tutto il necessario... niente, restituisco la lista inalterata
  //in realtà sarebbe preferibile dare un'errore ma ai fini del nostro esercizio va bene così
}

//Setto l'header
header('Content-Type: application/json');

//restituisco il nuovo json con il contenuto aggiornato del file
echo $fileContent;