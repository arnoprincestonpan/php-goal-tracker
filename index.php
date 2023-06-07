<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <title>To-Do List</title>
</head>
<body>
    <main class="container">
        <h1>Goal Tracker</h1>
        <form action="" method="post">
            <!-- Category, usage: Choose the category that the goal is for.-->
            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="0">Personal</option>
                <option value="1">Professional</option>
                <option value="2">Other</option>
            </select>
            <!-- Goal, usage: Area of text for description of goal.-->
            <label for="text">Goal</label>
            <textarea id="text" name="text" placeholder="Type in your goal here."></textarea>
            <!-- Date, usage: Date created.-->
            <label for="date">Date Created</label>
            <input id="date" name="date" type="date"  />
            <!-- Goal Status, usage: To see if it is completed or not.-->
            <label for="checkbox">Goal Completed</label>
            <input id="checkbox" name="checkbox" type="checkbox"  />
            <br/>
            <!-- Submit, usage: Save and send Goal.-->
            <button type="submit">Submit Goal</button>
        </form>
        <!-- PHP Logic Here -->
        <?php
        // insert connect.php
        require_once "connect.php";
        // select all rows
        $sql = "SELECT * FROM goals";
        // try querying all of them, or end the app if it fails
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        
        // Incomplete Goals
        print("<h2>Incomplete Goals</h2>");
        while($row = mysqli_fetch_array($result)){
            if($row['goal_complete'] == 0){
                $category = "Personal";
            } elseif($row['goal_category'] == 1){
                $category = "Professional";
            } else {
                $category = "Other";
            }
        };
        echo "<div class='goal'>";
        echo "<a href='complete.php?id='";
        ?>
    </main>
</body>
</html>