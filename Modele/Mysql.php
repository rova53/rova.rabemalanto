<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__file__)."/../constant.php");

class Mysql {
    
    private $connex;
    
    public function getConnection(){
        if (!$this->connex) {
            $this->connex = mysqli_connect(SQL_HOST, SQL_USER, SQL_PASSWORD);
        }
        $db = mysqli_select_db($this->connex,SQL_DB);
	if (!$db){
			echo "La base de données ", $host, " n'existe pas sur ", $host, "<br/>";
			die;
        }
        return $this->connex;
    }
    
    public function disconnect(){
		@mysqli_close(SQL_HOST);
    }
    
    public function Query($sql){
        $cn = $this->getConnection();
        $res = mysqli_query($cn,$sql);
        return $res;
    }
    
}