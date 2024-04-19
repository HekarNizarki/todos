<?php
include "connect.php";
?>
<?php
$sql1 = 'select year(timee) ,COUNT(ID) from accidents group by year(timee) order by year(timee);';
$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();
$year = array();

$num = array();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Display results in a table

// Output table data
foreach ($result as $row) {
    $year = array_merge($year, array($row['year(timee)']));
    $num = array_merge($num, array($row['COUNT(ID)']));
}

// $conn = null;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Car Accident visual Analytic System</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>


<body class="bg-light text-dark m-4">
    <h2 class="text-center mb-5">Car Accident visual Analytic System </h2>
    <div class="row">
        <div class="col w-50">
            <div class="row">
                <div>
                    <canvas id="myChart1"></canvas>
                </div>
                <div>
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
        <div class="col w-50">
        </div>
    </div>


    <!-- line Chart -->
    <script>
        const YEAR = <?php echo json_encode($year); ?>;
        const NUM = <?php echo json_encode($num); ?>;
        //setup
        const data = {
            labels: YEAR,
            datasets: [{
                label: 'Number If Accidents from (2016 to 2020)',
                data: NUM,
                borderWidth: 3,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',

                ],

            }, ]

        };
        //config 
        const config = {
            type: 'line',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        //render
        const myChart1 = new Chart(
            document.getElementById('myChart1'),
            config);
    </script>

    <?php
    $sql1 = "SELECT * FROM `weather`";
    $stmt = $conn->prepare($sql1);
    // Execute SQL statement
    $stmt->execute();

    $weather[] = array();
    $num = array();
    $temp = array();
    $wind_chill = array();
    $humidity = array();
    $visibility = array();
    $wind_speed = array();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Display results in a table

    // Output table data
    foreach ($result as $row) {

        $weather = array_merge($weather, array($row['lastname']));
        $num = array_merge($num, array($row['COUNT(id)']));
        $temp = array_merge($temp, array($row['AVG(temperature)']));
        $wind_chill = array_merge($wind_chill, array($row['AVG(wind_chill)']));
        $humidity = array_merge($humidity, array($row['AVG(humidity)']));
        $visibility = array_merge($visibility, array($row['AVG(visibility)']));
        $wind_speed = array_merge($wind_speed, array($row['AVG(wind_speed)']));
    }

    echo json_encode($weather);
    echo json_encode($num);
    echo json_encode($temp);
    echo json_encode($wind_chill);
    echo json_encode($humidity);
    echo json_encode($visibility);


    $conn = null;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>


</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>