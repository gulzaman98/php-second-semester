<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<<<<<<< HEAD
    <style></style>
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
>>>>>>> cb6d9f60735ff0a7e8838d7b879de52e20d821e9
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Pass</th>
        <th>Address</th>
<<<<<<< HEAD
=======
        <th>Role</th>
>>>>>>> cb6d9f60735ff0a7e8838d7b879de52e20d821e9
    </tr>
    <?php
    include 'connection.php';
    $query = mysqli_query($con , "SELECT * from register");

    foreach($query as $value){  
    ?>

    <tr>
    <td><?php echo $value['id'];?></td>
<<<<<<< HEAD
    <td><?php echo $value['id'];?></td>
    <td><?php echo $value['id'];?></td>
    <td><?php echo $value['id'];?></td>
=======
    <td><?php echo $value['Name'];?></td>
    <td><?php echo $value['Email'];?></td>
    <td><?php echo $value['Password'];?></td>
    <td><?php echo $value['Address'];?></td>
    <td><?php echo $value['role'];?></td>
    <td>  
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo 
$value['id'];?>">Edit</button>

</td>


    <!-- update modal start -->
    <div class="modal fade" id="edit" <?php echo $value['id'];?> tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <form action="code.php" method="post">
                <input type="text" placeholder="Enter your name" class="form-control mt-3" name="name"
                value='<?php echo $value['Name'];?>'>

                <input type="text" placeholder="Enter your email" class="form-control mt-3" name="email"
                value='<?php echo $value['Email'];?>'>

                <input type="text" placeholder="Enter your password" class="form-control mt-3" name="pass"
                value='<?php echo $value['Password'];?>'>

                <input type="text" placeholder="Enter your address" class="form-control mt-3" name="address"
                value='<?php echo $value['Address'];?>'>

                <input type="text" placeholder="Enter your role" class="form-control mt-3" name="role"
                value='<?php echo $value['role'];?>'>

                <button class="btn btn-dark mt-3" name='update'>Update</button>

                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <!-- Update modal end -->


>>>>>>> cb6d9f60735ff0a7e8838d7b879de52e20d821e9
    </tr>

    <?php



<<<<<<< HEAD
=======

>>>>>>> cb6d9f60735ff0a7e8838d7b879de52e20d821e9
    }

    ?>
</table>
<<<<<<< HEAD
=======
</div>
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

>>>>>>> cb6d9f60735ff0a7e8838d7b879de52e20d821e9
</body>
</html>