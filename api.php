<?php

//leggo il file json dal disco
$fileContent = file_get_contents("dati.json");


//se ho i dati per aggiungere uno studente...
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
    
}


header('Content-Type: application/json');

echo $fileContent;

