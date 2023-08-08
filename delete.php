<?php
require "connect.php";

if (isset($_GET['del_id'])) {

    $id = $_GET['del_id'];

    $delete = $conn->prepare('Delete from tasks where id=:id');

    $delete->execute([':id' => $id]);

    header("location: index.php");
}
