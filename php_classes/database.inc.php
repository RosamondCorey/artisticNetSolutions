<?php
	// Database class
	class database{
		// Database connection information
		private $address = DATABSE_ADDRESS;
		private $database_name = DATABASE_NAME;
		private $username = DATABASE_USERNAME;
		private $password = DATABASE_PASSWORD;
		// Test mode enables the following variables so you can see how many querys are being ran and what their combined query time is. 
		private $test_mode = true;
		public $qtime_start = 0;
		public $qtime_end = 0;
		public $qcount = 0;
		public $qtime = 0;
		// Query function
		public function queryTimeStart(){
			$time = microtime();
			$time = explode(" ", $time);
			$time = $time[1] + $time[0];
			$this->qtime_start = $time;	
		}
		public function queryTimeEnd(){
			$time = microtime();
			$time = explode(" ", $time);
			$time = $time[1] + $time[0];
			$this->qtime_end = $time;
			$this->qtime = ($this->qtime + ($this->qtime_end - $this->qtime_start));
		}
		public function query( $query_text ){
			if($this->test_mode){ $this->queryTimeStart(); }
			$connection = $this->connect();
			if(!$connection){
				echo mysql_error();
				if($this->test_mode){ $this->queryTimeEnd(); }
				return false;
			} else {
				$query_result = mysql_query( $query_text );
				echo mysql_error();
				if($this->test_mode){ $this->queryTimeEnd(); }
				$this->qcount++;
				return $query_result;
			}
		}
		// Connection function
		private function connect(){
			$db_connect = mysql_connect($this->address, $this->username, $this->password);
			if(!$db_connect){
				//echo mysql_error();
				return false;
			} else {
				$db_select = mysql_select_db($this->database_name);
				if(!$db_select){
					//echo mysql_error();
					return false;
				} else {
					return true;
				}
			}
		}	
	}
?>