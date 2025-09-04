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
$sql_create_db = "CREATE DATABSE IF NOT EXISTS " . $db;

if($link->query($sql_create_db) === TRUE){
    "<script>$db created or already exists. Proceeding...</script>";
} else {
    die("Error creating table: " . $link->error);
}
?>