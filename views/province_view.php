<?php
include_once("../db.php");
include_once("../province.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Province($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Province Views</h2>
    <table class="orange-theme">
        <thead>
            <tr>
                <th>Id.</th>
                <th>Name</th>
                <th>Action </th>
               
            </tr>
        </thead>
        <tbody>
            <!-- You'll need to dynamically generate these rows with data from your database -->
            <?php
            $results = $student->getAll(); 
            foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['name']; ?></td>
          
                <td>
                    <a href="province_edit.php?id=<?php echo $result['id']; ?>">Edit</a>
                    |
                    <a href="province_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>

           
        </tbody>
    </table>
        
    <a class="button-link" href="province_add.php">Add New Record</a>

        </div>
        
        <!-- Include the header -->
  
    <?php include('../templates/footer.html'); ?>


    <p></p>
</body>
</html>
