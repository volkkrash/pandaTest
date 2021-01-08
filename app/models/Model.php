<?php

class Model {
	public $db;
	
	public function __construct() {
		$this->db = DB::connect();
		$this->db->exec("set names utf8");
	}
	
	public function query($query) {
		return $this->db->query($query) ?? '';
	}
	
}