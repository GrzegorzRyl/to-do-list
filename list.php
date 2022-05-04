<?php 
    if($database->getTask()->rowCount()) {
        foreach($database->getTask() as $task) {
            $is_done = $database->getStatus($task['id']);
            if($is_done == 1){ ?>
                <div class="container mt-3">          
                    <div class="d-flex align-items-center flex-row card bg-success text-white mb-1">
<?php       } else { ?>
                <div class="container mt-3">          
                    <div class="d-flex align-items-center flex-row card bg-primary text-white mb-1">
<?php       } ?>
                    <a href="done_task.php?task_id=<?php echo $task['id'];?>" class="btn btn-secondary ms-3">OK</a>
                    <div class="card-body"><?php echo $task['content']; ?></div>
                    <a href="remove_task.php?task_id=<?php echo $task['id'];?>" class="btn btn-danger me-3">X</a>
                    </div>     
                </div>
<?php
        }
    } else {
        echo "<p class =\"lead pt-4 d-flex justify-content-center\">Brak zadań</p>";
    }
?>





