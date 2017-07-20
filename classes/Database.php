<?php

  class Database{

    /**
    * handles connection to db
    */
    protected function handler(){
      try {
        $handler = new PDO('mysql:host=localhost;dbname=jobhunting;charset=utf8', 'root', '' );
        $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $handler;
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    /**
    * handles sql statements
    *@param $query, $params=array()
    */
    public function query($query, $params=[]){
      $stmt = $this->handler()->prepare($query);
      $stmt->execute($params);

      $query_str = explode(' ', $query);
      if($query_str[0] == 'SELECT'){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
      }
    }


  }
