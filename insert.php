<?php

require "connect.php";
if (isset($_POST['button_action'])) {
    $task = $_POST['mytask'];

    $insert = $conn->prepare("Insert into tasks (name) values (:name)");

    if ($task > 0) {
        $insert->execute([':name' => $task]);
    } else {
        echo '<script type="text/javascript">';
        echo ' alert("no data")';  //not showing an alert box.
        echo '</script>';
    }
    header("location: index.php");
} else {
}
