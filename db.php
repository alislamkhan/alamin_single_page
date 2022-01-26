<?php

class db {
private $hostname = "localhost";
private $username = "alislam";
private $password = "";
private $dbname = "alamin_single_page";
public $link;
public $error;
  public function __construct(){
    $this->connectdb();
  }
  public function connectdb(){
  	$this->link = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
  	if(!$this->link){
  		$this->error ="conncetion failed";
  		echo $error;
  	}
  }

  public function select($query){
  	$result = $this->link->query($query);
  	if ($result) {
  		return $result;
  	}else{
      return false;
    }
  }  
  public function insert($query){
    $insert = $this->link->query($query);
    if ($insert) {
      return $insert;
    }else{
      return false;
    }
  }  
  public function update($query){
    $update = $this->link->query($query);
    if ($update) {
      return $update;
    }else{
      return false;
    }
  }  
  public function delete($query){
    $delete = $this->link->query($query);
    if ($delete) {
      return $delete;
    }else{
      return false;
    }
  }


}

?>
