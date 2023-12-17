<?php
include_once("../db.php"); // Include the Database class file
include_once("../province.php"); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch province data by ID from the database
    $db = new Database();
    $province = new Province($db);
    $province_Data = $province->read($id); 

} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'id' => $_POST['id'],  
        'name' => $_POST['name'],
    ];

    $db = new Database();
    $provinces = new Province($db);

    // Call the edit method to update the province data
    if ($provinces->update($id, $data)) {
        echo "Record updated successfully.";
    } else {
        echo "Failed to update the record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Province</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit Province Information</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $province_Data['id']; ?>">
        <label for="birthday">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $province_Data['name']; ?>">
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>
