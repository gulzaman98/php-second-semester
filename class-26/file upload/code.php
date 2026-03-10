<?php

$con = mysqli_connect('localhost' , 'root' , '' , 'upload');

if(isset($_POST['upload-file'])){
    $image_name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $image_size = $_FILES['file']['size'];
    $image_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    $destination = 'images/'.$image_name;

    if($image_size <= 5000000){

    if($image_type == 'jpg' || $image_type == 'jpeg' || $image_type == 'png'){


    if(move_uploaded_file($tmp_name, $destination)){
        $query = mysqli_query($con , "INSERT INTO file(file) VALUES('$image_name')");

        if($query){
        header("Location: fetch.php");
        exit();
    }
    }
        
    }else{
           echo
        '<script>
        alert("Unsupported Format")
        </script>';
    }

    }else{
        echo
        '<script>
        alert("File Size Should Be Less Than 5MB")
        </script>';
    }
}








?>