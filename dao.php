<?php 

 error_reporting(E_ALL);
    ini_set('display_errors', 1);
class Dao{
    
    private $host = 'us-cdbr-east-02.cleardb.com';
    private $dbname = 'heroku_674c85fd2485380';
    private $username = 'b96073f0ecf601';
    private $password = 'a3d89fef';

    //comment
    public function __construct(){}
        
    public function getConnection() {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            return $connection;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    

    public function test(){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }     
            $query = "Select * from task;";
            $execute = $conn->query($query);
            
            $out = '';
            $cnt = 0;
            if ($execute->rowCount() > 0) {
                // output data of each row
                while($row = $execute->fetch()) {
                    $cnt++;
                    $out .= '<input id="cb_' .$cnt. '" class="someclass" type="checkbox" />' .$row[0]. '<br/>';
                }
                echo $out;
            } 
            
            
            return $execute;   
    }   

    public function addTask($task) {
        $conn = $this->getConnection();
        $saveQuery = "insert into task (user_id, event_date, task) values (1, CURDATE(), 'added')";
        $q = $conn->prepare($saveQuery);
        $q->bindParam("task", $task);
        $q->execute();
        
    }

    public function deleteTask($task) {
        $conn = $this->getConnection();
        $saveQuery = "delete from task order by task_id desc limit 1";
        $q = $conn->prepare($saveQuery);
        $q->bindParam("task", $task);
        $q->execute();
    }

    public function getTasks() {
        $conn = $this->getConnection();
        return $conn->query("select task from task", PDO::FETCH_ASSOC);
      }

    // public function getUsername() {
    //     $conn = $this->getConnection();
    //     return $conn->query("select task from task", PDO::FETCH_ASSOC);
    //   }

    public function userExists($user, $pwd){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "select user_id from user where userName = 'zach' and password = '5678';";
            $execute = $conn->prepare($query);
            $execute->bindParam("zach", $user);
            $execute->bindParam("5678", $pwd);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getUsername($user_id){
        $conn = $this->getConnection();
        if(is_null($conn)) {
            return;
        }
        try{
            $query = "Select userName from user where user_id = user_id";
            $execute = $conn->prepare($query);
            $execute->bindParam("user_id", $user_id);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    
}

?>