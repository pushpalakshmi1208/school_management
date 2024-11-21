<?php
include("db-create.php");

// SQL to create table
$sql =" CREATE TABLE students_details (
    id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(254) NOT NULL,
    age INT NOT NULL,
    dob DATE NOT NULL,
    email VARCHAR(254) NOT NULL,
    mobile VARCHAR(15) NOT NULL,  
    blood_group VARCHAR(254) NOT NULL,
    gender VARCHAR(50) NOT NULL,  
    english INT NOT NULL,
    tamil INT NOT NULL,
    maths INT NOT NULL
)";

if ($conn->query(query: $sql)== TRUE){
    //echo "students_details Table created";

}else {
    echo "Error : ".$conn->error;
}

$conn->close();
?>