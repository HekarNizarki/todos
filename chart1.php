<?php
include "connect.php";
?>

<?php
$sql1 = 'SELECT * FROM `sevoverdayname`;';

$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();
$dayname = array();
$severity1 = array();
$severity2 = array();
$severity3 = array();
$severity4 = array();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// convert sql result to array
foreach ($result as $row) {
    $dayname = array_merge($dayname, array($row['DAYNAME(timee)']));
    $severity1 = array_merge($severity1, array($row['SEV1']));
    $severity2 = array_merge($severity2, array($row['SEV2']));
    $severity3 = array_merge($severity3, array($row['SEV3']));
    $severity4 = array_merge($severity4, array($row['SEV4']));
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
        const dname = <?php echo json_encode($dayname); ?>;
        const newdname = dname.flat();
        const sev1 = <?php echo json_encode($severity1); ?>;
        const sev2 = <?php echo json_encode($severity2); ?>;
        const sev3 = <?php echo json_encode($severity3); ?>;
        const sev4 = <?php echo json_encode($severity4); ?>;


        //setup
        const data = {
            labels: newdname,
            datasets: [{
                    label: 'Severity 1',
                    data: sev1,
                    borderWidth: 2,
                    borderColor: 'rgba(30, 150, 60, 0.9)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(30, 150, 60, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 0',


                }, {
                    label: 'Severity 2',
                    data: sev2,
                    borderWidth: 2,
                    borderColor: 'rgba(220, 200, 0, 0.9)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(240, 240, 0, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 1',


                },
                {
                    label: 'Severity 3',
                    data: sev3,
                    borderWidth: 2,
                    borderColor: 'rgba(255, 99, 50, 0.7)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(255, 99, 50, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 2',


                }, {
                    label: 'Severity 4',
                    data: sev4,
                    borderWidth: 2,
                    borderColor: 'rgba(200, 20, 20, 0.7)',
                    tension: 0.5,
                    backgroundColor: [
                        'rgba(200, 20, 20, 0.7)',
                    ],
                    type: 'bar',
                    stack: 'Stack 3',


                }


            ]
        };
        //config 
        const config = {
            type: 'line',
            data: data,
            options: {

                plugins: {
                    title: {
                        display: true,
                        text: 'Severity in  Weekday '
                    },
                },
                responsive: true,
                interaction: {
                    intersect: false,
                },
                scales: {
                    x: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Weekday'
                        },
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: 'Severity'
                        },
                    },

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