<?php
    global $pdo;
    require "./src/db-connection.php";
    require "./src/Model/Event.php";
    require "./src/Repository/EventRepository.php";

    $eventsRepository =  new EventRepository($pdo);
    $events = $eventsRepository->getEvent();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="js/validateForm.js"></script>
</head>
<body>
    <h1 class="CalendarTitle">Calendar of Events</h1>

    <div class="AddEvent">
        <form action="addEvent.php" class="AddEvent" method="POST" onsubmit="return validateForm()">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"><br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date"><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

            <input type="submit" class="AddEvent" name="AddEvent" value="Add Event">
        </form>
    </div>

    <h2>Events</h2>
    <?php include 'events.php'; ?>
</body>
</html>