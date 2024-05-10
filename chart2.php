<?php
$sql1 = "SELECT * FROM `newweather`";
$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();

$weather[] = array();
$num = array();
$visibility = array();
$wind_speed = array();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Output table data
foreach ($result as $row) {

    $weather = array_merge($weather, array($row['weather']));
    $num = array_merge($num, array($row['COUNT(ID)']));
    $visibility = array_merge($visibility, array($row['AVG(visibility)']));
    $wind_speed = array_merge($wind_speed, array($row['AVG(wind_speed)']));
}
?>
<script>
    const weather = <?php echo json_encode($weather); ?>;
    const filweather = weather.flat(); //remove empty value
    const num = <?php echo json_encode($num); ?>;
    const visibility = <?php echo json_encode($visibility); ?>;
    const wind_speed = <?php echo json_encode($wind_speed); ?>;

    //setup
    const data2 = {
        labels: filweather,
        // labels: ['Fair', 'Mostly Cloudy', 'Cloudy', 'Partly Cloudy', 'Clear', 'Overcast', 'Light Rain', 'Light Snow', 'Fog', 'Scattered Clouds'],
        datasets: [{
                label: 'Number of Accidents',
                data: num,
                borderWidth: 3,
                fill: true,
                borderColor: 'rgba(75, 192, 199, 0.7)',
                backgroundColor: 'rgba(75, 192, 192 ,0.3 )',
                tension: 0.2,
                pointStyle: 'rect',
                yAxisID: 'y',
            },
            {
                label: 'Visibility',
                data: visibility,
                borderWidth: 3,
                fill: false,
                borderColor: 'rgba(255, 159, 64, 0.7)',
                tension: 0.2,
                borderDash: [10, 5],
                pointStyle: 'triangle',
                yAxisID: 'y1',
            },
            {
                label: 'Wind Speed',
                data: wind_speed,
                borderWidth: 3,
                fill: false,
                borderColor: 'rgba(75, 150, 192, 0.7)',
                tension: 0.2,
                yAxisID: 'y1',
            }
        ]
    };

    //config 
    const config2 = {
        type: 'line',
        data: data2,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Impact of Weather Conditions on Accidents'
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    //render
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2);
</script>