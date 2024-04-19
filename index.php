<?php
include "connect.php";
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
                <h5 class="text-dark text-center ">Number of Car Accidents from (2016 to 2020)</h5>
                <div>
                    <canvas id="myChart1" class="mb-5"></canvas>
                </div>

                <h5 class="text-dark text-center ">Impact of Weather Conditions on Accidents</h5>

                <div>
                    <canvas id="myChart2" class="mb-5 p-0 m-0"></canvas>
                </div>

            </div>
        </div>
        <div class="col w-50 ">
        </div>
    </div>
    <?php
    // chart 01 : bar chart
    include "chart1.php";

    // chart 02 :line chart
    include "chart2.php";

    $conn = null;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>


</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>