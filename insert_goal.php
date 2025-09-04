<?php
require_once 'connect.php';
// use POST, more accurate/predictable, use nullable (simplified)

$category = $_POST['cat'] ?? '';
$text = $_POST['text'] ?? '';
$date = $_POST['goaldate'] ?? date('Y-m-d');
if(empty($date)){
    $date = date('Y-m-d');
}
$complete = $_POST['complete'] ?? 0;

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