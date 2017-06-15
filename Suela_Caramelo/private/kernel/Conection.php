<?php 

class Conection {
	//Atributes
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "scdb";

	//Set-Get Methods
	public function getservername(){
		return $this -> servername;
	}

	public function getusername(){
		return $this -> username;
	}

	public function getpassword(){
		return $this -> password;
	}

	public function getdbname(){
		return $this -> dbname;
	}
}

?>