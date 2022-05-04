<?php

include 'config.php';

$task_id = $_GET['task_id'];
$status = $database->getStatus($task_id);
$is_done = $database->changeStatus($task_id, $status);
if($is_done == 1){
    header("Location: index.php?done_task=1&task_id=$task_id");
} else {
    header("Location: index.php?done_task=0&task_id=$task_id");
}