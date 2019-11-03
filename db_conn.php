<?php

$conn = new mysqli('localhost', 'hanzala', 'hanzu786', 'gym');

if($conn->connect_error){
	echo $conn->connect_error;
}