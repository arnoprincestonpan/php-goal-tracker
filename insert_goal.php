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

// add placeholders to prevent sequel injection
$sql = "INSERT INTO goals(goal_category, goal_text, goal_date, goal_complete) VALUES (?, ?, ?, ?)";

// initialize statement and prepare for execution 
if($stmt = mysqli_prepare($link, $sql)){
    // prepare statement, put types, string string string integer
    mysqli_stmt_bind_param($stmt, "sssi", $category, $text, $date, $complete);

    // Execute the Query (inserting) and see if it suceeded or failed
    if(mysqli_stmt_execute($stmt)){
        print("Stored");
    } else {
        print("Failed");
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    print("Error preparing statement: " . mysqli_error($link));
}

// Take us back to the main page index.php
echo "<script>location.href='index.php'</script>";

?>