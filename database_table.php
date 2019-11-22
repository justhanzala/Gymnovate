<?php

include "db_conn.php";

$query1 = "CREATE TABLE IF NOT EXISTS users (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(50),
    password varchar(50)
);";

$query2 = "CREATE TABLE IF NOT EXISTS members (
    member_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name varchar(50),
    mobile_number INT(20),
    doj DATE,
    active boolean NOT NULL default 1
);";



$query3 = "CREATE TABLE IF NOT EXISTS members_Fee (
    transaction_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    date DATE,
    fees INT(50),
    month INT(10),
    year INT(4)
)";

if($conn->query($query1) && $conn->query($query2) && $conn->query($query3)){
    echo "tables created successfully";
}else{
    echo "ERRoR! ".$conn->error;
}

?>