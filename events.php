<?php
    if (!empty($events)) { ?>
        <ul>
        <?php
        foreach ($events as $event) {
            ?>
            <li>
                <strong><?= $event->getTitle() ?></strong><br>
                Date: <?= date('d/m/Y', strtotime($event->getDate())) ?> <br>
                Description: <?= htmlspecialchars($event->getDescription()) ?> <br>
                <form action = "editEvent.php" class="EventForm" method="GET">
                    <input type="hidden" name="id" value="<?=$event->getId()?>">
                    <input type="submit" class="EditBtn" value="Edit">
                </form>
                <form action = "excludeEvent.php" class="EventForm" method="POST">
                    <input type="hidden" name="id" value="<?=$event->getId()?>">
                    <input type="submit" class="ExcludeBtn" value="Delete">
                </form>
            </li>
        <?php
        }
        ?>
        </ul>
    <?php
    } else {
        echo '<p>There are no scheduled events.</p>';
    }
    ?>