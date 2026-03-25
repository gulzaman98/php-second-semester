<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <h1 class="text-center mt-3">Login Form</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h6>Create an Account? <a href="register.php">Register here</a></h6>
                <form action="code.php" method="post">
                    <input type="email" placeholder="Enter your email" class="form-control mt-3" name="email" required>
                    <input type="password" placeholder="Enter your password" class="form-control mt-3"
                    name="pass" required>

                    <button type="submit" class="btn btn-dark mt-3" name="login">Login</button>
                </form>

            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>