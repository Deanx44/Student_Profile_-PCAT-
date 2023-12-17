<?php
include_once("../db.php"); // Include the Database class file
include_once("../province.php"); 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; 
    
    $db = new Database();
    $province = new Province($db);

    // Call the delete method to delete the province record
    if ($province->delete($id)) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete the record.";
    }
}
?>
