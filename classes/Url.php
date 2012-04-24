<?php
 
class Url{
	public $root;
	public $host;
	public function __construct(){
		require 'config.php';
		$this->root = $root;
		$this->host = $host;
	}

	public function currentPage(){
		return $this->host.$_SERVER['REQUEST_URI'];
	}
}

?>