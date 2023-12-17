<?php
include_once("db.php");
include_once("student.php");

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
    <link rel="stylesheet" type="text/css" href="css/styles.css">

   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js">
    
</script>
<style>
    .button-link {
            padding: 10px 20px;
            font-size: 16px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-link:hover {
            background-color: black;
        }
    </style>

</head>
<body>
    
    <?php include('templates/header.html'); ?>
    <?php include('includes/navbar.php'); ?>

    <div class="content">
        <h1>WELCOME</h1>
        <p>In here you can find the records of the student enrolled in PSU-PCAT (Cuyo).</p>
    </div>
   
    <div class="content">
        <canvas id="studentChart" width="600" height="600"></canvas>
    </div>
    <script>
    
    var maleCount = <?php echo $student->GenderCount(1); ?>;
    var femaleCount = <?php echo $student->GenderCount(0); ?>;

    
    var ctx = document.getElementById('studentChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Number of Students by Gender',
                data: [maleCount, femaleCount],
                backgroundColor: [                 
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
                options: {
                    responsive: false, 
                }
    });
</script>
<div class="content">
        <h1>Number of Male and Female Students</h1>
        <p>In the chart above you will see how many females and males enrolled in PSU-PCAT</p>
        <a class="button-link" href="/views/report1.php">View</a>
    </div>
<div class="content">
        <canvas id="birthdayChart" width="600" height="600"></canvas>

        <script>
            
            var monthData = <?php echo json_encode($student->BirthMonth()); ?>;
            var months = Object.keys(monthData);
            var counts = Object.values(monthData);

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
                        borderWidth: 2
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
        <a class="button-link" href="/views/report2.php">View</a>
    </div>
    <div class="content">
        <canvas id="birthYearChart" width="600" height="600 "></canvas>

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
        <h1>Batang 1990s Students</h1>
        <p>In pie graph above we diveded the student who are born from 1980 onward and those who born before 1990s. We classified the students who is born in 1980 to 1990s as Batang 1990s while those who born before as Pre-Millennials.</p>
        <a class="button-link" href="/views/report3.php">View</a>
    </div>
    <?php include('templates/footer.html'); ?>
</body>
</html>
