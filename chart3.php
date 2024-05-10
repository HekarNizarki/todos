<?php
$sql1 = "SELECT * FROM `cityname`";
$stmt = $conn->prepare($sql1);
// Execute SQL statement
$stmt->execute();

$name2 = array();
$vis2 = array();
$wind2 = array();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Output table data
foreach ($result as $row) {

    $name2 = array_merge($name2, array($row['city']));
    $vis2 = array_merge($vis2, array($row['AVG(visibility)']));
    $wind2 = array_merge($wind2, array($row['AVG(wind_speed)']));
}
?>
<script>
    const name2 = <?php echo json_encode($name2); ?>;
    const filweather2 = name2.flat(); //remove empty value
    const vis2 = <?php echo json_encode($vis2); ?>;
    const wind2 = <?php echo json_encode($wind2); ?>;


    //setup
    const data3 = {
        labels: name2,
        datasets: [{
                label: 'AVG visibility',
                data: vis2,
                borderWidth: 3,
                fill: false,
                borderColor: 'rgba(255, 90, 64, 0.7)',
                tension: 0.2,
                borderDash: [10, 5],
                pointStyle: 'triangle',

            }, {
                label: 'AVG wind speed',
                data: wind2,
                borderWidth: 3,
                fill: true,
                borderColor: 'rgba(75, 192, 199, 0.7)',
                backgroundColor: 'rgba(100, 200, 70 ,0.5 )',
                tension: 0.2,
                pointStyle: 'rect',

            }

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
                    text: 'Top 10 City Weather Conditions'
                }
            }
        },
    };

    //render
    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3);
</script>