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
        <canvas id="birthYearChart" width="600" height="600"></canvas>

        <script>
            var birthYearData = <?php echo json_encode($student->BatangMCMLXXX()); ?>;
            var labels = birthYearData.map(item => item.birth_year_group);
            var dataCounts = birthYearData.map(item => item.count);
            
            var ctx = document.getElementById('birthYearChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataCounts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: false, 
                }
            });
        </script>
    </div>

  <div class="content">
        <h1>Batang 1990s student</h1>
        <p>In pie graph above we diveded the student who are born from 1980 onward and those who born before 1990. We classified the students who is born in 1980 and so on as Batang 1990s while those who born before as Batang 1980s.</p>
    </div>
        <?php include('../templates/footer.html'); ?>


<p></p>
</body>
</html>