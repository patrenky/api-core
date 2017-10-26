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
 
$database = new Database();
$db = $database->getConnection();
 
$zamestnanec = new Zamestnanec($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set zamestnanec property values
$zamestnanec->meno = $data->meno;
$zamestnanec->priezvisko = $data->priezvisko;
$zamestnanec->adresa = $data->adresa;
$zamestnanec->iban = $data->iban;
 
// create zamestnanec
if($zamestnanec->create()){
    echo '{ "message": "Created." }';
} else{
    echo '{ "message": "Unable to create." }';
}
?>