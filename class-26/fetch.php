<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style></style>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Pass</th>
        <th>Address</th>
    </tr>
    <?php
    include 'connection.php';
    $query = mysqli_query($con , "SELECT * from register");

    foreach($query as $value){  
    ?>

    <tr>
    <td><?php echo $value['id'];?></td>
    <td><?php echo $value['id'];?></td>
    <td><?php echo $value['id'];?></td>
    <td><?php echo $value['id'];?></td>
    </tr>

    <?php



    }

    ?>
</table>
</body>
</html>