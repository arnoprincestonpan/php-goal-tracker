<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="./styles.css"></link>
    <title>To-Do List</title>
</head>
<body>
    <main class="container">
        <h1>Goal Tracker</h1>
        <form action="insert_goal.php" method="post">
            <!-- Category, usage: Choose the category that the goal is for.-->
            <label for="cat">Category</label>
            <select id="cat" name="cat">
                <option valueAsNumber="0" selected>Personal</option>
                <option valueAsNumber="1">Professional</option>
                <option valueAsNumber="2">Other</option>
            </select>
            <!-- Goal, usage: Area of text for description of goal.-->
            <label for="text">Goal</label>
            <textarea id="text" name="text" placeholder="Type in your goal here."></textarea>
            <!-- Date, usage: Date created.-->
            <label for="goaldate">Date Created</label>
            <input id="goaldate" name="goaldate" type="date"  />
            <!-- Goal Status, usage: To see if it is completed or not.-->
            <label for="complete">Goal Completed</label>
            <input id="complete" name="complete" type="checkbox"  />
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
        
        //Incomplete Goals
        print("<h2>Incomplete Goals</h2>");
        while($row = mysqli_fetch_array($result)){
            if($row['goal_complete'] == 0){
                if($row['goal_category'] == 0){
                    $cat = "Personal";
                } elseif ($row['goal_category' == 1]) {
                    $cat = "Professional";
                } else {
                    $cat = "Other";
                }
                echo "<div class='goal'>";
                echo "<a href='complete.php?id=" . $row['goal_id'] . "'><button class='btnComplete'>Complete</button></a>";
                echo "<strong>" . $cat . "</strong><p>" . $row['goal_text'] . "</p>Goal Date: " . $row['goal_date'];
                echo "</div>";
            }
        }

        //Complete Goals
        print("<h2>Complete Goals</h2>");
        $result = mysqli_query($link, $sql) or die(mysqli_error($link));
        while($row = mysqli_fetch_array($result)){
            if($row['goal_complete'] != 0){
                if($row['goal_category'] == 0){
                    $cat = "Personal";
                } elseif ($row['goal_category' == 1]) {
                    $cat = "Professional";
                } else {
                    $cat = "Other";
                }
                echo "<div class='goal'>";
                echo "<strong>" . $cat . "</strong>";
                echo "<a href='delete.php?id=" . $row['goal_id'] . "'><button class='btnDelete'>Delete</button></a>";
                echo "<p>" . $row['goal_text'] . "</p>Goal Date: " . $row['goal_date'];
                echo "</div>";
            }
        }

        ?>
    </main>
</body>
</html>