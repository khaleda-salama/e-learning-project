<?php

namespace Core; 
use PDO;


class Database {
  
    public $conn;
    public $stmt;
  
    public function __construct(array $config, $username = 'root', $password = 'root') {
            
      $dsn = 'mysql:'. http_build_query($config, "", ";");
      $this->conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
      
    public function query($query, $params = []): static {

      $this->stmt = $this->conn->prepare($query);
      $this->stmt->execute($params); 
      return $this;
    } 
        
    public function get(): array {

      return $this->stmt->fetchAll();
    
    }
    
    public function find(): mixed {
      return $this->stmt->fetch();
    }

    public function findOrFail(): mixed {

      $result = $this->find();
                                                                                                                       
      if(! $result) {
          abort();
      }
        return $result;
    }

}

 