<?php
$sql1 = "SELECT * FROM `cityname`";
$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();

$name2 = array();
$num2 = array();
$temp2 = array();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Output table data
foreach ($result as $row) {

    $name2 = array_merge($name2, array($row['city']));
    $num2 = array_merge($num2, array($row['AVG(humidity)']));
    $temp2 = array_merge($temp2, array($row['AVG(temperature)']));
}
?>
<script>
    const name2 = <?php echo json_encode($name2); ?>;
    const filweather2 = name2.flat(); //remove empty value
    const num2 = <?php echo json_encode($num2); ?>;
    const temp2 = <?php echo json_encode($temp2); ?>;


    //setup
    const data3 = {
        labels: name2,
        datasets: [{
                label: 'AVG humidity',
                data: num2,
                borderWidth: 3,
                fill: true,
                borderColor: 'rgba(75, 192, 199, 0.7)',
                backgroundColor: 'rgba(100, 200, 70 ,0.5 )',
                tension: 0.2,
                pointStyle: 'rect',
                yAxisID: 'y',
            },
            {
                label: 'AVG temperature',
                data: temp2,
                borderWidth: 3,
                fill: false,
                borderColor: 'rgba(255, 90, 64, 0.7)',
                tension: 0.2,
                borderDash: [10, 5],
                pointStyle: 'triangle',
                yAxisID: 'y1',
            },

        ]
    };

    //config 
    const config3 = {
        type: 'radar',
        data: data3,
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Top 10 City Humidity and Temperature'
                }
            }
        },
    };

    //render
    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3);
</script>