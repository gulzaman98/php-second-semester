<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <h1 class="text-center mt-5">Add Category</h1>
            <form action="../code.php" method='post' enctype="multipart/form-data">
                <input type="text" placeholder="Enter category name" class="form-control mt3" name="cat_name">
                <input type="file" name="cat_image" class="form-control mt-3">
                <button type="submit" class="btn btn-dark mt-3" name="add_cat">Add Category</button>
            </form>

            <!-- Add category section start -->

            <!-- Fetch category section start -->

            <h3 class="text-center mt-3">Fetch Categories</h3>
<table class="table table-bordered table-hover table-striped">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    include '../connection.php';
    $fetch = mysqli_query($con, "SELECT * FROM add_category");
    foreach($fetch as $value){  
    ?>
    <tr>
        <td><?php echo $value['category_id'];?></td>
        <td><?php echo $value['category_name'];?></td>
        <td><img src="images/<?php echo $value['category_image'];?>" width="50"></td>
        <td>  
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $value['category_id'];?>">Edit</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value['category_id'];?>">Delete</button>
        </td>
    </tr>

    <div class="modal fade" id="editModal<?php echo $value['category_id'];?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../code.php" method="post" enctype="multipart/form-data">
                    <div class="modal-header"><h5>Edit Category</h5></div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $value['category_id'];?>">
                        
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $value['category_name'];?>">
                        
                        <label class="mt-2">Change Image (Optional)</label>
                        <input type="file" name="new_image" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-dark">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete<?php echo $value['category_id'];?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../code.php" method="post">
                <div class="modal-body text-center">
                    <p>Kya aap waqai <b><?php echo $value['category_name'];?></b> ko delete karna chahte hain?</p>
                    <input type="hidden" name="id" value="<?php echo $value['category_id'];?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete" class="btn btn-danger">Confirm Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <?php } ?>
</table>


            <!-- Add category section end -->

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>