<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .img-fixed{
            height: 200px;
            width: 100px;
            object-fit:cover;
        }
    </style>
</head>
<body>
    
    <h3 class="text-center mt-3">Image Fetch</h3>

    <div class="container mt-3">
        <div class="row">
            <?php
            include 'code.php';

            $query = mysqli_query($con , "SELECT * FROM file");

            $data = mysqli_fetch_all($query , MYSQLI_ASSOC);

            foreach($data as $row){
                ?>

                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="images/<?php echo $row['file']; ?>" class="card-img-top ">
                        <div class="card-body text-center">
                            <p class="card-text"><?php echo $row['file']; ?></p>

                        </div>
                    </div>
                    

                </div>

                <?php
            }
            ?>
        </div>
    </div>

</body>
</html>