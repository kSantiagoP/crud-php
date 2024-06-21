<?php
    if (!empty($events)) {
        echo '<ul>';
        foreach ($events as $event) {
            echo '<li>';
            echo '<strong>' . htmlspecialchars($event->getTitle()) . '</strong><br>';
            echo 'Data: ' . date('d/m/Y', strtotime($event->getDate())) . '<br>';
            echo 'Descrição: ' . htmlspecialchars($event->getDescription()) . '<br>';
            echo '<form action = "editEvent.php" class="EventForm" method="GET">';
                echo '<input type="hidden" name="id" value="'.$event->getId() .'">';
                echo '<input type="submit" class="EditBtn" value="Editar">';
            echo '</form>';
            echo '<form action = "excludeEvent.php" class="EventForm" method="POST">';
                echo '<input type="hidden" name="id" value="'.$event->getId() .'">';
                echo '<input type="submit" class="ExcluirBtn" value="Excluir">';
            echo '</form>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Não há eventos agendados.</p>';
    }
?>