<?php

$todoListString = file_get_contents('database.json');      //prendo contenuto database
$todoList = json_decode($todoListString, true);              //decodifico

$index = intval($_POST['index']);          //mi porto il valore dell'index dell'elemento da modificare

unset($todoList[$index]);              //cancello l'elemento da cancellare trovando la posizione grazie all'index

file_put_contents('database.json', json_encode($todoList));           //ripusho in database l'array completo e modificato encodato

$response = [                      //costruisco risposta per il client
      'success' => true,
      'message' => 'Ok',
      'code' => 200,
      'todoList' => $todoList             //da inserire decodificato perchè poi verrà encodato
];

header('Content-Type: application/json');                      //glie lo faccio capire che è json
echo json_encode($response);                                     //stampo risposta encodata