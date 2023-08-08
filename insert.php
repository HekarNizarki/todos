<?php

require "connect.php";
if (isset($_POST['button_action'])) {
    $task = $_POST['mytask'];

    $insert = $conn->prepare("Insert into tasks (name) values (:name)");

    $insert->execute([':name' => $task]);

    header("location: index.php");
} else {
}
