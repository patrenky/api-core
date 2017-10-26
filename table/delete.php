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
 
// prepare zamest object
$zamestnanec = new Zamestnanec($db);
 
// get zamest id
$data = json_decode(file_get_contents("php://input"));
 
// set zamest id to be deleted
$zamestnanec->id_zamest = $data->id_zamest;
 
// delete the product
if($zamestnanec->delete()){
    echo '{ "message": "Deleted." }';
} else{
    echo '{ "message": "Unable to delete." }';
}
?>