<?php
include_once("db.php"); 

class StudentDetails {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function create($data) {
        try {
            
            $sql = "INSERT INTO student_details(student_id, contact_number, street, zip_code, town_city, province) VALUES(:student_id, :contact_number, :street, :zip_code, :town_city,:province);";
            $stmt = $this->db->getConnection()->prepare($sql);

            
            $stmt->bindParam(':student_id', $data['student_id']);
            $stmt->bindParam(':contact_number', $data['contact_number']);
            $stmt->bindParam(':street', $data['street']);
            $stmt->bindParam(':zip_code', $data['zip_code']);
            $stmt->bindParam(':town_city', $data['town_city']);
            $stmt->bindParam(':province', $data['province']);

            
            $stmt->execute();

            
            return $stmt->rowCount() > 0;

        } catch (PDOException $e) {
            
            echo "Error: " . $e->getMessage();
            throw $e; 
        }
        
    }

}

?>