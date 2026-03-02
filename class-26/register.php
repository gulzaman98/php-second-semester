<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .register{
            text-align: center;
            margin-top: 10px;
        }
        .input{
            padding: 10px;
            margin: 8px 0;
            width: 250px;

        }
        .btn{
            font-size: 20px;
            background-color: navy;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;

        }
    </style>
</head>
<body>
    <h1 class="register">Registeration Form</h1>
    <form action="code.php" method="post">
        <input type="text" placeholder="Enter your name" class="input" name="name">
        <input type="text" placeholder="Enter your email" class="input" name="email">
        <input type="text" placeholder="Enter your password" class="input" name="pass">
        <input type="text" placeholder="Enter your address" class="input" name="address">
        <button class="btn" name="register">Register</button>

    </form>
</body>
</html>