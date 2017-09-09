<?php
	
	
	class getdata{
		
		protected $handler;
		
		public static function newInstance(){
				$data = [
							"dbname"   => "",
							"user"     => "root",
							"password" => "",
							"host"	   => ""
						];	
			try {
					$handle = new PDO("mysql:host=localhost;dbname=test", $data['user'], $data['password']);
					$handle->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
					$handle->exec("SET CHARACTER SET utf8");
					return $handle;
				}
			catch(PDOException $e) {
					file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
				}
		}	
	}
	

?>