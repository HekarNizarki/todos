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

// convert sql result to array
foreach ($result as $row) {
    $year = array_merge($year, array($row['year(timee)']));
    $num = array_merge($num, array($row['COUNT(ID)']));
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
        const YEAR = <?php echo json_encode($year); ?>;
        const NUM = <?php echo json_encode($num); ?>;
        //setup
        const data = {
            labels: YEAR,
            datasets: [{
                label: 'Number If Accidents from (2016 to 2020)',
                data: NUM,
                borderWidth: 2,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.5,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.3)',
                    'rgba(255, 159, 64, 0.3)',
                    'rgba(255, 205, 86, 0.3)',
                    'rgba(75, 192, 192, 0.3)',
                    'rgba(54, 162, 235, 0.3)',

                ],
            }, ]
        };
        //config 
        const config = {
            type: 'bar',
            data: data,
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>