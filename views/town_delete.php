<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php"); 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL
    
    $db = new Database();
    $town_city = new TownCity($db);

    // Call the delete method to delete the town city record
    if ($town_city->delete($id)) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete the record.";
    }
}
?>
