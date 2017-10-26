<?php
class Zamestnanec {
 
    // database connection and table name
    private $conn;
    private $table_name = "zamestnanec";
 
    // object properties
    public $id_zamest;
    public $meno;
    public $priezvisko;
    public $adresa;
    public $iban;
 
    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // read products
    function read(){
    
       // select all query
       $query = "SELECT
                    *
                FROM 
                    " . $this->table_name . "";
    
       // prepare query statement
       $stmt = $this->conn->prepare($query);
    
       // execute query
       $stmt->execute();
    
       return $stmt;
   }

    // create product
    function create(){
    
       // query to insert record
       $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    meno=:meno, priezvisko=:priezvisko, adresa=:adresa, iban=:iban";
       
       // prepare query
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->meno=htmlspecialchars(strip_tags($this->meno));
       $this->priezvisko=htmlspecialchars(strip_tags($this->priezvisko));
       $this->adresa=htmlspecialchars(strip_tags($this->adresa));
       $this->iban=htmlspecialchars(strip_tags($this->iban));
    
       // bind values
       $stmt->bindParam(":meno", $this->meno);
       $stmt->bindParam(":priezvisko", $this->priezvisko);
       $stmt->bindParam(":adresa", $this->adresa);
       $stmt->bindParam(":iban", $this->iban);

       // execute query
       if($stmt->execute()) {
           return true;
       }
       return false;
   }

    // update the product
    function update(){
    
       // update query
       $query = "UPDATE
                   " . $this->table_name . "
               SET
                    meno=:meno, priezvisko=:priezvisko, adresa=:adresa, iban=:iban
               WHERE
                   id_zamest = :id_zamest";
    
       // prepare query statement
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->id_zamest=htmlspecialchars(strip_tags($this->id_zamest));
       $this->meno=htmlspecialchars(strip_tags($this->meno));
       $this->priezvisko=htmlspecialchars(strip_tags($this->priezvisko));
       $this->adresa=htmlspecialchars(strip_tags($this->adresa));
       $this->iban=htmlspecialchars(strip_tags($this->iban));
    
       // bind values
       $stmt->bindParam(":id_zamest", $this->id_zamest);
       $stmt->bindParam(":meno", $this->meno);
       $stmt->bindParam(":priezvisko", $this->priezvisko);
       $stmt->bindParam(":adresa", $this->adresa);
       $stmt->bindParam(":iban", $this->iban);
    
       // execute the query
       if($stmt->execute()){
           return true;
       }
        return false;
   }

    // delete the product
    function delete(){
    
       // delete query
       $query = "DELETE FROM " . $this->table_name . " WHERE id_zamest = ?";
    
       // prepare query
       $stmt = $this->conn->prepare($query);
    
       // sanitize
       $this->id_zamest=htmlspecialchars(strip_tags($this->id_zamest));
    
       // bind id of record to delete
       $stmt->bindParam(1, $this->id_zamest);
    
       // execute query
       if($stmt->execute()){
           return true;
       }
       return false;
        
   }
}
?>