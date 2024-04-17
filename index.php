<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>SQL Query Executor</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <h2>SQL Query Executor</h2>

    <?php

    $sql = 'select year(timee),sum(number) from accidents group by year(timee) order by year(timee)';
    $stmt = $conn->prepare($sql);
    // Execute SQL statement
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Display results in a table
    echo "<h3>Data from the table:</h3>";
    echo "<table border='1'>";
    echo "<tr>";
    // Output table headers
    foreach ($result[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    // Output table data
    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    // Close connection
    $conn = null;
    ?>

    <div>
        <canvas id="myChart"></canvas>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
    <script src="chart.js"></script>
</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>