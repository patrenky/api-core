<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../zamestnanec.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare object
$zamestnanec = new Zamestnanec($db);
 
// set product property values
$data = json_decode(file_get_contents("php://input"));
 
$zamestnanec->id_zamest = $data->id_zamest;
$zamestnanec->meno = $data->meno;
$zamestnanec->priezvisko = $data->priezvisko;
$zamestnanec->adresa = $data->adresa;
$zamestnanec->iban = $data->iban;
 
// update zamestnanec
if($zamestnanec->update()){
    echo '{ "message": "Updated." }';
} else {
    echo '{ "message": "Unable to update." }';
}
?>