<?php

include 'connection.php';
$sql = "DROP TABLE users";

if(mysqli_query($conn,$sql)){
    echo "Table dropped successfully". "<br>";
}
else{
    echo "Error creating table: " . mysqli_error($conn);
}


$sql = "CREATE TABLE users
(
    fname varchar(15),
    username varchar(15) NOT NULL UNIQUE,
    pswd varchar(15)
)";

if(mysqli_query($conn,$sql)){
    echo "Table created successfully";
}
else{
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);

?>