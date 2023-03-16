<?php 


class DB
{
    public $db;
	function __construct() {
		//include "config.php";
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->db->set_charset("utf8");
    }
    function __destruct() {
        $this->db->close();
    }
    function dbquery($query) { 
       $result = $this->db->query($query);
	echo  $this->db->error;
       return $result;
    }
    function dbmakearry($result) { 
       while ($row = mysqli_fetch_assoc($result)) {
        $array[] =$row;
        } 
        if(!isset($array)){ return false;}else {return $array;}
        return $array;
    }
}