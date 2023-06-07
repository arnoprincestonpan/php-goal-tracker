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
            <input id="" name="" type="date"  />
        </form>
    </main>
</body>
</html>