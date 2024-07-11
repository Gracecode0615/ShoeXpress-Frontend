<?php
include 'config.php';
$sql = "SELECT id, username, phone, email FROM user";
$query = mysqli_query($con, $sql);
if(!$query){
    echo "<div class='alert alert-danger'>Query failed!</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    ">
</head>
<body>
    <table class="table condensed table-bordered table-striped table-hover">
        <h3 class="text-center text-success mt-5">Welcome to the Admin page</h3>

        <!-- table head -->
         <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
         </thead>
        <!-- table head -->


        <!-- table body-->
         <tbody>
            <?php while($row = mysqli_fetch_assoc($query)):?>
                 
                <tr>
                    <td><?php echo htmlspecialchars($row['id']);?></td>
                    <td><?php echo htmlspecialchars($row['username']);?></td>
                    <td><?php echo htmlspecialchars($row['phone']);?></td>
                    <td><?php echo htmlspecialchars($row['email']);?></td>
                    <td><a class="btn btn-success" href="edit.php?id=
                    <?php echo htmlspecialchars($row['id']);?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="delete.php?id=
                    <?php echo htmlspecialchars($row['id']);?>">Delete</a></td>
                </tr>
                <?php endwhile; ?>

         </tbody>
        <!-- table body-->

        
    </table>
</body>
</html>

