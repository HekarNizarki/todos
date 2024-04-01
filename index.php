<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>SQL Query Executor</title>
</head>

<body>
    <h2>SQL Query Executor</h2>

    <form method="post">
        <label for="sqlQuery">Enter your SQL query:</label><br>
        <textarea id="sqlQuery" name="sqlQuery" rows="5" cols="50"></textarea><br><br>
        <input type="submit" value="Execute">
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Prepare SQL statement
        $sql = $_POST['sqlQuery'];
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
    }
    // Close connection
    $conn = null;
    ?>
</body>

</html>