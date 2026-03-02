<?php
// (A) Indexed Array

$colors = ["Red" , "Green" , "Navy"];
// echo $colors[2]

// (B) Associative Array     Key → Value pair

$students = [
    "name" => "Gulzaman",
    "age" => 27,
    "cgpa" => 3.5
];

// echo $students["name"];

// (C) Multidimensional Array

$std = [
    ["Gulzaman" , 27],
    ["Saad" , 25],
    ["Hasnain" , 50]
];
echo $std[1][0];
?>

