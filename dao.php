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
            $query = "Select * from user;";
            $execute = $conn->prepare($query);
            
            $execute->execute();
            $result = $execute->fetchAll(PDO::FETCH_ASSOC);
            return $result;   
    }   

    public function addTask($task) {
        $conn = $this->getConnection();
        $saveQuery = "insert into task (user_id, event_date, task) values (1,'2020-10-07', 'first task complete')";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":task", $task);
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
            $query = "Select user_id from users where username = :user and password = :pwd";
            $execute = $conn->prepare($query);
            $execute->bindParam(":user", $user);
            $execute->bindParam(":pwd", $pwd);
            $execute->execute();
            $result = $execute->fetch(PDO::FETCH_ASSOC);
            return $result;
        }  catch (PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    
}

?>