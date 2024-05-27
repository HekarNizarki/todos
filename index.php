<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Car Accident visual Analytic System</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="./us.js"></script>



</head>

<body class="bg-light text-dark m-4">
    <h2 class="text-center mb-1">Car Accident visual Analytic System </h2>
    <div class="row">
        <div class="col-5">
            <div class="row">
                <h5 class="text-dark text-center "></h5>
                <div>
                    <canvas id="myChart1"></canvas>
                </div>

                <h5 class="text-dark text-center"></h5>

                <div>
                    <canvas id="myChart2"></canvas>
                </div>

                <div>
                    <canvas id="myChart3" class="p-4"></canvas>
                </div>

            </div>
        </div>
        <div class="col-7 mt-5">

            <!-- map -->
            <?php
            include "map.php";
            ?>
        </div>
    </div>
    <?php
    // chart 01 : bar chart
    include "chart1.php";

    // chart 02 :line chart
    include "chart2.php";

    // chart 03 :Radar chart
    include "chart3.php";

    $conn = null;
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>


</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>