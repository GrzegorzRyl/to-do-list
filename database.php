<?php

class Database 
{
    protected $dbname = 'todolist'; 
    protected $dbhost = 'localhost';
    protected $dbuser = 'root';
    protected $dbpass = null;

    public function connection()
    {
        return new PDO("mysql:dbname=$this->dbname; host=$this->dbhost", $this->dbuser, $this->dbpass);
    }
    public function addTask(int $is_done, string $content) : BOOL
    {
        $pdo = $this->connection();
        $sql = "INSERT INTO tasks (id, done, content) VALUES (null, ?, ?)";
        return $pdo->prepare($sql)->execute([$is_done, $content]);
    }

    public function getTask() : PDOStatement
    {
        $pdo = $this->connection();
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        return $pdo->query($sql);
    }

    public function getStatus(int $id) : int
    {
        $pdo = $this->connection();
        $sql = "SELECT done FROM tasks WHERE id = $id;";
        $data = $pdo->query($sql);
        $state = $data->fetch(PDO::FETCH_ASSOC);
        $is_done = $state['done'];
        return $is_done;
    }

    public function changeStatus(int $id, int $is_done) : int
    {
        switch($is_done){
            case 0:
                $is_done = 1;
                break;
            case 1:
                $is_done = 0;
                break;
        }
        $pdo = $this->connection();
        $sql = "UPDATE tasks SET done = $is_done  WHERE id = $id;";
        $pdo->query($sql);
        return $is_done;
    }

    public function removeTask(int $task_id) : int
    {
        $pdo = $this->connection();
        $sql = "DELETE FROM tasks WHERE id = $task_id";
        return $pdo->exec($sql);
    }
}