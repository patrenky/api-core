<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../zamestnanec.php';
 
// instantiate database
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$zamestnanec = new Zamestnanec($db);
 
// query zamest
$stmt = $zamestnanec->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // array
    $zamest_arr=array();
 
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $zamest_item=array(
            "id_zamest" => $id_zamest,
            "meno" => $meno,
            "priezvisko" => $priezvisko,
            "adresa" => $adresa,
            "iban" => $iban
        );
 
        array_push($zamest_arr, $zamest_item);
    }
 
    echo json_encode($zamest_arr);
}
 
else{
    echo '{ "message": "Empty table." }';
}
?>