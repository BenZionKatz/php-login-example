<?php


class DataBase
{
    //https://www.db4free.net/
    private $db_host  =  "85.10.205.173:3306" ;  
    private $db_username  =  "db_php_login" ;
    private $db_password  =  'Xg8HA4nZn' ;
    private $db_name  =  "db_php_login" ;  
    private $connect;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connect = mysqli_connect($this->db_host, $this->db_username ,$this->db_password ,$this->db_name);

        if (!$this->connect) {
            die("Failed to connect:" . mysqli_connect_error());
        }
    }
    
    private function prepareData($data)
    {   
        try {
            return $this->connect->real_escape_string(stripslashes(htmlspecialchars($data)));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    private function query($sql,$log)
    {
        $result = mysqli_query($this->connect, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    /**
     * 
     */
    public function login($username, $password)
    {
        $username = $this->prepareData($username);
        $sql = "select * from users where username = '" . $username . "'";
        
        return $this->query($sql,'login');
    }    

}

?>