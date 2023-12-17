<?php
include_once("../db.php");
include_once("../student.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js">
</script>
</head>
<body>
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <canvas id="birthdayChart" width="600" height="600"></canvas>

        <script>
            var monthData = <?php echo json_encode($student->BirthMonth()); ?>;

            var months = Object.keys(monthData);
            var counts = Object.values(monthData);

           // Chart.js code for bar chart
            var ctx = document.getElementById('birthdayChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Number of Students by Birth Month',
                        data: counts,
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                options: {
                    responsive: false, 
                }
            });
        </script>
    </div>

  <div class="content">
        <h1>Number of Male and Female Students who share same birth month's</h1>
        <p>In the graph above you will know how many students have the same birth month in the whole school.</p>
    </div>
        <?php include('../templates/footer.html'); ?>


<p></p>
</body>
</html>