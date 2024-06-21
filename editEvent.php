<?php

    require "./src/db-connection.php";
    require "./src/Model/Evento.php";
    require "./src/Repository/EventRepository.php";

    $eventRepo = new EventRepository($pdo);

    if(($_SERVER["REQUEST_METHOD"] == "POST")){
        $event = new Evento($_POST['id'],$_POST['title'],$_POST['date'],$_POST['description']);
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
    <title>Editar</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="../js/validaCampos.js"></script>
</head>
<body>
    <h1>Editar Evento</h1>

    <div class="EditEvent">
        <form action="editEvent.php" class="EditForm" method="POST" onsubmit="return validateForm()">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="<?= $event->getTitle() ?>" required><br><br>

            <label for="date">Data:</label>
            <input type="date" id="date" name="date" value="<?= $event->getDate() ?>" required><br><br>

            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"> <?= $event->getDescription() ?> </textarea><br><br>
                <input type="hidden" name="id" value="<?= $event->getId() ?>">
            <input type="submit" class="EditEvent" name="EditEvent" value="Editar Evento">
        </form>  
    </div>

</body>
</html>