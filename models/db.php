<?php

function dbConnection()
{
  try {
    //WAMP 
    $dbConnection = new PDO("mysql:host=localhost:3306; dbname=db_gsb; charset=utf8", "root", "");
    //MAMP 
    // $dbConnection = new PDO("mysql:host=localhost:8889; dbname=db_gsb; charset=utf8", "root", "root");
  } catch (Exception $e) {
    die("Connexion échouée. Erreur : " . $e->getMessage());
  }

  return $dbConnection;
}
