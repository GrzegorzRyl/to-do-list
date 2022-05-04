<?php

include 'config.php';
$database->removeTask($_GET['task_id']);
header("Location: index.php?remove_task=true");