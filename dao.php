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
    
}

?>