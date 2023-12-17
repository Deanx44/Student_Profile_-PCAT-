<?php
include_once("../db.php"); 
include_once("../student.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL

    // Instantiate the Database and Student classes
    $db = new Database();
    $student = new Student($db);

    // Call the delete method to delete the student record
    if ($student->delete($id)) {
        echo "Record deleted successfully.";
    } else {
        echo "Failed to delete the record.";
    }
}
?>
