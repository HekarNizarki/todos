<?php
require 'connect.php';

$date = $conn->query("select * from tasks");
?>

<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="insert.php" class="form-inline" id="user_form">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">create</label>
            <input name="mytask" type="text" class="form-control" id="task" placeholder="enter task">
        </div>
        <input type="hidden" name="action" id="action" />
        <input type="submit" name="button_action" id="button_action" class="btn btn-default" value="Insert" />
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Task Name</th>
                <th>Date</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($rows = $date->fetch(PDO::FETCH_OBJ)) : ?>
                <tr>
                    <td><?php echo $rows->id; ?></td>
                    <td><?php echo $rows->name; ?></td>
                    <td><?php echo $rows->created_at; ?></td>
                    <td><a href="delete.php?del_id=<?php echo $rows->id; ?>" class="btn btn-danger">Delete</a></td>
                    <td><a href="update.php?upd_id=<?php echo $rows->id; ?>" class="btn btn-warning">Update</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>