<?php

  //leggo il file json dal disco
  $fileContent = file_get_contents("dati.json");

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

  //scrivo il json su disco
