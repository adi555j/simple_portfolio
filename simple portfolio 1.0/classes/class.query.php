<?php
	require("classes/class.getdata.php");
	
	class query{
		
		public $keyy;
		
		function __construct(){
			
			$connection = new getdata();
			$this->keyy = $connection->newInstance();
			return $this->keyy;
		
		}
		
		public function executeQuery($data_d){ //data_d[type,from,start,end,title,post]
			
			switch($data_d["type"]){
					case 0: //select query to show data
							$sqlQuery = 'select * from ' . $data_d["from"] . ' where pid >= ' . $data_d["start"] . ' and pid <= ' . $data_d["end"] ;
							return $this->executeCode($sqlQuery, $data_d["type"]);
							break;
					
					case 1: //insert values
							$sqlQuery = 'insert into ' . $data_d["from"] . ' (title,posts,date) values ("' . $data_d["title"] . '","' . $data_d["post"] . '",CURDATE())';
							return $this->executeCode($sqlQuery, $data_d["type"]);
							break;
							
					default:
			}
			
		}
		
		public function executeCode($sqlQuery, $data_d){
			
			$query = $this->keyy->prepare($sqlQuery);
			$query -> execute();
			if($data_d == 0){
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
		}
		
		//$x = new getdata();
		//$handle = $x->newInstance();
		//$sql = 'SELECT * FROM test';
		//$qry = $handle->prepare($sql);
		//$qry -> bindParam(':id', $id, PDO::PARAM_INT);
		//$qry -> execute();
		//$get = $qry->fetch(PDO::FETCH_ASSOC);
	}
	
?>