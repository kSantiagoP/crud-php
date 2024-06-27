<?php
    global $pdo;
    require "./src/db-connection.php";
    require "./src/Model/Event.php";
    require "./src/Repository/EventRepository.php";

    $eventRepo = new EventRepository($pdo);
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        $event = new Event($_POST['id'],$_POST['title'],$_POST['date'],$_POST['description']);
        $eventRepo->updateEvent($event);
        header("Location: index.php");
    }else{
        if(isset($_GET['id'])){
            $event = $eventRepo->getEventById($_GET['id']);
        }
        else{
            header("Location: index.php");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="./js/validateForm.js"></script>
</head>
<body>
    <h1>Edit Event</h1>

    <div class="EditEvent">
        <form action="editEvent.php" class="EditForm" method="POST" onsubmit="return validateForm()">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?=$event->getTitle()?>" required><br><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?=$event->getDate()?>" required><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"><?=$event->getDescription()?></textarea><br><br>
                <input type="hidden" name="id" value="<?=$event->getId()?>">
            <input type="submit" class="EditEvent" name="EditEvent" value="Edit Event">
        </form>  
    </div>

</body>
</html>