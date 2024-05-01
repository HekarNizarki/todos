<?php
include "connect.php";
?>

<?php
$sql1 = 'SELECT * FROM `accsever`;';

$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();
$severity1 = array();
$num1 = array();
$temperature1 = array();
$wind_chill1 = array();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// convert sql result to array
foreach ($result as $row) {
    $severity1 = array_merge($severity1, array($row['severity']));
    $num1 = array_merge($num1, array($row['COUNT(ID)']));
    $temperature1 = array_merge($temperature1, array($row['AVG(temperature)']));
    $wind_chill1 = array_merge($wind_chill1, array($row['AVG(wind_chill)']));
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Car Accident visual Analytic System</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- line Chart -->
    <script>
        const sev1 = <?php echo json_encode($severity1); ?>;
        const num1 = <?php echo json_encode($num1); ?>;
        const temp1 = <?php echo json_encode($temperature1); ?>;
        const wind1 = <?php echo json_encode($wind_chill1); ?>;

        //setup
        const data = {
            labels: sev1,
            datasets: [{
                    label: 'Number of accident',
                    data: num1,
                    borderWidth: 2,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(255, 200, 132, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 0',
                    yAxisID: 'y2',

                }, {
                    label: 'AVG wind chill',
                    data: wind1,
                    borderWidth: 2,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(255, 99, 50, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 1',
                    yAxisID: 'y',

                },
                {
                    label: 'AVG temperature',
                    data: temp1,
                    borderWidth: 2,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(200, 20, 50, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 2',
                    yAxisID: 'y1',

                },


            ]
        };
        //config 
        const config = {
            type: 'bar',
            data: data,
            options: {

                plugins: {
                    title: {
                        display: true,
                        text: 'Weather Impact on Severity of Accidents'
                    },
                },
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true
                    }
                }
            }
        };
        //render
        const myChart1 = new Chart(
            document.getElementById('myChart1'),
            config);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>