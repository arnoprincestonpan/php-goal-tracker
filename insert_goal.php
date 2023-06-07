<?php
require_once 'connect.php';

$category = $_REQUEST['cat'];
$text = $_REQUEST['text'];
$date = $_REQUEST['goaldate'];
$complete = $_REQUEST['complete'];

// In case complete is not entered, make it 0
if($complete == '' | $complete == null){
    $complete = 0;
} 

$sql = "INSERT INTO goals(goal_category, goal_text, goal_date, goal_complete) VALUES ('$category', '$text', '$date', '$complete')";

// Execute the Query (inserting) and see if it suceeded or failed
if(mysqli_query($link, $sql)){
    print("Stored");
} else {
    print("Failed");
}

// Take us back to the main page index.php
echo "<script>location.href='index.php'</script>";

?>