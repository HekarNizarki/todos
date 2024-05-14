<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Car Accident visual Analytic System</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-light text-dark m-4">
    <h2 class="text-center mb-5">Car Accident visual Analytic System </h2>
    <div class="row">
        <div class="col w-50">
            <div class="row">
                <h5 class="text-dark text-center "></h5>
                <div>
                    <canvas id="myChart1" class="mb-5"></canvas>
                </div>

                <h5 class="text-dark text-center "></h5>

                <div>
                    <canvas id="myChart2" class="mb-5 p-0 m-0"></canvas>
                </div>

                <div>
                    <canvas id="myChart3" class="mb-5 p-0 m-0"></canvas>
                </div>

            </div>
        </div>
        <div class="col w-50 ">

            <!-- map -->
            <div id="map" class="p-5"></div>
            <script>
                var map = L.map('map').setView([51.5, -0.09], 1);
                L.tileLayer('https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=T8HqAMgrrkJfTxTB6c25', {
                    // attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
                    minZoom: 8,
                    maxZoom: 17
                }, ).addTo(map);

                const array1 = [51.4, 51.3, 51.495, 51.5];
                const array2 = [-0.09, -0.010, -0.083, -0.05];
                for (i = 0; i < array1.length; i++) {
                    var marker = L.marker([array1[i], array2[i]]).addTo(map);
                }
            </script>

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