<?php

if( ! isset($_GET['from_airport'])){
  http_response_code(400);
  exit;
};

if(strlen($_GET['from_airport'])<1){
  http_response_code(400);
  exit;
};


try{
    $from_city = $_GET['from_airport'] ?? 0;
    $to_city = $_GET['to_airport'] ?? 0;
    
    // Connect to the database
    $db = new PDO('sqlite:'.__DIR__.'/_momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_flights WHERE departure_airport LIKE :from_airport AND arrival_airport LIKE :to_airport');
    $q->bindValue(':from_airport','%'.$from_city.'%');
    $q->bindValue(':to_airport','%'.$to_city.'%');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($flights);
    
  }catch(Exception $ex){
    echo $ex;
    http_response_code(400);
    echo json_encode(['info'=>'upppsss...']);
   
 
    
  };
  
  
  