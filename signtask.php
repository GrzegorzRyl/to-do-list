<?php
    if(isset($_GET)){
        if(isset($_GET['remove_task'])) {
            $result_info = "<div class='container mt-4 alert alert-warning'>Usunięto zadanie</div>";
        }

        if(isset($_GET['done_task'])) {
            $done_task = $_GET['done_task'];
            if(0 == $done_task){
                $result_info = "<div class='container mt-4 alert alert-warning'>Cofnięto wykonanie zadania</div>";
            } else {
                $result_info = "<div class='container mt-4 alert alert-success'>Wykonano zadanie</div>";
            }
        } 
    }

    if($_POST){
        if("" == trim($_POST['content'])) {
            $result_info = "<div class='container mt-4 alert alert-danger'>Podano puste pole</div>";
        } else {
            $content = trim($_POST['content']);
            $is_done = 0; 
            
            if(strlen($content) < 255){
                if($database->addTask($is_done, $content)){
                    $result_info = "<div class='container mt-4 alert alert-success'>Dodano zadanie</div>";
                } else {
                    $result_info = "<div class='container mt-4 alert alert-danger'>Wystąpił problem</div>";
                }
            }
        }
    }
?>

<section>
    <form class="d-flex align-items-center flex-column w-100" method="post">
        <h4 class="p-3 text-center" >Dodaj zadanie</h4>
        <textarea class="form-control w-50 mb-2" name="content" rows="2"></textarea>
        <button type="submit" class="btn btn-primary w-50 mb-2">Dodaj do listy</button>
    </form>
    <?php 
        if(isset($result_info)) {
            echo $result_info; 
        }
    ?>
</section>