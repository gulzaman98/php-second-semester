<?php

// DATABASE CONNECT WITH PHP

$conn = mysqli_connect("localhost" , "root" , "" , "gulzaman");
// if(!$conn){
//     die("connection failed: " . mysqli_connect_error());
// }
// echo "gulzaman database connected";

// DATA INSERT 

$sql = "Insert into users (name , email , age)
    VALUES ('Gulzaman' , 'gulzaman@gmail.com' , 27)";
if(mysqli_query($conn, $sql)){
    echo "data save ho gya!";
}else{
    echo "Error" . mysqli_error($conn) . "<br>";
}

// DATA FETCH


$sql = "SELECT * from users";
$result = mysqli_query($conn , $sql);
echo "<h3>Users List</h3>";
while($row = mysqli_fetch_assoc($result)){
    echo "ID:" . $row['id'] , "<br>"; 
    echo "NAME:" . $row['name'] , "<br>"; 
    echo "EMAIL:" . $row['email'] , "<br>"; 
    echo "AGE:" . $row['age'] , "<br>"; 
}
mysqli_close($conn);
?>

