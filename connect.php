<?php
$user = "root";
$password = "root";
$host = "localhost";
$port = 8080;

$link = mysqli_init();
if(!$link){
    die("mysqli_init failed; Check PHP Environment for mysqli module.");
}

// Check if we can connect to MySQL (MariaDB), don't put $db just yet
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    null,
    $port
);

if(!$success){
    die("Connection Failed: " . mysqli_connect_error());
}

$db = "goals";
$sql_create_db = "CREATE DATABASE IF NOT EXISTS " . $db;

if($link->query($sql_create_db) === TRUE){
    "<script>$db created or already exists. Proceeding...</script>";
} else {
    die("Error creating database: " . $link->error);
}

$link->select_db($db);

$sql_create_table = "CREATE TABLE IF NOT EXISTS goals(
    goal_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_category VARCHAR(255) NOT NULL,
    goal_text VARCHAR(255) NOT NULL,
    goal_date DATE,
    goal_complete TINYINT(1)
)";

if($link->query($sql_create_table) === TRUE){
    "<script>Table created or already exists. Proceeding...</script>";
} else {
    die("Error creating table: " . $link->error);
}
?>